<?php

namespace App\Http\Controllers\Backside\Pages\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewCampaign extends Controller
{
    public function get_view(){
        return view('backinterface.pages.campaign.new');
    }
}
