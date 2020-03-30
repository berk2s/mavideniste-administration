<?php

namespace App\Http\Controllers\Backside\Api;

use App\Http\Controllers\Controller;
use App\Models\Key;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Identity extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = $request->username;
        $random = Str::random(10);

        $user = User::where('email', $username);

        if(!$user->exists()){
            return response()->json(['data' => 'Böyle bir kullanıcı yok!', 'status' => false]);
        }

        $user->update(['key' => $random]);

        $key = new Key;
        $key->key = $random;
        $key->save();

        return response()->json(['data' => $random, 'status' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
