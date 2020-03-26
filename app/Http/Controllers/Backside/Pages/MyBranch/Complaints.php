<?php

namespace App\Http\Controllers\Backside\Pages\MyBranch;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Complaints extends Controller
{
    public function get_view(){
        Carbon::setLocale('tr');
        $complaints = Complaint::where('branch_id', auth()->user()->user_branch)->orderBy('complaint_id', 'DESC')->get();
        return view('backinterface.pages.mybranch.complaints', compact('complaints'));
    }
}
