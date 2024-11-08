<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;


Route::post('/images/upload', [ImageController::class, 'upload'])->name('images.upload');
Route::get('/', [ImageController::class, 'uploadForm'])->name('images.show');
