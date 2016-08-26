<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\News;

class NewsController extends Controller
{
    //
    public function index() {
    	$news = DB::table('news')->orderBy('new_id','DESC')->get();
    	return  view('admin.news.index',['news'=> $news]);
    }
    public function create () {
    	$category_parent = DB::table('category')->where('alias','tin-tuc')->first();
        if($category_parent) {
            $category_child = DB::table('category')->where('parent_id',$category_parent->category_id)->get();
            return view('admin.news.create',['category' => $category_child]);
        }
        else {
            return view('admin.index');
        }
    	
    }
    public function store(Request $request){

    	$this->validate($request,[
    		'title' => 'required|min:3:unique:news'

    		],[
    		'title.required' => 'Vui lòng nhập tiêu đề dự án !',
    		'title.min' => 'Tiêu đề dự án phải nhiều hơn 3 ký tự !',
            'title.unique' => 'Tiêu đề đã tồn tại !',
            
    		]);

    	
    	$news = new News();

    	$news->title = $request->title;
        $news->content = $request->content;
        $news->alias = $request->alias;
        $news->desc = $request->desc;
        
        $news->category_id = $request->category_id;

       
       

       if($request->hasFile('img')){
            $file = $request->file('img');
            $name = $file->getClientOriginalname();
            $images = str_random(6)."_".$name;
            while (file_exists("public/upload/news".$images)) {
                # code...
                $images = str_random(6)."_".$name;
            }
            $file->move("public/upload/news/",$images);
            $news->image = $images;
       }

        // $table = DB::table('category')->insert([
        //         'title' => $request->title,
        //         'descreption' => $request->desc,
        //         'created' => $ldate
        //     ]);
    	
    	$news->save();

    	return redirect('admincp/news')->with('message', 'Thêm tin mới thành công !');


    	// echo "<pre>";
    	// var_dump($ldate);
    	// echo "</pre>";
    		
    }
    public function active(Request $request,$id) {
    	$news = DB::table('news')->where('new_id',$id)->update(['active'=> $request->active]);
    	if($news) {
    		return redirect()->back()->with('message','Kích hoạt thành công !');

    	}
    	else {
    		return redirect()->back()->with('message','Kích hoạt thất bại !');
    	}
    }
    public function edit($id){
        $category_parent = DB::table('category')->where('alias','tin-tuc')->first();
        $news = DB::table('news')->where('new_id',$id)->first();
        if($category_parent && $id) {
            $category_child = DB::table('category')->where('parent_id',$category_parent->category_id)->get();
             
        
            return view('admin.news.edit',['news'=> $news,'category'=> $category_child]);
            
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

        
        $news = News::find($id);

        $news->title = $request->title;
        $news->content = $request->content;
        $news->alias = $request->alias;
        
        $news->category_id = $request->category_id;
        $news->desc = $request->desc;

       
       

       if($request->hasFile('img')){
            $file = $request->file('img');
            $name = $file->getClientOriginalname();
            $images = str_random(6)."_".$name;
            while (file_exists("public/upload/news".$images)) {
                # code...
                $images = str_random(6)."_".$name;
            }
            $file->move("public/upload/news/",$images);
            $news->image = $images;
       }

        // $table = DB::table('category')->insert([
        //         'title' => $request->title,
        //         'descreption' => $request->desc,
        //         'created' => $ldate
        //     ]);
        
        $news->save();

        return redirect('admincp/news')->with('message', 'Cập nhập tin mới thành công !');


        // echo "<pre>";
        // var_dump($ldate);
        // echo "</pre>";
            
    }
    public function destroy($id){
        $news = DB::table('news')->where('new_id',$id)->delete();
        if($news){
            return redirect()->back()->with('message','Xóa tin thành công !');
        }
        else {
            return redirect()->back()->with('message','Xóa tin thất bại !');
        }
    }
}
