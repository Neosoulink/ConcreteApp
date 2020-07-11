<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = auth()->user()->following->pluck('user_id');
        $posts = Post::whereIn('user_id', $user)->with('user')->latest()->paginate(3);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'caption' => ['required', 'string'],
            'image' => ['required', 'image'],
        ]);

        $imagePath = $request->image->store('uploads', 'public');

        $image = image::make(public_path("/storage/{$imagePath}"))->fit(1250, 1250);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $request->caption,
            'image' => $imagePath
        ]);

        return redirect()->route('profiles.show', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
