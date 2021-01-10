@extends('user.layout.template')
@push('css')
<link rel="stylesheet" href="{{asset('css/blog.css')}}">
<link rel="stylesheet" href="{{asset('css/album.css')}}">
@endpush
@section('content')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Wisata Lampung</h1>
        <p class="lead text-muted">Wisata Pantai</p>
    </div>
</section>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @foreach($pantai as $p)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{asset('image_upload/' . $p->foto)}}" class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$p->nama_wisata}}</h5>
                        <p class="card-text">{{$p->descripsi}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="show_wisata/{{$p->id}}" class="btn btn-sm btn-outline-secondary">View</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
@endsection

@push('js')

@endpush