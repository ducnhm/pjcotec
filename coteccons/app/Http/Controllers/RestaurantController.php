<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Restaurant;

use App\Restype;

class RestaurantController extends Controller
{
    //
    public function index() {
        $res = Restaurant::all();
        return view('admin.restaurant.index',compact('res'));
    }
    public function create() {
    	$user = User::all();
    	$restype = Restype::all();
    	return view('admin.restaurant.create',['user'=>$user, 'restype' => $restype]);
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'restype' => 'required',
    		'user' => 'required',
    		'name' => 'required|min:5',
    		'address' => 'required',
    		'phone' => 'required',

    		],[
    		'restype.required' => 'Vui lòng chọn loại nhà hàng ! ',
    		'user.required' => 'Vui lòng chọn tài khoản !',
    		'name.required' => 'Vui lòng nhập tên nhà hàng !',
    		'name.min' => 'Tên nhà hàng với nhiều hơn 5 ký tự !',
    		'address.required' => 'Vui lòng nhập địa chỉ !',
    		'phone.required' => 'Vui lòng nhập số điện thoại !', 

    		]);

    	$res = new Restaurant;
    	$res->name = $request->name;
    	$res->address = $request->address;
    	$res->phone = $request->phone;
    	$res->desc = $request->desc;
    	$res->user_id = $request->user;
    	$res->restype_id = $request->restype;
    	$res->start_time = $request->start_time;
    	$res->end_time = $request->end_time;
    	$res->status = $request->status;

    	if($request->hasFile('image')){
    		$file = $request->file('image');
    		$name = $file->getClientOriginalName();
    		$images = str_random(6)."_".$name;
    		while (file_exists('public/upload/restaurant'.$images)) {
    			# code...
    			$images = str_random(6)."_".$name;
    		}
    		$file->move('public/upload/restaurant',$images);
    		$res->image = $images;
    	}
    	else {
    		$res->image = "";
    	}
    	$res->save();

    	return redirect('admincp/restaurant/create')->with('message','Thêm nhà hàng thành công !');
    }
    public function deactive(Request $request,$id){
        $res = Restaurant::find($id);
        $res->active = $request->active;
        $res->save();

        return redirect('admincp/restaurant')->with('message','Ngừng kích hoạt thành công !');

    }
     public function active(Request $request,$id){
        $res = Restaurant::find($id);
        $res->active = $request->active;
        $res->save();

        return redirect('admincp/restaurant')->with('message','Kích hoạt thành công !');

    }
    public function destroy($id){
        $res = Restaurant::find($id);
        $res->delete();
        return redirect('admincp/restaurant')->with('message','Xóa nhà hàng thành công !');
    }
    public function edit($id){
        $user = User::all();
        $restype = Restype::all();
        $res = Restaurant::find($id);
        return view('admin.restaurant.edit',['user'=>$user,'restype' => $restype,'res' => $res]);
    } 
    public function update(Request $request,$id){
        $this->validate($request,[
            'restype' => 'required',
            'user' => 'required',
            'name' => 'required|min:5',
            'address' => 'required',
            'phone' => 'required',

            ],[
            'restype.required' => 'Vui lòng chọn loại nhà hàng ! ',
            'user.required' => 'Vui lòng chọn tài khoản !',
            'name.required' => 'Vui lòng nhập tên nhà hàng !',
            'name.min' => 'Tên nhà hàng với nhiều hơn 5 ký tự !',
            'address.required' => 'Vui lòng nhập địa chỉ !',
            'phone.required' => 'Vui lòng nhập số điện thoại !', 

            ]);

        $res = Restaurant::find($id);
        $res->name = $request->name;
        $res->address = $request->address;
        $res->phone = $request->phone;
        $res->desc = $request->desc;
        $res->user_id = $request->user;
        $res->restype_id = $request->restype;
        $res->start_time = $request->start_time;
        $res->end_time = $request->end_time;
        $res->status = $request->status;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $images = str_random(6)."_".$name;
            while (file_exists('public/upload/restaurant'.$images)) {
                # code...
                $images = str_random(6)."_".$name;
            }
            $file->move('public/upload/restaurant',$images);
            $res->image = $images;
        }
        
        $res->save();

        return redirect('admincp/restaurant')->with('message','Sửa nhà hàng thành công !');
    }
    
}
