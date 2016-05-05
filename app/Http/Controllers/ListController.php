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
                'entries' => $entries
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
                // $thisEntry = $thisEntry::update()
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
        $thisEntry->save();
        }

        // $deleteEntries = \App\Entry::where('checkbox', 'on')->delete();


        dump($thisEntry);
        // dump($deleteEntries);

        \Session::flash('message','Your list was updated');
        return "proceed";
        // return redirect('/edit/'.$request->id);

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
}
