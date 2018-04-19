@extends('layouts.main') 

@section('title','Home')
@section('content')
<div class="row">
    <div class="col-md-12">
        @include('partials._messages')
        <div class="jumbotron">
            <h1 class="display-4">Welcome My Blog!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content
                or information.</p>
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        @foreach ($posts as $post)
        <div class="mb-4">
            <h3>{{ $post->title }}</h3>
            <p>{{ substr($post->body, 0, 30) }}{{ strlen($post->body) > 300 ? '...' : '' }}</p>
            <a href="{{ url('blog', $post->slug) }}" class="btn btn-primary">Read More</a>
        </div>
        @endforeach
    </div>

    <div class="col-md-3 col-md-offset-1">
        <h2>Sidebar</h2>
    </div>
</div>
@endsection