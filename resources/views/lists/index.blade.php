@extends('layouts.master')

@section('content')

<div class="row align-center">
    <div class="small-12 medium-9 columns">
        <div class="row">
            <div class="columns small-6 medium-5  align-self-middle">
                <div class="media-object">
                    <div class="media-object-section">
                        @if(is_null('uploads/profile_original_'.$user->id.'.png'))
                        <img class="img-circle" data-interchange="[http://placehold.it/125x125, small], [http://placehold.it/125x125, medium], [http://placehold.it/225x225.jpg, large]">
                        @else
                        <img class="img-circle" data-interchange="[uploads/profile_125x125_{{$user->id}}.png, small], [[uploads/profile_125x125_{{$user->id}}.png, medium], [uploads/profile_225x225_{{$user->id}}.png, large]">
                        @endif
                        <?php dump(is_resourse('uploads/profile_original_'.$user->id.'.png'))?>
                        <?php dump(is_resourse('uploads/profile_original_1.png'))?>
                    </div>
                </div>
            </div>
            <div class="columns small-6 medium-7 align-self-middle">
                <div class="row">
                    <div class="columns small-5 shrink">
                        <h3>{{ $user->name }}</h3>
                    </div>
                    <div class="columns ">
                        <a href="/upload"><button class="secondary hollow button tiny">Upload Profile Picture</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="columns small-5">
                        <p><strong>{{ $lists->count() }}</strong> Lists</p>
                    </div>
                    <div class="columns">
                        <p><strong>{{ $entries->count() }}</strong> Entries</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<hr />

<div class="row align-center">
    <div class="small-12 medium-9 columns">

    <!-- List in gallery view -->
        <div class="row">
                <div class="columns small-6 medium-4">
                    <div class="media-object">
                        <div class="media-object-section align-self-center">
                            <div class="thumbnail gallery_view">
                                <a href="/create"><img data-interchange="[img/add_125x125.png, small], [img/add_150x150.png, medium], [img/add_250x250.png, large]">
                                    <h5>Add new</h5>
                                    <p></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($lists as $list)
                    <div class="columns small-6 medium-4">
                        <div class="media-object">
                            <div class="media-object-section align-self-center">
                                <div class="thumbnail gallery_view">
                                    <!-- <a href="/show/{{$list->id}}"><img data-interchange="[http://placehold.it/125x125, small], [http://placehold.it/150x150, medium], [http://placehold.it/250x250.jpg, large]"> -->
                                    <a href="/show/{{$list->id}}"><img data-interchange="[img/love_125x125.png, small], [img/love_150x150.png, medium], [img/love_250x250.png, large]">
                                    <h5>{{ $list->subject }}</h5></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End of list -->
    </div>
</div>

@stop
