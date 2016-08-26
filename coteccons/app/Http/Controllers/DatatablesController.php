<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Datatables;

use DB;

use App\Users;


class DatatablesController extends Controller
{
    public function getIndex()
	{
	    return view('admin.datatables.index');
	}

/**
 * Process datatables ajax request.
 *
 * @return \Illuminate\Http\JsonResponse
 */
	public function anyData()
	{	
		$users = DB::table('users')->select();
	    return Datatables::of($users)
        ->addColumn('action', function ($users) {
               return '<a href="'.$users->id. '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>'
               .'   '.
                                '<a href="'.$users->id. '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-remove"></i> Delete</a>'
                                
               ;
            })
        ->make(true);
	}
}
