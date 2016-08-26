<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Datatables;

use Illuminate\Html\HtmlServiceProvider;

use Illuminate\Html\FormFacade;



use DB;

use URL;

use App\Category;

use Form;


class CategoryController extends Controller
{
    //
     public function index()
    {
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

/**
 * Process datatables ajax request.
 *
 * @return \Illuminate\Http\JsonResponse
 */
    
    public function create() {
        $category = Category::all();
       
    	return view('admin.category.create',compact('category'));
    }
    public function store(Request $request){

    	$this->validate($request,[
    		'name' => 'required|min:3|unique:category'

    		],[
    		'name.required' => 'Vui lòng nhập tên danh mục !',
    		'name.min' => 'Tên danh mục phải nhiều hơn 3 ký tự !',
            'name.unique' => 'Tên danh mục đã tồn tại !'
    		]);

    	
    	$category = new Category();

    	$category->name = $request->name;
        $category->desc = $request->desc;
        $category->alias = $request->alias;
        $category->parent_id = $request->parent_id;
       

       if($request->hasFile('img')){
            $file = $request->file('img');
            $name = $file->getClientOriginalname();
            $images = str_random(6)."_".$name;
            while (file_exists("public/upload/category".$images)) {
                # code...
                $images = str_random(6)."_".$name;
            }
            $file->move("public/upload/category/",$images);
            $category->image = $images;
       }

        // $table = DB::table('category')->insert([
        //         'title' => $request->title,
        //         'descreption' => $request->desc,
        //         'created' => $ldate
        //     ]);
    	
    	$category->save();

    	return redirect('admincp/menu')->with('message', 'Thêm danh mục thành công !');


    	// echo "<pre>";
    	// var_dump($ldate);
    	// echo "</pre>";
    		
    }
    public function destroy($id)
    {

        $category = DB::table('category')->where('category_id',$id)->first();
        if($category->parent_id == 0){
            return redirect()->back()->with('message','Bạn phải xóa danh mục con trước !');
        }
        else {
            DB::table('category')->where('category_id',$id)->delete();
            return redirect('admincp/menu')->with('message','Xóa danh mục thành công !');
        }
       
    }
    public function active(Request $request,$id){
        
        $category = Category::find($id);
        $category->active = $request->active;
        $category->save();
        return redirect()->back()->with('message','Kích hoạt thành công !');
    }
    public function deactive(Request $request,$id){

        $category = Category::find($id);

        $category->active = $request->active;
        $category->save();
        return redirect()->back()->with('message','Ngừng kích hoạt thành công !');
    }
    public function edit($id){
        $category = DB::table('category')->where('category_id',$id)->first();
        $categorys = Category::all();
        return view('admin.category.edit',['category' => $category,'categorys'=> $categorys]);
    
    }
    public function update(Request $request,$id){

        $this->validate($request,[
            'name' => 'required|min:3'

            ],[
            'name.required' => 'Vui lòng nhập tên danh mục !',
            'name.min' => 'Tên danh mục phải nhiều hơn 3 ký tự !',
            
            ]);

        
        $category = Category::find($id);

        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->alias = $request->alias;
        $category->parent_id = $request->parent_id;
       

       if($request->hasFile('img')){
            $file = $request->file('img');
            $name = $file->getClientOriginalname();
            $images = str_random(6)."_".$name;
            while (file_exists("public/upload/category".$images)) {
                # code...
                $images = str_random(6)."_".$name;
            }
            $file->move("public/upload/category/",$images);
            $category->image = $images;
       }

        // $table = DB::table('category')->insert([
        //         'title' => $request->title,
        //         'descreption' => $request->desc,
        //         'created' => $ldate
        //     ]);
        
        $category->save();

        return redirect('admincp/menu')->with('message', 'Chỉnh sửa danh mục thành công !');


        // echo "<pre>";
        // var_dump($ldate);
        // echo "</pre>";
            
    }
}
