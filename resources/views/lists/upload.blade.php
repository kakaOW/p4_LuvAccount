@extends('layouts.master')

@section('content')

    <form action="/upload" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file">
        <input type="submit">
        @if($errors->get('file'))
        <div class="alert callout">
            {{ $errors->first('file') }}
        </div>
        @endif
    </form>
@stop
