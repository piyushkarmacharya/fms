<?php

namespace App\Http\Controllers;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function createRate(Request $req){
       try{
        Rate::create([
            'rate'=>$req->rate,
        ]);
        return response()->json([
            'rate_created'=>true
        ]);
       }catch(\Exception $e){
        return response()->json([
            'rate_created'=>false,
            'message'=>$e->getMessage(),
        ],500);
       }
        
    }
    public function getRate(){
        $rate=Rate::orderBy('id','DESC')->first();
        
        return response()->json($rate);
    }
}
