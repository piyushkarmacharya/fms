<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $table="admin";
    protected $primaryKey="id";
    protected $fillable=['name','contact_number','email','password'];

    protected $casts=[
        'password'=>'hashed',
    ];
    
}
