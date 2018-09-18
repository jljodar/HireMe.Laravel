@extends('layouts.master', ['sectionTitle' => 'Login'])

@section('content')
    <div class="col-md-8">
        <form method="POST" action="{{action('SessionsController@create')}}">
            @csrf

            <div class="form-group">
                <label for="username">Username:</label>
                <input name="username" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>

            @include('layouts.errors')
        </form>
    </div>
@endsection