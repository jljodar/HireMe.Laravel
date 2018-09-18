<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon.png') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Hire Me! (in PHP Laravel)</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Animation library for notifications -->
        <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

        <!--  Paper Dashboard core CSS -->
        <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet"/>


        <!--  Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">

        <!--  App CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    </head>

    <body>
        <div class="wrapper">
        @include('layouts.sidebar')

        <div class="main-panel">
            @include('layouts.navbar')

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            @include('layouts.footer')
        </div>
    </body>

    @include('layouts.scripts')
</html>
