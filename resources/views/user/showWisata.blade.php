@extends('user.layout.template')
@push('css')
<link rel="stylesheet" href="{{asset('css/blog.css')}}">
<link rel="stylesheet" href="{{asset('css/album.css')}}">
@endpush
@section('content')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Wisata Lampung</h1>
        <p class="lead text-muted">{{$showWisata->nama}}</p>
    </div>
</section>

<div class="bg-light">
    <div class="container">
        <img src="{{asset('image_upload/'.$showWisata->foto)}}" class="img-fluid" alt="Responsive image">
        <br><br>
        <div class="blog-post mb-5">
            <h2 class="blog-post-title">{{$showWisata->nama}}</h2>
            <p class="blog-post-meta">{{$showWisata->created_at}} <a href="#">Mark</a></p>

            <p>{{$showWisata->descripsi}}</p>

        </div>
        <br>
    </div>
    @endsection

    @push('js')
    <script>
        $('.jmb').on('click', function(e) {
            e.preventDefault();
            $('#modaljumbotron').modal({
                keyboard: false,
                backdrop: 'static',
                show: true
            });
        })
    </script>
    @endpush