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
                        <div class="checkbox pull-left">
                            <input type="checkbox" id="openPositions" name="openPositions" value="true" {{ (request('openPositions') == 'true' ? 'checked' : '') }} />
                            <label for="openPositions">Only with open positions</label>
                        </div>

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
                @if (count($companies) > 0)
                    @include('companies.table', ['companies' => $companies])
                @else
                    <div class="card-content text-center">
                        Sorry, no results were found
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="text-center">
        {{ $companies->appends(request()->except('page'))->links() }}
    </div>
@endsection
