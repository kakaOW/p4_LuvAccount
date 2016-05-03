@extends('layouts.master')

@section('content')

<div class="row align-center">
    <div class="small-12 medium-10">
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
                    <div class="button-group">
                        <button class="button" type="submit" value="Submit">Update</button>
                        <?php if(isset($entries)) {echo $entries->max('entry');} else { echo 0;} ?>
                    </div>
                </div>
            </div>


            <div id="body_data">
                @if(isset($entries))
                    @foreach ($entries as $entry)
                        <div class="row">
                            <div class="small-2 large-1 columns">
                                <label>Entry</label>
                                <input type="number" name="entry[]"  value="{{$entry->entry}}" />
                            </div>
                            <div class="small-5 large-3 columns">
                                <label>Date</label>
                                <input type="date" name="date[]" value="{{$entry->date}}" />
                            </div>
                            <div class="small-5 large-2 columns">
                                <label>Title</label>
                                <input type="text" name="title[]"  value="{{$entry->title}}"  />
                            </div>
                            <div class="small-9 large-4 columns">
                                <label>Story</label>
                                <textarea name="story[]" >{{$entry->story}}</textarea>
                            </div>
                            <div class="small-3 large-2 columns">
                                <label>Points</label>
                                <input type="number" name="points[]"  value="{{$entry->points}}" />
                            </div>
                        </div>
                    @endforeach
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
            $('#addnew').click(function() {
                $('#items');
                var strToAdd = '<div class="row"><div class="small-2 large-1 columns"><input type="number" name="entry[]" value= "" /></label></div><div class="small-5 large-3 columns"><input type="date" name="date[]" placeholder=""  /></div><div class="small-5 large-2 columns"><input type="text" name="title[]" placeholder="Title"  /></div><div class="small-9 large-4 columns"><textarea name="story[]" placeholder="Story" row="1"></textarea></div><div class="small-3 large-2 columns"><input type="number" name="points[]" value="0" /></div></div>';
                $('#body_data').append(strToAdd);

            });
        });
    </script>
@stop
