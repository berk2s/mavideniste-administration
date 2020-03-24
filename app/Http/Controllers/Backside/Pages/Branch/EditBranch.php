<?php

namespace App\Http\Controllers\Backside\Pages\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class EditBranch extends Controller
{
    public function get_view($id){
        $branch = Branch::find($id);

        $branch_name = $branch->branch_name;
        $branch_committee = $branch->branch_committee;
        $branch_province = $branch->branch_province;
        $branch_county = $branch->branch_county;

        return view('backinterface.pages.branch.edit', compact(['branch_name', 'branch_province', 'branch_county', 'branch_committee']));
    }

    public function handle_post(Request $request, $id) {
        $branch_name = $request->branch_name;
        $branch_committee = $request->branch_committee;
        $branch_province = $request->branch_province;
        $branch_county = $request->branch_county;

        if(trim($branch_name) == '' or trim($branch_committee) == ''){
            return redirect('/bayi/duzenle/'.$id);
        }

        $branch = Branch::find($id);
        $branch->branch_name = $branch_name;
        $branch->branch_committee = $branch_committee;
        $branch->branch_province = $branch_province;
        $branch->branch_county = $branch_county;
        $branch->save();

        return redirect('/bayi');
    }
}
