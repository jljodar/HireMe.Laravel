@extends('layouts.master', ['sectionTitle' => 'Offers'])

@section('content')
    <form method="POST" action="{{action('CompaniesController@offerStore', $company->id)}}">
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="avatar-line-64">
                            <img src="{{ asset('/img/company.jpg') }}" />
                            <h3 class="card-title">
                                <input type="text" name="title" class="form-control border-input" value="" placeholder="Position title" required>
                            </h3>
                            <p>Company: {{ $company->name }}</p>
                        </div>
                        <hr>
                    </div>

                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="started_at">Applications open from</label>
                                    <input type="date" name="started_at" class="form-control border-input" value="{{ \Carbon\Carbon::today()->toDateString() }}" require>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ended_at">Until</label>
                                    <input type="date" name="ended_at" class="form-control border-input" value="{{ \Carbon\Carbon::today()->addMonths(3)->toDateString() }}" require>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ended_at">Description</label>
                                    <textarea name="body" rows="15" class="form-control border-input" required></textarea>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Create offer</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        @include('layouts.errors')
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
