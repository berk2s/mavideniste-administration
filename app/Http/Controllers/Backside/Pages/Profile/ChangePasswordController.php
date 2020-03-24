<?php

namespace App\Http\Controllers\Backside\Pages\Profile;

use App\Http\Controllers\Controller;
use App\Models\Log;
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

            /*
             * checks for security, if shorter than 6, returns false
             */
            if(strlen($new_password) < 6){
                return redirect('/ayarlar/sifre-degistir?short=' . Str::random(5));
            }

            if (Auth::attempt(['email' => Auth::user()->email, 'password' => $current_password])) {

                $user = User::find($user_id);
                $user->password = Hash::make($new_password);
                $user->save();

                /*
                 * record user process
                 */

                $log = new Log;
                $log->user_id = $user_id;
                $log->branch_id = $user->user_branch;
                $log->log_type = 2;
                $log->log_msg = $user->user_name. ' ('.$user_id.') kullanıcı şifresini değiştirdi!';
                $log->save();

                return redirect('/ayarlar/sifre-degistir?success=' . Str::random(5));

            } else {
                return redirect('/ayarlar/sifre-degistir?error=' . Str::random(5));
            }

        }else{
            return redirect('/ayarlar/sifre-degistir?match='.Str::random(5));
        }
    }
}
