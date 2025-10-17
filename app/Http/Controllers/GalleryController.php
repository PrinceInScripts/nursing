<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryType;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery()
    {
        $items=Gallery::select('type_id')->distinct()->orderBy('type_id')->get();


        $galleryItems = GalleryType::whereIn('id', $items->pluck('type_id'))->get();

        return view('pages.gallery.index', compact('galleryItems'));
    }

    public function view($slug)
    {
        $type_id=GalleryType::where('slug',$slug)->first()->id;
        $gallery=Gallery::where('type_id',$type_id)->get();

        return view('pages.gallery.gallery',compact('gallery'));
    }
}
