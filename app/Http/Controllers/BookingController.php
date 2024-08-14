<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function createBooking(Request $req){
        $already_Booked=Booking::where('date',$req->date)->where('time',$req->time)->exists();
        if($already_Booked){
            return response()->json(['booked'=>false,'message'=>'Another team has already booked at that time']);
        }else{
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
    public function readBooking(){
        $bookings=Booking::all();
        return response()->json($bookings);
    }
    public function approveBooking(Request $req){
        $booking=Booking::find($req->id);
        if($booking){
            $booking->update([
                'approved'=>true
            ]);
            return response()->json([
                'approved'=>true,
                'approved_booking'=>$booking->get(),
            ]);
        }else{
            return response()->json([
                'approved'=>false,
                'message'=>'no such bookings',
            ]);
        }
    }
}
