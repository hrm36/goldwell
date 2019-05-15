<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    //
    protected $appends = ['parent'];
    protected $fillable = [
        'name','slug','cat_id','type', 'status'
    ];
    public function product()
    {
        return $this->hasMany('App\Product');
    }
    public function getParentAttribute()
    {    
        return ($this->attributes['cat_id'] != null) ? Cat::find($this->attributes['cat_id'])->name : "";
    }
}
