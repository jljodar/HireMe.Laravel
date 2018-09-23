<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index')->name('index');

Route::get('/home', 'HomeController@index')->name('home');

// All this routes could be simplified using  Route::resource('/companies', 'CompaniesController');
Route::get('/companies', 'CompaniesController@index');
Route::get('/companies/create', 'CompaniesController@create');
Route::post('/companies', 'CompaniesController@store');
Route::get('/companies/{company}', 'CompaniesController@show');

Route::get('/offers', 'OffersController@index');
Route::get('/offers/create', 'OffersController@create');
Route::post('/offers', 'OffersController@store');
Route::get('/offers/{offer}', 'OffersController@show');
Route::post('/offers/{offer}/applicances', 'OffersController@applicancesStore');


Route::get('/users/{user}', 'UsersController@show');
Route::patch('/users/{user}', 'UsersController@update');
Route::get('/profile/{username}', 'UsersController@show')->name('profile');

Route::get('/users/{user}/companies', 'UsersController@companiesIndex');
Route::get('/users/{user}/applicances', 'UsersController@applicancesIndex');


Route::get('/register', 'RegistrationController@create')->name('register');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy')->name('logout');
