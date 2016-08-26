<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;
    protected $primaryKey = 'category_id';

    // protected $fillable = [
    // 	'category_id',
    // 	'title',
    // 	'descreption',
    // 	'created'

    // ];
}