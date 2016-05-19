<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";

    protected $fillable = [
        'image', 'pu_id'

    ];

    public function image(){
        return $this->belongsTo('App\Product','pu_id','id');
    }
}
