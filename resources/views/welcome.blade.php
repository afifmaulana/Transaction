<!DOCTYPE html>
<html lang="en">
@include('templates._head')
<body class="light">
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Top Bar -->
@include('templates._navbar')
<!-- #Top Bar -->
<div>
    <!-- Left Sidebar -->
    @include('templates._sidebar')
    <!-- #END# Left Sidebar -->
</div>
        @yield('content')

@include('templates._script')
</body>
