@extends('layouts.master', ['sectionTitle' => 'Companies'])

@section('content')
    <div class="card">
        <div class="header">
            <div class="row">
                <div class="col-xs-2">
                    <div class="icon-big text-center">
                        <i class="ti-server"></i>
                    </div>
                </div>
                <div class="col-xs-10">
                    <h4 class="title">{{ $company->name }}</h4>
                    <p class="category">
                        {{ $company->industy }}
                    </p>
                    <p>
                        Founder: <a href="/users/{{ $company->user->id }}">{{ $company->user->name }}</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="content">
            {{ $company->description }}
        </div>
    </div>

    @if(count($offers) > 0)
        <h3>Open positions</h3>

        @foreach ($offers as $offer)
            @include('offers.offer', ['mini' => true])
        @endforeach
    @else
        <h3>No open positions at the moment</h3>
    @endif
@endsection