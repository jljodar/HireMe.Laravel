@extends('layouts.master', ['sectionTitle' => 'Register'])

@section('content')
    <div class="col-md-8">
        <form method="POST" action="{{action('RegistrationController@create')}}">
            @csrf

            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="col-md-9 form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    {{-- "confirmed" flag in the validation needs an input named <Attribute>_confirmed --}}
                    <label for="password_confirmation">Password Confirmation:</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

            @include('layouts.errors')
        </form>
    </div>
@endsection