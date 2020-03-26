<?php

namespace App\Http\Controllers\Backside\Pages\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewSubCategory extends Controller
{
    public function get_view(){
        return view('backinterface.pages.category.newsub');
    }
}
