<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'name', 'city_id', 'ward_id', 'type_id'
    ];

    public function city(){
        return $this->belongsTo('App\City');
    }

    public function ward(){
        return $this->belongsTo('App\Ward');
    }
}
