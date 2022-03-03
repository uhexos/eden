<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/register2', function () {
    return view('register2');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/gardeners', function () {
    return view('gardeners');
});
Route::get('/customers', function () {
    return view('customers');
});
Route::get('/countries', function () {
    return view('countries');
});
Route::get('/locations', function () {
    return view('locations');
});
