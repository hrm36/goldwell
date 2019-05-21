<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeoRequest as SeoRequest;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_info = config('seo.info');
        return view('admin.seo.view', ['info' => $_info, 'flag' => 'seo']);
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
    public function show()
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
        $_info = config('seo.info');
        return view('admin.seo.edit', ['info' => $_info, 'flag' => 'seo']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeoRequest $request, $id)
    {
        //
        config(['seo.info.meta' => $request->meta]);
        $fp = fopen(base_path() .'/config/seo.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('seo'), true) . ';');
        fclose($fp);
        $info_ = config('seo.info');
        return view('admin.seo.view',['flag' => 'seo', 'info' => $info_]);

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
