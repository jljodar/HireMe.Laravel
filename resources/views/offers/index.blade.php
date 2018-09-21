@extends('layouts.master', ['sectionTitle' => 'Job Search'])

@section('content')
    <div class="card">
        <div class="header">
            <h4 class="title">Search filters</h4>
        </div>

        <div class="card-content">
            <form method="GET" action="{{action('OffersController@index')}}">
                @csrf

                <div class="row">
                    <div class="col-lg-4">
                        <div class="input-group search">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" name="filter" class="form-control" placeholder="Search..." value="{{ request("filter") }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group search">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" name="company-filter" class="form-control" placeholder="Company..." value="{{ request("company-filter") }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="btn-group" style="float: left; ">
                            <button type="button" class="btn btn-default">Active</button>
                            <button type="button" class="btn btn-default">Inactive</button>
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
                @include('offers.table', ['offers' => $offers])
            </div>
        </div>
    </div>
    
    <div class="text-center">
        {{ $offers->appends(request()->except('page'))->links() }}
    </div>
@endsection