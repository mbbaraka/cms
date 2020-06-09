<?php

namespace App\Http\Controllers;

use App\Mail\VisitorContact;
use App\Banner;
use App\Category;
use App\Post;
use App\Gallery;
use App\Events;
use App\Page;
use App\Setting; 
use App\Church;
use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class WebController extends Controller
{
    public function index()
    {
        $title = 'Home'; 
        $banners = Banner::orderBy('id', 'DESC')->where('is_published', '1')->get();
        $posts = Post::orderBy('id', 'DESC')->where('post_type', 'post')->where('is_published', '1')->limit(2)->get();
        $events = Events::orderBy('start_date', 'ASC')->where('is_published', '1')->limit(3)->get();
        
        return view('home.pages.index', compact('title','banners','posts','events'));

    }
    public function coreValues()
    {
        $title = 'Core Values';
        return view('website.core-values', compact('title'));
    }
    public function showContactForm()
    {
        $settings = Setting::find(1);
        $title = 'Contact us';
        return view('home.pages.contact', compact('title', 'settings'));
    }

    public function submitContactForm(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('markbrightbaraka.@gmail.com')->send(new VisitorContact($data));

        Session::flash('message', 'Thank you for your email');
        return redirect()->route('contact.show');
    }
    public function pages($title, $slug)
    {
        $page = Page::where('slug', $slug)->first();
        if ($page) {
            $title = $page->title;
            return view('home.pages.page', compact('page',  'title'));
        } else {
            return \Response::view('home.errors.404', array(), 404);
        }
    }
    public function newspage() 
    {        
        $title = 'News';
        $posts = Post::orderBy('id', 'DESC')->where('post_type', 'post')->where('is_published', '1')->paginate(5);
        return view('home.pages.news', compact('posts', 'title'));
    }
    public function news($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', '1')->first();
        if ($post) {
            $title = $post->title;
            return view('home.singles.news', compact('post','title'));
        } else {
            return \Response::view('home.errors.404', array(), 404);
        }
    }

    public function sermons($value='')
    {
        $title = 'Sermons';

        return view ('home.pages.sermons', compact('title'));
    }

    public function churches()
    {
        $title = 'Churches';
        $churches = Church::orderBy('id', 'ASC')->paginate(12);

        return view ('home.pages.churches', compact('title','churches'));
    }

    public function churchPage($slug)
    {
        $church = Church::where('slug', $slug)->first();
        if ($church) {
            $title = $church->name;
            return view('home.singles.churches', compact('church','title'));
        } else {
            return \Response::view('home.errors.404', array(), 404);
        }
    }

    public function events()
    {
        $title = 'Events';

        $events = Events::orderBy('start_date', 'ASC')->where('is_published', '1')->paginate(5);

        return view ('home.pages.events', compact('title','events'));
    }
     
    public function event($slug)
    {
        $event = Events::where('slug', $slug)->where('is_published', '1')->first();
        if ($event) {
            $title = $event->title;
            return view('home.singles.events', compact('event','title'));
        } else {
            return \Response::view('home.errors.404','hello wold', array(), 404);
        }
    }

    public function galleries($value='')
    {
        $title = 'Galleries';

        $galleries = Gallery::orderBy('id', 'DESC')->paginate(20);

        return view ('home.pages.galleries', compact('title', 'galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = Post::select("title as name","thumbnail as img","details as desc")->where("title","LIKE","%{$request->input('query')}%")->get();

        return response()->json($data);
    }

    //Handling subscribers
    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ],
        [
            'email.required' => 'Email address is required',
            'email.email' => 'Email address is should be valid'
        ]
    );
        //checking if email exists
        if (Subscriber::where('email', '=', $request->email)->exists()) {
           Session::flash('exist-message', 'Email Address already exists!');
           return redirect()->route('subscribed');

        }else{
            $subscribe = new Subscriber();
            $subscribe->email = $request->email;
            $save = $subscribe->save(); 

            if($save){
                Session::flash('message', 'Subscription successful!!');
                return redirect()->route('subscribed');
            }else{
                Session::flash('delete-message', 'Thank you for your email');
                return redirect()->route('subscribed');
            }
        }
        
    }
    public function subscribed()
    {
        $title = 'Subscribed';
        return view ('home.pages.subscribed', compact('title'));
    }
}
