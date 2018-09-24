@extends('layouts.master', ['sectionTitle' => 'Job Search'])

@section('content')
    <div class="card">
        <div class="header">
            <h4 class="title">Search filters</h4>
        </div>

        <div class="card-content">
            <form method="GET" action="{{action('OffersController@index')}}">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="input-group search">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request("search") }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group search">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" name="company-search" class="form-control" placeholder="Company..." value="{{ request("company-search") }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-info btn-fill pull-right">Search</button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (count($offers) > 0)
                    @include('offers.table', ['offers' => $offers])
                @else
                    <div class="card-content text-center">
                        Sorry, no results were found
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="text-center">
        {{ $offers->appends(request()->except('page'))->links() }}
    </div>
@endsection
