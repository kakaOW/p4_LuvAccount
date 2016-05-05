@extends('layouts.master')

@section('content')
  <div class="row align-center">
    <div class="small-12 medium-10 columns">
      <div class="row">
        <div class="medium-6 columns hiddenSmall">
          <p></p>
          <h4><strong>Record every moments, stories, tasks, goals on LuvAccount.</strong></h4>
          <p></p>
          <p>
            <i class="fa fa-heart-o fa-2x" aria-hidden="true"></i><strong> Keep track of your progress through point system.</strong>
          </p>
          <p>
            <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i><strong> Assign points to each entry.</strong>
          </p>
          <p>
            <i class="fa fa-star-o fa-2x" aria-hidden="true"></i><strong> Access everywhere.</strong>
          </p>

        </div>
        @include('layouts._login')
      </div>
    </div>

  </div>

@stop
