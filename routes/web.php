<?php


Route::get('/admin',function(){
	return view('admin.index');
})->name('home');

//Route::get('/admin/posts/{posts}','PostController@show');

Route::resource('/admin/posts','PostController');

Route::resource('/admin/tags','TagsController');

Route::get('/admin/posts/tags/{tag}','TagsController@indexPosts');

Route::post('/admin/posts/{post}/comments','CommentsController@store');

Route::get('/register','RegisterController@create');
Route::post('/register','RegisterController@store');


Route::get('/login','SessionController@create')->name('login');
Route::post('/login','SessionController@store');
Route::get('/logout','SessionController@destroy');
