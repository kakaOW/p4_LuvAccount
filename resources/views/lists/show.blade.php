@extends('layouts.master')

@section('content')

<div class="row align-center">
    <div class="small-12 medium-10">
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
                <h5>{{ $lists->description}}</h5>
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                <label>Total Point to achieve</label>
            </div>
            <div class="small-9 medium-3 columns">
                <h5>{{ $lists->totalPoint }}</h5>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <a class="button" href="/edit/{{ $lists->id }}"><button type="submit" value="Edit">Edit</button></a>
            </div>
        </div>

        <div class="row">
            <table class="hover">
              <thead>
                <tr>
                  <th width="30">Entry</th>
                  <th width="100">Date</th>
                  <th width="150">Title</th>
                  <th>Story</th>
                  <th width="30">Points</th>
                </tr>
              </thead>
              <tbody>
                @foreach($entries as $entry)
                    <tr>
                      <td>{{ $entry->entry }}</td>
                      <td>{{ $entry->date }}</td>
                      <td>{{ $entry->title }}</td>
                      <td>{{ $entry->story }}</td>
                      <td>{{ $entry->points }}</td>
                    </tr>
                @endforeach
              </tbody>
              </tbody>
          </table>
        </div>

        <!-- <div id="body_data">

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
    </div>
</div> -->
@stop
