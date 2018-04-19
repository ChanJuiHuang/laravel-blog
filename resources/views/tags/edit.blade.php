@extends('layouts.main') 

@section('title', 'Edit Tag') 
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        @include('partials._messages')
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-title card-header text-center">Edit Tag</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tags.update', $tag) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="tag" class="col-sm-4 col-form-label text-right">Tag</label>

                            <div class="col-md-6">
                                <input id="tag" type="text" class="form-control" name="name" value="{{ $tag->name }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 offset-sm-4">
                                <button type="submit" class="btn btn-primary btn-sm btn-block">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection