<?php

namespace App\Http\Controllers\Backside\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Analytics\AnalyticsFacade as Analytics;

use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    public function get_view(){

        return view('backinterface.pages.dashboard');
    }
}
