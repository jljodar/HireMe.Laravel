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


Route::redirect('/login', '/', 301)->name('login');
Route::redirect('/register', '/', 301)->name('register');

Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy')->name('logout');
Route::post('/register', 'RegistrationController@store');


Route::get('/users/{user}', 'UsersController@show');
Route::patch('/users/{user}', 'UsersController@update');
Route::get('/profile/{username}', 'UsersController@show')->name('profile');

Route::get('/users/{user}/companies', 'UsersController@companiesIndex');
Route::get('/users/{user}/applicances', 'UsersController@applicancesIndex');

// All this routes could be simplified using  Route::resource('/companies', 'CompaniesController');
Route::get('/companies', 'CompaniesController@index');
Route::get('/companies/create', 'CompaniesController@create');
Route::post('/companies', 'CompaniesController@store');
Route::get('/companies/{company}', 'CompaniesController@show');
Route::patch('/companies/{company}', 'CompaniesController@update');
Route::get('/companies/{company}/offers/create', 'CompaniesController@offerCreate');
Route::post('/companies/{company}/offers', 'CompaniesController@offerStore');

Route::get('/offers', 'OffersController@index');
Route::get('/offers/{offer}', 'OffersController@show');
Route::patch('/offers/{offer}', 'OffersController@update');
Route::get('/offers/{offer}/edit', 'OffersController@edit');
Route::post('/offers/{offer}/applicances', 'OffersController@applicancesStore');
