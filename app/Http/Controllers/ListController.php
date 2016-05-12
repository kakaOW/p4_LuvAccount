<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class ListController extends Controller
{


    public function getIndex()
    {
        $lists = \App\Lists::where('user_id',\Auth::id())->orderBy('updated_at','desc')->get();
        $entries = \App\Entry::where('user_id',\Auth::id())->get();

        return view('lists.index', [
            'lists' => $lists,
            'entries' => $entries

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        //
        return view('lists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request) {

        $this->validate($request, [
        'description'       => 'required',
        'subject'           => 'required',
        'totalPoint'        => 'required|integer',
        ]);

        // $description = $request->input('description');
        // $subject = $request->input('subject');
        // $totalPoint = $request->input('totalPoint');
        $list = new \App\Lists();
        $list->subject = $request->subject;
        $list->description = $request->description;
        $list->totalPoint = $request->totalPoint;
        $list->user_id = \Auth::id();

        $list->save();

        \Session::flash('message','Your list was created');
        return redirect('/profile');
    }


    public function getShow($id = null) {

        $list = \App\Lists::find($id);
        if(is_null($list)) {
            \Session::flash('message','List not found');
            return redirect('/profile');
        }

        $entries = \App\Entry::where('list_id',$id)->orderBy('entry', 'asc')->get();

        // dump($entries, $list);
        return view('lists.show', [
            'lists' => $list,
            'entries' => $entries
        ]);
    }


    public function getEdit($id = null)  {
        $list = \App\Lists::find($id);
        if(is_null($list)) {
            \Session::flash('message','List not found');
            return redirect('/profile');
        }

        $entries = \App\Entry::where('list_id',$id)->orderBy('entry', 'asc')->get();

        if(\Auth::id() == $list->user_id) {
            return view('lists.edit')->with ([
                'lists' => $list,
                'entries' => $entries,
            ]);

        } else{
            \Session::flash('message','Unauthorize to edit');
            return redirect('/show/'.$id);
        }


    }

    public function postEdit(Request $request) {


        $list = \App\Lists::findorfail($request->id);

        $list->subject = $request->subject;
        $list->description = $request->description;
        $list->totalPoint = $request->totalPoint;
        // dump($list);
        $list->save();
        $list_id = \App\Lists::where('id','=', $request->id)->pluck('id')->first();

        #Entry create and update
        $listEntries = $request->get('listEntry');
        foreach($listEntries as $listEntry) {
            if(isset($listEntry['id'])) {
                $thisEntry = \App\Entry::where('id', $listEntry['id'])->first();
            } else{
                $thisEntry = new \App\Entry();
            }
        $thisEntry->entry = $listEntry['entry'];
        $thisEntry->date = $listEntry['date'];
        $thisEntry->title = $listEntry['title'];
        $thisEntry->story = $listEntry['story'];
        $thisEntry->points = $listEntry['points'];
        $thisEntry->list_id = $list_id;
        $thisEntry->user_id = \Auth::id();
        $thisEntry->color = $listEntry['color'];
        if(isset($listEntry['deleteEntry'])){
            $thisEntry->deleteEntry = $listEntry['deleteEntry'];
        }
        $thisEntry->save();
        }

        $deleteEntries = \App\Entry::where('deleteEntry', 'on')->delete();


        // dump($listEntries, $thisEntry);

        \Session::flash('message','Your list was updated');
        // return "proceed";
        return redirect('/show/'.$request->id);

    }


    public function getDoDelete($id) {

    # Get the book to be deleted
    $list = \App\Lists::find($id);
    $entries = \App\Entry::where('list_id',$id)->get();

    if(is_null($list)) {
        \Session::flash('message','Not found.');
        return redirect('/profile');
    }

    # First remove any entries associated with this book
    if(isset($entries)) {
        foreach($entries as $entry){
            $entry->delete();
        }
    }

    # Then delete the book
    $list->delete();

    # Done
    \Session::flash('message',$list->subject.' was deleted.');
    return redirect('/profile');

    }

    // Upload Header Image
    public function getListUpload($id = null) {
    $list = \App\Lists::find($id);
    if(is_null($list)) {
        \Session::flash('message','List not found');
        return redirect('/');
        }

    if(\Auth::id() == $list->user_id) {
        return view('lists.uploadList')->with ([
            'lists' => $list,
        ]);

    } else{
        \Session::flash('message','Unauthorize to edit');
        return redirect('/show/'.$id);
    }

    }

    public function postListUpload(Request $request) {

        // GET ALL THE INPUT DATA , $_GET,$_POST,$_FILES.
        $input = $request->file('listImg');


       // PASS THE INPUT AND RULES INTO THE VALIDATOR
        $this->validate($request, [
        'listImg' => 'image|max:3000',
        ]);


       // SET UPLOAD PATH
        $destinationPath = 'uploads';
        // GET THE FILE EXTENSION
        // $extension = $input->getClientOriginalExtension();
        // RENAME THE UPLOAD WITH RANDOM NUMBER
        $fileName = 'list_original_' . \Auth::id().'_'.$request->id.'.png';
        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
        $upload_success = $input->move($destinationPath, $fileName);

        $resizeImage= Image::make($destinationPath.'/'.$fileName);
        $height = $resizeImage->height();
        $width = $resizeImage->width();

        if ($height < $width) {
            $Coordinate = ($width - $height) / 2;
            $cropLargeImage = $resizeImage->crop($height,$height, $Coordinate, 0)->resize(250, 250)->save($destinationPath.'/'.'list_250x250_'. \Auth::id().'_'.$request->id.'.png', 70);
            $cropMediumImage = $cropLargeImage->resize(150, 150)->save($destinationPath.'/'.'list_150x150_'. \Auth::id().'_'.$request->id.'.png', 70);
            $cropSmallImage = $cropLargeImage->resize(125, 125)->save($destinationPath.'/'.'list_125x125_'. \Auth::id().'_'.$request->id.'.png', 60);

        } elseif ($height > $width) {
            $Coordinate = ($height - $width) / 2;
            $cropLargeImage = $resizeImage->crop($width,$width,0, $Coordinate)->resize(250, 250)->save($destinationPath.'/'.'list_250x250_'. \Auth::id().'_'.$request->id.'.png', 70);
            $cropMediumImage = $cropLargeImage->resize(150, 150)->save($destinationPath.'/'.'list_150x150_'. \Auth::id().'_'.$request->id.'.png', 70);
            $cropSmallImage = $cropLargeImage->resize(125, 125)->save($destinationPath.'/'.'list_125x125_'. \Auth::id().'_'.$request->id.'.png', 60);
        } else {
            $cropLargeImage = $resizeImage->resize(250, 250)->save($destinationPath.'/'.'list_250x250_'. \Auth::id().'_'.$request->id.'.png', 70);
            $cropMediumImage = $resizeImage->resize(150, 150)->save($destinationPath.'/'.'list_150x150_'. \Auth::id().'_'.$request->id.'.png', 70);
            $cropSmallImage = $resizeImage->resize(125, 125)->save($destinationPath.'/'.'list_125x125_'. \Auth::id().'_'.$request->id.'.png', 60);
        }

        // IF UPLOAD IS SUCCESSFUL SEND SUCCESS MESSAGE OTHERWISE SEND ERROR MESSAGE

        if ($upload_success) {
            $list = \App\Lists::find($request->id);
            $list->listImg = $fileName;
            dump($list);
            // $list->save();
            return "hi";
            // return Redirect('/upload/{{$request->id}}');
        }
    }
}
