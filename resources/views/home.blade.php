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

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="title">About this project</h3>
                </div>
                <div class="card-content">
                    <p>Hire Me! is a Job Search Engine for demostrating my skills with PHP Laravel.</p>
                    <p>This project was acomplised in a week and was my first contact with this framework. It follows all the community good conventions and I tried to use here as much Laravel features as I can.</p>
                </div>
                <div class="card-header">
                    <h3 class="title">Things you can do here:</h3>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li>Register</li>
                                <li>Login / Logout</li>
                                <li>Edit your profile</li>
                                <li>View and increment profile visits <small>- visits on your own profile doesn't count!</small></li>
                                <li>View user last seen</li>

                                <li class="li-space">Search for job offers</li>
                                <li>Apply to job offers</li>
                                <li>View your applicances and their state</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li>Search for companies</li>
                                <li>View your companies</li>
                                <li>Create a new company</li>
                                <li style="text-decoration: line-through; ">Edit your companies</li>
                                <li style="text-decoration: line-through; ">Post new offers for your companies</li>
                                <li style="text-decoration: line-through; ">View the applicances for your posted offers</li>

                                <li class="li-space">Home dashboard with real data stats</li>
                                <li>Notifications <small>- faked</small></li>
                                <li>Info popups <small>- faked</small></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-header">
                            <h3 class="title">Tech Stack</h3>
                        </div>
                        <div class="card-content">
                            <ul>
                                <li>PHP</li>
                                <li>Laravel 5.7.5</li>
                                <li>Laravel Blade Templates</li>
                                <li>Bootstrap</li>
                                <li><a href="https://www.creative-tim.com/product/paper-dashboard" target="_blank">Paper Dashboard</a> bootstrap template</li>
                                <li>jQuery</li>

                                <li class="li-space">MySQL Database</li>
                                <li>PostgreSQL Database <small>- for Heroku deployment</small></li>
                                <li>Redis key-value storage</li>

                                <li class="li-space">Heroku <small>- for the <a href="http://hire-me-laravel.herokuapp.com" target="_blank">live preview</a></small></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card-header">
                            <h3 class="title">Laravel Features</h3>
                        </div>
                        <div class="card-content">
                            <ul>
                                <li>Routing</li>
                                <li>Layouts</li>
                                <li>Components</li>
                                <li>Form Validation</li>
                                <li>View Composers</li>

                                <li class="li-space">Authentication</li>
                                <li>Authorization</li>
                                <li>Encryption</li>
                                <li>CSRF Protection</li>

                                <li class="li-space">Database Migrations</li>
                                <li>Database Seeding</li>
                                <li>Query Builder</li>
                                <li>Pagination</li>

                                <li class="li-space">Eloquent Local Scopes</li>
                                <li>Eloquent Relationships</li>
                                <li>Eloquent Accessors</li>
                                <li>Guarded and Fillable fields</li>

                                <li class="li-space">Helpers functions</li>
                                <li>Middlewares</li>
                                <li>Service Providers</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
