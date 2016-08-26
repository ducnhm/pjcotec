<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
    protected $table = 'about';
    public $timestamps = true;
    protected $primaryKey = 'about_id';
}
