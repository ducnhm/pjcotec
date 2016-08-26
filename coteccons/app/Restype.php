<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restype extends Model
{
    //
    protected $table = 'res_type';
    public $timestamps = true;
    protected $primaryKey = 'restype_id';


    public function restaurant(){
    	return $this->hasMany('App\Restaurant','restype_id','restype_id');
    }
}
