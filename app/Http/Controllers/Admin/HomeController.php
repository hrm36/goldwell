<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\News;
use App\Brand;
use App\ColorRoom;
use App\Coll;
use App\Contact;
use App\Media;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $count_p = Product::where('status', 1)->count();
        $count_n = News::where('status', 1)->count();
        $count_b = Brand::where('status', 1)->count();
        $count_c = ColorRoom::where('status', 1)->count();
        $count_cl = Coll::where('status', 1)->count();
        $count_ct = Contact::count();
        $count_img = Media::where('status', 1)->where('type',1)->count();
        $count_video = Media::where('status', 1)->where('type',0)->count();
        return view('admin.home',['flag'=>'dashboard', 'count_p' => $count_p, 'count_n' => $count_n,'count_b' => $count_b,
                            'count_c' => $count_c,'count_cl' => $count_cl,'count_ct' => $count_ct, 
                            'count_img' => $count_img,'count_video' => $count_video]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
