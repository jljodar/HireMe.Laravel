@extends('layouts.master', ['sectionTitle' => 'Job Offer'])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="avatar-line-96">
                <img src="{{ asset('/img/company.jpg') }}" />
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="card-title">{{ $offer->title }}</h3>
                        <p>
                            Company: <a href="/companies/{{ $offer->company->id }}">{{ $offer->company->name }}</a>
                            <br>Industry: {{ $offer->company->industry }}
                        </p>
                    </div>
                    <div class="col-sm-4 offers-extra" style="text-align: right; ">
                        <p><span class="category">Posted </span>{{ diffForHumansOnlyDays($offer->started_at) }}</p>
                        <p>{{ count($offer->applicances) }} applicances</p>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="card-content">
            <div>
                {!! nl2br($offer->body) !!}
            </div>
            <hr>
            <div class="text-center">
                @if($alreadyApplied)
                    <p>
                        <button type="submit" class="btn" disabled>Apply</button>
                    </p>

                    <p>
                        You already applied to this offer. Visit <a href="/users/{{ auth()->id() }}/applicances">Your applicances</a> to check the state.
                    </p>
                @else
                    <form method="POST" action="{{ action('OffersController@applicancesStore', $offer) }}">
                        @csrf

                        <button type="submit" class="btn">Apply</button>

                        @include('layouts.errors')
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
