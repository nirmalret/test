@if($flash = session('message'))

<div id='flash-message' class="alert alert-success fade show" role='alert'>
	
	{{ $flash }}
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif