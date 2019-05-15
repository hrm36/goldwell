<?php

namespace App\Http\Controllers;

use App\Quytrinh;
use Illuminate\Http\Request;

class QuytrinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get danh sach san pham
        return view('');

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
     * @param  \App\Quytrinh  $quytrinh
     * @return \Illuminate\Http\Response
     */
    public function show(Quytrinh $quytrinh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quytrinh  $quytrinh
     * @return \Illuminate\Http\Response
     */
    public function edit(Quytrinh $quytrinh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quytrinh  $quytrinh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quytrinh $quytrinh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quytrinh  $quytrinh
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quytrinh $quytrinh)
    {
        //
    }
}
