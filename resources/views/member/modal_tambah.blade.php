<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tempat Wisata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('wisata.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="categori">Nama</label>
                        <input type="text" class="form-control nama" name="nama" id="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="categori">lokasi</label>
                        <input type="text" class="form-control lokasi" name="lokasi" id="lokasi" placeholder="lokasi">
                    </div>
                    <div class="form-group">
                        <label for="categori">foto</label>
                        <input type="file" class="form-control-file foto" id="foto" name="image">
                    </div>
                    <div class="form-group">
                        <label for="categori">Descripsi</label>
                        <textarea type="text" class="form-control descripsi" name="descripsi" id="id_wisata" placeholder="Descripsi"></textarea>
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