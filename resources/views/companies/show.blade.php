@extends('layouts.master', ['sectionTitle' => 'Companies'])

@section('content')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="avatar-line-96">
                            <img src="{{ asset('/img/faces/face-2.jpg') }}" />
                            <h3 class="card-title">{{ $company->name }}</h3>
                            <p>
                                Industry: {{ $company->industry }}
                                <br>Founder: <a href="/users/{{ $company->user->id }}">{{ $company->user->name . ' ' . $company->user->last_name }}</a>
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="card-content">
                        <h4 class="title">Description</h4>
                        <br>
                        {!! nl2br($company->description) !!}
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
                        <p>{{ $company->address }}</p>
                        <p>{{ $company->city }}</p>
                        <p>{{ $company->country }}</p>
                        <p>{{ $company->postal_code }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Open positions</h4>
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
