<?php

namespace App\Http\Controllers\Backside\Pages\Branch;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Log extends Controller
{
    public function get_view($id){

        Carbon::setLocale('tr');
        $logs = User::find($id)->log;

        return view('backinterface.pages.branch.log', compact('logs'));
    }
}
