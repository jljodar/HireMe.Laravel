@extends('layouts.master', ['sectionTitle' => 'Your companies'])

@section('content')
    <div class="card text-center">
        <br>
        <a href="/companies/create" class="btn btn-info btn-fill">Create a new company</a>
        <br><br>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @include('companies.table', ['companies' => $companies])
            </div>
        </div>
    </div>

    <div class="text-center">
        {{ $companies->appends(request()->except('page'))->links() }}
    </div>
@endsection