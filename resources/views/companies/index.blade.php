@extends('layouts.master')

@section('content')
    <div class="col-sm-8 company-main">
        @foreach ($companies as $company)
            @include('companies.company')
        @endforeach

        <nav class="company-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>
    </div>
@endsection