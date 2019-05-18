<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    //
    protected $appends = ['parent'];
    protected $fillable = [
        'name', 'image', 'des_s','slug','cat_id','type', 'status',
    ];
    public function product()
    {
        return $this->hasMany('App\Product');
    }
    public function getParentAttribute()
    {    
        if (isset($this->attributes['cat_id'])) {
            $_cat = Cat::find($this->attributes['cat_id']);
            if (isset($_cat)) {
               return $_cat->name;
            }
        }
        return "";
    }
}
