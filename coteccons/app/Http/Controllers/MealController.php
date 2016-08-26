<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Meal;

class MealController extends Controller
{
    //
    public function index () {
    	$meal = Meal::all();

    	return view('customer.')
    }
}
