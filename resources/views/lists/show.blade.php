@extends('layouts.master')

@section('content')

<div class="row small-12 medium-9 align-center">
    <div class="row">
        <div class="small-3 columns">
            <label>Subject</label>
        </div>
        <div class="small-9 columns">
            <h5>{{ $lists->subject }}</h5>
        </div>

    </div>

    <div class="row">
        <div class="small-3 columns">
            <label>Description</label>
        </div>
        <div class="small-9 columns">
            {{ $lists->description}}
        </div>
    </div>

    <div class="row">
        <div class="small-3 columns">
            <label>Total Point to achieve</label>
        </div>
        <div class="small-9 medium-3 columns">
            {{ $lists->totalPoint }}
        </div>
    </div>



    <div id="body_data">

        <div class="row">
            <div class="small-2 large-1 columns">
                <label>Entry</label>
                <input type="number" name="entry[]" id="entry[0]" value="1" />
            </div>
            <div class="small-5 large-3 columns">
                <label>Date</label>
                <input type="date" name="date[]" id="date[0]" placeholder="" />
            </div>
            <div class="small-5 large-2 columns">
                <label>Title</label>
                <input type="text" name="title[]" id="title[0]" placeholder="Title"  />
            </div>
            <div class="small-9 large-4 columns">
                <label>Story</label>
                <textarea name="story[]" id="story[0]" placeholder="Story" row="1"></textarea>
            </div>
            <div class="small-3 large-2 columns">
                <label>Points</label>
                <input type="number" name="points[]" id="points[0]" value="0" />
            </div>
        </div>

    </div>


@stop
