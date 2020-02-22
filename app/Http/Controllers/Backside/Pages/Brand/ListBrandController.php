<?php

namespace App\Http\Controllers\Backside\Pages\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListBrandController extends Controller
{
    public function get_view(){
        return view('backinterface.pages.brand.list');
    }
}
