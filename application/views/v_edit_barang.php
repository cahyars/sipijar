<div class="row">
    <div class="col-lg-8">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Barang</h2>
            </div>

            <div class="card-body">
                <?php foreach ($barang as $row) { ?>
                    <form action="<?= base_url(''); ?>barang/proses_edit/<?= $row->id_barang ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationServer01">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" value="<?= $row->nama_barang ?>" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationServer01">Jenis</label>
                                <select class="form-control" id="ruangan" name="jenis" value="tes">
                                    <option <?php if ($row->jenis == "komputer_lab") {
                                                echo "selected";
                                            } ?> value="komputer_lab">Komputer LAB</option>
                                    <option <?php if ($row->jenis == "komputer_office") {
                                                echo "selected";
                                            } ?> value="komputer_office">Komputer Office</option>
                                    <option <?php if ($row->jenis == "jaringan") {
                                                echo "selected";
                                            } ?> value="jaringan">Jaringan</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationServer03">Ruangan</label>
                                <select class="form-control" id="ruangan" name="id_ruangan">
                                    <?php foreach ($ruang as $r) { ?>
                                        <option <?php if ($r->id_ruangan == $row->id_ruangan) {
                                                    echo "selected";
                                                } else {
                                                    echo "";
                                                } ?> value="<?= $r->id_ruangan ?>"><?= $r->nama_ruangan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3 row">
                                <div class="col-md-6">
                                    <label for="validationServer02">Foto</label><br>
                                    <?php if ($row->foto_barang != NULL) { ?>
                                        <img src="<?= base_url('assets/foto/barang/') ?><?= $row->foto_barang ?>" class="img-thumbnail img-responsive" width="250px">
                                    <?php } else { ?>
                                        <img src="<?= base_url('assets/img/barang/not_found.jpg') ?>" class="img-thumbnail img-responsive" width="250px">
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-warning">Upload Foto Baru</label>
                                    <input type="hidden" name="foto_lama" value="<?= $row->foto_barang ?>">
                                    <input type="file" name="foto_barang" class="dropify" data-max-file-size="1000kb" />
                                </div>
                            </div>
                        </div>


                        <button class="btn btn-success" type="submit">Simpan</button>
                        <a href="<?= base_url(''); ?>barang" class="btn btn-secondary">Kembali</a>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>

</div>