@extends('layouts.main') 

@section('title', 'All Tags') 
@section('content')

@include('partials._messages')
<div class="row pt-3">
    <div class="col-md-10">
        <h1>All Tags</h1>
    </div>
    <div class="col-md-2">
        <a href="{{ route('tags.create') }}" class="btn btn-primary btn-block">Create Tag</a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th scope="row">{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a></td>
                @endforeach
            </tbody>
        </table>
        {{ $tags->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection