@extends('admin.layouts.master')


@section('content')
    <div class="row">
        <div class="col-md-9">
            <h2>All Post
                <div class="btn-toolbar mb-2 mb-md- float-right">
                    <div class="btn-group mr-2">
                        <a class="btn btn-sm btn-primary" href="/admin/posts/create">Add New Post</a>
                    </div>
                </div>
            </h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Excerpt</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ substr($post->body,0,50) }}{{ strlen($post->body) > 50 ? "..": "" }}</td>
                            <td>{{ $post->excerpt }}</td>
                            <td>
                                <div class="btn-toolbar mb-2 mb-md-0">
                                    <div class="btn-group mr-2">
                                        <button class="btn btn-sm btn-outline-secondary"><a
                                                    href="{{route('posts.show',$post->id)}}">View</a></button>
                                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                        <button class="btn btn-sm btn-outline-secondary">Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-3">
            <h2>Archives</h2>
            <ul>
                @foreach($archives as $stats)
                    <li><a href="/admin/posts/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
                            {{ $stats['month']. ' '. $stats['year'] }}</a></li>
                @endforeach
            </ul>
            <h2>Tags</h2>
            <ul>
                @foreach($tags as $tag)
                    <li><a href="/admin/posts/tags/{{ $tag }}">
                           {{ $tag }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
