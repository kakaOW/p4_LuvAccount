<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class ListController extends Controller
{

    //Responds to requests to GET /list

    public function getIndex()
    {
        $lists = \App\Lists::orderBy('id','asc')->get();

        return view('lists.index')->with('lists', $lists);
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

        // database mass assignment
        // $title_data = $request->only('subject','description','totalPoint');
        //
        // $list = new \App\Lists($title_data);

        $list->save();


        // \Session::flash('message','Your list was added');

        return redirect('/lists');
    }


    public function getShow($id = null) {

        $list = \App\Lists::find($id);
        $entries = \App\Entry::where('list_id',$id)->orderBy('entry', 'desc')->get();

        dump($entries, $list);
        return view('lists.show', [
            'lists' => $list,
            'entries' => $entries
        ]);
    }


    public function getEdit($id = null)  {

        $list = \App\Lists::findorFail($id);

        $entries = \App\Entry::where('list_id',$id)->orderBy('entry', 'asc')->get();


        return view('lists.edit')->with ([
            'lists' => $list,
            'entries' => $entries
        ]);

    }

    public function postEdit(Request $request) {


        $list = \App\Lists::findorfail($request->id);

        $list->subject = $request->subject;
        $list->description = $request->description;
        $list->totalPoint = $request->totalPoint;
        dump($list);
        $list->save();

        #New Entry
        $entry = $request->input('entry');
        $date = $request->input('date');
        $title = $request->input('title');
        $story = $request->input('story');
        $points = $request->input('points');
        $list_id = \App\Lists::find($request->id);
        $body_data[] = array(
            'entry' => $entry,
            'data' => $date,
            'title' => $title,
            'story' => $story,
            'points' => $points,
            'list_id' => $list_id
        );

        dump($body_data);
        // $entry->save();
        #end of new entry
        return "processed";
        // return redirect('/lists');

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
