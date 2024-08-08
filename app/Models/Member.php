<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use HasFactory;
    protected $table="member";
    protected $id="id";
    protected $fillable=["name","email","contact_number","address","password"];
    protected $casts=["password"=>"hashed"];
}
