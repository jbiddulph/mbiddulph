<?php

use App\Gallery;
use App\Http\Controllers\ArtworkAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/artwork', [ArtworkAPIController::class, 'index']);
Route::get('/exhibition', [ArtworkAPIController::class, 'exhibition']);
Route::get('/artwork/{id}', [ArtworkAPIController::class, 'showArtwork']);

//Artwork
// Route::get('/artwork', [GalleryController::class, 'index']);
// Route::get('/exhibition', [GalleryController::class, 'index']);
// Route::get('/artwork/{id}', [GalleryController::class, 'show']);
