<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Slider;

use DB;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:3'
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.min' => 'Tiêu đề quá ngắn'
        ]);
        $slider = New Slider();
        $slider->title = $request->title;
        if($request->hasFile('img')){
            $file = $request->file('img');
            $name = $file->getClientOriginalname();
            $images = str_random(6)."_".$name;
            while (file_exists("public/upload/slider".$images)) {
                # code...
                $images = str_random(6)."_".$name;
            }
            $file->move("public/upload/slider/",$images);
            $slider->images = $images;
        }
        $date = date('Y-m-d H:i:s');
        $slider->created_at = $date;
        $slider->save();
        return redirect('admincp/slider/create')->with('message','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|min:3'
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.min' => 'Tiêu đề quá ngắn'
        ]);
        $slider = Slider::find($id);
        $slider->title = $request->title;
        if($request->hasFile('img')){
            $file = $request->file('img');
            $name = $file->getClientOriginalname();
            $images = str_random(6)."_".$name;
            while (file_exists("public/upload/slider".$images)) {
                # code...
                $images = str_random(6)."_".$name;
            }
            $file->move("public/upload/slider/",$images);
            $slider->images = $images;
        }
        $date = date('Y-m-d H:i:s');
        $slider->update_at = $date;
        $slider->save();
        return redirect('admincp/slider')->with('message','Sửa thành công');
    }

    public function active(Request $request,$id) {
        $slider = DB::table('slider')->where('id',$id)->update(['active'=> $request->active]);
        if($slider) {
            return redirect()->back()->with('message','Kích hoạt thành công !');

        }
        else {
            return redirect()->back()->with('message','Kích hoạt thất bại !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return back();
    }
}
