<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="booking";
    protected $primaryKey="id";
    protected $fillable=['member_id','date','time','payment_amount','payment_cleared',"approved"];
}
