<?php

namespace App\Http\Controllers\Backside\Pages\Profile;

use App\Http\Controllers\Controller;
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
        if($darktheme == 'on'){
            $user->is_theme_dark = true;
        }else{
            $user->is_theme_dark = false;
        }
        $user->save();

        return redirect('/tercihlerim?success='.Str::random(5));
    }
}
