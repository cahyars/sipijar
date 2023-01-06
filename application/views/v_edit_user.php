<div class="row">
    <div class="col-lg-12">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom">
                <h2>Ubah User</h2>
            </div>

            <div class="card-body">
                <?php foreach ($user as $row) { ?>
                    <form action="<?= base_url(''); ?>user/proses_edit/<?= $row->id_user ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-md-12 row">
                                <div class="col-md-6">

                                    <label for="validationServer01">NIP</label>
                                    <input type="text" class="form-control mb-2" name="nip" value="<?= $row->nip ?>" required>

                                    <label for="validationServer01">Nama Lengkap</label>
                                    <input type="text" class="form-control mb-2" name="nama" value="<?= $row->nama ?>" required>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label for="validationServer02">Foto</label>
                                            <img src="<?php if (!empty($row->foto)) {
                                                            echo base_url('assets/foto/user/') . $row->foto;
                                                        } else {
                                                            echo base_url('assets/img/not_found.jpg');
                                                        } ?>" class="img-thumbnail mb-2" width="150px">
                                        </div>
                                        <div class="col-md-7">
                                            <label for="validationServer02">Upload Foto Baru</label>
                                            <input type="file" name="foto" class="dropify" data-max-file-size="1000kb" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" value="<?= $row->jabatan ?>" required>
                                    <br>
                                    <label for="validationServer01">Hak Akses</label>
                                    <select class="form-control" id="ruangan" name="hak_akses">
                                        <option value="1" <?php if ($row->hak_akses == "1") {
                                                                echo "selected";
                                                            } ?>>Administrator</option>
                                        <option value="2" <?php if ($row->hak_akses == "2") {
                                                                echo "selected";
                                                            } ?>>Staff MRC</option>
                                        <option value="3" <?php if ($row->hak_akses == "3") {
                                                                echo "selected";
                                                            } ?>>Kepala MRC</option>
                                        <option value="4" <?php if ($row->hak_akses == "4") {
                                                                echo "selected";
                                                            } ?>>Wakasek</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationServer03">Username</label>
                                    <input type="text" class="form-control" name="username" value="<?= $row->username ?>" required>
                                    <br>
                                    <label for="validationServer03">Password Baru <small class="text-danger">(*Abaikan jika tidak ingin mengubah password)</small></label>
                                    <input type="text" class="form-control" name="password_baru">
                                </div>
                            </div>

                        </div>


                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="<?= base_url(''); ?>user" class="btn btn-secondary">Kembali</a>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>

</div>