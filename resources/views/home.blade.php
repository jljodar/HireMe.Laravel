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
                    <p>Hire Me! is a Job Search Engine to demonstrate my skill in PHP Laravel.</p>
                    <p>This project was accomplished in a week and was my first contact with this framework. It follows all good community conventions and best practices. I tried to use as many Laravel features as I could, including all the security-related functions. You can find a list in the Laravel Features section.</p>
                    <p>The data you see here is mostly fake data. You can freely play with the application, new fake data is generated every day. You can also log in as any profile using their username and "secret" as the password.</p>
                    <p>The complete source code can be found in <a href="https://github.com/jljodar/HireMe.Laravel" target="_blank">this GitHub public repository</a> and you can get in touch with me in <a href="https://www.linkedin.com/in/jljodar/">LinkedIn</a>.</p>
                    <p>Enjoy!</p>
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
                                <li>Edit your companies</li>
                                <li>Post new offers for your companies</li>
                                <li>Edit your posted offers and view their applicances</li>

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
                                <li>PHP 7.2.1</li>
                                <li>Laravel 5.7.5</li>
                                <li>Laravel Blade Templates</li>
                                <li>Bootstrap</li>
                                <li><a href="https://www.creative-tim.com/product/paper-dashboard" target="_blank">Paper Dashboard</a> bootstrap template <small>- with custom modifications</small></li>
                                <li>jQuery</li>

                                <li class="li-space">MySQL Database</li>
                                <li>PostgreSQL Database <small>- for Heroku deployment</small></li>
                                <li>Redis key-value storage</li>

                                <li class="li-space">XAMPP</li>
                                <li>Git</li>
                                <li>GitHub</li>
                                <li>Heroku <small>- for the <a href="http://hire-me-laravel.herokuapp.com" target="_blank">live preview</a></small></li>
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
                                <li>Explicit Route Binding</li>
                                <li>Layouts</li>
                                <li>Components</li>
                                <li>View Composers</li>
                                <li>Form Validation</li>
                                <li>Custom Form Validation<small>- for sending more data to the view</small></li>
                                <li>Handling validation errors with multiple form in the same view using different MessageBags</li>

                                <li class="li-space">Authentication</li>
                                <li>Authorization</li>
                                <li>Encryption</li>
                                <li>CSRF Protection</li>

                                <li class="li-space">Database Migrations</li>
                                <li>Database Seeding using Faker</li>
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
