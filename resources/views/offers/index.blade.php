@extends('layouts.master', ['sectionTitle' => 'Job Search'])

@section('content')
    <div class="row">
        @foreach ($offers as $offer)
            <div class="col-lg-6">
                @include('offers.offer')
            </div>
        @endforeach
    </div>
    
    <div class="text-center">
        {{ $offers->appends(request()->except('page'))->links() }}
    </div>
@endsection