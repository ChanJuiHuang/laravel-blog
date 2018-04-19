@if ($errors->any() > 0)
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success') || session('status'))
    <div class="alert alert-success">
        {{ session('success') }}
        {{ session('status') }}
    </div>
@endif
