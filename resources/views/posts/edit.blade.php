@extends('admin.layouts.master')

@section('content')
    <h3>Edit Post</h3>
    <div class="dropdown-divider"></div>
    <form method="post" action="{{ route('posts.update',$posts->id) }}" enctype="multipart/form-data">

        @csrf
        {{ method_field('PUT') }}

        <div class="col-md-6">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" maxlength="255" class="form-control" id="title" name="title"
                       placeholder="Enter title" value="{{ $posts->title }}">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug" value="{{ $posts->slug }}">
            </div>
            <div class="form-group">
                <label for="body">Content</label>
                <textarea class="form-control" id="body" name="body" rows="3"> {{ $posts->body }}</textarea>
            </div>
            <div class="form-group">
                <select name="tags">
                    @foreach($tags as $tags => $value)
                        <option value="{{ $value }}">{{ $tags }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <textarea class="form-control" id="excerpt" name="excerpt" maxlength="55"
                          rows="1">{{ $posts->excerpt }}</textarea>
            </div>

            <div class="form-group">
                <label for="post_img">Upload Image</label>
                <input type="file" class="form-control-file" id="post_img" name="post_img">
                <img src="/images/{{ $posts->image }}" id="changeImg" width="25%">
            </div>
        </div>
        <div class="col-md-6">
            <a href="{{ route('posts.show',$posts->id) }}" class="btn btn-danger">Cancel</a>
            <button class="btn btn-primary">Save Changes</button>

        </div>
    </form>
    @include('partials.errors')

@endsection
@section('scripts')
    <script>

        $('#post_img').change(function () {

            var file = document.querySelector('input[type=file]').files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#changeImg').attr('src', e.target.result)
                }

                reader.readAsDataURL(file);

            }
        });

    </script>
@endsection