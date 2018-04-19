@extends('layouts.main')

@section('title', 'Edit Comment')
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        @include('partials._messages')
        <h1 class="py-3">Edit the Comment</h1>
        <form action="{{ route('comments.update', $comment) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ $comment->author }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ $comment->email }}">
            </div>
            <div class="form-group">
                <label for="content">Comment content:</label>
                <textarea class="form-control" name="content" id="content" rows="7">{{ $comment->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
        </form>
    </div>
</div>
@endsection