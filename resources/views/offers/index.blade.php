@extends('layouts.master', ['sectionTitle' => 'Job Search'])

@section('content')
    <div class="col-sm-8 offer-main">
        <div class="row">
            @foreach ($offers as $offer)
                @include('offers.offer')
            @endforeach
        </div>
    </div>
@endsection