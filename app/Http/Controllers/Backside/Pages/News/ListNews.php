<?php

namespace App\Http\Controllers\Backside\Pages\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListNews extends Controller
{
    public function get_view(){
        return view('backinterface.pages.news.list');
    }
}
