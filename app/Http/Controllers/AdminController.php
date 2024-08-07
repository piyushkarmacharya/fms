<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   
    public function createAdmin(Request $req){
       try{
        $admin=Admin::create([
            'name'=>$req->name,
            'contact_number'=>$req->contact_number,
            'email'=>$req->email,
            'password'=>$req->password,
        ]);
        return response()->json(['admin_created' => true, 'admin_created' => $admin]);
       }catch(\Exception $e){
        return response()->json(['admin_created' => false, 'error' => $e->getMessage()], 500);
       }
       

        return response()->json(['admin_created'=>$admin]);
    }
    public function loginAdmin(Request $req){
        
        $login=Auth::guard("admin")->attempt(['email'=>$req->email,'password'=>$req->password]);
        return response()->json(['login'=>$login]);

    }
}
