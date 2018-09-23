@extends('layouts.master', ['sectionTitle' => 'Your company'])

@section('content')
    <form method="POST" action="{{action('CompaniesController@update', $company->id)}}">
        @csrf
        {{-- We need to use the Form Method Spoofing because HTML forms do not support PATCH actions --}}
        {{ method_field('PATCH') }}

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="avatar-line-96">
                            <img src="{{ asset('/img/faces/face-2.jpg') }}" />
                            <h3 class="card-title">
                                <input type="text" name="name" class="form-control border-input" value="{{ $company->name }}">
                            </h3>

                            <div class="form-group">
                                <label for="postal_code">Industry</label>
                                <input type="text" name="industry" class="form-control border-input" value="{{ $company->industry }}">
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="card-content">
                        <h4 class="title">Description</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="description" rows="15" class="form-control border-input">{{ $company->description }}</textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Update Company</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        @include('layouts.errors')
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <a href="/users/{{ $company->user->id }}">
                        <div class="header">
                            <h4 class="title">Founder</h4>
                        </div>
                        <div class="card-content">
                            <div class="avatar-line-64">
                                <img src="{{ asset('/img/faces/face-2.jpg') }}" />
                                <h3 class="card-title" style="margin-bottom: 5px; ">{{ $company->user->name . ' ' . $company->user->last_name }}</h3>
                                <small>{{ '@' . $company->user->username }}</small>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <div class="header">
                        <h4 class="title">Address</h4>
                    </div>
                    <div class="card-content">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control border-input" value="{{ $company->address }}">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control border-input" value="{{ $company->city }}">
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" class="form-control border-input" value="{{ $company->country }}">
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" name="postal_code" class="form-control border-input" value="{{ $company->postal_code }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title pull-left">Open positions</h4>
                    <a href="/companies/{{ $company->id }}/offers/create" class="btn btn-info btn-fill pull-right">Create a new offer</a>
                    <div class="clearfix"></div>
                </div>

                @if(count($activeOffers = $company->activeOffers()) > 0)
                    @include('offers.table', ['offers' => $activeOffers])
                @else
                    <div class="card-content">
                        No open positions at the moment
                    </div>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="header">
                    <h4 class="title">Employees</h4>
                </div>
                <div class="content">
                    <ul class="list-unstyled team-members">
                        <li>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="avatar">
                                        <img src="/img/faces/face-0.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    DJ Khaled
                                    <br>
                                    <span class="text-muted"><small>Offline</small></span>
                                </div>

                                <div class="col-xs-3 text-right">
                                    <a class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="avatar">
                                        <img src="/img/faces/face-1.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    Creative Tim
                                    <br>
                                    <span class="text-success"><small>Available</small></span>
                                </div>

                                <div class="col-xs-3 text-right">
                                    <a class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="avatar">
                                        <img src="/img/faces/face-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    Flume
                                    <br>
                                    <span class="text-danger"><small>Busy</small></span>
                                </div>

                                <div class="col-xs-3 text-right">
                                    <a class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
