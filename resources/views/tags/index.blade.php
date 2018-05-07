@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-8">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>
                                <div class="btn-toolbar mb-2 mb-md-0">
                                    <div class="btn-group mr-2">
                                        <button class="btn btn-sm btn-outline-secondary"><a
                                                    href="{{route('tags.show',$tag)}}">View</a></button>
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
        <div class="col-md-4">
            <form class="form-inline" method="POST" action="{{ route('tags.store') }}">
                @csrf

                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" maxlength="255" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>
                <button type="submit" class="btn btn-primary">Publish</button>

            </form>

            @include('partials.errors')

        </div>
    </div>

@endsection