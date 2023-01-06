<div class="row">
    <div class="col-lg-6">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom">
                <h2>Tambah Laporan</h2>
            </div>

            <div class="card-body">
                <form action="<?= base_url(''); ?>laporan/proses_tambah" method="POST">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Tanggal Buat</label>

                            <input type="date" class="form-control" name="tanggal_mulai" value="<?= date('Y-m-d'); ?>" readonly required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validationServer02">Bulan Rekap</label>
                            <select name="bulan" class="form-control">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validationServerUsername">Dibuat Oleh</label>

                            <input type="text" class="form-control" value="<?= $_SESSION['nama'] ?>" name="id_user" readonly required>
                        </div>
                    </div>


                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url(''); ?>laporan" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>