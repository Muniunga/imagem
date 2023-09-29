<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// Rota para listar imagens
Route::get('/images', [ImageController::class, 'index']);

// Rota para fazer upload de uma imagem
Route::post('/images/upload', [ImageController::class, 'upload'])->name('upload.image');


  