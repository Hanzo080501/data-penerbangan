<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightData extends Model
{
    use HasFactory;
    // protected $table = 'flight_data';
    protected $fillable = [
        'serial_number',
        'registration',
        'flight_hours',
        'flight_cycles',
        'time_since_new',
        'cycle_since_new'
    ];

    // protected $casts = [
    //     'flight_hours' => 'string',
    //     'flight_cycles' => 'string',
    //     'time_since_new' => 'string',
    //     'cycle_since_new' => 'string',
    // ];
}
