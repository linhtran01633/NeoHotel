<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingService extends Model
{
    use HasFactory;

    protected $table = "booking_service";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'string';

    protected $fillable = [
		'service_id',
		'booking_id',
	];

    public function service()
    {
        return $this->hasOne(\App\Models\Service::class,  'id', 'service_id');
    }

    public function booking()
    {
        return $this->hasOne(\App\Models\Booking::class,  'id', 'booking_id');
    }
}
