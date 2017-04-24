<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <title>{{ config('app.homeName') }}</title>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        @if(config('app.allowRegister'))
                            <a href="{{ url('/register') }}">Add User</a>
                        @endif
                    @endif
                </div>
            @endif

            <div class="content">
                <img src="{{asset('img/au_logo.png')}}">
                <div class="title m-b-md">
                    Aurora University Campus Public Safety
                </div>
                <h2>Lost And Found System</h2>
            </div>
        </div>
    </body>
</html>
