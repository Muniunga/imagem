<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    //
    public function index()
{
    $images = Image::all();
    return view('images.index', compact('images'));
}

public function upload(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imageName = time() . '.' . $request->image->extension();

    $request->image->storeAs('public', $imageName);

    $image = new Image();
    $image->name = $imageName;
    $image->path = $imageName;
    $image->save();

    return redirect()->back()->with('success', 'Imagem enviada com sucesso.');
}
public function showUploadForm()
{
    return view('upload.form');
}
}
