<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class ListController extends Controller
{

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

        // dump($thisEntry);

        \Session::flash('message','Your list was updated');
        return redirect('/edit/'.$request->id);

    }


    public function destroy($id)
    {
        //
    }
}
