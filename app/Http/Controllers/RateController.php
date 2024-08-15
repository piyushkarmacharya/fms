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
}
