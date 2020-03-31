<?php

namespace App\Http\Controllers\Backside\Pages\Branch;

use App\Http\Controllers\Controller;
use App\Models\BranchRequests;
use Illuminate\Http\Request;

class RequestBranch extends Controller
{
    public function get_view(){
        $requests = BranchRequests::get();
        return view('backinterface.pages.branch.requestbranch', compact('requests'));
    }
}
