@extends('admin.layout.template')
@push('css')

@endpush
@section('content')
<div class="col-md-12">
    <div class="card border-primary mb-3">
        <div class="card-header">
            <div class="row">
                <h5 class="card-title">Data Categori</h5>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Komentar</th>
                        <th scope="col">Tanggal Komentar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($komentar as $c)
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td>{{$c->nama}}</td>
                        <td>{{$c->komentar}}</td>
                        <td>{{$c->created_at}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-sm btn-outline-info mr-lg-2 detail" onclick="showCategori('+{{$c->id}}+')">Detail</a>
                                <a class="btn btn-sm btn-outline-warning mr-lg-2 edit" onclick="editCategori('+{{$c->id}}+')">Edit</a>
                                <form action="{{route('komentar.destroy', $c->id)}}" method="post">
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
            {{$komentar->links()}}
        </div>
    </div>
</div>
@include('admin.komentar.modal_tambah_komentar')
@include('admin.komentar.modal_detail_komentar')
@include('admin.komentar.modal_edit_komentar')
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
            url: "{{url('admin/komentar')}}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.nama').attr('value', data.nama);
                $('.nama').prop('readonly', true);
                $('.komentar').attr('value', data.komentar);
                $('.komentar').prop('readonly', true);
                $('.tanggal_komentar').attr('value', data.created_at);
                $('.tanggal_komentar').prop('readonly', true);
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
            url: "{{url('admin/komentar')}}" + '/' + id + '/edit',
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.nama').attr('value', data.nama);
                $('.komentar').attr('value', data.komentar);
                $('.action').attr('action', '{{url("admin/komentar")}}' + '/' + data.id);

            },
            error: function() {
                alert("Noting Data");
            }
        });
    }
</script>
@endpush