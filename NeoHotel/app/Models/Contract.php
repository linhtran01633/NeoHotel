<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = "contracts";
    protected $primaryKey = 'id';
    public $keyType = 'string';

    protected $fillable = [
        'title_vn',
        'title_en',
        'title_jp',

        'title_sub1_vn',
        'title_sub1_en',
        'title_sub1_jp',

        'comment1_vn',
        'comment1_en',
        'comment1_jp',

        'title_sub2_vn',
        'title_sub2_en',
        'title_sub2_jp',

        'comment2_vn',
        'comment2_en',
        'comment2_jp',


        'title_sub3_vn',
        'title_sub3_en',
        'title_sub3_jp',

        'comment3_vn',
        'comment3_en',
        'comment3_jp',
    ];
}
