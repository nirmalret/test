@extends('admin.layouts.master')

@section('content')
    <h3>Add New Post</h3>
    <div class="dropdown-divider"></div>
    <form method="POST" action="/admin/posts" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" maxlength="255" class="form-control" id="title" name="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug">
        </div>
        <div class="form-group">
            <label for="body">Content</label>
            <textarea class="form-control" id="body" name="body" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea class="form-control" id="excerpt" name="excerpt" maxlength="55" rows="1"></textarea>
        </div>
        <div class="form-group">
            <select name="tags">
                @foreach($tag as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="post_img">Upload Image</label>
            <input type="file" class="form-control-file" id="post_img" name="post_img">
        </div>
        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
    @include('partials.errors')

@endsection