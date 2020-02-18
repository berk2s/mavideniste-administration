<?php

namespace App\Http\Controllers\Backside\Pages;

use App\Http\Controllers\Controller;
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
            return redirect('/anasayfa');
        }else{
            return redirect('/');
        }
    }
}
