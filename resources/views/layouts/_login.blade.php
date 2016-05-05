<div class="small-12 medium-6 columns">
        <p>Don't have an account? <a href='/register'>Register here!</a></p>

        <h3>Login</h3>

        @if(count($errors) > 0)
            <ul class='alert callout'>
                @foreach ($errors->all() as $error)
                    <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method='POST' action='/login'>
            {!! csrf_field() !!}
            <div class="row">
                <div class="small-12 columns">
                    <label for='email'>Email</label>
                    <input type='text' name='email' id='email' value='{{ old('email') }}'>

                    <label for='password'>Password</label>
                    <input type='password' name='password' id='password' value='{{ old('password') }}'>

                    <input type='checkbox' name='remember' id='remember'>
                    <label for='remember' class='checkboxLabel'>Remember me</label>
                </div>
                <div class="small-12 columns">
                    <button class="button" type="submit" value="Submit">Login</button>
                </div>
            </div>
        </form>
    </div>
