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
        dump ($entries);

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
        $thisEntry->save();
        }

        dump($thisEntry);



        #Entry
        // $entry_id = \App\Entry::where('list_id','=', $list_id)->pluck('id')->all();
        // $entry_data = \App\Entry::findorfail($entry_id);
        // $entry = $request->input('entry');
        // $date = $request->input('date');
        // $title = $request->input('title');
        // $story = $request->input('story');
        // $points = $request->input('points');
        // $list_id = \App\Lists::where('id','=', $request->id)->pluck('id')->first();
        //
        // if(isset($entry)) {
        //     $numEntries = count($entry);
        // } else {
        //     $numEntries = 0;
        // }
        // for($i=0; $i < $numEntries; $i++) {
        //     $body_id[$i] = $list_id;
        // }
        //
        // for($i=0; $i < $numEntries; $i++) {
        //     $temp = [];
        //     $temp['id'] = $entry_id[$i];
        //     $temp['entry'] = $entry[$i];
        //     $temp['date'] = $date[$i];
        //     $temp['title'] = $title[$i];
        //     $temp['story'] = $story[$i];
        //     $temp['points'] = $points[$i];
        //     $temp['list_id'] = $body_id[$i];
        //     $test[$i] = $temp;
            // $test3[$i] = $temp2;
            // $test2 = \App\Entry::where('id','=',$test3[$i])->get();
            // $test4[$i] = $test2->updateOrCreate($test);
        // }

        // $body_data[] = array(
        //     'id' => $entry_id,
        //     'entry' => $entry,
        //     'date' => $date,
        //     'title' => $title,
        //     'story' => $story,
        //     'points' => $points,
        //     'list_id' => $body_id
        // );


        // dump($test);

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
