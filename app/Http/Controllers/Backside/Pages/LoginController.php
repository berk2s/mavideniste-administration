<?php

namespace App\Http\Controllers\Backside\Pages;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function get_view(){
        return view('backinterface.pages.login');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){

            /*
             * Record user process
             */

            $log = new Log;
            $log->user_id = Auth::user()->user_id;
            $log->branch_id = Auth::user()->user_branch;
            $log->log_type = 4;
            $log->log_msg = Auth::user()->user_name. ' ('.Auth::user()->user_id.') kullanıcı giriş yaptı!';
            $log->save();


            return redirect('/anasayfa');
        }else{
            return redirect('/');
        }
    }
}
