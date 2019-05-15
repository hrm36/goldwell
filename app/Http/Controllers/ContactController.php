<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class ContactController extends Controller
{
    public function index()
    {
        $ct_ = Contact::all();
        return view('admin.contact.list')->with('data',$ct_)->with('flag','user_n');
    }

    public function getCreate()
    {
        return view('font-end.page.contact');
    }

    public function postCreate(Request $request) {
        $this->validate($request,[
            'fullname' => 'required|max:100',
            'sex' => 'required',
            'phone' => 'required|max:100',
            'email' => 'required|email|max:255',
            'city' => 'required|max:100',
            'street' => 'required|max:100',
            'content' => 'required|max:255'
        ]);
        $contact = Contact::create($request->all());
        return view('font-end.page.done');
    }

    public function getEdit($id)
    {
        $ct = Contact::find($id);       
        return view('admin.contact.edit',['contact' => $ct])->with('flag','user_n')->with('thongbao','');
    }

    public function postEdit(Request $request,$id) {
     $this->validate($request,[
        'fullname' => 'required|max:100',
        'sex' => 'required',
        'phone' => 'required|max:100',
        'email' => 'required|email|max:255',
        'city' => 'required|max:100',
        'street' => 'required|max:100',
        'content' => 'required|max:255'
    ]);
     $ct = Contact::find($id);
     $ct->fullname = $request->fullname;
     $ct->sex = $request->sex;
     $ct->email = $request->email;
     $ct->sex = $request->sex;
     $ct->phone = $request->phone;
     $ct->city = $request->city;
     $ct->street = $request->street;
     $ct->save();
     return view('admin.contact.edit',['contact' => $ct])->with('thongbao','Bạn đã sửa thành công!')->with('flag','user_n');
 }
}
