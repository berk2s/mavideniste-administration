<?php

namespace App\Http\Controllers\Backside\Pages\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class NewCoupon extends Controller
{
    public function get_view(){
        $coupon_name = 'MAVIDEN'.mt_rand(1,1000000);
        $branch = auth()->user()->user_branch_info;
        return view('backinterface.pages.coupon.new', compact(['coupon_name', 'branch']));
    }
}
