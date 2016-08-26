<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Category;

class SiteController extends Controller
{
    //
    public function index() {
                        	
                        	
    	
        // category project : months, location, cate
    	$cate_pro = DB::table('cate_project')->get();
        // random project infomation
    	$projects_ip = DB::table('project')->inRandomOrder()->limit(6)->get();
        //  project hightlights
        $projects_hl = DB::table('project')->orderBy('project_id','desc')->limit(10)->get();
        //  get news
        $news = DB::table('news')->inRandomOrder()->limit(5)->get();

        
        if($cate_pro && $projects_hl && $projects_ip && $news) {
            return view('site.home',['cate_pro'=> $cate_pro,'projects'=> $projects_ip,'projects_hl'=> $projects_hl,'news'=>$news]);
        }
        else {
            return view('site.layout.error');
        }
    	
    }
    public function getCateProject($alias) {
    	// get cate project by alias
    	$cate_pro = DB::table('cate_project')->where('alias',$alias)->first();
    	// get months by alias
    	$months = DB::table('months')->where('alias',$alias)->first();
    	// get location by alias
    	$location = DB::table('location')->where('alias',$alias)->first();
    	// xet dieu kien neu la category project
    	if($cate_pro && $cate_pro->active == 1){
	    		// get project by catepro = cate project id
	    	$project = DB::table('project')->where('catepro_id',$cate_pro->catepro_id)->paginate(10);
	    	return view('site.list-project',['project'=> $project,'name_lo_cate_month'=> $cate_pro]);
	    	var_dump($project);
    	}
    	// xet dieu kien neu la months
    	elseif($months && $months->active == 1){
	    		// get project by catepro = cate project id
	    	$project = DB::table('project')->where('month_id',$months->month_id)->paginate(10);
	    	return view('site.list-project',['project'=> $project,'name_lo_cate_month'=> $months]);
	    	var_dump($project);

    	}
    	// xet dieu kien neu la location
    	elseif($location && $location->active == 1){
	    		// get project by catepro = cate project id
	    	$project = DB::table('project')->where('location_id',$location->location_id)->paginate(10);
	    	return view('site.list-project',['project'=> $project,'name_lo_cate_month'=> $location]);
	    	var_dump($project);
    	}
    	else {
    		return view('site.layout.error');
    	}

    	
    }
    public function getProject($alias){
        // get project relationship 
    	$projects_rela = DB::table('project')->inRandomOrder()->limit(3)->get();
        // get project detail
    	$project = DB::table('project')->where('alias',$alias)->first();
    	if($project && $projects_rela && $project->active == 1) {
    		return view('site.project-detail',['project'=> $project,'projects_rela'=> $projects_rela]);
    	}
    	else {
    		return view('site.layout.error');
    	}
    	
    }
    //  get all project
    public function getAllProject(){
        $project = DB::table('project')->paginate(6);
        if($project){
            return view('site.list-project',['project'=> $project]);
        }
        else {
            return view('site.layout.error');
        }
        


    }
    // get news detail
    public function getNewsdetail($alias){
        $news_rela = DB::table('news')->inRandomOrder()->limit(3)->get();
        $new = DB::table('news')->where('alias',$alias)->first();
        // var_dump($news_rela);
        if($new && $new->active == 1 && $news_rela){
            return view('site.new-detail',['new'=> $new,'news_rela'=> $news_rela]);
        }
        else {
            return view('site.layout.error');
        }

    }
    public function getAllNews() {
        // $category = DB::table('category')->where('alias',$alias)->first();
        // show only 1 post new
       
        $news = DB::table('news')->paginate(10);
        if($news){
            return view('site.list-news',['news'=> $news]);

        }
        else {
            return view('site.layout.error');
        }

        
    }
    //  get danh mục tin tức
    public function getCateNews($alias) {
        $category = DB::table('category')->where('alias',$alias)->first();
        $news = DB::table('news')->where('category_id',$category->category_id)->paginate(10);
        if($category && $news){
            
            return view('site.list-news',['category'=> $category,'news'=> $news]);
        }
        else {
            return view('site.layout.error');
        }


        
    }
    public function getAbout($alias){
        $category = DB::table('category')->where('alias',$alias)->first();
        $about = DB::table('about')->where('category_id',$category->category_id)->first();
        
        if($category && $about && $about->active == 1){
            
            return view('site.about',['category'=> $category,'about'=> $about]);
        }
        else {
            return view('site.layout.error');
        }
    }
    public function getContact(){
        $contact = DB::table('contact')->first();
        if($contact && $contact->active == 1){
            return view('site.lien-he',['contact' => $contact]);
        }
    }
}
