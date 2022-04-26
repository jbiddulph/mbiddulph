<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'GalleryController@home');
Route::get('/exhibit', 'GalleryController@exhibit');

Auth::routes();

Route::get('/about', function() {
    return view('about');
});

Route::get('/admin', function() {
    return view('admin.index');
});
Route::group(['middleware'=>'admin'], function() {
    Route::get('/changeStatus', 'GalleryController@toggleLive')->name('gallery.togglelive');
    Route::post('/gallery/edit/{id}', 'GalleryController@galleryUpdate')->name('gallery.update');
    Route::post('/art/{id}/edit', 'GalleryController@artUpdate')->name('artwork.update');
    Route::get('/home', 'GalleryController@index')->name('home');
    Route::get('/exhibition', 'GalleryController@exhibition')->name('exhibition');
    Route::get('/non-exhibition', 'GalleryController@nonexhibition')->name('nonexhibition');
    Route::post('/category/add', 'GalleryController@catAdd')->name('category.add');
    Route::post('/category/edit/{id}', 'GalleryController@catUpdate')->name('category.update');
    Route::post('/category/delete', 'GalleryController@catDestroy')->name('category.delete');
    Route::post('/add-artwork', 'GalleryController@saveResizeArt');

});
