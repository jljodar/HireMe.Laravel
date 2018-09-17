@extends('layouts.master', ['sectionTitle' => 'Job Search'])

@section('content')
    <div class="col-sm-8 offer-main">
        @foreach ($offers as $offer)
            @include('offers.offer')
        @endforeach

        <nav class="offer-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>
    </div>
@endsection