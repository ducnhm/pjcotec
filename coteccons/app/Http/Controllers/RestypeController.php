<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Restype;

class RestypeController extends Controller
{
    //
    public function index() {
    	$restype = Restype::all();
    	return view('admin.restype.index',compact('restype'));
    }
    public function create() {
    	return view('admin.restype.create');
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'title' => 'required|min:3'
    		],[
    		'title.required' => 'Please enter title !',
    		'title.min' => 'Please enter a user name of at least 3 characters !'
    		]);

    	$restype = new Restype;
    	$restype->title = $request->title;
    	$restype->desc = $request->desc;
    	if($request->hasFile('image')){
    		$file = $request->file('image');
    		$name = $file->getClientOriginalName();
    		$images = str_random(6)."_".$name;

    		while(file_exists("public/upload/restype/".$images)){
    			$images = str_random(6)."_".$name;
    		}
    		$file->move("public/upload/restype",$images);
    		$restype->image = $images;

    	}
    	else {
    		$restype->image = "";
    	}

    	$restype->save();
    	return redirect('admincp/restype')->with('message','Create Category Successfully !');
    }
    public function deactive(Request $request,$id){
    	$restype = Restype::find($id);
    	$restype->active = $request->active;
    	$restype->save();
    	return redirect('admincp/restype')->with('message','Deactive Successfully !');
    }
    public function active(Request $request,$id){
    	$restype = Restype::find($id);
    	$restype->active = $request->active;
    	$restype->save();
    	return redirect('admincp/restype')->with('message','Active Successfully !');
    }

    public function destroy($id){
    	$restype = Restype::find($id);
    	$restype->delete();
    	return redirect('admincp/restype')->with('message','Delete Catygory Successfully !');
    }
    public function edit($id){
    	$restype = Restype::find($id);
    	return view('admin.restype.edit',compact('restype'));
    }
    public function update(Request $request,$id){
    	$this->validate($request,[
    		'title' => 'required|min:3'
    		],[
    		'title.required' => 'Please enter title !',
    		'title.min' => 'Please enter a user name of at least 3 characters !'
    		]);
    	$restype = Restype::find($id);
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
    	return redirect('admincp/restype')->with('message','Update Category Successfully !');
    }
}
