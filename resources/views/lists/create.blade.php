@extends('layouts.master')

@section('content')

<div class="row align-center">
    <div class="small-12 medium-11">
        <form method="POST" action="/create">
            {{ csrf_field() }}
            <div class="row">
                <div class="small-3 columns">
                    <label>Subject</label>
                </div>
                <div class="small-9  columns">
                    <input type="text" name="subject" id="subject" placeholder="I will achieve this goal!" />
                    @if($errors->get('subject'))
                    <div class="alert callout">
                        {{ $errors->first('subject') }}
                    </div>
                    @endif
                </div>

            </div>

            <div class="row">
                <div class="small-3 columns">
                    <label>Description</label>
                </div>
                <div class="small-9  columns">
                    <textarea name="description" id="description" placeholder="Travel to Orlando as a reward"></textarea>
                    @if($errors->get('description'))
                    <div class="alert callout">
                        {{ $errors->first('description') }}
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="small-3 columns">
                    <label>Total Point to achieve</label>
                </div>
                <div class="small-9 medium-3 columns">
                    <input type="number" name="totalPoint" id="totalPoint" placeholder="100">
                    @if($errors->get('totalPoint'))
                    <div class="alert callout">
                        {{ $errors->first('totalPoint') }}
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="small-12 columns">
                    <a href="/lists" class="button secondary" >Return</a>
                    <button class="button secondary" type="reset" value="Reset">Clear</button>
                    <button class="button" type="submit" value="Submit">Sumbit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
