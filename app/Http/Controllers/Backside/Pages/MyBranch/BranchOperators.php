<?php

namespace App\Http\Controllers\Backside\Pages\MyBranch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchOperators extends Controller
{
    public function get_view(){
        $users = auth()->user()->user_branch_info->opereators;
        return view('backinterface.pages.mybranch.operators', compact('users'));
    }
}
