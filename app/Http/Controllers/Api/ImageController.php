<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return response()->json($images);
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

        return response()->json(['message' => 'Imagem enviada com sucesso.']);
    }

    public function showUploadForm()
    {
        // Este método não é necessário em uma API, pois ele normalmente renderizaria uma view HTML.
        // Você pode removê-lo ou mantê-lo se desejar.
    }
}
