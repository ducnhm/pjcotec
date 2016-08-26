<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use App\User;

use App\Restype;

use App\Restaurant;

use Session;


class RestaurantController extends Controller
{
    //

    public function index() {
    	if(Session::has('username')){
    		$username = Session::get('username');
    		$user = DB::table('users')->where('username',$username)->first();

    		// $ress = DB::table('restaurant')->where('user_id', $user->id)->get();
    		
            $res = Restaurant::where('user_id', $user->id)->get();
            // $restype = DB::table('restaurant')
            // ->join('res_type','restype_id','=','restype_id')
            // ->select('res_type.*')
            // ->get();
            // foreach ($restype as $key => $value) {
            //     # code...
            //     echo "<pre>";
            //     var_dump($value);die();
            //     echo "</pre>";
            // }
            
            // $table = DB::table('res_type')->get();

            // var_dump($table);die();

    		return view('customer.restaurant.index',compact('res'));

    	}
    }
    public function edit($id){
        $res = Restaurant::find($id);
        $restype = Restype::all();
        // echo "<pre>";
        // var_dump($restype);die();
        // echo "</pre>";
        if(Session::has('username')){
            $user = DB::table('users')->where('username',Session::get('username'))->first();
            // var_dump($user);die();
        }
        return view('customer.restaurant.edit',compact('res','restype','user'));
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

        return redirect('cmadmin/restaurant')->with('message','Sửa nhà hàng thành công !');
    }
}
