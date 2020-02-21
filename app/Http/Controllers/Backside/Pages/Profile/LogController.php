<?php

namespace App\Http\Controllers\Backside\Pages\Profile;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function get_view(){

        Carbon::setLocale('tr');
        $logs = Auth::user()->log;

        return view('backinterface.pages.profile.log', compact('logs'));
    }
}
