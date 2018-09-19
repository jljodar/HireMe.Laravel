@php
    $sectionTitle = 'Profile';

    if(isset($user) && auth()->user()) {
        $sectionTitle = (($user->id == auth()->user()->id) ? 'Your ' : $user->name . "'s ") . $sectionTitle;
    }
@endphp

@extends('layouts.master', ['sectionTitle' => $sectionTitle])

@section('content')
    @if(auth()->user() && auth()->user()->id === $user->id)
        {{-- Your own profile, you can edit data here --}}

        @include('users.yourProfile')
    @else
        {{-- Not your profile --}}

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
                                        <a href="#"><small>{{ '@' . $user->username }}</small></a>
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
                                <h5>{{ diffForHumans($user->last_seen_at) }}<br><small>last seen</small></h5>
                            </div>
                            <hr>
                            <div>
                                <h5>{{ $user->profile_visits }}<br><small>profile visits</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card row text-center">
                    <div class="col-md-6"><h5>{{ $user->city }}<br><small>city</small></h5></div>
                    <div class="col-md-6"><h5>{{ $user->country }}<br><small>country</small></h5></div>
                </div>
            </div>
            
            <div class="col-md-7">
                <h3 class="title">{{ $user->name . "'s companies" }}</h3>

                @if(count($user->companies) > 0)
                    <div class="row">
                        @foreach ($user->companies as $company)
                            @include('companies.company')
                        @endforeach
                    </div>
                @else
                    <p>This user hasn't founded any company yet</p>
                @endif
            </div>
        </div>
    @endif
@endsection