@extends('layouts.master')

@section('content')

<div class="row align-center">
    <div class="small-12 medium-8 columns">
        <h4>{{$lists->subject}}</h4>
        <h5>Current Header Picture</h5>
        <div class="row">
            @if(empty($lists->listImg))
            <div class="small-5 shrink columns">
                <img src="http://placehold.it/250x250?text=LuvAccount" alt="Header Pic Large" />
            </div>
            <div class="small-4 shrink align-self-bottom columns">
                <img src="http://placehold.it/150x150?text=LuvAccount" alt="Header Pic Small" />
            </div>
            <div class="small-3 align-self-bottom columns">
                <img src="http://placehold.it/125x125?text=LuvAccount" alt="Header Pic Small" />
            </div>
            @else
            <div class="small-5 shrink columns">
                <img src="/uploads/list_250x250_{{$user->id}}_{{$lists->id}}.png" alt="Header Pic Large" />
            </div>
            <div class="small-4 shrink align-self-bottom columns">
                <img src="/uploads/list_150x150_{{$user->id}}_{{$lists->id}}.png" alt="Header Pic Small" />
            </div>
            <div class="small-3 align-self-bottom columns">
                <img src="/uploads/list_125x125_{{$user->id}}_{{$lists->id}}.png" alt="Header Pic Small" />
            </div>
            @endif
        </div>
        <h5>Upload Image</h5>
        <div class="row">
            <div class="small-12 medium-8 columns">
                <form action="/upload/{{$lists->id}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file"  name="listImg">
                    <p>Maximum upload size: 2MB</p>
                    <p>Supported file type: jpg, jpeg, png, gif, bmp</p>
                    <a href="/edit/{{$lists->id}}" class="button secondary">Return</a>
                    <button class="button" type="submit" value="Submit">Sumbit</button>
                    @if($errors->get('listImg'))
                    <div class="alert callout">
                        {{ $errors->first('listImg') }}
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

@stop
