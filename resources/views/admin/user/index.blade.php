@extends('admin.layout.template')
@push('css')

@endpush
@section('content')
<div class="col-md-12">
    <div class="card border-danger mb-3">
        <div class="card-header">
            <div class="row">
                <h5 class="card-title">Data Users</h5>
                <a class="btn btn-primary ml-auto" href="#" data-toggle="modal" data-target="#modaltambah" data-keyboard="false" data-backdrop="static">Tambah User</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col" width="100px">Password</th>
                        <th scope="col">Jenis Wisata</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($data as $u)
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->password}}</td>
                        <td>{{$u->nama}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-sm btn-outline-info mr-lg-2 detail" onclick="showCategori('+{{$u->id}}+')">Detail</a>
                                <a class="btn btn-sm btn-outline-warning mr-lg-2 edit" onclick="editCategori('+{{$u->id}}+')">Edit</a>
                                <form action="{{route('user.destroy', $u->id)}}" method="post">
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
@include('admin.user.modal_tambah')
@include('admin.user.modal_detail')
@include('admin.user.modal_edit')
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
            url: "{{url('admin/user')}}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.nama').attr('value', data.name);
                $('.nama').prop('readonly', true);
                $('.email').attr('value', data.email);
                $('.email').prop('readonly', true);
                $('.password').attr('value', data.password);
                $('.password').prop('readonly', true);
                $('.id_wisata').attr('value', data.nama);
                $('.id_wisata').prop('readonly', true);
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
            url: "{{url('admin/user')}}" + '/' + id + '/edit',
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.categori').attr('value', data.nama);
                $('.action').attr('action', '{{url("admin/user")}}' + '/' + data.id);

            },
            error: function() {
                alert("Noting Data");
            }
        });
    }
</script>
@endpush