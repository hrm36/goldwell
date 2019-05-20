<?php

namespace App\Http\Controllers;

use App\Media;
use App\Coll;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MediaRequest as MediaRequest;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medias = Media::where('status', 1)->get();
        return view('admin.media.list', ['flag'=>'media_l', 'medias'=>$medias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $colls = Coll::orderby('created_at', 'DESC')->where('status', 1)->get();
        if($colls->count() == 0){
            Session::flash('error', 'Phải tạo bộ sưu tập trước khi tạo media');
            return redirect(route('coll.create'));
        }else return view('admin.media.create', ['flag'=>'media_n', 'colls' => $colls]);
       
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaRequest $request)
    {
        //
        Media::create($request->all());
        Session::flash('success', 'Thêm mới media vào bộ sưu tập.');
        return redirect(route('media.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $media = Media::find($id);
        if (!isset($media))   abort(404);
        $colls = Coll::orderby('created_at', 'DESC')->where('status', 1)->get();
        if($colls->count() == 0){
            Session::flash('error', 'Phải tạo bộ sưu tập trước khi tạo media');
            return redirect(route('coll.create'));
        }else return view('admin.media.edit', ['flag'=>'media_l', 'colls' => $colls, 'media'=>$media]);  
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(MediaRequest $request, $id)
    {
        //
        $media = Media::find($id); 
        $media->update($request->all());
        Session::flash('success', 'Update thành công.');     
        return redirect(route('media.edit',['id'=>$id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $media = Media::find($id);
        if (isset($media)) $media->delete();
        Session::flash('success', 'Xóa thành công.');
        return redirect(route('media.index')); 
    }
}
