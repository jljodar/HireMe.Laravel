@extends('layouts.master', ["sectionTitle" => "Home"])

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            @include('components.card', [
                "icon" => "ti-rocket",
                "title" => "Open Positions",
                "data" => $offersCount,
                "info" => '<i class="ti-timer"></i>' . $newOffersCount . " new this week",
            ])
        </div>
        <div class="col-lg-3 col-sm-6">
            @include('components.card', [
                "icon" => "ti-clipboard",
                "title" => "Applicances",
                "data" => $applicancesCount,
                "info" => '<i class="ti-timer"></i>' . $newApplicancesCount . " new this week",
            ])
        </div>
        <div class="col-lg-3 col-sm-6">
            @include('components.card', [
                "icon" => "ti-user",
                "title" => "Users",
                "data" => $usersCount,
                "info" => '<i class="ti-timer"></i>' . $newUsersCount . " new this week",
            ])
        </div>
        <div class="col-lg-3 col-sm-6">
            @include('components.card', [
                "icon" => "ti-briefcase",
                "title" => "Companies",
                "data" => $companiesCount,
                "info" => '<i class="ti-timer"></i>' . $newCompaniesCount . " new this week",
            ])
        </div>
    </div>
@endsection