<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $table = "faq";
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $fillable = [
        'question_vn',
        'question_en',
        'question_jp',

        'answer_vn',
        'answer_en',
        'answer_jp',

        'delete_flag',
    ];
}
