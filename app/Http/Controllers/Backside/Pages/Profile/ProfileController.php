<?php

namespace App\Http\Controllers\Backside\Pages\Profile;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function get_view(){
        $user = Auth::user();
        return view('backinterface.pages.profile.profile', compact('user'));
    }

    public function handle_post(Request $request){
        $user_name = $request->user_name;
        $user_phone = $request->user_phone;
        $user_address = $request->user_address;
        $user_id = $request->user_id;

        /*
         * updates user's information
         */

        $user = User::find($user_id);
        $user->user_name = $user_name;
        $user->user_phone = $user_phone;
        $user->user_address = $user_address;
        $user->save();

        $log = new Log;
        $log->user_id = $user_id;
        $log->branch_id = $user->user_branch;
        $log->log_type = 2;
        $log->log_msg = $user->user_name. ' ('.$user_id.') kullanıcı bilgilerini değiştirdi!';
        $log->save();

        return redirect('/profilim?token='.Str::random(10));
    }
}
