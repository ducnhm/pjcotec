<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;

use App\User;

use DB;

class CustomerController extends Controller
{
    //
    public function index() {

    	if(Session::has('username')){
    		$username = Session::get('username');
    		$user = DB::table('users')->where('username',$username)->first();
    	}
    	return view('customer.user.index',compact('user'));
    }
    public function edit ($id) {
    	$user = User::find($id);
    	return view('customer.user.edit',compact('user'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'username' => 'required|min:5',
            'fullname' => 'required',
            'email' => 'required|email|max:255',
            'address' => 'required',
            'phonenumber' => 'required',
            'password' => 'required|min:5',
            'password_again' => 'required|same:password',


            ],[
            'username.required' => 'Bạn chưa điền tên đăng nhập !',
            'username.min' => 'Tên đăng nhập phải trên 5 ký tự !',
            'username.min' => 'Tên đăng nhập phải trên 5 ký tự !',
            'fullname.required' => 'Bạn chưa nhập họ và tên !',
            'email.required' => 'Bạn chưa nhập Email !',
            'email.email' => 'Địa chỉ Email không hợp lệ !',
            
            'phonenumber.required' => 'Bạn chưa nhập số điện thoại !',
            'address.required' => 'Bạn chưa nhập địa chỉ !', 
            'password.required' => 'Bạn chưa nhập mật khẩu !',
            'password.min' => 'Mật khẩu phải nhiều hơn 5 ký tự !',
            'password_again.sam' => 'Mật khẩu nhập lại không khớp !',
            'password_again.required' => 'Bạn chưa nhập lại mật khẩu !'


            ]);

        $user = User::find($id);
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phonenumber = $request->phonenumber;
        $user->password = bcrypt($request->password_again);
        

        // var_dump($request->file('avt'));die();

        if($request->hasFile('avt')){
            $file = $request->file('avt');
            $name = $file->getClientOriginalName();
            $images = str_random(6)."_".$name;
            // var_dump($images);die();
            while (file_exists("public/upload/user/".$images)){
                $images = str_random(6)."_".$name;
            }
            $file->move("public/upload/user/",$images);
            $user->avt = $images;
        }
        // else{

        //     $user = DB::table('users')->where('id',$id)->get();
        //     foreach ($user as $key => $value) {
        //         # code...
        //         $user->avt = $value->avt;
        //     }
            
        // }
        // else{
        //     $user->avt = "";
        // }

        $user->save();

        
       return redirect('cmadmin/user')->with('message','Chỉnh sửa tài khoản thành công !');
    }
}
