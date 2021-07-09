<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageUpload;

class ImageUploadController extends Controller
{
    function upload(Request $request){
        if ($request->hasFile('img'))
        {
            $image_array = $request->file('img');
            $array_len = count($image_array);

            for ($i=0;$i<$array_len;$i++)
            {
                $image_ext = $image_array[$i]->getClientOriginalExtension();
                $new_image_name = rand(123456,999999).".".$image_ext;
                $destination_path = public_path('/image');
                $image_array[$i] -> move($destination_path,$new_image_name);

                $imageupload = new ImageUpload;
                $imageupload->image_name = $new_image_name;

                $imageupload->save();

            }
            return redirect()->back()->with('msg','Image Uploaded successfully');
        }
        else
        {
            return back()->with('img','please choose any image');
        }
    }
}
