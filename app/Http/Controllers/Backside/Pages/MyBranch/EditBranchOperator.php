<?php

namespace App\Http\Controllers\Backside\Pages\MyBranch;

use App\Http\Controllers\Controller;
use App\Models\Authority;
use App\Models\Branch;
use App\Models\Pages;
use App\Models\User;
use Illuminate\Http\Request;

class EditBranchOperator extends Controller
{
    public function get_view($id){

        $user = User::find($id);
        $authorities = Pages::where('tab', '!=', 11)->get();

        return view('backinterface.pages.mybranch.operatoredit', compact(['user', 'authorities']));
    }

    public function handle_post(Request $request, $id){
        $name = $request->operator_name;
        $password = $request->password;
        $operator_email = $request->operator_email;
        $operator_phone = $request->operator_phone;
        $address = $request->operator_address;
        $authoriies = $request->authority;

        if(
            trim($name) == '' or
            trim($operator_email) == '' or
            trim($operator_phone) == '' or
            count($authoriies) == 0
        ){
            return redirect('/bayim/operatorler/duzenle/'.$id);
        }else{

            $user = User::find($id);
            $user->user_name = $name;
            $user->email = $operator_email;
            $user->user_phone = $operator_phone;
            $user->user_address = $address;

            if(trim($password) != '')
                $user->password = \Illuminate\Support\Facades\Hash::make($password);


            $user->save();
            $userid = $user->user_id;

            Authority::where('user_id', $id)->delete();

            foreach($authoriies as $authrority){
                $access = new Authority;
                $access->user_id = $userid;
                $access->page_id = $authrority;
                $access->save();
            }

            return redirect('/bayim/operatorler');
        }
    }

    public function handle_delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/bayim/operatorler');
    }
}
