<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">

    
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


    @auth
        @if(Auth::user()->role === 'department')
            @include('partials.navbar-province')
        @elseif(Auth::user()->role === 'contractor')
            @include('partials.navbar-contractor')
        @elseif(Auth::user()->role === 'school')
            @include('partials.navbar-school')
        @endif
    @else
        @include('partials.navbar')
    @endauth
    
    @auth
    @if(Auth::user()->role === 'department')
        @include('partials.sidebar-province')
    @elseif(Auth::user()->role === 'contractor')
        @include('partials.sidebar-contractor')
    @elseif(Auth::user()->role === 'school')
        @include('partials.sidebar-school')
    @endif
@else
    @include('partials.sidebar')
@endauth

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    
    @include('partials.footer')

</div>


<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@yield('scripts') 
</body>
</html>
