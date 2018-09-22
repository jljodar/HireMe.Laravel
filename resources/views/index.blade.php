<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts.head')

    <body>
        <div class="wrapper full-page">
            <div class="content">
                <div class="container">
                    <div class="logo text-center">Hire Me!</div>
                    
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Login</h3>
                                </div>

                                <form method="POST" action="{{action('SessionsController@create')}}">
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
                        </div>

                        <div class="col-md-4 col-md-offset-1">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Register</h3>
                                    <div class="category">
                                        You need to register a mew user in order to use this application.
                                    </div>
                                </div>
    
                                <form method="POST" action="{{action('RegistrationController@create')}}">
                                    @csrf

                                    <div class="card-content">
                                        <label for="username">Username:</label>
                                        <input type="text" name="username" class="form-control" required>
                                        <label for="email">Email <small>&nbsp; (just fake it)</small>:</label>
                                        <input type="email" name="email" class="form-control" required>

                                        <label for="password">Password:</label>
                                        <input type="password" name="password" class="form-control" required>
                                        {{-- "confirmed" flag in the validation needs an input named <Attribute>_confirmed --}}
                                        <label for="password_confirmation">Password Confirmation:</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>

                                        @include('layouts.errors')
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

            <div class="full-page-background" style="background-image: url('/img/background-fullpage.jpg') "></div>
        </div>
    </body>

    @include('layouts.scripts')
</html>

