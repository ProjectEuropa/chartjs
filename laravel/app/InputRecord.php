<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class InputRecord extends Model
{
    use SoftDeletes;

    protected $table = 'input_records';
    protected $primaryKey = ['facility_id', 'ymd'];
    protected $dates = ['deleted_at'];
    public $incrementing = false;
}
