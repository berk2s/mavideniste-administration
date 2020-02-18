<?php

namespace App\Http\Controllers\Backside\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function get_view(){
        return view('backinterface.pages.dashboard');
    }
}
