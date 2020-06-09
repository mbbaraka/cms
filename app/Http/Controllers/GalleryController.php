<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sn = 1;
        $galleries = Gallery::orderBy('id', 'DESC')->get();
        return view('admin.gallery.index', compact('galleries', 'sn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "image_url" => 'required',
            'name' => 'required'
        ],
            [
                'image_url.required' => 'Select image',
                'name.required' => 'Enter Gallery name',
            ]
        );

            $gallery = new Gallery();
            $gallery->user_id = Auth::id();
            $gallery->name = $request->name;
            $gallery->image_url = $request->image_url;
            $save = $gallery->save();

        Session::flash('message', 'Images uploaded successfully');
        return redirect()->route('galleries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleries = Gallery::findOrFail($id);
        return view ('admin.gallery.edit', compact('galleries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "image_url" => 'required',
            'name' => 'required'
        ],
            [
                'image_url.required' => 'Select image',
                'name.required' => 'Enter Gallery name',
            ]
        );

            $gallery = Gallery::findOrFail($id);
            $gallery->user_id = Auth::id();
            $gallery->name = $request->name;
            $gallery->image_url = $request->image_url;
            $save = $gallery->save();

        Session::flash('message', 'Images Updated successfully');
        return redirect()->route('galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        // Delete image file
        Storage::delete($gallery->image_url);

        // Delete data from table
        $gallery->delete();

        Session::flash('delete-message', 'Image deleted successfully');
        return redirect()->route('galleries.index');
    }
}
