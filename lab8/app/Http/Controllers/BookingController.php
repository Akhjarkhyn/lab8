<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function register(Request $request){

        $booking = new Booking;
        $booking->flightNumber = $request->flightNumber;
        $booking->passengerName = $request->passengerName;
        $booking->passengerDOB = $request->DOB;
        $booking->save();

        $result = Booking::where("flightNumber",$request->id)->get();
        return $result;
    }
}
