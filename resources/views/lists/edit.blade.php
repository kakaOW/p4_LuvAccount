@extends('layouts.master')

@section('content')

<div class="row align-center">
    <div class="small-12 medium-11">
        <form method="POST" action="/edit/{{ $lists->id }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="small-3 columns">
                    <label>Subject</label>
                </div>
                <div class="small-9 columns">
                    <input type="text" name="subject" id="subject" value="{{ $lists->subject }}" />
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
                <div class="small-9 columns">
                    <textarea name="description" id="description">{{ $lists->description }}</textarea>
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
                    <input type="number" name="totalPoint" id="totalPoint" value="{{ $lists->totalPoint }}">
                    @if($errors->get('totalPoint'))
                    <div class="alert callout">
                        {{ $errors->first('totalPoint') }}
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="small-12 columns">
                    <a href="/show/{{$lists->id}}"><button class="button secondary" type="button" value="Return">Return</button></a>
                    <a data-open="deleteConfirmation"><button class="button secondary" type="button" value="Return">Delete</button></a>
                    <button class="button" type="submit" value="Submit">Update</button>
                </div>
            </div>

            <div class="small reveal" id="deleteConfirmation" data-reveal>
                <h5>Delete {{$lists->subject }}</h5>
                <p class="lead">This list will be deleted and you won't be able to find it anymore. You can also edit this list, if you just want to change something.</p>
                <button class="button secondary" data-close aria-label="Close modal" type="button">Cancel</button>
                <a href="/deelte/{{$lists->id}}"><button class="button" type="button" value="Return">Proceed</button></a>
                <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div id="body_data">
                @if(strval($entries) != "[]")
                    <div class="row hiddenSmallData">
                        <div class="small-2 large-1 columns">
                            <label for="Entry">Entry</label>
                        </div>
                        <div class="small-5 large-3 columns">
                            <label for="Date">Date</label>
                        </div>
                        <div class="small-5 large-2 columns">
                            <label for="Title">Title</label>
                        </div>
                        <div class="small-9 large-4 columns">
                            <label for="Story">Story</label>
                        </div>
                        <div class="small-3 large-2 columns">
                            <label for="Points">Points</label>
                        </div>

                    </div>
                    @foreach ($entries as $entry)
                        <div class="row">
                            <input type="hidden" name="listEntry[{{$entry->entry}}][id]" value="{{$entry->id}}">
                            <div class="small-2 large-1 columns">
                                <input type="number" name="listEntry[{{$entry->entry}}][entry]"  value="{{$entry->entry}}" />
                            </div>
                            <div class="small-5 large-3 columns">
                                <input type="date" name="listEntry[{{$entry->entry}}][date]" value="{{$entry->date}}" />
                            </div>
                            <div class="small-5 large-2 columns">
                                <input type="text" name="listEntry[{{$entry->entry}}][title]"  value="{{$entry->title}}"  />
                            </div>
                            <div class="small-9 large-4 columns">
                                <textarea name="listEntry[{{$entry->entry}}][story]" >{{$entry->story}}</textarea>
                            </div>
                            <div class="small-3 large-2 columns">
                                <input type="number" name="listEntry[{{$entry->entry}}][points]"  value="{{$entry->points}}" />
                            </div>
                            <input type="hidden" name="listEntry[{{$entry->entry}}][list_id]" value="{{$lists->id}}">
                        </div>
                    @endforeach
                @else
                    <div class="row">
                        <div class="small-2 large-1 columns">
                            <label>Entry</label>
                            <input type="number" name="listEntry[1][entry]"  value="1" />
                        </div>
                        <div class="small-5 large-3 columns">
                            <label>Date</label>
                            <input type="date" name="listEntry[1][date]" value="" />
                        </div>
                        <div class="small-5 large-2 columns">
                            <label>Title</label>
                            <input type="text" name="listEntry[1][title]"  value="" placeholder="Title" />
                        </div>
                        <div class="small-9 large-4 columns">
                            <label>Story</label>
                            <textarea name="listEntry[1][story]" placeholder="Story"></textarea>
                        </div>
                        <div class="small-3 large-2 columns">
                            <label>Points</label>
                            <input type="number" name="listEntry[1][points]"  value="0" />
                        </div>
                        <input type="hidden" name="listEntry[1][list_id]" value="{{$lists->id}}">
                        </div>
                @endif
            </div>
        </form>

        </div>
        <div class="row small-12 medium-9 align-center">
            <div class="row">
                <div class="small-12 columns">
                    <button class="button small" id="addnew" name="addnew" value="Add new item">Add new entry</button>
                    <input type="hidden" id="items" name="items" value="1" />
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('body')
    <script src="/js/vendor/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var currentItem = <?php $i =1; echo strval($entries) == "[]" ? $i :  $entries->count('title'); ?>;
            $('#addnew').click(function() {
                currentItem++;
                $('#items');
                var strToAdd = '<div class="row"><div class="small-2 large-1 columns"><input type="number" name="listEntry[' + currentItem + '][entry]" value= "' + currentItem + '" /></label></div><div class="small-5 large-3 columns"><input type="date" name="listEntry[' + currentItem + '][date]" placeholder=""  /></div><div class="small-5 large-2 columns"><input type="text" name="listEntry[' + currentItem + '][title]" placeholder="Title"  /></div><div class="small-9 large-4 columns"><textarea name="listEntry[' + currentItem + '][story]" placeholder="Story" row="1"></textarea></div><div class="small-3 large-2 columns"><input type="number" name="listEntry[' + currentItem + '][points]" value="0" /></div></div>';
                $('#body_data').append(strToAdd);

            });
        });
    </script>
@stop
