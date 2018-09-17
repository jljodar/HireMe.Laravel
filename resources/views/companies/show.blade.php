@extends('layouts.master')

@section('content')
    <h2>{{ $company->name }}</h2>
    <p>
        {{ $company->industry }} 
        <br>Boss: {{ $company->user->name }} 
    </p>

    @if(count($offers) > 0)
        <h3>Open positions</h3>

        @foreach ($offers as $offer)
            @include('offers.offer', ['mini' => true])
        @endforeach
    @else
        <h3>No open positions at the moment</h3>
    @endif
@endsection