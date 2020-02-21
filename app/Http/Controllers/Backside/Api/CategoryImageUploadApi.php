<?php

namespace App\Http\Controllers\Backside\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class CategoryImageUploadApi extends Controller
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
        $image = $request->dataimage;

        /*
         *  `$imageName` hold the unique name
         *
         */
        $imageName = time().'.'.explode('/', explode(':', substr($image,0 , strpos($image, ';')))[1])[1];

        try{
            $image_ = \Intervention\Image\Facades\Image::make($image);
            /*
             * resize to app's list format
             */
            $image_->resize(100, 80);
            $image_->save(public_path('mod/img/category/').$imageName);
        }catch(Intervention\Image\Exception\NotReadableException $e){
            return response()->json(['status' => ['state' => false, 'code' => 'UC_0']]);
        }

        return response()->json(['status' => ['state' => true, 'code' => 'UC_1', 'imagename' => $imageName]]);
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
