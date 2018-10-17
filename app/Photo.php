<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['name', 'alt',];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
