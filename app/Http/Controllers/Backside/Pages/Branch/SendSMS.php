<?php

namespace App\Http\Controllers\Backside\Pages\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendSMS extends Controller
{
    public function get_view(){
        return view('backinterface.pages.branch.sendsms');
    }
}
