<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    //
    protected $table = 'meal';
    public $timestamps = true;
    protected $primaryKey = 'meal_id';

    public function mealtype () {
    	return $this->belongsTo('App\Mealtype','mealtype_id','mealtype_id')
    }
    public function restaurant () {
    	return $this->belongsTo('App\Restaurant','res_id','res_id');
    }
}
