<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
	protected $fillable = ['body','post_id','user_id'];

	public function posts(){

		$this->belongsTo(Post::class);
		
	}
	public function user(){

		return $this->belongsTo(User::class);
	}
}