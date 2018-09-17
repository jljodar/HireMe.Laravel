@extends('layouts.master', ['sectionTitle' => 'Companies'])

@section('content')
    <div class="company-main">
        @foreach ($companies as $company)
            @include('companies.company')
        @endforeach
    </div>
@endsection