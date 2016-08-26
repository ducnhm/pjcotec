<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\About;

class AboutController extends Controller
{
    //
    public function index() {
    	$about = DB::table('about')->orderBy('about_id','DESC')->get();
    	return  view('admin.about.index',['about'=> $about]);
    }
    public function create () {
        $category_parent = DB::table('category')->where('alias','gioi-thieu')->first();
        if($category_parent) {
            $category_child = DB::table('category')->where('parent_id',$category_parent->category_id)->get();
    	
    	return view('admin.about.create',['category' => $category_child]);
        }
        else {
            return view('admin.index');
        }
    }
    public function store(Request $request){

    	$this->validate($request,[
    		'title' => 'required|min:3:unique:about'

    		],[
    		'title.required' => 'Vui lòng nhập tiêu đề dự án !',
    		'title.min' => 'Tiêu đề dự án phải nhiều hơn 3 ký tự !',
            'title.unique' => 'Tiêu đề đã tồn tại !',
            
    		]);

    	
    	$about = new About();

        $about->title = $request->title;
        $about->content = $request->content;
        $about->alias = $request->alias;

        $about->category_id = $request->category_id;

       
       

       if($request->hasFile('img')){
            $file = $request->file('img');
            $name = $file->getClientOriginalname();
            $images = str_random(6)."_".$name;
            while (file_exists("public/upload/about".$images)) {
                # code...
                $images = str_random(6)."_".$name;
            }
            $file->move("public/upload/about/",$images);
            $about->image = $images;
       }

        // $table = DB::table('category')->insert([
        //         'title' => $request->title,
        //         'descreption' => $request->desc,
        //         'created' => $ldate
        //     ]);

        $about->save();

    	return redirect('admincp/about')->with('message', 'Thêm tin mới thành công !');


    	// echo "<pre>";
    	// var_dump($ldate);
    	// echo "</pre>";
    		
    }
    public function active(Request $request,$id) {
    	$about = DB::table('about')->where('about_id',$id)->update(['active'=> $request->active]);
    	if($about) {
    		return redirect()->back()->with('message','Kích hoạt thành công !');

    	}
    	else {
    		return redirect()->back()->with('message','Kích hoạt thất bại !');
    	}
    }
    public function edit($id){

        $about = DB::table('about')->where('about_id',$id)->first();
         $category_parent = DB::table('category')->where('alias','gioi-thieu')->first();
        if($category_parent && $about) {
            $category_child = DB::table('category')->where('parent_id',$category_parent->category_id)->get();
        
            return view('admin.about.edit',['about'=> $about,'category'=> $category_child]);
        }
        else {
            return view('admin.index');
        }
    }
    public function update(Request $request,$id){

        $this->validate($request,[
            'title' => 'required|min:3'

            ],[
            'title.required' => 'Vui lòng nhập tiêu đề dự án !',
            'title.min' => 'Tiêu đề dự án phải nhiều hơn 3 ký tự !',
            
            ]);


        $about = About::find($id);

        $about->title = $request->title;
        $about->content = $request->content;
        $about->alias = $request->alias;

        $about->category_id = $request->category_id;




        if($request->hasFile('img')){
            $file = $request->file('img');
            $name = $file->getClientOriginalname();
            $images = str_random(6)."_".$name;
            while (file_exists("public/upload/about".$images)) {
                # code...
                $images = str_random(6)."_".$name;
            }
            $file->move("public/upload/about/",$images);
            $about->image = $images;
        }

        // $table = DB::table('category')->insert([
        //         'title' => $request->title,
        //         'descreption' => $request->desc,
        //         'created' => $ldate
        //     ]);

        $about->save();

        return redirect('admincp/about')->with('message', 'Cập nhập tin mới thành công !');


        // echo "<pre>";
        // var_dump($ldate);
        // echo "</pre>";
            
    }
    public function destroy($id){
        $about = DB::table('about')->where('about_id',$id)->delete();
        if($about){
            return redirect()->back()->with('message','Xóa tin thành công !');
        }
        else {
            return redirect()->back()->with('message','Xóa tin thất bại !');
        }
    }
}
