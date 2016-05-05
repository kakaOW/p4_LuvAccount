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

        // database mass assignment
        // $title_data = $request->only('subject','description','totalPoint');
        //
        // $list = new \App\Lists($title_data);
        \Session::flash('message','Your list was created');
        $list->save();


        // \Session::flash('message','Your list was added');

        return redirect('/profile');
    }


    public function getShow($id = null) {

        $list = \App\Lists::find($id);
        $entries = \App\Entry::where('list_id',$id)->orderBy('entry', 'asc')->get();

        // dump($entries, $list);
        return view('lists.show', [
            'lists' => $list,
            'entries' => $entries
        ]);
    }


    public function getEdit($id = null)  {
        $list = \App\Lists::findorFail($id);

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

        // dump($thisEntry);

        \Session::flash('message','Your list was updated');
        return redirect('/edit/'.$request->id);

    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
