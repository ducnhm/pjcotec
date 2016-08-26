<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// login
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

use DB;

use App\User;

use Session;

class UserController extends Controller
{
    //
    public function getLogin(){
    	return view('admin.login');
    }
    public function postDangnhap(Request $request){
    	// var_dump($request->username);
        
    	$username = $request->username;
    	$password = $request->password;


    	if(Auth::attempt(['username' => $username, 'password' => $password])){
            Session::put('username',$username);

            $user = DB::table('users')->where(['username'=>$username,'level'=>'Customer'])->first();
            if($user){
                return view('customer.index',['users' => Auth::user()]);
            }
            else {
                // return view('admin.index',['users' => Auth::user()]);
                return redirect('admincp');
            }
    		
    	}
    	else {
    		return redirect('/login')->with('error','Tài khoản hoặc mật khẩu không đúng !');
    	}
    	
    }
    public function logout() {
        Session::flush();
    	Auth::logout();
    	return redirect('login');
    } 

    public function index(){
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }
    public function create() {
        return view('admin.user.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'username' => 'required|min:5|unique:users',
            'fullname' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'address' => 'required',
            'phonenumber' => 'required',
            'password' => 'required|min:5',
            'password_again' => 'required|same:password',


            ],[
            'username.required' => 'Please enter your username !',
            'username.min' => 'Please enter a user name of at least 5 characters !',
            'username.unique' => 'User name already exists !',
            'fullname.required' => 'Please enter your Full Name !',
            'email.required' => 'Please enter your email !',
            'email.email' => 'Email is not valid !',
            'email.unique' => 'Email already exists !',
            'phonenumber.required' => 'Please enter your phone number !',
            'address.required' => 'Please enter your address !', 
            'password.required' => 'Please enter your Password !',
            'password.min' => 'Please enter a password of at least 5 characters !',
            'password_again.sam' => 'Password do not match !',
            'password_again.required' => 'Please enter Password Again !'


            ]);
        $user = new User;
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phonenumber = $request->phonenumber;
        $user->password = bcrypt($request->password_again);
        $user->level = $request->level;

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
        else{
            $user->avt = "";
        }
        // else{
        //     $user->avt = "";
        // }

        $user->save();

        return redirect('admincp/user/create')->with('message','Add new user successfuly !');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect('admincp/user')->with('message','Delete User Successfully !');
    }
    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
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
            'username.required' => 'Please enter your username !',
            'username.min' => 'Please enter a user name of at least 5 characters !',
            
            'fullname.required' => 'Please enter your Full Name !',
            'email.required' => 'Please enter your email !',
            'email.email' => 'Email is not valid !',
            
            'phonenumber.required' => 'Please enter your phone number !',
            'address.required' => 'Please enter your address !', 
            'password.required' => 'Please enter your Password !',
            'password.min' => 'Please enter a password of at least 5 characters !',
            'password_again.sam' => 'Password do not match !',
            'password_again.required' => 'Please enter Password Again !'


            ]);

        $user = User::find($id);
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phonenumber = $request->phonenumber;
        $user->password = bcrypt($request->password_again);
        $user->level = $request->level;

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

        
       return redirect('admincp/user')->with('message','Edit Successfully');
    }
    public function active(Request $request,$id){
        $user = User::find($id);
        $user->active = $request->active;
        $user->save();

        return redirect('admincp/user')->with('message','Active successfully !'); 
    }
    public function deactive(Request $request,$id){
        $user = User::find($id);
        $user->active = $request->active;
        $user->save();

        return redirect('admincp/user')->with('message','Deactive successfully !');
    }
}
