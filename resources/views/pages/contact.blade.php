@extends('layouts.main')

@section('title','Contact')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Contact Me</h1>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{ url('contact') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter the email">
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter the subject">
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea type="text" class="form-control" id="content" name="content" placeholder="Type your content here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection