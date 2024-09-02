<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = "rooms";
    protected $primaryKey = 'id';
    public $keyType = 'string';

    protected $fillable = [

        'title_vn',
        'title_en',
        'title_jp',

        'title1_vn',
        'title1_en',
        'title1_jp',

        'title1_sub1_vn',
        'title1_sub1_en',
        'title1_sub1_jp',

        'comment1_vn',
        'comment1_en',
        'comment1_jp',

        'title1_sub2_vn',
        'title1_sub2_en',
        'title1_sub2_jp',

        'comment2_vn',
        'comment2_en',
        'comment2_jp',

        'title1_sub3_vn',
        'title1_sub3_en',
        'title1_sub3_jp',

        'comment3_vn',
        'comment3_en',
        'comment3_jp',

        'title1_sub4_vn',
        'title1_sub4_en',
        'title1_sub4_jp',

        'comment4_vn',
        'comment4_en',
        'comment4_jp',

        'title1_sub5_vn',
        'title1_sub5_en',
        'title1_sub5_jp',

        'comment5_vn',
        'comment5_en',
        'comment5_jp',

        'title2_vn',
        'title2_en',
        'title2_jp',

        'title3_vn',
        'title3_en',
        'title3_jp',

        'equipment_for_rent',
        'available_equipment',
    ];
}
