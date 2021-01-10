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
    <header>
        @include('user.layout.header')
    </header>

    <main role="main">
        <div class="flash-data" data-flashdata="{{Session::has('success')}}"></div>
        @yield('content')
    </main>
    <hr class="featurette-divider">
    <!-- FOOTER -->
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; <?= date("Y"); ?> Parawisata Lampung. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
    @include('admin.layout.js')

    @stack('js')
</body>

</html>