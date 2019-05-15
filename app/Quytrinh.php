<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quytrinh extends Model
{
    //
    protected $fillable = [
        'product_id','image','content','status'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
