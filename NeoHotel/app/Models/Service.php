<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $primaryKey = 'id';
    public $keyType = 'string';

    protected $fillable = [
        'title_vn',
        'title_en',
        'title_jp',

        'title_sub_vn',
        'title_sub_en',
        'title_sub_jp',

        'comment_vn',
        'comment_en',
        'comment_jp',

        'service_list',
        'images',
    ];

    protected $casts = [
        'service_list' => 'array',
    ];
}
