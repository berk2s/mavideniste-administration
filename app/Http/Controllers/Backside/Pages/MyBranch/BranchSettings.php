<?php

namespace App\Http\Controllers\Backside\Pages\MyBranch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchSettings extends Controller
{
    public function get_view(){
        $branch = auth()->user()->user_branch_info;
        return view('backinterface.pages.mybranch.settings', compact('branch'));
    }

    public function handle_post(Request $request){
        $branch_committee = $request->branch_committee;

        if(trim($branch_committee) == ''){
            return redirect('/bayim/ayarlar');
        }else{
            $branch = auth()->user()->user_branch_info->branch_id;
            $branch_ = Branch::find($branch);
            $branch_->branch_committee = $branch_committee;
            $branch_->save();
            return redirect('/bayim');
        }

    }
}
