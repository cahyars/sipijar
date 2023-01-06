<div class="row">
    <div class="col-lg-6">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom">
                <h2>Tambah Ruangan</h2>
            </div>

            <div class="card-body">
                <form action="<?= base_url(''); ?>ruangan/proses_tambah" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Nama Ruangan</label>
                            <input type="text" class="form-control" name="nama_ruangan" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validationServer02">Foto</label>
                            <input type="file" name="foto" class="dropify" data-max-file-size="1000kb" />
                        </div>

                    </div>


                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url(''); ?>ruangan" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

</div>