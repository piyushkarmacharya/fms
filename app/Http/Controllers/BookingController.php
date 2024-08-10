<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function createBooking(Request $req){
        $amount=$req->payment_amount;
        $rate=$req->rate;
        $booking=Booking::create([
            "member_id"=>$req->member_id,
            "date"=>$req->date,
            "time"=>$req->time,
            "rate"=>$rate,
            "payment_amount"=>$amount,
            "payment_cleared"=>$amount>=$rate,
            // "approved"=>false its by default false
        ]);
       
        return response()->json(['booked'=>true,'booking_details'=>$booking]);
    }
}
