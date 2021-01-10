<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wasata Lampung</title>
    @include('admin.layout.css')

    @stack('css')
</head>

<body>
    @include('admin.layout.header')

    <div class="container-fluid">
        <div class="flash-data" data-flashdata="{{Session::has('success')}}"></div>
        <div class="row">
            <div class="col-md-9 mt-3">
                @yield('content')
            </div>
            <nav class="col-md-3 d-block mt-3 p-2 bg-light sidebar" style="height: 100% !important;">
                @include('admin.layout.sidebar')
            </nav>
        </div>
    </div>

    @include('admin.layout.js')

    @stack('js')
</body>

</html>