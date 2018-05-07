<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
	<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">

	@if(Auth::check())
	<div class="dropdown px-4">
		<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			{{ Auth::user()->name }}
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a class="dropdown-item" href="/logout">logout</a>
		</div>
	</div>
	@else
	<a class="nav-link" href="/login">login</a>
	@endif
</nav>


