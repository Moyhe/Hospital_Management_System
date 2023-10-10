<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [

        'patient_name',
        'doctor',
        'department',
        'symptoms',
        'phone',
        'booking_date',
        'user_id'

     ];
}
