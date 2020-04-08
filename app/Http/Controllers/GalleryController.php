<?php

namespace App\Http\Controllers;

use App\Category;
use App\Gallery;
use App\Http\Requests\CategoryPostRequest;
use Illuminate\Http\Request;
//use Intervention\Image\Image;
use Intervention\Image;
class GalleryController extends Controller
{
    public function index()
    {
        //
        $artworks = Gallery::paginate(50);
        $categories = Category::all();
        //
        return view('home', compact('artworks', 'categories'));
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
        //
        $artworks = Gallery::inRandomOrder()->paginate(50);

        return view('welcome', compact('artworks'));
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
}
