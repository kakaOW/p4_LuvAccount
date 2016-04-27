<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ListController extends Controller
{

    //Responds to requests to GET /list

    public function getIndex()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        //
        return view('list.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
        $this->validate($request,[
        'description'       => 'required',
        'subject'           => 'required',
        'totalPoint'        => 'required|between:-1000,1000',
        'entry'             => 'required',
        'date'              => 'required|date',
        'title'             => 'required',
        'story'             => 'required',
        'points'        => 'required|between:-100,100',
        ]);

        // database mass assignment
        // $title_data = $request->only('subject','description','totalPoint');
        // $body_data = $request->only('entry','data','title','story','points');
        // $list = new \App\List($title_data);
        // $$entry = new \App\Entry($body_data);
        // $list->save();
        // entry->save();
        //
        // \Session::flash('message','Your list was added');

        return redirect('/lists');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($id) {
        return view('lists.show');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
