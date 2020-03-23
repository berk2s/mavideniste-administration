<?php

namespace App\Http\Controllers\Backside\Pages\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Province;
use Illuminate\Http\Request;

class NewBranch extends Controller
{
    public function get_view(){
        $provinces = Province::get();
        return view('backinterface.pages.branch.new', compact('provinces'));
    }

    public function handle_post(Request $request){
        $branch_name = $request->branch_name;
        $branch_committee = $request->branch_committee;
        $branch_province = $request->branch_province;
        $branch_county = $request->branch_county;

        if(trim($branch_name) == '' or trim($branch_committee) == '') {
            return redirect('/bayi/ekle');
        }

        $addBranch = new Branch;
        $addBranch->branch_name = $branch_name;
        $addBranch->branch_province = $branch_province;
        $addBranch->branch_county = $branch_county;
        $addBranch->branch_committee = $branch_committee;
        $addBranch->save();

        return redirect('/bayi');;
    }
}
