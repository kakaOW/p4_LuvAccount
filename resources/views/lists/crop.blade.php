@extends('layouts.master')

@section('head')

<link rel="stylesheet" href="/css/cropper.min.css">


@stop

@section('content')
<div class="row align-center">
  <div class="small-12 medium-10 columns">
    <form class="" action="/upload/add" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="small-12 medium-offset-3 medium-6 columns">
          <div class="featured_image">
            <img src="/uploads/profile_original_{{$user->id}}.png" alt="photo" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="small-12 medium-offset-3 medium-6 columns">
            <button class="button" type="submit" value="Submit">Sumbit</button>
        </div>
      </div>
      <div id="data-url"></div>
        <button class="button small" type="button" id="seeData" name="seeData">Add new entry</button>
        <input type="hidden" id="items" name="items" value="1" />

    </form>
  1
  </div>

</div>


@stop

@section('body')
<script src="/js/vendor/jquery.min.js"></script>
<script src="/js/vendor/cropper.min.js"></script>

<script type="text/javascript">
    $(function () {
      $('#image').cropper({
        viewMode: 1,
        dragMode: 'crop',
        autoCropArea: 0.75,
        restore: false,
        guides: false,
        highlight: false,
        cropBoxMovable: true,
        cropBoxResizable: true,
        aspectRatio: 9 / 9,
        moveable: false,
        zoomable: false,
      });
    });

    $(document).ready(function() {
      $('#seeData').click(function() {
        var strToAdd = 1;
        $('#data_url').append(strToAdd);
      });
    });
</script>


@stop
