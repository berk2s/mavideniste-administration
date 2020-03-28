<?php

namespace App\Http\Controllers\Backside\Api;

use App\Http\Controllers\Controller;
use App\Models\AppSettings;
use Illuminate\Http\Request;

class AppSettingsApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AppSettings::get());
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
     * @param  \App\Models\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function show(AppSettings $appSettings)
    {
        return response()->json(AppSettings::get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppSettings $appSettings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppSettings $appSettings)
    {
        //
    }
}
