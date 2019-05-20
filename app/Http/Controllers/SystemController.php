<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SystemRequest as SystemRequest;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_info = config('sys_page.info');
        return view('admin.system.view', ['info' => $_info, 'flag' => 'info']);
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
        $_info = config('sys_page.info');
        return view('admin.system.edit', ['info' => $_info, 'flag' => 'info_page']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SystemRequest $request, $id)
    {
        //
        config(['system.info.logo' => $request->logo]);
        config(['system.info.facebook' => $request->facebook]);
        config(['system.info.phone' => $request->phone]);
        config(['system.info.open_time' => $request->open_time]);
        config(['system.info.address' => $request->address]);
        $fp = fopen(base_path() .'/config/system.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('system'), true) . ';');
        fclose($fp);
        $info_ = config('system.info');
        return view('admin.system.view',['flag' => 'info_page', 'info' => $info_]);

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
