@php
    $sectionTitle = 'Applicances';

    if(isset($user) && auth()->id()) {
        $sectionTitle = (($user->id == auth()->id()) ? 'Your ' : $user->name . "'s ") . $sectionTitle;
    }
@endphp

@extends('layouts.master', ['sectionTitle' => $sectionTitle])

@section('content')
    <div class="applicance-main">
        <div class="row">
            @foreach ($applicances as $applicance)
                @include('applicances.applicance')
            @endforeach
        </div>
    </div>

    <div class="text-center">
        {{ $companies->appends(request()->except('page'))->links() }}
    </div>
@endsection