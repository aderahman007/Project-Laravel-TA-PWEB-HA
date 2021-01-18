<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="https://www.vhv.rs/dpng/d/421-4212514_user-icon-round-png-png-download-user-round.png" width="30" height="30" class="d-inline-block align-top" alt="">
        WiSATA LAMPUNG
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item {{ (request()-> is('/')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('UserIndex')}}">Dashboard </a>
            </li>
            <li class="nav-item {{ (request()-> is('about*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('about')}}">About</a>
            </li>
            <li class="nav-item {{ (request()-> is('pantai*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('pantai')}}">Pantai</a>
            </li>
            <li class="nav-item {{ (request()-> is('gunung')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('gunung')}}">Gunung</a>
            </li>
            <li class="nav-item {{ (request()-> is('taman_wisata')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('taman_wisata')}}">Taman Wisata</a>
            </li>
            <li class="nav-item {{ (request()-> is('air_terjun')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('air_terjun')}}">Air Terjun</a>
            </li>
            <li class="nav-item {{ (request()-> is('all_categori')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('all_categori')}}">Semua Categori</a>
            </li>
        </ul>
        <!-- <a class="btn btn-outline-primary mr-2" href="#">Daftar</a>
            <a class="btn btn-success" href="#">login</a> -->
        <a class="btn btn-success btn-sm" title="Anda punya tempat wisata? ogin disini" href="{{route('login')}}">login</a>
    </div>
</nav>