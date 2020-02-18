<?php

namespace App\Http\Controllers\Backside\Pages\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChangePasswordController extends Controller
{
    public function get_view(){
        $user = Auth::user();
        return view('backinterface.pages.profile.password', compact('user'));
    }

    public function handle_post(Request $request){
        $current_password = $request->current_password;
        $new_password = $request->new_password;
        $renew_password = $request->renew_password;
        $user_id = $request->user_id;

        if($new_password == $renew_password) {

            if (Auth::attempt(['email' => Auth::user()->email, 'password' => $current_password])) {

                $user = User::find($user_id);
                $user->password = Hash::make($new_password);
                $user->save();

                return redirect('/sifre-degistir?success=' . Str::random(5));

            } else {
                return redirect('/sifre-degistir?error=' . Str::random(5));
            }

        }else{
            return redirect('/sifre-degistir?match='.Str::random(5));
        }
    }
}
