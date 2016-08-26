<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;

use App\Contact;

use DB;

use App\Http\Requests;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();
        return view('admin.contact.index',compact('contact'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
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
            'title' => 'required|min:5',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'map' => 'required'
            ],[
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.min' => 'Tiêu đề không được dưới 5 kí tự',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'email.required' => 'Vui lòng nhập địa chỉ Email',
            'map.required' => 'Vui lòng nhập bản đồ'
        ]);

        $contact = new Contact();

        $contact->title = $request->title;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->fax = $request->fax;
        $contact->email = $request->email;
        $contact->map = $request->map;
        $date = date('Y-m-d H:i:s');
        $contact->created = $date;
        $contact->save();
        return redirect('admincp/contact/create')->with('message','Thêm thành công');
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
        $contact = Contact::find($id);
        return view('admin.contact.edit',compact('contact'));
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
            'title' => 'required|min:5',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'map' => 'required'
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.min' => 'Tiêu đề không được dưới 5 kí tự',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'email.required' => 'Vui lòng nhập địa chỉ Email',
            'map.required' => 'Vui lòng nhập bản đồ'
        ]);

        $contact = Contact::find($id);
        $contact->title = $request->title;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->fax = $request->fax;
        $contact->email = $request->email;
        $contact->map = $request->map;
        $date = date('Y-m-d H:i:s');
        $contact->modified = $date;
        $contact->save();
        return redirect('admincp/contact')->with('message','Sửa thành công');
    }

    public function active(Request $request,$id) {
        $news = DB::table('contact')->where('id',$id)->update(['active'=> $request->active]);
        if($news) {
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
        $contact = Contact::find($id);
        $contact->delete();
        return back();

    }
}
