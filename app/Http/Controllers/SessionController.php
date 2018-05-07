<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //

	public function __construct(){
		$this->middleware('guest',['except'=>'destroy']);
	}

	public function create(){
		return view('session.create');
	}

	public function store(){

		$auth = auth()->attempt(request(['email','password']));


		if(!$auth){

			return back()->withErrors([
				'message'=>'please check your credentials and try again'
			]);
			
		}		

		session()->flash('message','Thanks for sign in');
		
		return redirect()->home();

	}

	public function destroy(){

		auth()->logout();

		return view('session.create');
	}
}
