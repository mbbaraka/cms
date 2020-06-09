<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::find(1);
        return view ('admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings = Setting::findOrFail($id);
        return view('admin.setting.index', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'facebook_url'=> 'url|nullable',
            'twitter_url'=> 'url',
            'youtube_url'=> 'url',
            'email' => 'email|nullable'
        ]);
            $seting = Setting::findOrFail($id);
            $seting->user_id = Auth::id();
            $seting->seo_title = $request->seo_title;
            $seting->seo_keywords = $request->seo_keywords;
            $seting->seo_desc = $request->seo_desc;
            $seting->contact = $request->contact;
            $seting->address = $request->address;
            $seting->email = $request->email;
            $seting->analytics = $request->analytics;
            $seting->twitter_url = $request->twitter_url;
            $seting->facebook_url = $request->facebook_url;
            $seting->youtube_url = $request->youtube_url;
            $seting->copyright_text = $request->copyright_text;
            $seting->footer_text = $request->footer_text;
            $seting->logo = $request->logo;
            $seting->favicon = $request->favicon;
            $save = $seting->save();

        Session::flash('message', 'Settings updated successfully');
        return redirect()->route('settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
