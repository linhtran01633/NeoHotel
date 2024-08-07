<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = "services";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'string';

    protected $fillable = [
		'price',
		'service_name',
	];

    public function bookingService()
    {
        return $this->hasMany(\App\Models\BookingService::class,  'service_id', 'id');
    }
}
