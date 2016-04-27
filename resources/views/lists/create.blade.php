@extends('layouts.master')

@section('content')

<div class="row small-12 medium-9 align-center">
        <form method="POST" action="/lists/create">
            {{ csrf_field() }}
            <div class="row">
                <div class="small-3 columns">
                    <label>Subject</label>
                </div>
                <div class="small-9 columns">
                    <input type="text" name="subject" id="subject" placeholder="I will achieve this goal!"/>
                    <div class='error'>{{ $errors->first('subject') }}</div>
                </div>

            </div>

            <div class="row">
                <div class="small-3 columns">
                    <label>Description</label>
                </div>
                <div class="small-9 columns">
                    <textarea name="description" id="description" placeholder="Travel to Orlando as a reward"></textarea>
                    <div class='error'>{{ $errors->first('description') }}</div>
                </div>
            </div>

            <div class="row">
                <div class="small-3 columns">
                    <label>Total Point to achieve</label>
                </div>
                <div class="small-3 columns">
                    <input type="number" name="totalPoint" id="totalPoint" placeholder="100">
                    <div class='error'>{{ $errors->first('totalPoint') }}</div>
                </div>
            </div>

            <div class="row">
                <div class="small-12 columns">
                    <div class="button-group">
                        <button class="button secondary" type="reset" value="Reset">Clear</button>
                        <button class="button" type="submit" value="Submit">Sumbit</button>
                    </div>
                </div>
            </div>


            <div id="body_data">

                <div class="row">
                    <div class="small-2 large-1 columns">
                        <label>Entry</label>
                        <input type="number" name="entry[]" id="entry[0]" value="1" />
                    </div>
                    <div class="small-5 large-3 columns">
                        <label>Date</label>
                        <input type="date" name="date[]" id="date[0]" placeholder="" required/>
                    </div>
                    <div class="small-5 large-2 columns">
                        <label>Title</label>
                        <input type="text" name="title[]" id="title[0]" placeholder="Title" required />
                    </div>
                    <div class="small-9 large-4 columns">
                        <label>Story</label>
                        <textarea name="story[]" id="story[0]" placeholder="Story" row="1"></textarea>
                    </div>
                    <div class="small-3 large-2 columns">
                        <label>Points</label>
                        <input type="number" name="points[]" id="points[0]" value="0" />
                    </div>
                </div>

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
@stop

@section('body')
    <script src="/js/vendor/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var currentItem = 0;
            var currentId = 1;
            $('#addnew').click(function() {
                currentItem++;
                currentId++;
                $('#items').val(currentItem, currentId);
                var strToAdd = '<div class="row"><div class="small-2 large-1 columns"><input type="number" name="entry[]" id="entry[' + currentItem + ']" value= "'+ currentId +'" /></label></div><div class="small-5 large-3 columns"><input type="date" name="date[]" id="date[' +
                    currentItem +
                    ']" placeholder="" /></div><div class="small-5 large-2 columns"><input type="text" name="title[]" id="title[' + currentItem +
                    ']" placeholder="Title" /></div><div class="small-9 large-4 columns"><textarea name="story[]" id="story[' + currentItem +
                    ']" placeholder="Story" row="1"></textarea></div><div class="small-3 large-2 columns"><input type="number" name="points[]" id="points[' + currentItem + ']" value="0" /></div></div>';
                $('#body_data').append(strToAdd);

            });
        });
    </script>
@stop
