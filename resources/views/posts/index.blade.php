@extends('layouts.main') 

@section('title', 'All Posts') 
@section('content')

@include('partials._messages')
<div class="row pt-3">
    <div class="col-md-10">
        <h1>All Posts</h1>
    </div>
    <div class="col-md-2">
        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-block">Create Post</a>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Create At</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? '...' : '' }}</td>
                        <td>{{ date('Y/m/d H:i', strtotime($post->created_at)+60*60*8) }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-dark mr-4">View</a>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-dark">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection