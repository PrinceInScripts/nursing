<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $types=GalleryType::all();
        return view('admin.add-gallery', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
    'event_name' => 'required|string|max:255',
    'event_type' => 'required|exists:gallery_types,id',
    'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:4096'
]);

        $storedFiles = [];


        foreach ($request->file('images') as $image) {
            $path = $image->store('gallery', 'public');

            $item = Gallery::create([
                'name' => $request->event_name,
                'slug' => Str::slug($request->event_name . '-' . uniqid()),
                'type_id' => $request->event_type,
                'url' => 'storage/' . $path,
            ]);

            $storedFiles[] = $path;
        }

        return response()->json([
            'message' => 'Images uploaded successfully!',
            'files' => $storedFiles
        ]);
    }
}
