<div class="row">
    <div class="col-lg-6">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom">
                <h2>Tambah Jadwal</h2>
            </div>

            <div class="card-body">
                <form action="<?= base_url(''); ?>jadwal/proses_tambah" method="POST">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Tanggal Mulai</label>

                            <input type="datetime-local" class="form-control" name="tanggal_mulai" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validationServer02">Tanggal Selesai</label>

                            <input type="datetime-local" class="form-control" name="tanggal_selesai" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validationServerUsername">Deskripsi</label>

                            <input type="text" class="form-control" placeholder="Deskripsi Kegiatan" name="deskripsi" required>
                        </div>
                    </div>


                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url(''); ?>jadwal/kelola" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom">
                <h2>Terakhir Ditambahkan</h2>
            </div>

            <div class="card-body">
                <div class="responsive-data-table">
                    <table id="responsive-data-table" class="table table-bordered dt-responsive nowrap" style="width:100%">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Kegiatan</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no  = 1;
                            foreach ($jadwal as $row) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->tgl_mulai ?></td>
                                    <td><?= $row->tgl_selesai ?></td>
                                    <td><?= $row->deskripsi ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>