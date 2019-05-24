<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $fillable = [
        'image' , 'text', 'link', 'type', 'status',
    ];
}
