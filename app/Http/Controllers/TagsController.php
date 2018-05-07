<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth')->except('index');
    }

    //

    public function indexPosts(Tag $tag)
    {
        $posts = $tag->posts;
        return view('posts.index', compact('posts'));
    }

    public function index(){

        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    public function create()
    {


    }

    public function store(Request $request)
    {

        request()->validate([
            'name' => 'required'
        ]);

        $tags = new Tag;

        $tags->name = $request->name;

        $tags->save();

        session()->flash('message', 'You have created a tag');

        return redirect()->route('tags.index');
    }
}
