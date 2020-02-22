<?php

namespace App\Http\Controllers\Backside\Pages\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewProductController extends Controller
{
    public function get_view(){
        return view('backinterface.pages.product.new');
    }
}
