<?php

namespace App\Http\Controllers\Backside\Partials;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(){

        /*
            * Record user process
            */

        $log = new Log;
        $log->user_id = Auth::user()->user_id;
        $log->branch_id = Auth::user()->user_branch;
        $log->log_type = 4;
        $log->log_msg = Auth::user()->user_name. ' ('.Auth::user()->user_id.') kullanıcı çıkış yaptı!';
        $log->save();
        Auth::logout();
        return redirect('/');
    }
}
