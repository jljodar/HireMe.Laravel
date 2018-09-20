@php
    $sectionTitle = 'Companies';

    if(isset($user) && auth()->id()) {
        $sectionTitle = (($user->id == auth()->id()) ? 'Your ' : $user->name . "'s ") . $sectionTitle;
    }
@endphp

@extends('layouts.master', ['sectionTitle' => $sectionTitle])

@section('content')
    <a href="/companies/create" class="btn btn-info btn-fill">Create a new company</a>

    <div class="row">
        @foreach(array_chunk($companies->getCollection()->all(), 2) as $row)
            <div class="row">
                @foreach($row as $company)
                    <div class="col-lg-6">
                        @include('companies.company')
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <div class="text-center">
        {{-- For filtering the results, we keep the request parameters in the URL --}}
        {{ $companies->appends(request()->except('page'))->links() }}
    </div>
@endsection