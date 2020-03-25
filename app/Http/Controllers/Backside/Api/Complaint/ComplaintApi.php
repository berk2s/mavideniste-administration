<?php

namespace App\Http\Controllers\Backside\Api\Complaint;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintApi extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch_id = $request->branch_id;
        $user_name = $request->user_name;
        $user_phone = $request->user_phone;
        $user_id = $request->user_id;
        $order = $request->order;
        $order_id = $request->order_id;
        $complaintText = $request->complaint;

        $complaint = new Complaint;
        $complaint->branch_id = $branch_id;
        $complaint->user_name = $user_name;
        $complaint->user_phone = $user_phone;
        $complaint->user_id = $user_id;
        $complaint->order = $order;
        $complaint->order_id = $order_id;
        $complaint->complaint = $complaintText;
        $complaint->save();

        return response()->json(['status' => 'ok']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
