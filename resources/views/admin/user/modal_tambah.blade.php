<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="user">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="categori">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="categori">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="categori">Password</label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="categori">Jenis Wisata</label>
                        <select class="form-control" name="id_wisata" id="id_wisata">
                            @foreach($categori as $c)
                            <option value="{{$c->id}}">{{$c->nama}}</option>
                            @endforeach
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>