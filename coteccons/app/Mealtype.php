<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mealtype extends Model
{
    //
    protected $table = 'meal_type';
    public $timestamps = true;
    protected $primaryKey = 'mealtype_id';


    public function meal () {
    	return $this->hasMany('App\Meal','mealtype_id','mealtype_id');
    }
}
