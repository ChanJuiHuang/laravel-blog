@extends('layouts.main')

@section('title', 'View Post')
@section('content')
    <div class="row">
        <div class="col-md-8 pt-3">
            @include('partials._messages')
            @if ($post->image)
                <img src="{{ asset('storage/images/'.$post->image) }}" width="700px" class="mb-3">
            @endif
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <div class="mb-5">
				@foreach ($post->tags as $tag)
					<a href="{{ route('tags.show', $tag) }}"><span class="badge badge-success">{{ $tag->name }}</span></a>
				@endforeach
            </div>
            
            <h3>
                Comments
                <a class="btn btn-outline-dark btn-sm" href="{{ route('comments.create') }}?post_id={{ $post->id }}">Create Comment</a>
            </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Author</th>
                        <th scope="col">Email</th>
                        <th scope="col">Comment</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post->comments as $comment)
                        <tr>
                            <th scope="row">{{ $comment->author }}</th>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->content }}</td>
                            <td>
                                <a href="{{ route('comments.edit', $comment) }}">
                                    <svg-icon>
                                        <src href="{{ asset('svg/si-glyph-pencil.svg') }}">
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST" id="{{ $comment->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="#" onclick="document.getElementById('{{ $comment->id }}').submit();">
                                        <svg-icon>
                                            <src href="{{ asset('svg/si-glyph-trash.svg') }}">
                                        </svg>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-md-6 offset-md-1">Category of post:</dt>
                        <dd>{{ $post->category->name }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-4 offset-md-1">Create At:</dt>
                        <dd>{{ date('Y/m/d H:i', strtotime($post->created_at)+60*60*8) }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-4 offset-md-1">Update At:</dt>
                        <dd>{{ date('Y/m/d H:i', strtotime($post->updated_at)+60*60*8) }}</dd>
                    </dl>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-block">Edit</a>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-block">Delete</button>
                            </form>
                        </div>
                        <div class="col-md-12 mt-3">
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-dark btn-block"><< See All Posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection