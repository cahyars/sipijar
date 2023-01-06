<div class="row">
    <div class="col-lg-8">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Ruangan</h2>
            </div>

            <div class="card-body">
                <?php foreach ($ruangan as $row) { ?>
                    <form action="<?= base_url(''); ?>ruangan/proses_edit/<?= $row->id_ruangan ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationServer01">Nama Ruangan</label>
                                <input type="text" class="form-control" name="nama_ruangan" value="<?= $row->nama_ruangan ?>" required>
                            </div>

                            <div class="col-md-12 mb-3 row">
                                <div class="col-md-6">
                                    <label for="validationServer02">Foto</label><br>
                                    <?php if ($row->foto != NULL) { ?>
                                        <img src="<?= base_url('assets/foto/ruangan/') ?><?= $row->foto ?>" class="img-thumbnail img-responsive" width="275px">
                                    <?php } else { ?>
                                        <img src="<?= base_url('assets/img/not_found.jpg') ?>" class="img-thumbnail img-responsive" width="275px">
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-warning">Upload Foto Baru</label>
                                    <input type="hidden" name="foto_lama" value="<?= $row->foto ?>">
                                    <input type="file" name="foto" class="dropify" data-max-file-size="1000kb" />
                                </div>
                            </div>

                        </div>


                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="<?= base_url(''); ?>ruangan" class="btn btn-secondary">Kembali</a>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>

</div>