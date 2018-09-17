@extends('layouts.master', ['sectionTitle' => 'Profile'])

@section('content')
    @if(auth()->user()->id === $user->id)
        <h2>{{ $user->name }}</h2>

        @if(count($user->companies) > 0)
            <h3>Your companies</h3>

            @foreach ($user->companies as $company)
                @include('companies.company', ['mini' => true])
            @endforeach
        @endif

        @if(count($user->applicances) > 0)
            <h3>Your appliances</h3>

            @foreach ($user->applicances as $applicance)
                @include('applicances.applicance', ['mini' => true])
            @endforeach
        @endif
    @else
        <h2>{{ $user->name }}</h2>

        @if(count($user->companies) > 0)
            <h3>Companies</h3>

            @foreach ($user->companies as $company)
                @include('companies.company', ['mini' => true])
            @endforeach
        @endif
    @endif
@endsection