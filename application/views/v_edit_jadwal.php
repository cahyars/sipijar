<div class="row">
    <div class="col-lg-6">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom">
                <h2>Ubah Jadwal</h2>
            </div>
            <?php
            foreach ($jadwal as $row) { ?>
                <div class="card-body">
                    <form action="<?= base_url(''); ?>jadwal/proses_edit/<?= $row->id_jadwal; ?>" method="POST">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationServer01">Tanggal Mulai</label>
                                <input type="datetime-local" class="form-control" name="tanggal_mulai" value="<?= $row->tgl_mulai ?>" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationServer02">Tanggal Selesai</label>

                                <input type="datetime-local" class="form-control" name="tanggal_selesai" value="<?= $row->tgl_selesai ?>" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationServerUsername">Deskripsi</label>

                                <input type="text" class="form-control" placeholder="Deskripsi Kegiatan" name="deskripsi" value="<?= $row->deskripsi ?>" required>
                            </div>
                        </div>


                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="<?= base_url(''); ?>jadwal/kelola" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>