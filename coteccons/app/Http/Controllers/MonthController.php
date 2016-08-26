<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Month;
class MonthController extends Controller
{
    //
    public function index () {
    	$months = DB::table('months')->get();
    	return view('admin.months.index',['months'=> $months]); 
    }
    public function create () {

    	return view('admin.months.create');
    }
    public function store (Request $request){
    	$this->validate($request,[
    		'name' => 'required'
    		],[
    		'name.required' => 'Bạn chưa nhập năm !'

    		]);

    	$months = DB::table('months')->insert(
    		[
    		'name' => $request->name,
    		'alias' => $request->alias,
    		]
    		);
    	if($months){
    		return redirect('admincp/months')->with('message','Thêm năm thành công !');

    	}
    	else {
    		return redirect('admincp/months')->with('message','Thêm năm thất bại');
    	}
    }
    public function active (Request $request ,$id){
    	$month = DB::table('months')->where('month_id',$id)
    	->update(
    		['active' => $request->active]);
    	if($month){
    		return redirect()->back()->with('message','Active thành công !');

    	}
    	else {
    		return redirect()->back()->with('message','Active thất bại !');
    	}
    }
    public function destroy($id){
    	$month = DB::table('months')->where('month_id',$id)->delete();
    	if($month){
    		return redirect()->back()->with('message','Xóa thành công !');
    	}
    	else {
    		return redirect()->back()->with('message','Xóa thất bại !');
    	}
    }
    public function edit ($id) {
    	$month = DB::table('months')->where('month_id',$id)->first();
    	if($month){
    		return view('admin.months.edit',['month'=> $month]);
    	}
    	else {
    		return redirect()->back()->with('message','Id không tồn tại !');
    	}
    }
    public function update (Request $request,$id){
    	$this->validate($request,[
    		'name' => 'required'
    		],[
    		'name.required' => 'Bạn chưa nhập năm !'

    		]);

    	DB::table('months')->where('month_id',$id)->update(
    		[
    		'name' => $request->name,
    		'alias' => $request->alias
    		]
    		);
    	
    		return redirect('admincp/months')->with('message','Sửa năm thành công !');

    	
    }
}
