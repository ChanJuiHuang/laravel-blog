@extends('layouts.main')

@section('title', "$tag->name Tag")
@section('content')
    <div class="row pt-3">
        <div class="col-md-8">
            @include('partials._messages')
            <h1>
                {{ $tag->name }} Tag
                <small class="text-muted">{{ $tag->posts()->count() }} posts</small>
            </h1>
        </div>
        <div class="col-md-2">
           <a href="{{ route('tags.edit', $tag) }}" class="btn btn-primary btn-block float-right">Edit Tag</a>
        </div>
        <div class="col-md-2">
            <form method="POST" action="{{ route('tags.destroy', $tag) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger btn-block float-right">Delete Tag</button>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-10">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Tags</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tag->posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
                        <td>
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('tags.show', $tag) }}"><span class="badge badge-success">{{ $tag->name }}</span></a>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection