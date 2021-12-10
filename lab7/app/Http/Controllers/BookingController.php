<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function authIt(Request $request){

        $url = 'http://127.0.0.1:8081/api/flight/book';
        $ch = curl_init($url);
        $a = array("flightNumber"=>$request->id,
        "passengerName"=>$request->fullname,
        "DOB"=>$request->dob);
    
        $json = json_encode($a);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        $a = json_decode($result);
        // return view('booking', compact('a'));
        return $a;
    }

    public function book($id){
        return view('booking',['id' => $id]);
    }
}
