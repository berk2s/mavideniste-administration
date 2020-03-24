<?php

namespace App\Http\Controllers\Backside\Pages\Branch;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OperatorList extends Controller
{
    public function get_view(){
        $users = User::get();
        return view('backinterface.pages.branch.operatorlist', compact('users'));
    }
}
