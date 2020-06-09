<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$sn = 1;
        $comments = Comments::orderBy('id', 'DESC')->get();
        return view('admin.comment.index', compact('sn', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approve()
    {
        //
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
            "name" => 'required',
            'email' => 'required|email',
            'message' => 'required|max:300',
        ],
            [
                'name.required' => 'Name is required to reply',
                'email.required' => 'Please enter email',
                'email.email' => 'Provide a valid email address',
                'message.required' => 'Message is required',
                'message.max' => 'Message must be less than 150 characters',
            ]
        );
            
            $comment = new Comments();
            $comment->name = $request->name;
            $comment->email = $request->email;
            $comment->message = $request->message;
            $comment->post_id = $request->post_id;
            $save = $comment->save();
        
        Session::flash('message', 'Comment successfully added but still pending.');
       	return redirect()->route('post', $request->slug);
        //return redirect()->url('news/' . $request->slug.'.html');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $published)
    {
        $id = $request->id;
        $comment = Comments::findOrFail($id);
        if ($published == 1) {
                $comment->is_published = '0';
                $save = $comment->save();
                
                Session::flash('message', 'Comment successfully disabled.');
                return redirect()->route('comments.index');
        }else{
                $comment->is_published = '1';
                $save = $comment->save();
                
                Session::flash('message', 'Comment successfully activated.');
                return redirect()->route('comments.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
