@extends('layouts.master', ['sectionTitle' => 'Your profile'])

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card card-user">
                <div class="image">
                    <img src="{{ asset('/img/background.jpg') }}" alt="...">
                </div>
                <div class="row">
                    <div class="col-md-7" style="border-right:1px solid #F1EAE0; ">
                        <div class="content">
                            <div class="author">
                                <img class="avatar border-white" src="{{ asset('/img/faces/face-2.jpg') }}" alt="...">
                                <h4 class="title">{{ $user->name }}<br>
                                    <a href="/profile/{{ $user->username }}"><small>{{ '@' . $user->username }}</small></a>
                                </h4>
                            </div>

                            {{-- Use the non-escaped output syntax for applying nl2br --}}
                            <div class="description text-center">{!! nl2br($user->about_me) !!}</div>
                        </div>
                    </div>
                    <div class="col-md-5 text-center">
                        <div>
                            <h5>Unemployed<br><small>status</small></h5>
                        </div>
                        <hr>
                        <div>
                            <h5>Actively looking<br><small>career interest</small></h5>
                        </div>
                        <hr>
                        <div>
                            <h5>{{ $user->last_seen_at->diffForHumans() }}<br><small>last seen</small></h5>
                        </div>
                        <hr>
                        <div>
                            <h5>{{ $user->profile_visits }}<br><small>profile visits</small></h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <a href="/users/{{ auth()->user()->id }}/applicances">
                        @include('components.card', [
                            "icon" => "ti-clipboard",
                            "title" => "Applicances",
                            "data" => $user->applicances->count(),
                        ])
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="/users/{{ auth()->user()->id }}/companies">
                        @include('components.card', [
                            "icon" => "ti-briefcase",
                            "title" => "Companies",
                            "data" => $user->companies->count(),
                        ])
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card">
                <div class="header">
                    <h4 class="title">Edit Profile</h4>
                </div>
                <div class="content">
                    <form method="POST" action="{{action('UsersController@update', $user->id)}}">
                        @csrf
                        {{-- We need to use the Form Method Spoofing because HTML forms do not support PATCH actions --}}
                        {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" class="form-control border-input" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control border-input" value="{{ $user->username }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">First Name</label>
                                    <input type="text" name="name" class="form-control border-input" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" class="form-control border-input" value="{{ $user->last_name }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control border-input" value="{{ $user->address }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" class="form-control border-input" value="{{ $user->city }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" class="form-control border-input" value="{{ $user->country }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="postal_code">Postal Code</label>
                                    <input type="text" name="postal_code" class="form-control border-input" value="{{ $user->postal_code }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about_me">About Me</label>
                                    <textarea name="about_me" rows="5" class="form-control border-input">{{ $user->about_me }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                        </div>
                        <div class="clearfix"></div>

                        @include('layouts.errors')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
