<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <title>
        LuvAccount
    </title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/app.css">

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>
    <div class="title-bar title">
        <a href="/"><div class="title-bar-title">LuvAccount</div></a>
        <ul class="menu align-right">
            @if(Auth::check())
            <li><a href="/profile">Profile</a></li>
            <li><a href="/logout">Log out</a></li>
            @else
            <li><a href="/login">Log in</a></li>
            <li><a href="/register">Register</a></li>
            @endif
        </ul>
    </div>
        @if(Session::get('message') != null)
            <div class='flash_message'>{{ Session::get('message') }}</div>
        @endif


    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

<hr />

    <footer class="row">
        <div class="small-12 columns">
            <p>All right reserved: © Yung Wei · 2016</p>
        </div>
    </footer>

    <script src="/js/vendor/jquery.min.js"></script>
    <script src="/js/vendor/what-input.min.js"></script>
    <script src="/js/vendor/foundation.min.js"></script>
    <script src="/js/app.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
