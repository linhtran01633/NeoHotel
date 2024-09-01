<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlide extends Model
{
    use HasFactory;
    protected $table = "home_slide";
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $fillable = [
        'name_vn',
        'name_en',
        'name_jp',

        'title_vn',
        'title_en',
        'title_jp',

        'images',
        'images_mobile',
    ];
}
