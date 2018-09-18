@extends('layouts.master', ['sectionTitle' => 'Companies'])

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="icon-big text-center">
                                <i class="ti-server"></i>
                            </div>
                        </div>
                        <div class="col-xs-10">
                            <h4 class="title">{{ $company->name }}</h4>
                            <p class="category">
                                {{ $company->industy }}
                            </p>
                            <p>
                                Founder: <a href="/users/{{ $company->user->id }}">{{ $company->user->name }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content">
                    {{ $company->description }}
                </div>
            </div>

            @if(count($offers) > 0)
                <h3>Open positions</h3>
        
                <div class="row">
                    @foreach ($offers as $offer)
                        @include('offers.offer', ['mini' => true])
                    @endforeach
                </div>
            @else
                <h3>No open positions at the moment</h3>
            @endif
        </div>

        <div class="col-lg-4 col-md-5">
            <div class="card">
                <div class="header">
                    <h4 class="title">Team Members</h4>
                </div>
                <div class="content">
                    <ul class="list-unstyled team-members">
                        <li>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="avatar">
                                        <img src="assets/img/faces/face-0.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    DJ Khaled
                                    <br>
                                    <span class="text-muted"><small>Offline</small></span>
                                </div>

                                <div class="col-xs-3 text-right">
                                    <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="avatar">
                                        <img src="assets/img/faces/face-1.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    Creative Tim
                                    <br>
                                    <span class="text-success"><small>Available</small></span>
                                </div>

                                <div class="col-xs-3 text-right">
                                    <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="avatar">
                                        <img src="assets/img/faces/face-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    Flume
                                    <br>
                                    <span class="text-danger"><small>Busy</small></span>
                                </div>

                                <div class="col-xs-3 text-right">
                                    <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection