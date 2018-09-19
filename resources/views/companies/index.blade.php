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
        @foreach ($companies as $company)
            <div class="col-lg-6">
                @include('companies.company')
            </div>
        @endforeach
    </div>
@endsection