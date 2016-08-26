<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// front-end
// Route::get('tong-quan-cong-ty', function(){
// 	return view('site.tong-quan-cong-ty');
// });
// Route::get('can-bo-chu-chot', function(){
// 	return view('site.can-bo-chu-chot');
// });
// Route::get('co-cau-to-chuc', function(){
// 	return view('site.co-cau-to-chuc');
// });
// Route::get('thu-danh-gia', function(){
// 	return view('site.thu-danh-gia');
// });
// Route::get('khach-hang-doi-tac', function(){
// 	return view('site.khach-hang-doi-tac');
// });
// Route::get('chung-chi-iso', function(){
// 	return view('site.chung-chi-iso');
// });
// Route::get('an-toan-lao-dong', function(){
// 	return view('site.an-toan-lao-dong');
// });
// Route::get('chinh-sach-nhan-su', function(){
// 	return view('site.chinh-sach-nhan-su');
// });
// Route::get('nang-luc-thiet-bi-thi-cong', function(){
// 	return view('site.nang-luc-thiet-bi-thi-cong');
// });
// Route::get('nhung-cai-tien-trong-co-cau-to-chuc', function(){
// 	return view('site.nhung-cai-tien-trong-co-cau-to-chuc');
// });
// Route::get('tin-cong-ty', function(){
// 	return view('site.tin-cong-ty');
// });
// Route::get('tin-cong-trinh', function(){
// 	return view('site.tin-cong-trinh');
// });
// Route::get('tin-doan-the', function(){
// 	return view('site.tin-doan-the');
// });
// Route::get('tin-thi-truong', function(){
// 	return view('site.tin-thi-truong');
// });
// Route::get('thong-tin-co-dong', function(){
// 	return view('site.thong-tin-co-dong');
// });
// Route::get('thiet-ke-thi-cong', function(){
// 	return view('site.thiet-ke-thi-cong');
// });
// Route::get('thoi-gian', function(){
// 	return view('site.thoi-gian');
// });
// Route::get('bat-dong-san', function(){
// 	return view('site.bat-dong-san');
// });
// Route::get('tai-lieu', function(){
// 	return view('site.tai-lieu');
// });
// Route::get('tuyen-dung', function(){
// 	return view('site.tuyen-dung');
// });
// Route::get('lien-he', function(){
// 	return view('site.lien-he');
// });


Route::get('','SiteController@index');
// get category Project
Route::get('danh-muc/du-an/{alias}', 'SiteController@getCateProject');
// get Project
Route::get('du-an/{alias}', 'SiteController@getProject');
// get All project
Route::get('du-an/', 'SiteController@getAllProject');
// get new detail
Route::get('tin-tuc/{alias}', 'SiteController@getNewsdetail');
Route::get('tin-tuc/', 'SiteController@getAllNews');
Route::get('danh-muc/tin-tuc/{alias}', 'SiteController@getCateNews');
// get about
Route::get('gioi-thieu/{alias}', 'SiteController@getAbout');
// get contact
Route::get('lien-he', 'SiteController@getContact');




// back-end
Route::get('/login','UserController@getLogin');
Route::post('dangnhap','UserController@postDangnhap')->name('dangnhap');
Route::get('logout','UserController@logout');




Route::group(['middleware' => 'auth'], function(){

	Route::group(['prefix' => 'admincp'],function(){
		Route::get('/',function(){
			return view('admin.index');
		});
	
		// menu
		Route::post('menu/deactive/{id}', 'CategoryController@deactive')->name('menu/deactive');
	    Route::post('menu/active/{id}', 'CategoryController@active')->name('menu/active');
	     Route::get('menu/destroy/{id}', 'CategoryController@destroy');

		Route::resource('menu', 'CategoryController');

		// user
		Route::post('user/deactive/{id}', 'UserController@deactive')->name('user/deactive');
	    Route::post('user/active/{id}', 'UserController@active')->name('user/active');
		Route::resource('user','UserController');

		


		// project
		Route::post('project/deactive/{id}','ProjectController@deactive')->name('project/deactive');
		Route::post('project/active/{id}','ProjectController@active')->name('project/active');
		Route::get('project/destroy/{id}','ProjectController@destroy');
		Route::resource('project','ProjectController');

		// category project
		Route::post('category-project/deactive/{id}','CateproController@deactive')->name('category-project/deactive');
		Route::post('category-project/active/{id}','CateproController@active')->name('category-project/active');
		Route::resource('category-project','CateproController');

		// Location project
		Route::get('location/destroy/{id}','LocationController@destroy');
		Route::post('location/deactive/{id}','LocationController@deactive')->name('location/deactive');
		Route::post('location/active/{id}','LocationController@active')->name('location/active');
		Route::resource('location','LocationController');

		// months 

		Route::get('months/destroy/{id}','MonthController@destroy');
		Route::post('months/deactive/{id}','MonthController@deactive')->name('months/deactive');
		Route::post('months/active/{id}','MonthController@active')->name('months/active');
		Route::resource('months','MonthController');


		// months 

		Route::get('news/destroy/{id}','NewsController@destroy');
		Route::post('news/deactive/{id}','NewsController@deactive')->name('news/deactive');
		Route::post('news/active/{id}','NewsController@active')->name('news/active');
		Route::resource('news','NewsController');


		 //contact - viet
        Route::resource('contact', 'ContactController');
        Route::get('contact/destroy/{id}','ContactController@destroy');
        Route::post('contact/deactive/{id}','ContactController@deactive')->name('contact/deactive');
        Route::post('contact/active/{id}','ContactController@active')->name('contact/active');

        //slider - viet
        Route::resource('slider', 'SliderController');
        Route::get('slider/destroy/{id}','SliderController@destroy');
        Route::post('slider/deactive/{id}','SliderController@deactive')->name('slider/deactive');
        Route::post('slider/active/{id}','SliderController@active')->name('slider/active');

        //about - viet
        Route::get('about/destroy/{id}','AboutController@destroy');
        Route::post('about/deactive/{id}','AboutController@deactive')->name('about/deactive');
        Route::post('about/active/{id}','AboutController@active')->name('about/active');
        Route::resource('about','AboutController');



	// 


	


	});
});

Route::group(['middleware' => 'auth'],function(){
	Route::group(['prefix' => 'cmadmin'],function(){

		Route::resource('user','Customer\CustomerController');

		Route::resource('restaurant','Customer\RestaurantController');
		// mealtype
		Route::post('mealtype/deactive/{id}','Customer\MealtypeController@deactive')->name('mealtype/deactive');
		Route::post('mealtype/active/{id}','Customer\MealtypeController@active')->name('mealtype/active');
		Route::get('mealtype/destroy/{id}','Customer\MealtypeController@destroy')->name('mealtype/destroy');
		Route::resource('mealtype','Customer\MealtypeController');


		// meal
		Route::post('meal/deactive/{id}','Customer\MealController@deactive')->name('meal/deactive');
		Route::post('meal/active/{id}','Customer\MealController@active')->name('meal/active');
		Route::get('meal/destroy/{id}','Customer\MealController@destroy')->name('meal/destroy');
		Route::resource('meal','Customer\MealController');



		
	});

});





//  xử lý ajax boot
Route::controller('category','CategoryController',[
		'anyData' => 'category.data',
		]);