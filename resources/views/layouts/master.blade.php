<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts.head')

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
