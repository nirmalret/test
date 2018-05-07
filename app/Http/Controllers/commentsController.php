<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
Use App\Comment;

class commentsController extends Controller
{
    //

	public function store(Post $post){

    	Comment::create([

    		'body'=> request('body'),
    		'post_id'=> $post->id,
    		'user_id'=>auth()->id(),
    	]);




		return back();

	}
}
