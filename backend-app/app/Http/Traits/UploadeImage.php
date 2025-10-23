<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait UploadeImage
{
    public function uploadImage($image, $folder){
        $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($folder), $filename);
        $path = $folder . '/' . $filename;
        return $path;
    }
}
