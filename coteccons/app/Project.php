<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
     protected $table = 'project';
    public $timestamps = true;
    protected $primaryKey = 'project_id';
}
