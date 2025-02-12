<?php

namespace App\Http\Controllers;

use App\Models\Ram;
use App\Http\Requests\StoreRamRequest;
use App\Http\Requests\UpdateRamRequest;

class RamController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ram  $ram
     * @return \Illuminate\Http\Response
     */
    public function show(Ram $ram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ram  $ram
     * @return \Illuminate\Http\Response
     */
    public function edit(Ram $ram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRamRequest  $request
     * @param  \App\Models\Ram  $ram
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRamRequest $request, Ram $ram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ram  $ram
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ram $ram)
    {
        //
    }
}
