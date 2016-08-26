<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use App\Project;

use App\Catepro;


use DB;

class ProjectController extends Controller
{
    //
    public function index () {
    	$project = DB::table('project')->get();
        

    	return view('admin.project.index',['project'=>$project]);

    	
    }
    public function create() {
    	$catepro = DB::table('cate_project')->get();
        $location = DB::table('location')->get();
        $months = DB::table('months')->get();
    	return view('admin.project.create',['catepro'=> $catepro,'location'=> $location,'months'=> $months]);
    }
     public function store(Request $request){

    	$this->validate($request,[
    		'title' => 'required|min:3'

    		],[
    		'title.required' => 'Vui lòng nhập tiêu đề dự án !',
    		'title.min' => 'Tiêu đề dự án phải nhiều hơn 3 ký tự !',
            
    		]);

    	
    	$project = new Project();

    	$project->title = $request->title;
        $project->desc = $request->desc;
        $project->alias = $request->alias;
        $project->content = $request->content;
        $project->address = $request->address;
        $project->location_id = $request->location_id;
        $project->catepro_id = $request->catepro_id;
        $project->month_id = $request->month_id;

       
       

       if($request->hasFile('img')){
            $file = $request->file('img');
            $name = $file->getClientOriginalname();
            $images = str_random(6)."_".$name;
            while (file_exists("public/upload/project".$images)) {
                # code...
                $images = str_random(6)."_".$name;
            }
            $file->move("public/upload/project/",$images);
            $project->images = $images;
       }

        // $table = DB::table('category')->insert([
        //         'title' => $request->title,
        //         'descreption' => $request->desc,
        //         'created' => $ldate
        //     ]);
    	
    	$project->save();

    	return redirect('admincp/project/create')->with('message', 'Thêm dự án thành công !');


    	// echo "<pre>";
    	// var_dump($ldate);
    	// echo "</pre>";
    		
    }
    public function active (Request $request ,$id){
    	
    	$project = DB::table('project')->where('project_id',$id)->update(['active'=>$request->active]);

    	
    	if($project){
    		return redirect('admincp/project')->with('message', 'Kích hoạt thành công !');
    	}
    	else  {
    		# code...
    		return redirect('admincp/project')->with('message', 'Kích hoạt thật bại !');
    	}

    }
    public function deactive (Request $request ,$id){
    	$project = DB::table('project')->where('project_id',$id)->update(['active'=>$request->active]);
    	if($project){
    		return redirect('admincp/project')->with('message', 'Ngừng kích hoạt thành công !');
    	}
    	else  {
    		# code...
    		return redirect('admincp/project')->with('message', 'Ngừng kích hoạt thật bại !');
    	}

    }
    public function edit ($id){
        $location = DB::table('location')->get();
    	$project = DB::table('project')->where('project_id',$id)->first();
    	$catepro = DB::table('cate_project')->get();
        $months = DB::table('months')->get();
    	return view('admin.project.edit',['project'=> $project,'catepro'=> $catepro,'location'=> $location,'months'=> $months]);
    } 
    public function update(Request $request,$id){

    	$this->validate($request,[
    		'title' => 'required|min:3'

    		],[
    		'title.required' => 'Vui lòng nhập tiêu đề dự án !',
    		'title.min' => 'Tiêu đề dự án phải nhiều hơn 3 ký tự !',
            
    		]);

    	
    	// $project = new Project();

    	// $project->title = $request->title;
     //    $project->desc = $request->desc;
     //    $project->alias = $request->alias;
     //    $project->content = $request->content;
       
       
    	$images_r = "";
       if($request->hasFile('img')){
            $file = $request->file('img');
            $name = $file->getClientOriginalname();
            $images = str_random(6)."_".$name;
            while (file_exists("public/upload/project".$images)) {
                # code...
                $images = str_random(6)."_".$name;
            }
            $file->move("public/upload/project/",$images);
            $images_r = $images;
       }
       else {
            $project = DB::table('project')->where('project_id',$id)->first();
            $images_r = $project->images;
       }

        // $table = DB::table('category')->insert([
        //         'title' => $request->title,
        //         'descreption' => $request->desc,
        //         'created' => $ldate
        //     ]);
    	
    	// $project->save();

    	$project = DB::table('project')->where('project_id',$id)
    	->update([
    		'title' => $request->title,
    		'alias' => $request->alias,
    		'images' => $images_r,
            'address' => $request->address,
            'location_id' => $request->location_id,
    		'desc' => $request->desc,
    		'content' => $request->content,
    		'catepro_id' => $request->catepro_id,
            'month_id' => $request->month_id

    		]);

    	if($project) {
    		return redirect('admincp/project')->with('message', 'Sửa dự án thành công !');
    	}
    	else{
    		return redirect('admincp/project')->with('message', 'Sửa dự án thất bại !');
    	}

    	


    	// echo "<pre>";
    	// var_dump($ldate);
    	// echo "</pre>";
    		
    }
    public function destroy($id){
    	$sql = DB::table('project')->where('project_id',$id)->delete();
    	if($sql){
    		return redirect()->back()->with('message', 'Xóa dự án thành công !');
    	}
    	else {
    		return redirect()->back()->with('message', 'Xóa dự án thất bại !');
    	}
    }

}
