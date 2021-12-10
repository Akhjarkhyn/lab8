<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function dosearch(Request $request){
        $url = 'http://127.0.0.1:8081/api/flight/search';
        $ch = curl_init($url);
        $a = array("departureAirport"=>$request->departureAirport,
        "arrivalAirport"=>$request->arrivalAirport,
        "departureDate"=>$request->departureDate,
        "availablePassenger"=>$request->availablePassenger);
    
        $json = json_encode($a);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        $a = json_decode($result);
        return view('flight', compact('a'));
    }
}
