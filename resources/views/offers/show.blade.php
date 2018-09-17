@extends('layouts.master', ['sectionTitle' => 'Job Offer'])

@section('content')
    <h2>{{ $offer->title }}</h2>
    <p>
        {{ $offer->company->name }}
        <br>Contact: {{ $offer->user->name }}
    </p>

    <p>
        @if(count($offer->applicances) > 0)
            {{ count($offer->applicances) }} others applyed to this offer
        @else
            Be the first to apply
        @endif
    </p>

    <p>
        {{ $offer->body }}
    </p>
@endsection