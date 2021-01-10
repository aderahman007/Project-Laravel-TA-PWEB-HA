<div class="sidebar-sticky">
    <ul class="nav flex-column">
        <div class="nav-item m-auto">
            <img src="https://www.vhv.rs/dpng/d/421-4212514_user-icon-round-png-png-download-user-round.png" alt="" width="100" height="100">
            <center>
                <p><b>{{Auth::user()->name}}</b></p>
            </center>
        </div>
        <li class="nav-item">
            <a class="nav-link active" href="{{route('AdminIndex')}}">
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('categori.index')}}">
                Kelola Categori
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('user.index')}}">
                Kelola Users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="wisata">
                Kelola Wisata
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                Kelola Komentar
            </a>
        </li>

    </ul>
</div>