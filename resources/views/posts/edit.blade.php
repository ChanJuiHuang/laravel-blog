@extends('layouts.main')

@section('title', 'Edit Post')
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        @include('partials._messages')
        <h1 class="py-3">Edit the Post</h1>
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{ $post->slug }}">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if ($category->id === $post->category->id)
                                selected
                            @endif
                            >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tag">Tag:</label>
                <select name="tags[]" class="form-control tags-multiple" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            @foreach ($post->tags as $posted_tag)
                                @if ($tag->id === $posted_tag->id)
                                    selected
                                @endif
                            @endforeach
                            >{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="body">Post content:</label>
                <textarea class="form-control" name="body" id="body" rows="7">{{ $post->body }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
            <a href="{{ route('posts.show', $post) }}">Back the previous page</a>
        </form>
    </div>
</div>
@endsection