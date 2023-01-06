<div class="row">
    <div class="col-lg-12">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom">
                <h2>Tambah Barang</h2>
            </div>

            <div class="card-body">
                <form action="<?= base_url(''); ?>barang/proses_tambah" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12 row mb-3">
                        <div class="col-md-6">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control mb-2" name="nama_barang" required>

                            <label>Jenis</label>
                            <select class="form-control mb-2" id="ruangan" name="jenis">
                                <option value="komputer_lab">Komputer LAB</option>
                                <option value="komputer_office">Komputer Office</option>
                                <option value="jaringan">Jaringan</option>
                            </select>

                            <label>Ruangan</label>
                            <select class="form-control mb-2" id="ruangan" name="ruangan">
                                <?php foreach ($ruang as $row) { ?>
                                    <option value="<?= $row->id_ruangan; ?>"><?= $row->nama_ruangan; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Foto</label>
                            <input type="file" name="foto" class="dropify" data-max-file-size="1000kb" />
                        </div>
                    </div>



                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url(''); ?>barang" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

</div>