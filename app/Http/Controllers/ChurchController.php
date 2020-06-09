<?php

namespace App\Http\Controllers;

use App\Church;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ChurchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sn = 1;
        $churches = Church::orderBy('id', 'DESC')->get();
        return view('admin.church.index', compact('churches', 'sn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.church.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "image_url" => 'required',
            'name' => 'required',
            'subzone' => 'required',
            'zone' => 'required',
            'overseer' => 'required',
            'region' => 'required',
            'contact' => 'required'
        ],
            [
                'image_url.required' => 'Select image',
                'name.required' => 'Enter church name',
                'name.unique' => 'Church name already exists',
                'subzone.required' => 'Subzone required',
                'zone.required' => 'Zone required',
                'overseer.required' => 'Overseer required',
                'region.required' => 'Region required',
                'contact.required' => 'Contact required',
            ]
        );

      
            
            $church = new Church();
            $church->user_id = Auth::id();
            $church->name = $request->name;
            $church->subzone = $request->subzone;
            $church->zone = $request->zone;
            $church->region = $request->region;
            $church->overseer = $request->overseer;
            $church->contact = $request->contact;
            $church->image_url = $request->image_url;
            $church->slug = str_slug($request->name);
            $save = $church->save();

        Session::flash('message', 'Church added successfully');
        return redirect()->route('churches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function show(Church $church)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $churches = Church::findOrFail($id);
        return view('admin.church.edit', compact('churches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "image_url" => 'required',
            'name' => 'required',
            'subzone' => 'required',
            'zone' => 'required',
            'overseer' => 'required',
            'region' => 'required',
            'contact' => 'required'
        ],
            [
                'image_url.required' => 'Select image',
                'name.required' => 'Enter church name',
                'name.unique' => 'Church name already exists',
                'subzone.required' => 'Subzone required',
                'zone.required' => 'Zone required',
                'overseer.required' => 'Overseer required',
                'region.required' => 'Region required',
                'contact.required' => 'Contact required',
            ]
        );

      
            
            $church = Church::findOrFail($id);
            $church->user_id = Auth::id();
            $church->name = $request->name;
            $church->subzone = $request->subzone;
            $church->zone = $request->zone;
            $church->region = $request->region;
            $church->overseer = $request->overseer;
            $church->contact = $request->contact;
            $church->image_url = $request->image_url;
            $church->slug = str_slug($request->name);
            $save = $church->save();

        
        Session::flash('message', 'Church updated successfully');
        return redirect()->route('churches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function destroy(Church $church)
    {
        // Delete image files
        Storage::delete($church->image_url);

        // Delete data from table
        $church->delete();

        Session::flash('delete-message', 'Church deleted successfully');
        return redirect()->route('churches.index');
    }
}
