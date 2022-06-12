<?php

namespace App\Http\Controllers;

use App\Category;
use App\Gallery;
use App\Http\Requests\CategoryPostRequest;
use App\Property;
use Illuminate\Http\Request;
//use Intervention\Image\Image;
use Illuminate\Support\Facades\Log;
use Intervention\Image;

class GalleryController extends Controller
{
    public function index()
    {
        //
        $artworks = Gallery::orderBy('id', 'DESC')->paginate(50);
        $categories = Category::all();
        //
        return view('home', compact('artworks', 'categories'));
    }
    public function exhibition()
    {
        //
        $artworks = Gallery::where('isfeatured',1)->orderBy('id', 'DESC')->paginate(200);
        $categories = Category::all();
        //
        return view('home', compact('artworks', 'categories'));
    }
    public function nonexhibition()
    {
        //
        $artworks = Gallery::where('isfeatured',0)->orderBy('id', 'DESC')->paginate(200);
        $categories = Category::all();
        //
        return view('home', compact('artworks', 'categories'));
    }
    public function artUpdate(Request $request, $id) {
        $this->validate($request, [
            'newfile' => 'required|image|mimes:jpeg,jpg,gif,png|max:2048'
        ]);
        $gallery = Gallery::findOrFail($id);
        $image = $request->file('newfile');
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/thumbnail');
        $resize_image = \Intervention\Image\Facades\Image::make($image->getRealPath());
        $resize_image->resize(230, 230, function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$image_name);

        $destinationPath = public_path('/images/gallery');

        $image->move($destinationPath, $image_name);

        $gallery->update([
            'file'=>$image_name,
        ]);
        return redirect()->back()->with('message','Artwork updated!');
    }

    public function saveResizeArt(Request $request) {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,jpg,gif,png|max:2048',
            'title' => 'required'
        ]);

        $image = $request->file('file');
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/thumbnail');
        $resize_image = \Intervention\Image\Facades\Image::make($image->getRealPath());
//        $resize_image = Image::make($image->getRealPath());
        $resize_image->resize(230, 230, function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$image_name);

        $destinationPath = public_path('/images/gallery');

        $image->move($destinationPath, $image_name);
        Gallery::create([
            'title'=>request('title'),
            'size'=>request('size'),
            'category'=>request('category'),
            'artistNotes'=>request('artistNotes'),
            'price'=>request('price'),
            'file'=>$image_name
            ]);
        return back()->with('success', 'Image Upload Successful!')
            ->with('imageName', $image_name);
    }


    public function home()
    {
        $artworks = Gallery::where('islive','=',1)->orderBy('id', 'DESC')->paginate(50);

        return view('welcome', compact('artworks'));
    }

    public function single(Request $request, $id)
    {
        $artworks = Gallery::findOrFail($id);

        return view('single', compact('artworks'));
    }

    public function list()
    {
        $artworks = Gallery::where('islive','=',1)->orderBy('id', 'DESC')->paginate(50);

        return view('list', compact('artworks'));
    }

    public function exhibit()
    {
        $artworks = Gallery::where('islive','=',1)->where('isfeatured', '=', 1)->orderBy('id', 'DESC')->paginate(50);

        return view('exhibit', compact('artworks'));
    }


    public function galleryUpdate(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required'
        ]);
        // Log::info('Showing requestsxxx: '.$request->isfeatured);

        $gallery = Gallery::findOrFail($id);
        $gallery->update($request->except('isfeatured') + [
            'isfeatured' => $request->boolean('isfeatured')
        ], $request->all());

        return redirect()->back()->with('message','Gallery successfully updated!');
    }

    public function catAdd(CategoryPostRequest $request) {
        Category::create([
            'categoryname'=>request('categoryname')
        ]);
        return redirect()->back()->with('catmessage','Category added successfully!');
    }
    public function catUpdate(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->back()->with('catmessage','Category successfully updated!');
    }
    public function catDestroy(Request $request)
    {
        $category = Category::findOrFail(request('category_id'));
        $category->delete();
        return redirect()->back()->with('catmessage','Category deleted!');
    }
    public function toggleLive(Request $request) {
        $artwork = Gallery::find($request->id);
        $artwork->islive = $request->islive;
        $artwork->save();
        return redirect()->back();
    }
}
