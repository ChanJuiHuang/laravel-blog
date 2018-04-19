@extends('layouts.main') 

@section('title', 'Create New Page') 
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        @include('partials._messages')
        <h1 class="py-3">Create New Post</h1>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter the title">
            </div>
            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" class="form-control" name="slug" id="title" aria-describedby="emailHelp" placeholder="Enter the slug">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tag">Tag:</label>
                <select name="tags[]" class="form-control tags-multiple" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="body">Post content:</label>
                <textarea class="form-control" name="body" id="body" rows="7" placeholder="Type the content..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
        </form>
    </div>
</div>
@endsection