<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function product($id)
    {
        return Product::find($id);
    }
}
