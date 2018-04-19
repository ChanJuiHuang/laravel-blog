@extends('layouts.main') 

@section('title', 'All Categories') 
@section('content')

@include('partials._messages')
<div class="row pt-3">
    <div class="col-md-10">
        <h1>All Categories</h1>
    </div>
    <div class="col-md-2">
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-block">Create Category</a>
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
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection