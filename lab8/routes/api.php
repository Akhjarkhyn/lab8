<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Flight;
use App\Models\Booking;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("flight/search",function(Request $request)
{    
    // return Flight::all();
    return Flight::where('departureAirport',$request->departureAirport)
                   ->where('arrivalAirport',$request->arrivalAirport)
                   ->where('departureDate',$request->departureDate)
                   ->where('availablePassenger',$request->availablePassenger)
                    ->get();
});

Route::post("flight/book","App\Http\Controllers\BookingController@register");