<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
     protected $table = 'location';
    public $timestamps = true;
    protected $primaryKey = 'location_id';
}
