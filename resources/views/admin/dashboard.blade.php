@extends('admin.layout.template')
@push('css')

@endpush
@section('content')
<div class="col-md-12">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            @foreach($carousel as $c => $slider)
            <div class="carousel-item {{$c == 0 ? 'active' : ''}}">
                <img class="first-slide" src="{{asset('image_upload/carousel/' . $slider['gambar'])}}" alt="First slide" width="100%" height="400px">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>{{$slider['title']}}</h1>
                        <p>{{$slider['descripsi']}}</p>
                        <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Read More</a></p> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endsection

@push('js')
<script>
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{Session::get('success')}}",
            showConfirmButton: false,
            timer: 3500
        });
    }
</script>


@endpush