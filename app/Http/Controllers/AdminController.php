<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function createAdmin(Request $req){
       
        $admin=Admin::create([
            'name'=>$req->name,
            'contact_number'=>$req->contact_number,
            'email'=>$req->email,
            'password'=>$req->password,
        ]);
        
    }
}
