<?php

namespace App\Http\Controllers;
use App\Gallery;
use Illuminate\Http\Request;

class ArtworkAPIController extends Controller
{
    public function index() {
        return Gallery::all();
    }
    public function exhibition() {
        return Gallery::where('isfeatured',1)->orderBy('id', 'DESC')->get();
    }
    public function showArtwork(Gallery $id) {
        return $id;
    }
}
