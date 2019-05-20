<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    protected $fillable = [
        'link','image', 'title', 'collection_id', 'type', 'status',
    ];

    public function coll()
    {
        return $this->belongsTo('App\Coll','collection_id');
    }
}
