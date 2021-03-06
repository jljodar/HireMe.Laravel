<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts.head')

    <body>
        <div class="wrapper full-page">
            <div class="content">
                <div class="container">
                    <div class="logo text-center">Hire Me!</div>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="card">
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul id="tabs" class="nav nav-tabs text-center" data-tabs="tabs">
                                            <li class="{{ ((\Session::has('backToRegister')) ? '' : ' active') }}"><a href="#login" data-toggle="tab">Login</a></li>
                                            <li class="{{ ((\Session::has('backToRegister')) ? ' active' : '') }}"><a href="#register" data-toggle="tab">Register</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div id="my-tab-content" class="tab-content">
                                    <div class="tab-pane{{ ((\Session::has('backToRegister')) ? '' : ' active') }}" id="login">
                                        <form method="POST" action="{{action('SessionsController@store')}}">
                                            @csrf

                                            <div class="card-content">
                                                <div class="form-group">
                                                    <label for="username">Username:</label>
                                                    <input name="username" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Password:</label>
                                                    <input type="password" name="password" class="form-control">
                                                </div>

                                                @include('layouts.errors')
                                            </div>

                                            <div class="card-footer text-center">
                                                <button type="submit" class="btn btn-fill btn-wd ">Sign in</button>
                                                <br><br>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane{{ ((\Session::has('backToRegister')) ? ' active' : '') }}" id="register">
                                        <form method="POST" action="{{action('RegistrationController@store')}}">
                                            @csrf

                                            <div class="card-content">
                                                <div class="form-group">
                                                    <label for="username">Username:</label>
                                                    <input type="text" name="username" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email <small>&nbsp; (just fake it)</small>:</label>
                                                    <input type="email" name="email" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Password:</label>
                                                    <input type="password" name="password" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    {{-- "confirmed" flag in form validation needs an input named <Field>_confirmed --}}
                                                    <label for="password_confirmation">Password Confirmation:</label>
                                                    <input type="password" name="password_confirmation" class="form-control" required>
                                                </div>

                                                @include('layouts.errors', ['errorBag' => $errors->registrationErrors])

                                            </div>

                                            <div class="card-footer text-center">
                                                <button type="submit" class="btn btn-fill btn-wd ">Register</button>
                                                <br><br>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="full-page-background" style="background-image: url('/img/background-fullpage.jpg') "></div>
        </div>
    </body>

    @include('layouts.scripts')
</html>

