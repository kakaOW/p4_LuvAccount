@extends('layouts.master')

@section('head')
    <link rel="stylesheet" href="/css/crop.css">

@stop

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
                    <button class="button" type="submit" value="Submit" id="confirm">Update</button>
                </div>
            </div>

            <div class="small reveal" id="deleteConfirmation" data-reveal>
                <h5>Delete {{$lists->subject }}</h5>
                <p class="lead">This list will be deleted and you won't be able to find it anymore. You can also edit this list, if you just want to change something.</p>
                <button class="button secondary" data-close aria-label="Close modal" type="button">Cancel</button>
                <a href="/delete/{{$lists->id}}"><button class="button" type="button" value="Return">Proceed</button></a>
                <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div id="body_data">
                <div class="row hiddenSmallData">
                    <div class="small-2 medium-1 large-1 columns">
                        <label for="entry">Entry</label>
                    </div>
                    <div class="small-10 medium-5 large-2 columns">
                        <label for="date">Date</label>
                    </div>
                    <div class="small-12 medium-6 large-2 columns">
                        <label for="title">Title</label>
                    </div>
                    <div class="small-12 medium-8 large-4 columns">
                        <label for="story">Story</label>
                    </div>
                    <div class="small-6 medium-2 large-1 columns">
                        <label for="points">Points</label>
                    </div>
                    <div class="small-6 medium-1 large-1 columns">
                        <label for="points">Color</label>
                    </div>
                    <div class="small-6 medium-1 large-1 columns">
                        <label for="deleteEntry">Delete</label>
                    </div>
                </div>
                <?php $i=1?>
            @if(strval($entries) != "[]")
                @foreach ($entries as $entry)
                    <div class="row">
                        <input type="hidden" name="listEntry[{{$i}}][id]" value="{{$entry->id}}">
                        <div class="small-2 medium-1 large-1 columns">
                            <label>{{$i}}</label>
                            <input type="hidden" name="listEntry[{{$i}}][entry]"  value="{{$i}}" />
                        </div>
                        <div class="small-10 medium-5 large-2 columns">
                            <input type="date" name="listEntry[{{$i}}][date]" value="{{$entry->date}}" />
                        </div>
                        <div class="small-12 medium-6 large-2 columns">
                            <input type="text" name="listEntry[{{$i}}][title]"  value="{{$entry->title}}"  />
                        </div>
                        <div class="small-12 medium-7 large-4 columns">
                            <textarea name="listEntry[{{$i}}][story]" >{{$entry->story}}</textarea>
                        </div>
                        <div class="small-3 medium-2 large-1 columns">
                            <input type="number" name="listEntry[{{$i}}][points]"  value="{{$entry->points}}" />
                        </div>
                        <div class="small-4 medium-2 large-1 columns">
                            <select name="listEntry[{{$i}}][color]">
                                <option value="#000000" style="background-color:#000000;" <?php if($entry->color == "#000000") { echo "selected";}; ?>>Black</option>
                                <option value="#DC143C" style="background-color:#DC143C;" <?php if($entry->color == "#DC143C") { echo "selected";}; ?>>Crimson</option>
                                <option value="#FF7F50" style="background-color:#FF7F50;" <?php if($entry->color == "#FF7F50") { echo "selected";}; ?>>Coral</option>
                                <option value="#FFD700" style="background-color:#FFD700;" <?php if($entry->color == "#FFD700") { echo "selected";}; ?>>Gold</option>
                                <option value="#2E8B57" style="background-color:#2E8B57;" <?php if($entry->color == "#2E8B57") { echo "selected";}; ?>>SeaGreen</option>
                                <option value="#4682B4" style="background-color:#4682B4;" <?php if($entry->color == "#4682B4") { echo "selected";}; ?>>SteelBlue</option>
                                <option value="#8A2BE2" style="background-color:#8A2BE2;" <?php if($entry->color == "#8A2BE2") { echo "selected";}; ?>>Violet</option>
                                <option value="#FF69B4" style="background-color:#FF69B4;" <?php if($entry->color == "#FF69B4") { echo "selected";}; ?>>Pink</option>
                                <option value="#2F4F4F" style="background-color:#2F4F4F;" <?php if($entry->color == "#2F4F4F") { echo "selected";}; ?>>Slate</option>
                                <option value="#D2691E" style="background-color:#D2691E;" <?php if($entry->color == "#D2691E") { echo "selected";}; ?>>Chocolate</option>
                            </select>
                        </div>
                        <div class="small-5 medium-1 large-1 columns">
                            <input type="checkbox" name="listEntry[{{$i}}][deleteEntry]"/>
                            <span class="hiddenData">Delete Entry</span>
                        </div>

                        <input type="hidden" name="listEntry[{{$i}}][list_id]" value="{{$lists->id}}">
                    </div>
                    <?php $i++?>
                @endforeach
            @else
                <div class="row">
                    <div class="small-2 medium-1 large-1 columns">
                        <input type="hidden" name="listEntry[1][entry]"  value="1" />
                        <label>1</label>
                    </div>
                    <div class="small-10 medium-5 large-2 columns">
                        <input type="date" name="listEntry[1][date]" value="" />
                    </div>
                    <div class="small-12 medium-6 large-2 columns">
                        <input type="text" name="listEntry[1][title]"  value="" placeholder="Title" />
                    </div>
                    <div class="small-12 medium-7 large-4 columns">
                        <textarea name="listEntry[1][story]" placeholder="Story"></textarea>
                    </div>
                    <div class="small-3 medium-2 large-1 columns">
                        <input type="number" name="listEntry[1][points]"  value="0" />
                    </div>
                    <div class="small-4 medium-2 large-1 columns">
                        <select class="color" name="listEntry[1][color]">
                            <option value="#000000" style="background-color:#000000;" selected>Black</option>
                            <option value="#DC143C" style="background-color:#DC143C;">Crimson</option>
                            <option value="#FF7F50" style="background-color:#FF7F50;">Coral</option>
                            <option value="#FFD700" style="background-color:#FFD700;">Gold</option>
                            <option value="#2E8B57" style="background-color:#2E8B57;">SeaGreen</option>
                            <option value="#4682B4" style="background-color:#4682B4;">SteelBlue</option>
                            <option value="#8A2BE2" style="background-color:#8A2BE2;">Violet</option>
                            <option value="#FF69B4" style="background-color:#FF69B4;">Pink</option>
                            <option value="#2F4F4F" style="background-color:#2F4F4F;">Slate</option>
                            <option value="#D2691E" style="background-color:#D2691E;">Chocolate</option>
                        </select>
                    </div>
                    <div class="small-5 medium-1 large-1 columns">
                        <input type="checkbox" name="listEntry[1][deleteEntry]"/>
                        <span class="hiddenData">Delete Entry</span>
                    </div>
                    <input type="hidden" name="listEntry[1][list_id]" value="{{$lists->id}}">
                </div>
            @endif
            </div>
            <div class="row">
                <div class="small-12 columns">
                    <button class="button small" type="button" id="addnew" name="addnew" value="Add new item">Add new entry</button>
                    <button class="button small" type="submit" value="Submit" id="confirm2">Update</button>
                    <input type="hidden" id="items" name="items" value="1" />
                </div>
            </div>
        </form>



    </div>
