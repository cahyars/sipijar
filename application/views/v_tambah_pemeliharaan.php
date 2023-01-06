<div class="row">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-default shadow-sm">
                    <div class="card-header card-header-border-bottom">
                        <h2>Input Keterangan</h2>
                    </div>

                    <div class="card-body">
                        <form action="<?= base_url('pemeliharaan/proses_tambah') ?>" method="POST">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Tanggal Mulai</label>
                                    <input type="datetime-local" class="form-control" name="tanggal_mulai">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Tanggal Selesai</label>

                                    <input type="datetime-local" class="form-control" name="tanggal_selesai">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Deskripsi</label>
                                    <input type="text" class="form-control" placeholder="Kegiatan" name="deskripsi">
                                </div>

                                <!-- <div class="col-md-12 mb-3">
                                    <label for="validationServerUsername">Status</label>
                                    <input type="text" readonly class="form-control bg-warning text-center" value="Pengajuan">
                                </div> -->

                                <div class="col-md-12 mb-3">
                                    <label for="validationServerUsername">Teknisi</label>
                                    <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                                    <input type="text" readonly class="form-control" value="<?= $_SESSION['nama'] ?>">
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-default shadow-sm">
                    <div class="card-header card-header-border-bottom">
                        <h2>Ruangan & Barang</h2>
                    </div>

                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationServer03">Ruangan</label>
                                <select class="form-control" id="ruangan" name="ruangan">
                                    <option>Pilih Ruangan</option>
                                    <?php foreach ($ruang as $row) { ?>
                                        <option value="<?= $row->id_ruangan; ?>"><?= $row->nama_ruangan; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationServer03">Pilih Barang</label>
                                <div class="form-group">
                                    <select class="js-example-basic-multiple form-control" name="barang[]" multiple="multiple" id="barang">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="<?= base_url(''); ?>pemeliharaan" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
                </form>
            </div>
        </div>