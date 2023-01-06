<div class="row">
    <div class="col-lg-12">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom">
                <h2>Tambah User</h2>
            </div>

            <div class="card-body">
                <form action="<?= base_url(''); ?>user/proses_tambah" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-12 row">
                            <div class="col-md-6 mb-3">
                                <label for="validationServer01">NIP</label>
                                <input type="text" class="form-control" name="nip" placeholder="Contoh : 01234519580818 198404 1 001" required>
                                <br>
                                <label for="validationServer01">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" placeholder="Contoh : Cahya Ramdan" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationServer02">Foto</label>
                                <input type="file" name="foto" class="dropify" data-max-file-size="1000kb" />
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="col-md-6 mb-3">
                                <label for="validationServer01">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" placeholder="Contoh : Guru" required>
                                <br>
                                <label for="validationServer01">Hak Akses</label>
                                <select class="form-control" id="ruangan" name="hak_akses">
                                    <option value="1">Administrator</option>
                                    <option value="2">Staff MRC</option>
                                    <option value="3">Kepala MRC</option>
                                    <option value="4">Wakasek</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationServer03">Username</label>
                                <input type="text" class="form-control" name="username" required>
                                <br>
                                <label for="validationServer03">Password</label>
                                <input type="text" class="form-control" name="password" required>
                            </div>
                        </div>

                    </div>


                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url(''); ?>user" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

</div>