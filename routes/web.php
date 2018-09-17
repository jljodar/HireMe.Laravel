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

Route::get('/', 'HomeController@index')->name('home');
// Laravel has /home route hardcoded, so we redirect it to our home
Route::redirect('/home', '/', 301);

Route::get('/companies', 'CompaniesController@index');
Route::get('/companies/create', 'CompaniesController@create');
Route::post('/companies', 'CompaniesController@store');
Route::get('/companies/{company}', 'CompaniesController@show');

Route::get('/offers', 'OffersController@index');
Route::get('/offers/create', 'OffersController@create');
Route::post('/offers', 'OffersController@store');
Route::get('/offers/{offer}', 'OffersController@show');


Route::get('/register', 'RegistrationController@create')->name('register');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy')->name('logout');
