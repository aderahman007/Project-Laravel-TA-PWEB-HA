@extends('admin.layout.template')
@push('css')

@endpush
@section('content')
<div class="col-md-12">
    <div class="card border-danger mb-3">
        <div class="card-header">
            <div class="row">
                <h5 class="card-title">Data Tempat Wisata</h5>
                <a class="btn btn-primary ml-auto" href="#" data-toggle="modal" data-target="#modaltambah" data-keyboard="false" data-backdrop="static">Tambah Tempat Wisata</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Descripsi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">User</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($data as $w)
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td>{{$w->nama}}</td>
                        <td>{{$w->lokasi}}</td>
                        <td><img src="{{asset('image_upload/' . $w->foto)}}" alt="" height="75" width="100"></td>
                        <td>{{$w->descripsi}}</td>
                        <td>{{$w->cat}}</td>
                        <td>{{$w->us}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-sm btn-outline-info mr-lg-2 detail" onclick="showCategori('+{{$w->id}}+')">Detail</a>
                                <a class="btn btn-sm btn-outline-warning mr-lg-2 edit" onclick="editCategori('+{{$w->id}}+')">Edit</a>
                                <form action="{{route('wisata.destroy', $w->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            {{$data->links()}}
        </div>
    </div>
</div>
@include('admin.wisata.modal_detail')
@include('admin.wisata.modal_tambah')
@include('admin.wisata.modal_edit')
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

<script>
    function showCategori(id) {
        $('#modaldetail').modal({
            keyboard: false,
            backdrop: 'static',
            show: true
        });
        $.ajax({
            url: "{{url('admin/wisata')}}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.nama').attr('value', data.nama);
                $('.nama').prop('readonly', true);
                $('.lokasi').attr('value', data.lokasi);
                $('.lokasi').prop('readonly', true);
                $('.foto').attr('src', '{{asset("image_upload")}}' + '/' + data.foto);
                $('.descripsi').attr('value', data.descripsi);
                $('.descripsi').prop('readonly', true);
                $('.id_categori').attr('value', data.cat);
                $('.id_categori').prop('readonly', true);
                $('.id_user').attr('value', data.us);
                $('.id_user').prop('readonly', true);
            },
            error: function() {
                alert("Noting Data");
            }
        });
    }

    function editCategori(id) {
        $('#modaledit').modal({
            keyboard: false,
            backdrop: 'static',
            show: true
        });
        $.ajax({
            url: "{{url('admin/wisata')}}" + '/' + id + '/edit',
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.nama').attr('value', data.nama);
                $('.lokasi').attr('value', data.lokasi);
                $('.foto').attr('src', '{{asset("image_upload")}}' + '/' + data.foto);
                $('.descripsi').attr('value', data.descripsi);
                $('.id_categori').attr('value', data.cat);
                $('.id_user').attr('value', data.us);
                $('.action').attr('action', '{{url("admin/wisata")}}' + '/' + data.id);

            },
            error: function() {
                alert("Noting Data");
            }
        });
    }
</script>
@endpush