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

Auth::routes();


Route::get('/gallery', 'ArtworksController@index');
Route::get('/about', function() {
    return view('about');
});

Route::get('/admin', function() {
    return view('admin.index');
});
Route::group(['middleware'=>'admin'], function() {
    Route::get('/home', 'GalleryController@index')->name('home');
    Route::post('/category/add', 'GalleryController@catAdd')->name('category.add');
    Route::post('/category/edit/{id}', 'GalleryController@catUpdate')->name('category.update');
    Route::post('/category/delete', 'GalleryController@catDestroy')->name('category.delete');
    Route::post('/home', 'GalleryController@saveResizeArt');
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/gallery', 'AdminGalleryController');
    Route::resource('admin/artwork2', 'AdminArtwork2Controller');
});
