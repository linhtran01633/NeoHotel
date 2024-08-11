<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = "bookings";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'string';

    protected $fillable = [
		'room_type',
		'start_date',
		'end_date',
		'adult',
		'children',
		'number_of_rooms',
        'breakfast',
        'c_first_name',
        'c_last_name',
        'c_email',
        'c_phone',
        'c_request',
        'status',
	];

    protected $casts = [
		'start_date' => 'datetime',
		'end_date' => 'datetime',
	];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }

    public function bookingRoom()
    {
        return $this->hasMany(\App\Models\BookingRoom::class,  'booking_id', 'id')->where('status', 0);
    }

    public function bookingService()
    {
        return $this->hasMany(\App\Models\BookingService::class,  'booking_id', 'id');
    }
}
