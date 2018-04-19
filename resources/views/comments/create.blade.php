@extends('layouts.main')

@section('title','Contact')
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        @include('partials._messages')
        <h2>Create Comment</h2>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <form method="POST" action="{{ route('comments.store') }}">
            {{ csrf_field() }}
            <input type="hidden" class="form-control" name="post_id" value="{{ request()->query('post_id') }}">
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="author" class="form-control" id="author" name="author" placeholder="Enter the author">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter the email">
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea type="text" rows="5" class="form-control" id="content" name="content" placeholder="Type your comment here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>
@endsection