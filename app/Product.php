<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name','cat_id', 'dis_type', 'slug', 'des_s', 'image', 'des_f', 'sp_botro', 'status'
    ];

    public function quytrinh()
    {
        return $this->hasMany('App\Quytrinh');
    }
    public function cat()
    {
        return $this->belongsTo('App\Cat');
    }

}
