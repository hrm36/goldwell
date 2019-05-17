<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorRoom extends Model
{
    protected $fillable = [
        'name' , 'slug', 'des_s', 'image', 'des_f' , 'status'
    ];
}
