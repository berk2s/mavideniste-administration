<?php

namespace App\Http\Controllers\Backside\Pages\Coupon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListCoupon extends Controller
{
    public function get_view(){
        return view('backinterface.pages.coupon.list');
    }
}
