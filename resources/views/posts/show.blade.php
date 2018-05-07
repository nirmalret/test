@extends('admin.layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-primary" href="/admin/posts/"><< Back</a>

                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" data-src="\images\{{ $posts->image }}" alt="Thumbnail [100%x225]"
                         src="\images\{{ $posts->image }}" data-holder-rendered="true"
                         style=" width: 100%; display: block;">
                    <div class="card-body">
                        <h3 class="mb-0">
                            {{ $posts->title }}
                        </h3>
                        <p>Url : <a href="{{ url($posts->slug) }}">{{ url($posts->slug) }}</a></p>
                        @if(count($posts->tags))
                            @foreach($posts->tags as $tag)
                                <strong class="d-inline-block mb-2 text-primary">{{ $tag->name }}
                                </strong>
                            @endforeach
                        @endif
                        <p class="card-text">{{ $posts->body }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/admin/posts/{{$posts->id}}/edit">Edit</a> </button>
                            </div>
                            <small class="text-muted">{{ $posts->created_at->toFormattedDateString() }}
                                | {{ $posts->user->name }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center comments">
                <div class="panel well">
                    <h4>What is on your mind?</h4>
                    <form class="form-inline" method="POST" action="/admin/posts/{{ $posts->id }}/comments/">
                        @csrf
                        <div class="form-group col-8 mb-2">
                            <textarea class="form-control col-12" id="body" name="body" rows="1"
                                      placeholder="Write Comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Add Comment</button>
                    </form>
                    <hr data-brackets-id="12673">
                    <ul data-brackets-id="12674" id="sortable" class="list-unstyled ui-sortable">

                        @foreach($posts->comments as $comment)
                            <li class="ui-state-default">
                                <strong class="float-left primary-font">
                                    @if(!$comment->user == NULL)
                                        {{ $comment->user->name }}
                                    @else
                                        Anonymous
                                    @endif
                                </strong>
                                <small class="float-right text-muted">
                                    <span class="glyphicon glyphicon-time"></span>{{ $comment->created_at->diffForHumans() }}
                                </small>
                                </br>
                                {{ $comment->body }}
                            </li>
                            @endforeach
                            </br>
                    </ul>
                </div>
            </div>
        </div>

@endsection