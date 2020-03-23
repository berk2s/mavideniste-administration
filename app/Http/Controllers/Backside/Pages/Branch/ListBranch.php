<?php

namespace App\Http\Controllers\Backside\Pages\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class ListBranch extends Controller
{
    public function get_view(){

        $branchs = Branch::get();

        return view('backinterface.pages.branch.list', compact('branchs'));

    }


    public function pause_branch($id){

        $branch = Branch::find($id);
        $branch->status = false;
        $branch->save();

        return redirect('/bayi');

    }

    public function delete_branch($id){

        $branch = Branch::find($id);
        $branch->delete();

        return redirect('/bayi');

    }

    public function play_branch($id){

        $branch = Branch::find($id);
        $branch->status = true;

        $branch->save();

        return redirect('/bayi');

    }

}
