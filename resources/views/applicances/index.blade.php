@extends('layouts.master', ['sectionTitle' => 'Applicances'])

@section('content')
    <div class="applicance-main">
        @foreach ($applicances as $applicance)
            @include('applicances.applicance')
        @endforeach
    </div>
@endsection