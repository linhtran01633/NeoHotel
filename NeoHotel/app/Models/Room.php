<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = "rooms";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'string';

    protected $fillable = [
		'price',
		'status',
		'room_code',
		'room_name',
		'create_at',
		'create_up',
        'room_type',
	];

    public function bookingRoom()
    {
        return $this->hasOne(\App\Models\BookingRoom::class,  'room_id', 'id');
    }
}
