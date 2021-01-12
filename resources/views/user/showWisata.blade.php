@extends('user.layout.template')
@push('css')
<link rel="stylesheet" href="{{asset('css/blog.css')}}">
<link rel="stylesheet" href="{{asset('css/album.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Wisata Lampung</h1>
        <p class="lead text-muted">{{$showWisata->nama}}</p>
    </div>
</section>

<div class="bg-light py-3">
    <div class="container">
        <img src="{{asset('image_upload/'.$showWisata->foto)}}" class="img-fluid" alt="Responsive image">
        <br><br>
        <div class="blog-post mb-5">
            <h2 class="blog-post-title">{{$showWisata->nama}}</h2>
            <p class="blog-post-meta">{{$showWisata->created_at}} <a href="#">Mark</a></p>

            <p>{{$showWisata->descripsi}}</p>

        </div>
        <br>
        <div class="card border-success">
            <div class="card-header">
                Rating dan Komentar
            </div>
            <div class="card-body p-3 text-success">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h3 class="text-success">Rating</h3>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-success">Komentar</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-auto">
                        <!-- <span class="field-label-header">Rating</span> -->
                        <form action="{{request()->segment(2)}}/rating" method="post">
                            {{csrf_field()}}
                            <div class="form-group" id="rating-ability-wrapper">
                                <label for="rating" class="control-label">
                                    <span class="field-label-info"></span>
                                    <input type="hidden" name="selected_rating" id="selected_rating" value="" required="required">
                                </label>
                                <h2 class="bold rating-header">
                                    <span class="selected-rating">0</span><small> / 5</small>
                                </h2>
                                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </button>
                            </div>
                            <h4 class="text-success my-3">Total Rating <?= (($rating[0] == null) ? 0 : $rating[0]) ?>/5</h4>

                            <button type="submit" class="btn btn-success submit">Submit</button>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <form action="{{request()->segment(2)}}/komentar" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control nama" id="nama" name="nama" placeholder="Nama">
                            </div>

                            <div class="form-group">
                                <label for="komentar">Komentar</label>
                                <textarea class="form-control komentar" id="komentar" name="komentar" rows="3" placeholder="Komentar anda"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-12 mt-5 media">
                        <!-- <img src="gambar4.jpg" class="mr-3" alt="..." style="width: 100px"> -->
                        @foreach($komentar as $k)
                        <div class="card p-3 media-body">
                            <h3 class="mt-0">{{$k->nama}}</h3>
                            <!-- <p class="text-success"><a href="#">Reply</a></p> -->
                            {{$k->komentar}}
                            <small>
                                <p class="text-success">{{$k->created_at}}</p>
                            </small>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('js')
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>
        jQuery(document).ready(function($) {
            $(".btnrating").on('click', (function(e) {

                var previous_value = $("#selected_rating").val();

                var selected_value = $(this).attr("data-attr");
                $("#selected_rating").val(selected_value);

                $(".selected-rating").empty();
                $(".selected-rating").html(selected_value);

                for (i = 1; i <= selected_value; ++i) {
                    $("#rating-star-" + i).toggleClass('btn-warning');
                    $("#rating-star-" + i).toggleClass('btn-default');
                }
                for (ix = 1; ix <= previous_value; ++ix) {
                    $("#rating-star-" + ix).toggleClass('btn-warning');
                    $("#rating-star-" + ix).toggleClass('btn-default');
                }
            }));
        });

        $('.submit').on('click', function() {

            var rating = $('#selected_rating').val();
            $('.selected-rating').attr('value', rating);

        })
    </script>
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