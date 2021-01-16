<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="action" method="post">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label for="categori">Nama</label>
                        <input type="text" class="form-control nama" name="nama" id="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="categori">Email</label>
                        <input type="text" class="form-control email" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="categori">Password</label>
                        <input type="text" class="form-control password" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="categori">Jenis Wisata</label>
                        <select class="form-control wisata" name="id_wisata" id="id_wisata">
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