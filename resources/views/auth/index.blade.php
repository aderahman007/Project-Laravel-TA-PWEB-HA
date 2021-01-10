@include('auth.header');

<div class="flash-error" data-flashdata="{{Session::has('error')}}"></div>
<div class="flash-success" data-flashdata="{{Session::has('success')}}"></div>
<form class="form-signin" method="post" action="{{route('login')}}">
  @csrf
  <img class="mb-4" src="https://www.vhv.rs/dpng/d/421-4212514_user-icon-round-png-png-download-user-round.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Silahkan Login</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <div class="mt-3">
    <small><span>Anda pengelola wisata yuuk!</span><a href="{{route('register')}}"> Daftar</a></small>
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