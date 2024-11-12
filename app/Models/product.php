<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//php artisan make:model product -mc         to crete model & migrate & controller

class product extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "desc",
        "price",
        "image",
        "quantity",
        "category_id"
    ];
}
