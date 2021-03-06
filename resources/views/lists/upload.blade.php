@extends('layouts.master')

@section('content')

<div class="row align-center">
    <div class="small-12 medium-8 columns">
        <h4>Current Profile Picture</h4>
        <div class="row">
            @if(empty($user->profileImg))
            <div class="small-7 shrink columns">
                <img class="img-circle" src="/img/stock_225x225.png" alt="Profile Pic Large" />
            </div>
            <div class="small-5 align-self-bottom columns">
                <img class="img-circle" src="/img/stock_125x125.png" alt="Profile Pic Small" />
            </div>
            @else
            <div class="small-7 shrink columns">
                <img class="img-circle" src="/uploads/profile_225x225_{{$user->id}}.png" alt="Profile Pic Large" />
            </div>
            <div class="small-5 align-self-bottom columns">
                <img class="img-circle" src="/uploads/profile_125x125_{{$user->id}}.png" alt="Profile Pic Small" />
            </div>
            @endif
        </div>
        <h5>Upload Image</h5>
        <div class="row">
            <div class="small-12 medium-8 columns">
                <form action="/profile/upload" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file"  name="file">
                    <p>Maximum upload size: 2MB</p>
                    <p>Supported file type: jpg, jpeg, png, gif, bmp</p>
                    <a class="button secondary" href="/profile">Return</a>
                    <button class="button" type="submit" value="Submit">Sumbit</button>
                    @if($errors->get('file'))
                    <div class="alert callout">
                        {{ $errors->first('file') }}
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

@stop
