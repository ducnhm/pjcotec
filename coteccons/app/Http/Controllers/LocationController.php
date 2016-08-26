<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Location;

use DB;

class LocationController extends Controller
{
    //
    public function index() {
    	$location = DB::table('location')->get();
    	return view('admin.location.index',['location'=> $location]);
    }
    public function create(){
    	return view('admin.location.create');
    }
    public function store(Request $request){

    	$this->validate($request,[
    		'name' => 'required|min:3|unique:location'

    		],[
    		'name.required' => 'Vui lòng nhập tên khu vực !',
    		'name.min' => 'Tên khu vực phải nhiều hơn 3 ký tự !',
            'name.unique' => 'Tên khu vực đã tồn tại !'
    		]);

    	
    	$location = new Location();

    	$location->name = $request->name;
        $location->desc = $request->desc;
        $location->alias = $request->alias;
        
       

      
        // $table = DB::table('category')->insert([
        //         'title' => $request->title,
        //         'descreption' => $request->desc,
        //         'created' => $ldate
        //     ]);
    	
    	$location->save();

    	return redirect('admincp/location/create')->with('message', 'Thêm khu vực thành công !');


    	// echo "<pre>";
    	// var_dump($ldate);
    	// echo "</pre>";
    }
    public function active(Request $request,$id){
        
        $location = Location::find($id);
        $location->active = $request->active;
        $location->save();
        return redirect()->back()->with('message','Kích hoạt thành công !');
    }
    public function deactive(Request $request,$id){
        
        $location = Location::find($id);
        $location->active = $request->active;
        $location->save();
        return redirect()->back()->with('message','Ngừng kích hoạt thành công !');
    }
    public function edit($id){
        $location = DB::table('location')->where('location_id',$id)->first();
        
        return view('admin.location.edit',['location' => $location]);
    
    }
    public function update(Request $request,$id){

    	$this->validate($request,[
    		'name' => 'required|min:3'

    		],[
    		'name.required' => 'Vui lòng nhập tên khu vực !',
    		'name.min' => 'Tên khu vực phải nhiều hơn 3 ký tự !',
            
    		]);

    	
    	$location = Location::find($id);

    	$location->name = $request->name;
        $location->desc = $request->desc;
        $location->alias = $request->alias;
        
       

      
        // $table = DB::table('category')->insert([
        //         'title' => $request->title,
        //         'descreption' => $request->desc,
        //         'created' => $ldate
        //     ]);
    	
    	$location->save();

    	return redirect('admincp/location')->with('message', 'Sửa khu vực thành công !');


    	// echo "<pre>";
    	// var_dump($ldate);
    	// echo "</pre>";
    }
     public function destroy($id){
    	$sql = DB::table('location')->where('location_id',$id)->delete();
    	if($sql){
    		return redirect()->back()->with('message', 'Xóa khu vực thành công !');
    	}
    	else {
    		return redirect()->back()->with('message', 'Xóa khu vực thất bại !');
    	}
    }
}
