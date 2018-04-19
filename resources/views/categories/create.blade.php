@extends('layouts.main') 

@section('title', 'Create Category') 
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        @include('partials._messages')
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-title card-header text-center">Create New Category</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categories.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="category" class="col-sm-4 col-form-label text-right">Category</label>

                            <div class="col-md-6">
                                <input id="category" type="text" class="form-control" name="name" required>
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