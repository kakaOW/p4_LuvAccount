@extends('layouts.master')

@section('content')

<div class="row align-center">
    <div class="small-12 medium-11">
        <div class="row">
            <div class="small-12 medium-4 shrink columns">
                @if(empty($lists ->listImg))
                <div class="thumbnail">
                    <img src="http://placehold.it/250x250?text=LuvAccount" alt="Header Image">
                </div>

                @else
                <div class="thumbnail">
                    <img src="/uploads/list_250x250_{{$user->id}}_{{$lists->id}}.png" alt="Header Image">
                </div>

                @endif
            </div>
            <div class="small-12 medium-8 columns">
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
                <a href="/" class="button secondary">Return</a>
                @if($user->id==$lists->user_id )
                <a class="button" href="/edit/{{ $lists->id }}">Edit</a>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="small-12 columns">
                <!--Progress bar  -->
                <div class="progress success" role="progressbar" tabindex="0" aria-valuenow="{{$entries->sum('points')}}" aria-valuemin="0" aria-valuetext="{{round($entries->sum('points')/$lists->totalPoint*100)}}%" aria-valuemax="{{ $lists->totalPoint }}">
                    <span class="progress-meter" style="width: {{round($entries->sum('points')/$lists->totalPoint*100)}}%">
                        <p class="progress-meter-text">{{round($entries->sum('points')/$lists->totalPoint*100)}}%</p>
                    </span>
                </div>
            </div>
            <div class="small-12 columns">
                <i class="fa fa-plus" aria-hidden="true">
                @if(strval($entries) != "[]")
                <?php $i= 0 ; foreach($entries as $entry){if($entry->points > 0){$temp[$i]=$entry->points; $i++;}else{$temp[$a]= 0;};} echo array_sum($temp);?>
                @else
                0
                @endif
                </i>
                <i class="fa fa-minus" aria-hidden="true">
                @if(strval($entries) != "[]")
                <?php $a= 0 ; foreach($entries as $entry){if($entry->points < 0){$temp2[$a]=$entry->points; $a++;}else{$temp2[$a]= 0;};} echo -array_sum($temp2);?>
                @else
                0
                @endif
                </i>
            </div>
        </div>

        <?php $i = 1?>
        <div class="row">
            <table class="hover">
              <thead>
                <tr>
                  <th width="25">Entry</th>
                  <th width="100">Date</th>
                  <th witdh="150">Title</th>
                  <th >Story</th>
                  <th width="30">Points</th>
                </tr>
              </thead>
              <tbody>
                @foreach($entries as $entry)
                    <tr style="color:{{$entry->color}};">
                      <td>{{ $i }}</td>
                      <td>{{ $entry->date }}</td>
                      <td>{{ $entry->title }}</td>
                      <td>{{ $entry->story }}</td>
                      <td>{{ $entry->points }}</td>
                    </tr>
                <?php $i++?>
                @endforeach
              </tbody>
          </table>
        </div>
    </div>
</div>
@stop
