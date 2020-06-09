<?php

namespace App\Http\Controllers;

use App\Page;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $pages = Page::orderBy('id', 'DESC')->get();
        $sn = 1;
        return view('admin.page.index', compact('pages', 'sn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $root = Page::orderBy('title', 'ASC')->where('is_root', 1)->pluck('title', 'id');
        return view('admin.page.create', compact('root'));
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
            "thumbnail" => 'required',
            "title" => 'required|unique:pages',
            "details" => "required",
        ],
            [
                'thumbnail.required' => 'Enter thumbnail url',
                'title.required' => 'Enter title',
                'title.unique' => 'Title already exist',
                'details.required' => 'Enter details',
            ]
        );

        $page = new  Page();
        $page->user_id = Auth::id();
        $page->thumbnail = $request->thumbnail;
        $page->title = $request->title;
        $page->slug = str_slug($request->title);
        $page->image_url = $request->image_url;
        $page->details = $request->details;
        $page->is_published = $request->is_published;
        $page->is_root = $request->is_root;
        $page->root = $request->root;
        $page->save();

        Session::flash('message', 'Page created successfully');
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $root = Page::orderBy('title', 'ASC')->where('is_root', 1)->pluck('title', 'id');
        return view('admin.page.edit', compact('root', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            "thumbnail" => 'required',
            "title" => 'required',
            "details" => "required",
        ],
            [
                'thumbnail.required' => 'Enter thumbnail url',
                'title.required' => 'Enter title',
                'details.required' => 'Enter details',
            ]
        );

        $page = Page::findOrFail($id);
        $page->user_id = Auth::id();
        $page->thumbnail = $request->thumbnail;
        $page->title = $request->title;
        $page->slug = str_slug($request->title);
        $page->image_url = $request->image_url;
        $page->details = $request->details;
        $page->is_published = $request->is_published;
        $page->is_root = $request->is_root;
        $page->root = $request->root;
        $page->save();


        Session::flash('message', 'Page updated successfully');
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        // Delete image files
        Storage::delete($page->image_url);
        Storage::delete($page->thumbnail);

        $page->delete();

        Session::flash('delete-message', 'Page deleted successfully');
        return redirect()->route('pages.index');
    }
}
