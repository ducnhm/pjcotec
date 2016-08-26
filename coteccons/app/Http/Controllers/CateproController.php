<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Catepro;

use DB;

class CateproController extends Controller
{
    //
    public function index () {
    	$catepro = Catepro::all();
    	return view('admin.category_project.index',['catepro'=> $catepro]);
    }
    public function create() {

    	return view('admin.category_project.create');
    }

    public function store(Request $request){

    	$this->validate($request,[
    		'name' => 'required|min:3|unique:category'

    		],[
    		'name.required' => 'Vui lòng nhập tên danh mục !',
    		'name.min' => 'Tên danh mục phải nhiều hơn 3 ký tự !',
            'name.unique' => 'Tên danh mục đã tồn tại !'
    		]);

    	
    	$category = new Catepro();

    	$category->name = $request->name;
        $category->desc = $request->desc;
        $category->alias = $request->alias;
        
       

       if($request->hasFile('img')){
            $file = $request->file('img');
            $name = $file->getClientOriginalname();
            $images = str_random(6)."_".$name;
            while (file_exists("public/upload/cate_project".$images)) {
                # code...
                $images = str_random(6)."_".$name;
            }
            $file->move("public/upload/cate_project/",$images);
            $category->image = $images;
       }

        // $table = DB::table('category')->insert([
        //         'title' => $request->title,
        //         'descreption' => $request->desc,
        //         'created' => $ldate
        //     ]);
    	
    	$category->save();

    	return redirect('admincp/category-project')->with('message', 'Thêm danh mục dự án thành công !');


    	// echo "<pre>";
    	// var_dump($ldate);
    	// echo "</pre>";
	}
	public function active(Request $request,$id){
        
        $category = Catepro::find($id);
        $category->active = $request->active;
        $category->save();
        return redirect('admincp/category-project')->with('message','Kích hoạt thành công !');
    }
    public function deactive(Request $request,$id){

        $category = Catepro::find($id);

        $category->active = $request->active;
        $category->save();
        return redirect('admincp/category-project')->with('message','Ngừng kích hoạt thành công !');
    }
    public function edit($id){
        $catepro = DB::table('cate_project')->where('catepro_id',$id)->first();
        
        return view('admin.category_project.edit',['catepro' => $catepro]);
    
    }public function update(Request $request,$id){

    	$this->validate($request,[
    		'name' => 'required|min:3|unique:category'

    		],[
    		'name.required' => 'Vui lòng nhập tên danh mục !',
    		'name.min' => 'Tên danh mục phải nhiều hơn 3 ký tự !',
            'name.unique' => 'Tên danh mục đã tồn tại !'
    		]);

    	
    	$category = Catepro::find($id);

    	$category->name = $request->name;
        $category->desc = $request->desc;
        $category->alias = $request->alias;
        
       

       if($request->hasFile('img')){
            $file = $request->file('img');
            $name = $file->getClientOriginalname();
            $images = str_random(6)."_".$name;
            while (file_exists("public/upload/cate_project".$images)) {
                # code...
                $images = str_random(6)."_".$name;
            }
            $file->move("public/upload/cate_project/",$images);
            $category->image = $images;
       }

        // $table = DB::table('category')->insert([
        //         'title' => $request->title,
        //         'descreption' => $request->desc,
        //         'created' => $ldate
        //     ]);
    	
    	$category->save();

    	return redirect('admincp/category-project')->with('message', 'Sửa danh mục dự án thành công !');


    	// echo "<pre>";
    	// var_dump($ldate);
    	// echo "</pre>";
	}
	public function destroy($id){
        $catepro = Catepro::find($id);
        $catepro->delete();

        return redirect('admincp/category-project')->with('message','Xóa danh mục dự án thành công !');
    }

}
