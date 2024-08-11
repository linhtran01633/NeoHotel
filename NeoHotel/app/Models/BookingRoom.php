<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRoom extends Model
{
    use HasFactory;
    protected $table = "booking_room";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'string';

    protected $fillable = [
		'room_id',
		'booking_id',
	];

    public function booking()
    {
        return $this->hasOne(\App\Models\Booking::class,  'id', 'booking_id');
    }

    public function room()
    {
        return $this->hasOne(\App\Models\Room::class,  'id', 'room_id')->where('status', 0);
    }
}
