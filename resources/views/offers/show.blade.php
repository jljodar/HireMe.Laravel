@extends('layouts.master', ['sectionTitle' => 'Job Offer'])

@section('content')
    <h2>{{ $offer->title }}</h2>
    <p>
        Company: <a href="/companies/{{ $offer->company->id }}">{{ $offer->company->name }}</a>
        <br>Contact: <a href="/users/{{ $offer->user->id }}">{{ $offer->user->name }}</a>
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