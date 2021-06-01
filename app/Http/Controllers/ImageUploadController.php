<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageUploadController extends Controller
{
    public function imageUploadPost(Request $request)

    {        
        request()->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension(); 

        request()->image->move(public_path('images'), $imageName);
        auth()->user()->images()->create([
            'title'=> $request->title,
            'image'=> $imageName
            ]);
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

    public function showImage()
    {
        dd(Image::all());
    }
}
