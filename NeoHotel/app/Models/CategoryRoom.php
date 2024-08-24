<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRoom extends Model
{
    use HasFactory;

    protected $table = "category_room";
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $fillable = [
        'name_vn',
        'name_en',
        'name_jp',

        'price_vn',
        'price_en',
        'price_jp',

        'detail_vn',
        'detail_en',
        'detail_jp',

        'acreage_vn',
        'acreage_en',
        'acreage_jp',

        'bed_vn',
        'bed_en',
        'bed_jp',

        'area_vn',
        'area_en',
        'area_jp',

        'images',
    ];


}
