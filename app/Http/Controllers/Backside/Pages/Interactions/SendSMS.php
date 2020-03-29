<?php

namespace App\Http\Controllers\Backside\Pages\Interactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendSMS extends Controller
{
    public function get_view(){
        return view('backinterface.pages.interactions.sms');
    }
}
