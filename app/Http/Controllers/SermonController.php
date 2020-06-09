<?php

namespace App\Http\Controllers;
use App\Sermon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SermonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sn = 1;
        $sermons = Sermon::orderBy('id', 'DESC')->where('is_published', '1')->get();
        return view('admin.sermon.index', compact('sermons', 'sn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sermon.create');
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
            'title' => 'required',
            'thumbnail' => 'required',
            'video_url' => 'required',
            'audio_url' => 'required',
            'date_of_sermon' => 'required'
        ],
            [
                'title.required' => 'Sermon title is needed',
                'thumbnail.required' => 'Enter Thumbnail name',
                'video_url.required' => 'Sermon Video Url is required',
                'audio_url.required' => 'Sermon Audio Url is required',
                'date_of_sermon.required' => 'Date of Sermon is required'
            ]
        );

            $sermon = new Sermon();
            $sermon->user_id = Auth::id();
            $sermon->title = $request->title;
            $sermon->thumbnail = $request->thumbnail;
            $sermon->date_of_sermon = $request->date_of_sermon;
            $sermon->is_published = $request->is_published;
            $sermon->video_url = $request->video_url;
            $sermon->audio_url = $request->audio_url;
            $save = $sermon->save();

        Session::flash('message', 'Sermon uploaded successfully');
        return redirect()->route('sermons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function show(Sermon $sermon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sermons = Sermon::findOrFail($id);
        return view ('admin.sermon.edit', compact('sermons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sermon $sermon)
    {
        $this->validate($request, [
            'title' => 'required',
            'thumbnail' => 'required',
            'video_url' => 'required',
            'audio_url' => 'required',
            'date_of_sermon' => 'required'
        ],
            [
                'title.required' => 'Sermon title is needed',
                'thumbnail.required' => 'Enter Thumbnail name',
                'video_url.required' => 'Sermon Video Url is required',
                'audio_url.required' => 'Sermon Audio Url is required',
                'date_of_sermon.required' => 'Date of Sermon is required'
            ]
        );

            $sermon = Sermon::findOrFail($id);
            $sermon->user_id = Auth::id();
            $sermon->title = $request->title;
            $sermon->thumbnail = $request->thumbnail;
            $sermon->date_of_sermon = $request->date_of_sermon;
            $sermon->is_published = $request->is_published;
            $sermon->video_url = $request->video_url;
            $sermon->audio_url = $request->audio_url;
            $save = $sermon->save();

        Session::flash('message', 'Sermon updated successfully');
        return redirect()->route('sermons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sermon $sermon)
    {
        // Delete video and audio files
        Storage::delete('/public/sermons/videos' . $sermon->image_url);
        Storage::delete('/public/sermons/audios' . $sermon->image_url);

        // Delete data from table
        $sermon->delete();

        Session::flash('delete-message', 'Sermon deleted successfully');
        return redirect()->route('sermons.index');
    }
}
