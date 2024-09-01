<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $table = "about_us";
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $fillable = [

        'title1_vn',
        'title1_en',
        'title1_jp',
        'title1_images',

        'title1_sub1_vn',
        'title1_sub1_en',
        'title1_sub1_jp',

        'title1_sub2_vn',
        'title1_sub2_en',
        'title1_sub2_jp',

        'title1_sub3_vn',
        'title1_sub3_en',
        'title1_sub3_jp',

        'title1_sub4_vn',
        'title1_sub4_en',
        'title1_sub4_jp',

        'title1_sub5_vn',
        'title1_sub5_en',
        'title1_sub5_jp',

        'title2_vn',
        'title2_en',
        'title2_jp',

        'title2_sub1_vn',
        'title2_sub1_en',
        'title2_sub1_jp',

        'title2_sub2_vn',
        'title2_sub2_en',
        'title2_sub2_jp',

        'title2_sub3_vn',
        'title2_sub3_en',
        'title2_sub3_jp',

        'title3_vn',
        'title3_en',
        'title3_jp',

        'title3_sub1_vn',
        'title3_sub1_en',
        'title3_sub1_jp',

        'title3_images',

        'title4_vn',
        'title4_en',
        'title4_jp',

        'title4_sub1_vn',
        'title4_sub1_en',
        'title4_sub1_jp',

        'title4_images',

        'delete_flag',
    ];
}
