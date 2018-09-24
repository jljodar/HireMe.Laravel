@extends('layouts.master', ['sectionTitle' => 'Your offer'])

@section('content')
    <form method="POST" action="{{action('OffersController@update', $offer->id)}}">
        @csrf

        {{-- We need to use the Form Method Spoofing because HTML forms do not support PATCH actions --}}
        {{ method_field('PATCH') }}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="avatar-line-64">
                            <img src="{{ asset('/img/company.jpg') }}" />
                            <h3 class="card-title">
                                <input type="text" name="title" class="form-control border-input" value="{{ $offer->title }}" placeholder="Position title" required>
                            </h3>
                            <p>Company: {{ $offer->company->name }}</p>
                        </div>
                        <hr>
                    </div>

                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="started_at">Applications open from</label>
                                    <input type="date" name="started_at" class="form-control border-input" value="{{ $offer->started_at->toDateString() }}" require>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ended_at">Until</label>
                                    <input type="date" name="ended_at" class="form-control border-input" value="{{ $offer->ended_at->toDateString() }}" require>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ended_at">Description</label>
                                    <textarea name="body" rows="15" class="form-control border-input" required>{{ $offer->body }}</textarea>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Update offer</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        @include('layouts.errors')
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="title">Applicants</h4>
                    </div>

                    @if (count($offer->applicances) > 0)
                        <div class="datatable">
                            @foreach ($offer->applicances as $applicance)
                                <div class="datatable-row">
                                    <div class="avatar-line-64">
                                        <img src="{{ asset('/img/faces/face-2.jpg') }}" />
                                        <div>
                                            <h4 class="title">{{ $applicance->user->name }}</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    Date: {{ $applicance->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        Sorry, there are no applicants yet
                    @endif
                </div>
            </div>
        </div>
    </form>
@endsection
