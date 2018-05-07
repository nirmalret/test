@extends('admin.layouts.master')


@section('content')

<h1>Register</h1>

<form method="post" action="/register" >
	@csrf
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
	</div>
	<div class="form-group">
		<label for="email">Email Address</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
	</div>
	<div class="form-group">
		<label for="password_confirmation">Confirm Password</label>
		<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password" required>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>


	@include('partials.errors')
</form>


@endsection