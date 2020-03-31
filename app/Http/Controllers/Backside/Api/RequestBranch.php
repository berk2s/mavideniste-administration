<?php

namespace App\Http\Controllers\Backside\Api;

use App\Http\Controllers\Controller;
use App\Models\BranchRequests;
use Illuminate\Http\Request;

class RequestBranch extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $lastname = $request->lastname;
        $phone_number = $request->phone_number;
        $province = $request->province;
        $bio = $request->bio;

        $branchrequest = new BranchRequests;
        $branchrequest->name_surname = $name." ".$lastname;
        $branchrequest->province_id = $province;
        $branchrequest->bio = $bio;
        $branchrequest->phone_number = $phone_number;
        $branchrequest->save();

        return response()->json([]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BranchRequests  $branchRequests
     * @return \Illuminate\Http\Response
     */
    public function show(BranchRequests $branchRequests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BranchRequests  $branchRequests
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchRequests $branchRequests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BranchRequests  $branchRequests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BranchRequests $branchRequests)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BranchRequests  $branchRequests
     * @return \Illuminate\Http\Response
     */
    public function destroy(BranchRequests $branchRequests)
    {
        //
    }
}
