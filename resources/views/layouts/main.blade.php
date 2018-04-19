<!DOCTYPE html>
<html lang="en">

@include('partials._header')

<body>
    @include('partials._navbar')
    <div class="container">
        @yield('content')
    </div>
</body>

<script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/iconwc.js') }}"></script>
<script>
    $('.tags-multiple').select2();
</script>
</html>