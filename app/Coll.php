<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coll extends Model
{
    //
     protected $fillable = [
        'name', 'image', 'slug', 'time', 'status',
    ];
    public function media()
    {
        return $this->hasMany('App\Media','collection_id');
    }
}
