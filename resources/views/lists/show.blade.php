@extends('layouts.master')

@section('content')

<div class="row align-center">
    <div class="small-12 medium-11">
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

        @if($user->id!=$lists->user_id )
        <div class="row">
            <div class="small-3 columns">
                <label>Creator</label>
            </div>
            <div class="small-9 medium-3 columns">
                <h5>{{ $user->name }}</h5>
            </div>
        </div>
        @endif
        
        <div class="row">
            <div class="small-12 columns">
                <a href="/"><button class="button secondary" type="button" value="Return">Return</button></a>
                @if($user->id==$lists->user_id )
                <a class="button" href="/edit/{{ $lists->id }}"><button type="button" value="Edit">Edit</button></a>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="small-12 columns">
                <div class="progress success" role="progressbar" tabindex="0" aria-valuenow="{{$entries->sum('points')}}" aria-valuemin="0" aria-valuetext="{{round($entries->sum('points')/$lists->totalPoint*100)}}%" aria-valuemax="{{ $lists->totalPoint }}">
                    <span class="progress-meter" style="width: {{round($entries->sum('points')/$lists->totalPoint*100)}}%">
                        <p class="progress-meter-text">{{round($entries->sum('points')/$lists->totalPoint*100)}}%</p>
                    </span>
                </div>
            </div>
        </div>


        <div class="row">
            <table class="hover">
              <thead>
                <tr>
                  <th width="30">Entry</th>
                  <th width="100">Date</th>
                  <th witdh="150">Title</th>
                  <th >Story</th>
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

@stop
