<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //serial number
        $sn = 1;
        $banners = Banner::orderBy('id', 'DESC')->get();
        return view('admin.banners.index', compact('sn', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "image_url" => 'required',
            'name' => 'required|unique:banners',
            'banner_desc' => 'required|max:150',
        ],
            [
                'image_url.required' => 'Select image',
                'name.required' => 'Enter Banner name',
                'name.unique' => 'Banner already exist',
                'banner_desc.required' => 'Banner description is required',
                'banner_desc.max' => 'Banner description must be less than 150 characters',
            ]
        );

            $banner = new Banner();
            $banner->user_id = Auth::id();
            $banner->name = $request->name;
            $banner->image_url = $request->image_url;
            $banner->banner_desc = $request->banner_desc;
            $banner->url = $request->url;
            $banner->is_published = $request->is_published;
            $save = $banner->save();
        
        Session::flash('message', 'Images uploaded successfully');
        return redirect()->route('banners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banners = Banner::findOrFail($id);
        return view ('admin.banners.edit', compact('banners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "image_url" => 'required',
            'name' => 'required',
            'banner_desc' => 'required|max:150',
        ],
            [
                'image_url.required' => 'Select image',
                'name.required' => 'Enter Banner name',
                'banner_desc.required' => 'Banner description is required',
                'banner_desc.max' => 'Banner description must be less than 150 characters',
            ]
        );

            $banner = Banner::findOrFail($id);
            $banner->user_id = Auth::id();
            $banner->name = $request->name;
            $banner->image_url = $request->image_url;
            $banner->banner_desc = $request->banner_desc;
            $banner->url = $request->url;
            $banner->is_published = $request->is_published;
            $save = $banner->save();
        
        Session::flash('message', 'Images updated successfully');
        return redirect()->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        // Delete image files
        Storage::delete($banner->image_url);

        // Delete data from table
        $banner->delete();

        Session::flash('delete-message', 'Image deleted successfully');
        return redirect()->route('banners.index');
    }
}
