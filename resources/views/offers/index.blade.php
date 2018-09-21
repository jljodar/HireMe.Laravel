@extends('layouts.master', ['sectionTitle' => 'Job Search'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @include('offers.table', ['offers' => $offers])
            </div>
        </div>
    </div>

    </div>
    
    <div class="text-center">
        {{ $offers->appends(request()->except('page'))->links() }}
    </div>
@endsection