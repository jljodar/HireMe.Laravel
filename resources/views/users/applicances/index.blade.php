@extends('layouts.master', ['sectionTitle' => 'Your applicances'])

@section('content')
    <div class="card text-center">
        <div class="card-content">
            Go to <a href="/offers/">Job Search</a>, find one that suits you and apply for the position!
        </div>
    </div>

    <div>
        @include('applicances.table', ['applicances' => $applicances])
    </div>

    <div class="text-center">
        {{ $applicances->appends(request()->except('page'))->links() }}
    </div>
@endsection
