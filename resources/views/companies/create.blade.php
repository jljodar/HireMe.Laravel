@extends('layouts.master', ['sectionTitle' => 'Companies'])

@section('content')
    <div class="card">
        <div class="header">
            <h4 class="title">Create a new company</h4>
        </div>
        <div class="content">
            <form method="POST" action="{{action('CompaniesController@store')}}">
                @csrf

                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" name="name" class="form-control border-input" required>
                </div>
                <div class="form-group">
                    <label for="industry">Industry *</label>
                    <input type="text" name="industry" class="form-control border-input" required>
                </div>
                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea name="description" rows="10" class="form-control border-input" required></textarea>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control border-input">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control border-input">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" class="form-control border-input">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" name="postal_code" class="form-control border-input">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">Create company</button>
                </div>
                <div class="clearfix"></div>

                @include('layouts.errors')
            </form>
        </div>
    </div>
@endsection