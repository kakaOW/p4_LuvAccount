@extends('layouts.master')

@section('content')

        <div class="row align-center">
            <div class="small-12 medium-6 columns">
                <p>Already have an account? <a href='/login'>Login here</a></p>

                <h3>Register</h3>

                @if(count($errors) > 0)
                        <ul class='alert callout'>
                                @foreach ($errors->all() as $error)
                                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                                @endforeach
                        </ul>
                @endif

                <form method='POST' action='/register'>
                    {!! csrf_field() !!}

                    <div class='row'>
                        <div class="small-12 columns">
                            <label for='name'>Name</label>
                            <input type='text' name='name' id='name' value='{{ old('name') }}'>

                            <label for='email'>Email</label>
                            <input type='text' name='email' id='email' value='{{ old('email') }}'>

                            <label for='password'>Password</label>
                            <input type='password' name='password' id='password'>

                            <label for='password_confirmation'>Confirm Password</label>
                            <input type='password' name='password_confirmation' id='password_confirmation'>
                        </div>
                        <div class="small-12 columns">
                            <button class="button" type="submit" value="Submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


@stop
