@extends('user.layout.template')
@push('css')
<link rel="stylesheet" href="{{asset('css/blog.css')}}">
@endpush
@section('content')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Tentang Wisata Lampung</h1>
        <p class="lead text-muted">Lampung memiliki banyak tempat wisata menarik, salah satunya wisata alam dan terkenal dengan keindahan alam, terutama pantainya, Wisata Lampung merupakan website yang menyajikan destinasi parawisata khususnya di wilayah lampung</p>
        <p>

            <a href="https://wa.me/6285764121807" target="_blank" class="btn btn-success my-2"><img src="{{asset('css/wa.png')}}" alt="" width="25" height="20"> Hubungi Kami</a>
        </p>
    </div>
</section>

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