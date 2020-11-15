<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name', 'prefecture_id'
    ];

    public function prefecture(){
        return $this->belongsTo('App\Prefecture');
    }
}
