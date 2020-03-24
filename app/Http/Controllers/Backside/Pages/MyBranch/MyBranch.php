<?php

namespace App\Http\Controllers\Backside\Pages\MyBranch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyBranch extends Controller
{
    public function get_view(){
        $branch = auth()->user()->user_branch_info;
        return view('backinterface.pages.mybranch.mybranch', compact('branch'));
    }
}
