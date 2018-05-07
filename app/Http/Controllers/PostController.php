<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Image;

class PostController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {

        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        // $posts = Post::latest();

        //    if($month = request('month')){
        //        $posts->whereMonth('created_at',Carbon::parse($month)->month);
        //    }

        //    if($year = request('year')){
        //        $posts->whereYear('created_at',$year);
        //    }

        //    $posts = $posts->get();
//        $archives = Post::archives();

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {

        $posts = Post::find($id);

        return view('posts.show', compact('posts'));
    }

    public function create()
    {
        $tag = Tag::all();

        return view('posts.create',compact('tag'));
    }

    public function store(Request $request)
    {

        request()->validate([
            'title' => 'required',
            'slug' => 'required | alpha_dash | min:5 | max:255 | unique:posts,slug',
            'body' => 'required',
            'post_img' => 'sometimes|image'
        ]);


        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;

        if ($request->hasFile('post_img')) {
            $image = $request->file('post_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize('800', '400')->save($location);

            $post->image = $filename;
        }

        auth()->user()->posts()->save($post);

        $post->tags()->attach($request->tags);

        $post->save();



        session()->flash('message', 'your post has been updatesd');

        return redirect('/admin/posts');
    }

    public function edit($id)
    {

        //find the post in the database


        $posts = Post::find($id);

        $tags = Tag::pluck('id', 'name')->toArray();


        //return to the view that previously created.
        if (auth()->id() == $posts->user_id) {
            return view('posts.edit', compact('posts','tags'));
        } else {

            return back()->with('message', 'sorry! You are not allowed to edit');
        }


    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'slug' => 'required |alpha_dash| min:5 | max:255 | unique:posts,slug',
            'body' => 'required',
            'post_img' => 'sometimes|image'
        ]);

        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->slug = $request->slug;
        $posts->body = $request->body;
        $posts->excerpt = $request->excerpt;

        if ($request->hasFile('post_img')) {
            $image = $request->file('post_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize('800', '400')->save($location);

            $posts->image = $filename;
        }

        auth()->user()->posts()->save($posts);

        $posts->tags()->sync($request->tags);

        $posts->save();

        session()->flash('message', 'your post has been published');

        return redirect()->route('posts.show', $posts->id);


    }
}