</div>
@stop



@section('body')
    <script src="/js/vendor/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var currentItem = <?php $i =1; echo strval($entries) == "[]" ? $i :  $entries->max('entry'); ?>;
            $('#addnew').click(function() {
                currentItem++;
                $('#items');
                var strToAdd = '<div class="row"><div class="small-2 medium-1 large-1 columns"><input type="hidden" name="listEntry[' + currentItem + '][entry]" value= "' + currentItem + '" /><label>' + currentItem + '</label></div><div class="small-10 medium-5 large-2 columns"><input type="date" name="listEntry[' + currentItem + '][date]" placeholder=""  /></div><div class="small-12 medium-6 large-2 columns"><input type="text" name="listEntry[' + currentItem + '][title]" placeholder="Title"  /></div><div class="small-12 medium-7 large-4 columns"><textarea name="listEntry[' + currentItem + '][story]" placeholder="Story" row="1"></textarea></div><div class="small-3 medium-2 large-1 columns"><input type="number" name="listEntry[' + currentItem + '][points]" value="0" /></div><div class="small-4 medium-2 large-1 columns"><select class="color" name="listEntry[' + currentItem + '][color]"><option value="#000000" style="background-color:#000000;" selected>Black</option><option value="#DC143C" style="background-color:#DC143C;">Crimson</option><option value="#FF7F50" style="background-color:#FF7F50;">Coral</option><option value="#FFD700" style="background-color:#FFD700;">Gold</option><option value="#2E8B57" style="background-color:#2E8B57;">SeaGreen</option><option value="#4682B4" style="background-color:#4682B4;">SteelBlue</option><option value="#8A2BE2" style="background-color:#8A2BE2;">Violet</option><option value="#FF69B4" style="background-color:#FF69B4;">Pink</option><option value="#2F4F4F" style="background-color:#2F4F4F;">Slate</option><option value="#D2691E" style="background-color:#D2691E;">Chocolate</option></select></div><div class="small-5 medium-1 large-1 columns"><input type="checkbox" name="listEntry[' + currentItem + '][deleteEntry]"/><span class="hiddenData">Delete Entry</span></div></div>';
                $('#body_data').append(strToAdd);

            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            formmodified=0;
            $('form *').change(function(){
                formmodified=1;
            });
            window.onbeforeunload = confirmExit;
            function confirmExit() {
                if (formmodified == 1) {
                    return "New information not saved. Do you wish to leave the page?";
                }
            }
            $('#confirm').click(function() {
                formmodified = 0;
            });
            $('#confirm2').click(function() {
                formmodified = 0;
            });
        });
    </script>
    </body>
    </html>

@stop
