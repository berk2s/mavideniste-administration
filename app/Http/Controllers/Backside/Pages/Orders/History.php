<?php

namespace App\Http\Controllers\Backside\Pages\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class History extends Controller
{
    public function get_view(){
        return view('backinterface.pages.orders.history');
    }
}
