@extends('user.layout.template')
@push('css')
<link rel="stylesheet" href="{{asset('css/carousel.css')}}">
<link rel="stylesheet" href="{{asset('css/blog.css')}}">
@endpush
@section('content')

@include('user.carousel')

<div class="container">
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-12 px-0">
            <h1 class="display-4 font-italic">{{$jumbotron['title']}}</h1>
            <p class="lead my-3"><?= substr("{$jumbotron['descripsi']}", 0, 200); ?> </p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold jmb">Continue reading...</a></p>
        </div>
    </div>
    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">
    @foreach($wisata as $w => $wst)
    <a href="show_wisata/{{$wst->id}}">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">{{$wst->nama}}</h2>
                <p class="lead">{{$wst->descripsi}}</p>
                <p class="text-muted"><img src="{{asset('css/lokasi.png')}}" alt="lokasi" width="25" height="30">{{$wst->lokasi}}</p>
            </div>
            <div class="col-md-5">
                <img src="{{asset('image_upload/' . $wst->foto)}}" class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">
    </a>
    @endforeach
    {{$wisata->links()}}


    <!-- /END THE FEATURETTES -->

    
</div>
@include('user.modal_jumbotron')

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