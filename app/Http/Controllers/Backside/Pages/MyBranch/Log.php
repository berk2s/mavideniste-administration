<?php

namespace App\Http\Controllers\Backside\Pages\Mybranch;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Log extends Controller
{
    public function get_view($id){

        Carbon::setLocale('tr');
        $logs = User::find($id)->log;

        return view('backinterface.pages.mybranch.log', compact('logs'));
    }
}
