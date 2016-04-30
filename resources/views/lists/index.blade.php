@extends('layouts.master')

@section('content')

<div class="row small-12 medium-9">
        <div class="columns align-self-middle">
            <div class="media-object">
                <div class="media-object-section">
                    <img class="img-circle" data-interchange="[http://placehold.it/75x75, small], [http://placehold.it/125x125, medium], [http://placehold.it/225x225.jpg, large]">
                </div>
            </div>
        </div>
        <div class="columns align-self-middle">
            <div class="profile-text">
                <h3>Oscar</h3>
                <p>This is my list.</p>
            </div>
        </div>
        <div class="columns"></div>
    </div>

<hr />

    <div class="row small-12 medium-9">

        <!-- List in gallery view -->
        <div class="media-object showcase">
            <div class="media-object-section">

                <div class="thumbnail gallery_view">
                    <a href="/lists/create"><img data-interchange="[img/add_125x125.png, small], [img/add_150x150.png, medium], [img/add_250x250.png, large]">
                    <h5>Add a new list</h5></a>
                </div>
                @foreach ($lists as $list)
                    <div class="thumbnail gallery_view">
                        <a href="/edit/{{$list->id}}"><img data-interchange="[http://placehold.it/125x125, small], [http://placehold.it/150x150, medium], [http://placehold.it/250x250.jpg, large]">
                        <h5>{{ $list->subject }}</h5></a>
                    </div>
                @endforeach



            </div>
        </div>
        <!-- End of list -->



    </div>

@stop
