<?php

namespace App\Http\Controllers\Backside\Pages\Orders;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserHistory extends Controller
{
    public function get_view($id){

        Carbon::setLocale('tr');
        $datetime = Carbon::now('Europe/Istanbul');

        $client = new Client();

        $request = $client->request(
            'GET',
            'http://192.168.1.106:3000/api/p/orders/user/history/'.$id,
            ['headers' => ['x-api-key' => '56595339-71a8-46e6-a890-700620d6a9ae']]);

        $results =  json_decode($request->getBody());


        return view('backinterface.pages.orders.userhistory', compact(['datetime', 'results']));
    }
}
