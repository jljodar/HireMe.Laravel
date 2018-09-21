@extends('layouts.master', ['sectionTitle' => 'Job Offer'])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="avatar-line-96">
                <img src="{{ asset('/img/faces/face-2.jpg') }}" />
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="card-title">{{ $offer->title }}</h3>
                        <p>
                            Company: <a href="/companies/{{ $offer->company->id }}">{{ $offer->company->name }}</a>
                            <br>Industry: {{ $offer->company->industry }}
                        </p>
                    </div>
                    <div class="col-sm-4 offers-extra" style="text-align: right; ">
                        <p><span class="category">Posted </span>{{ $offer->started_at->diffForHumans() }}</p>
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
            <a class="btn">Apply</a>
        </div>
    </div>
@endsection