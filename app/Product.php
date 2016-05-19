<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Product extends Model
{
    //
    protected $table = "product";

    protected $fillable = [
        'product_name', 'product_des', 'product_images','product_status'
    ];

    public function images(){
        return $this->hasMany('App\Image','pu_id','id');
    }
}
