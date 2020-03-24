<?php

namespace App\Http\Controllers\Backside\Pages\Profile;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PreferenceController extends Controller
{
    public function get_view(){
        return view('backinterface.pages.profile.preference');
    }

    public function handle_post(Request $request){
        $darktheme = $request->darktheme;
        $user_id = Auth::user()->user_id;

        $user = User::find($user_id);

        /*
         * enables user's theme preference
         */

        if($darktheme == 'on'){
            $user->is_theme_dark = true;
        }else{
            $user->is_theme_dark = false;
        }
        $user->save();

        /*
         * record user process
        */

        $log = new Log;
        $log->user_id = $user_id;
        $log->branch_id = $user->user_branch;
        $log->log_type = 2;
        $log->log_msg = $user->user_name. ' ('.$user_id.') kullanıcı tercih değiştirdi!';
        $log->save();


        return redirect('/ayarlar/tercihlerim?success='.Str::random(5));
    }
}
