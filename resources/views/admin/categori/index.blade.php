@extends('admin.layout.template')
@push('css')

@endpush
@section('content')
<div class="col-md-12">
    <div class="card border-primary mb-3">
        <div class="card-header">
            <div class="row">
                <h5 class="card-title">Data Categori</h5>
                <a class="btn btn-primary ml-auto" href="#" data-toggle="modal" data-target="#modaltambah" data-keyboard="false" data-backdrop="static">Tambah Categori</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($categori as $c)
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td>{{$c->nama}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-sm btn-outline-info mr-lg-2 detail" onclick="showCategori('+{{$c->id}}+')">Detail</a>
                                <a class="btn btn-sm btn-outline-warning mr-lg-2 edit" onclick="editCategori('+{{$c->id}}+')">Edit</a>
                                <form action="{{route('categori.destroy', $c->id)}}" method="post">
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
            {{$categori->links()}}
        </div>
    </div>
</div>
@include('admin.categori.modal_tambah')
@include('admin.categori.modal_detail')
@include('admin.categori.modal_edit')
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
            url: "{{url('admin/categori')}}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.categori').attr('value', data.nama);
                $('.categori').prop('readonly', true);
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
            url: "{{url('admin/categori')}}" + '/' + id + '/edit',
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.categori').attr('value', data.nama);
                $('.action').attr('action', '{{url("admin/categori")}}' + '/' + data.id);

            },
            error: function() {
                alert("Noting Data");
            }
        });
    }
</script>
@endpush