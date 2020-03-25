<?php

namespace App\Http\Controllers\Backside\Pages\MyBranch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Complaints extends Controller
{
    public function get_view(){
        $complaints = Complaints::where('branch_id', auth()->user()->user_branch)->get();
        return view('backinterface.pages.mybranch.complaints', compact('complaints'));
    }
}
