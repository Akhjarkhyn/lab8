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
// get -
// post -  
Route::get('/', function () {
    return view('welcome');
});

Route::get('student', 'App\Http\Controllers\studentController@studentList');

Route::get('student/{id}','App\Http\Controllers\studentController@getById');

Route::get('search', function(){
    return view("search");
});

Route::post("doSearch",'App\Http\Controllers\studentController@doSearch');
// Route::get("doSearch",'App\Http\Controllers\studentController@doSearch');

Route::get("account",'App\Http\Controllers\studentController@accInfo');

Route::get("account/{number}",'App\Http\Controllers\studentController@viewAccTrans');

Route::get("transaction",function(){
    return view('transactionTab');
});

Route::post("createTransaction",'App\Http\Controllers\studentController@createTrans');

Route::get('flight', function () {
    return view('flight');
});

Route::post('dosearch','App\Http\Controllers\FlightController@dosearch');

Route::get('/booking/{id}','App\Http\Controllers\BookingController@book');

Route::post('/booking/validate','App\Http\Controllers\BookingController@authIt');
Route::get('/booking/validate','App\Http\Controllers\BookingController@authIt');