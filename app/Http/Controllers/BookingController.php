<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Rate;
use Carbon\Carbon;




class BookingController extends Controller
{
    public function createBooking(Request $req){
        $already_Booked=Booking::where('date',$req->date)->where('time',$req->time)->exists();
        if($already_Booked){
            return response()->json(['booked'=>false,'message'=>'Another team has already booked at that time']);
        }else{
            $amount=$req->payment_amount;
        
            $rate=Rate::latest()->value('rate');
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
    public function readBooking(Request $req){

        
        if($date=$req->input("date")){
           
            $apiDate = Carbon::parse($date);
            $data=DB::table('booking')->join("member","booking.member_id","=","member.id")->select("booking.*","member.name","member.contact_number","member.email")->where("booking.date",$apiDate)->get();
            return response()->json($data);
        }else{
            $data=DB::table('booking')->join("member","booking.member_id","=","member.id")->select("booking.*","member.name","member.contact_number","member.email")->get();
return response()->json($data);
        }
        
    }
    public function approveBooking(Request $req){
        $booking=Booking::find($req->id);
        if($booking){
            $booking->update([
                'status'=>"approved"
            ]);
            return response()->json([
                'approved'=>true,
                'approved_booking'=>$booking,
            ]);
        }else{
            return response()->json([
                'approved'=>false,
                'message'=>'no such bookings',
            ]);
        }
    }
    public function rejectBooking(Request $req){
        $booking=Booking::find($req->id);
        if($booking){
            $booking->update([
                'status'=>"rejected"
            ]);
            return response()->json([
                'rejected'=>true,
                'approved_booking'=>$booking,
            ]);
        }else{
            return response()->json([
                'rejected'=>false,
                'message'=>'no such bookings',
            ]);
        }
    }
}
