<?php

namespace App\Http\Controllers\Backside\Pages\Branch;

use App\Http\Controllers\Controller;
use App\Models\Authority;
use App\Models\Branch;
use App\Models\Pages;
use App\Models\User;
use Illuminate\Http\Request;

class NewBranchOperator extends Controller
{
    public function get_view(){
        $branchies = Branch::get();
        $authorities = Pages::get();
        return view('backinterface.pages.branch.newoperator', compact(['branchies', 'authorities']));
    }

    public function handle_post(Request $request){

        $name = $request->operator_name;
        $password = $request->password;
        $operator_email = $request->operator_email;
        $operator_phone = $request->operator_phone;
        $address = $request->operator_address;
        $user_branch = $request->branch;
        $authoriies = $request->authority;

        if(
            trim($name) == '' or
            trim($operator_email) == '' or
            trim($operator_phone) == '' or
            trim($address) == '' or
            trim($password) == '' or
            count($authoriies) == 0
        ){
            return redirect('/bayi/operator/ekle');
        }else{

            $checkPhone = User::where('user_phone', $operator_phone)->exists();
            $checkEmail = User::where('email', $operator_email)->exists();

            if($checkPhone)
                return redirect('/bayi/operator/ekle');

            if($checkEmail)
                return redirect('/bayi/operator/ekle');

            $user = new User;
            $user->user_name = $name;
            $user->email = $operator_email;
            $user->user_phone = $operator_phone;
            $user->user_address = $address;
            $user->user_branch = $user_branch;
            $user->password = \Illuminate\Support\Facades\Hash::make($password);

            if($request->ghost == 'on')
                $user->is_ghost = true;

            $user->save();
            $userid = $user->user_id;

            foreach($authoriies as $authrority){
                $access = new Authority;
                $access->user_id = $userid;
                $access->page_id = $authrority;
                $access->save();
            }

            return redirect('/bayi/operatorler');
        }
    }
}
