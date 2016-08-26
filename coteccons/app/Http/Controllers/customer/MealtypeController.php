<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mealtype;

class MealtypeController extends Controller
{
    //
    public function index() {
    	$mealtype = Mealtype::all();
    	return view('customer.mealtype.index',compact('mealtype'));

    }
    public function create() {
    	return view('customer.mealtype.create');
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'title' => 'required|min:3'
    		],[
    		'title.required' => 'Please enter title !',
    		'title.min' => 'Please enter a user name of at least 3 characters !'
    		]);

    	$mealtype = new Mealtype;
    	$mealtype->title = $request->title;
    	$mealtype->desc = $request->desc;
    	if($request->hasFile('image')){
    		$file = $request->file('image');
    		$name = $file->getClientOriginalName();
    		$images = str_random(6)."_".$name;

    		while(file_exists("public/upload/mealtype/".$images)){
    			$images = str_random(6)."_".$name;
    		}
    		$file->move("public/upload/mealtype",$images);
    		$mealtype->image = $images;

    	}
    	else {
    		$mealtype->image = "";
    	}

    	$mealtype->save();
    	return redirect('cmadmin/mealtype')->with('message','Thêm danh mục món ăn thành công !');
    }
    public function deactive(Request $request,$id){
    	$restype = Mealtype::find($id);
    	$restype->active = $request->active;
    	$restype->save();
    	return redirect('cmadmin/mealtype')->with('message','Ngừng kích hoạt danh mục món ăn thành công !');
    }
    public function active(Request $request,$id){
    	$restype = Mealtype::find($id);
    	$restype->active = $request->active;
    	$restype->save();
    	return redirect('cmadmin/mealtype')->with('message','Kích hoạt danh mục món ăn thành công !');
    }
    public function edit($id){
    	$mealtype = Mealtype::find($id);
    	return view('customer.mealtype.edit',compact('mealtype'));
    }
    public function update(Request $request,$id){
    	$this->validate($request,[
    		'title' => 'required|min:3'
    		],[
    		'title.required' => 'Nhập lòng nhập tên danh mục đồ ăn !',
    		'title.min' => 'Tên danh mục phải nhiều hơn 3 ký tự !'
    		]);
    	$restype = Mealtype::find($id);
    	$restype->title = $request->title;
    	$restype->desc = trim($request->desc);

    	if($request->hasFile('image')){
    		$file = $request->file('image');
    		$name = $file->getClientOriginalName();
    		$images = str_random(6)."_".$name;
    		while(file_exists("public/upload/restype".$images)){
    			$images = str_random(6)."_".$name;
    		}
    		$file->move('public/upload/restype',$images);
    		$restype->image = $images;
    	}
    	$restype->save();
    	return redirect('cmadmin/mealtype')->with('message','Cập nhập danh mục đồ ăn thành công !');
    }
    public function destroy($id){
    	$mealtype = Mealtype::find($id);
    	$mealtype->delete();
    	return redirect('cmadmin/mealtype')->with('message','Xóa danh mục đồ ăn thành công !');
    }
}
