<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadForm()
    {
        $images = Image::all();
        return view('upload', compact('images'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->file('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $filepath = 'images/' . $imageName;

            Image::create(['filepath' => $filepath]);

            return redirect()->route('images.show');
        }

        return back()->withErrors(['msg' => 'Image upload failed.']);
    }

}
