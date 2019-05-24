<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use Session;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_banner = Banner::all();
        return view('admin.banner.list', ['flag' => 'banner', 'data' => $_banner]);

    }
    public function setupNumber()
    {
        //
        $number_display = config('system.number_display');
        return view('admin.banner.setup', ['flag' => 'num_bst', 'number_display' => $number_display]);

    }
    public function saveNumber(Request $request)
    {
        //
        $number_display = config('system.number_display');
        config(['system.number_display' => $request->number]);
        $fp = fopen(base_path() .'/config/system.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('system'), true) . ';');
        fclose($fp);
        $info_ = config('system.number_display');
        Session::flash('success-number-display', 'Update thành công.');
        return redirect(route('setup-number'));

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.banner.create',['flag'=>'banner']);
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
        Banner::create($request->all());
        Session::flash("success-banner", "Tạo mới banner trang chủ thành công.");
        return redirect(route('banner.create'));
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
        $_bn = Banner::find($id);
        if (!isset($_bn)){
            Session::flash('error-banner', 'Không tìm thấy dữ liệu yêu cầu.');
            return redirect(route('banner.index'));
        }
        return view('admin.banner.edit',['bn' => $_bn , 'flag' => 'banner']);
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
        $_bn = Banner::find($id);
        if (!isset($_bn)){
            Session::flash('error-banner', 'Không tìm thấy dữ liệu yêu cầu.');
            return redirect(route('banner.index'));
        }
        $_bn->update($request->all());
        Session::flash('success-banner', 'Update dữ liệu thành công.');
        return redirect(route('banner.edit',['id' => $id]));
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
        $banner = Banner::find($id);
        if (isset($banner)) $banner->delete();
        Session::flash('success-banner', 'Xóa thành công.');
        return redirect(route('banner.index'));
    }
}
