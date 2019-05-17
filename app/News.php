<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'name' , 'slug', 'des_s', 'image', 'des_f' , 'status'
    ];
}
