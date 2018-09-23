@extends('layouts.master', ['sectionTitle' => 'Copmanies'])

@section('content')
    <div class="card">
        <div class="header">
            <h4 class="title">Search filters</h4>
        </div>

        <div class="card-content">
            <form method="GET" action="{{action('CompaniesController@index')}}">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="input-group search">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request("search") }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="btn-group" style="float: left; ">
                            <button type="button" class="btn btn-default">Open positions</button>
                            <button type="button" class="btn btn-default">Close</button>
                            <button type="button" class="btn btn-default">All</button>
                        </div>

                        <button type="submit" class="btn btn-info btn-fill" style="float: right; ">Search</button>
                    </div>
                </div>
            </form>
        </div>
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