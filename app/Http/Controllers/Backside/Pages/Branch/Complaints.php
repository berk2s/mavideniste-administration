<?php

namespace App\Http\Controllers\Backside\Pages\Branch;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Complaints extends Controller
{
    public function get_view(){
        Carbon::setLocale('tr');
        $complaints = Complaint::orderBy('complaint_id', 'DESC')->get();
        return view('backinterface.pages.branch.complaints', compact('complaints'));
    }
}
