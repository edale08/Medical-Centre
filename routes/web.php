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

// if url / is requested, we return a view called welcome, to send user to welcome page
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// if url /home is requested, go into HomeController and run the index function
// and gives this route a name 'home'
Route::get('/home', 'HomeController@index')->name('home');

// here we have a route for doctors and runs all operations in the DoctorController
Route::resource('/doctors', 'DoctorController');

// here we have a route for patients and runs all operations in the PatientController
Route::resource('/patients', 'PatientController');

// here we have a route for visits and runs all operations in the VisitController
Route::resource('/visits', 'VisitController');
