<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
    protected $table = 'restaurant';
    public $timestamps = true;
    protected $primaryKey = 'res_id';


    public function restype(){
    	return $this->belongsTo('App\Restype','restype_id','restype_id');
    }
    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }
    public function meal () {
        return $this->hasMany('App\Meal','res_id','res_id');
    }
}
