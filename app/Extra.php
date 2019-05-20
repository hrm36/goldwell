<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    //
    protected $fillable = [
        'type' , 'product_id', 'image', 'content', 'status',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
