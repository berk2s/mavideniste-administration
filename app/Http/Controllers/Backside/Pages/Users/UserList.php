<?php

namespace App\Http\Controllers\Backside\Pages\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserList extends Controller
{
    public function get_view(){
        return view('backinterface.pages.users.list');
    }
}
