@include('auth.header');
<div class="flash-data" data-flashdata="{{Session::has('error')}}"></div>
<form class="form-signin" method="post" action="{{route('register')}}">
    @csrf
    <img class="mb-4" src="https://www.vhv.rs/dpng/d/421-4212514_user-icon-round-png-png-download-user-round.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Silahkan Daftar</h1>
    <label for="Nama" class="sr-only">Nama</label>
    <input type="text" name="name" id="nama" class="form-control" placeholder="nama" required autofocus>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <label for="Wista" class="sr-only">Kategori Wisata</label>
    <select class="form-control" name="id_categori" id="id_categori">
        @foreach($categori as $c)
        <option value="{{$c->id}}">{{$c->nama}}</option>
        @endforeach
    </select>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>
    <div class="mt-3">
        <small><span>Sudah punya akun?</span><a href="{{route('login')}}"> Login</a></small>
    </div>
    <div class="mt-3">
        <small><a href="{{route('UserIndex')}}"> Halaman Utama</a></small>
    </div>
    <div class="mt-3">
        <small><span>Anda pengelola wisata yuuk!</span><a href="{{route('register')}}"> Daftar</a></small>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; <?= date("Y") ?></p>
</form>
@include('auth.footer');