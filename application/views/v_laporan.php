<div class="row">
    <div class="col-12">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <a href="<?= base_url(''); ?>laporan/tambah" class="btn btn-primary btn-sm"><i class="mdi mdi-plus-circle"></i> Tambah</a>
                <h2 class="mx-auto text-uppercase">Kelola Laporan</h2>
            </div>
            <div class="card-body">
                <div class="responsive-data-table">
                    <table id="responsive-data-table" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Buat</th>
                                <th>Dibuat Oleh</th>
                                <th>Laporan Bulan</th>
                                <th>Status Acc</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nmr = 1;
                            foreach ($laporan as $lp) { ?>
                                <tr>
                                    <td><?= $nmr++; ?></td>
                                    <td><?= $lp->tanggal_buat ?></td>
                                    <td><?= $lp->nama ?></td>
                                    <td><?php
                                        if ($lp->bulan == 1) {
                                            echo "Januari";
                                        } elseif ($lp->bulan == 2) {
                                            echo "Februari";
                                        } elseif ($lp->bulan == 3) {
                                            echo "Maret";
                                        } elseif ($lp->bulan == 4) {
                                            echo "April";
                                        } elseif ($lp->bulan == 5) {
                                            echo "Mei";
                                        } elseif ($lp->bulan == 6) {
                                            echo "Juni";
                                        } elseif ($lp->bulan == 7) {
                                            echo "Juli";
                                        } elseif ($lp->bulan == 8) {
                                            echo "Agustus";
                                        } elseif ($lp->bulan == 9) {
                                            echo "September";
                                        } elseif ($lp->bulan == 10) {
                                            echo "Oktober";
                                        } elseif ($lp->bulan == 11) {
                                            echo "November";
                                        } elseif ($lp->bulan == 12) {
                                            echo "Desember";
                                        }
                                        ?></td>
                                    <td><?php if ($lp->status == "menunggu") {
                                            echo "<p class='btn btn-sm btn-warning'>Menunggu ACC Kepala</p>";
                                        } elseif ($lp->status == "acc1") {
                                            echo "<p class='btn btn-sm btn-success'>Menunggu ACC Wakasek</p>";
                                        } else {
                                            echo "<p class='btn btn-sm btn-secondary'>Selesai</p>";
                                        } ?></td>
                                    <td><button data-toggle="modal" data-target="#exampleModal<?= $lp->id_laporan ?>" class="btn btn-sm btn-info"><span class="mdi mdi-eye"></span></button>

                                        <div class="modal fade bd-example-modal-lg" id="exampleModal<?= $lp->id_laporan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-10 mx-auto shadow" style="border: 1px solid #000;">
                                                            <table class="table-borderless">
                                                                <tr style="border-bottom: 4px solid #000;">
                                                                    <td width=200 class="text-center"><img src="<?= base_url('assets/img/jabar.png') ?>" width="130px" alt=""><br><b class="btn btn-rounded btn-sm btn-outline-dark">NPSN : 20233680</b></td>

                                                                    <td colspan="2" class="align-middle">
                                                                        <div class="text-dark font-weight-bold text-center" style="line-height: 0.2;">
                                                                            <h4 class="font-weight-bold">PEMERINTAH DAERAH PROVINSI JAWA BARAT</h4>
                                                                            <h4 class="font-weight-bold">DINAS PENDIDIKAN</h4>
                                                                            <h4 class="font-weight-bold">CABANG DINAS PENDIDIKAN WILAYAH IV</h4>
                                                                            <h4 class="font-weight-bold">SEKOLAH MENENGAH KEJURUAN NEGERI 1 SUBANG</h4>
                                                                            <p>Jl. Arief Rahman Hakim No.35 Telepon : (0260) 411410</p>
                                                                            <p>Faksimili (0260) 411410 Website : wwww.smkn1subang.sch.id e-mail : info@smkn1subang.sch.id</p>
                                                                            <p>Kabupaten Subang - 41213</p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" class="text-center">
                                                                        <p class="font-weight-bold mt-3 mb-2 text-uppercase">LAPORAN REKAP DATA PEMELIHARAAN<br>INFRASTRUKTUR JARINGAN DAN KOMPUTER<br>BULAN <?php
                                                                                                                                                                                                                if ($lp->bulan == 1) {
                                                                                                                                                                                                                    echo "Januari";
                                                                                                                                                                                                                } elseif ($lp->bulan == 2) {
                                                                                                                                                                                                                    echo "Februari";
                                                                                                                                                                                                                } elseif ($lp->bulan == 3) {
                                                                                                                                                                                                                    echo "Maret";
                                                                                                                                                                                                                } elseif ($lp->bulan == 4) {
                                                                                                                                                                                                                    echo "April";
                                                                                                                                                                                                                } elseif ($lp->bulan == 5) {
                                                                                                                                                                                                                    echo "Mei";
                                                                                                                                                                                                                } elseif ($lp->bulan == 6) {
                                                                                                                                                                                                                    echo "Juni";
                                                                                                                                                                                                                } elseif ($lp->bulan == 7) {
                                                                                                                                                                                                                    echo "Juli";
                                                                                                                                                                                                                } elseif ($lp->bulan == 8) {
                                                                                                                                                                                                                    echo "Agustus";
                                                                                                                                                                                                                } elseif ($lp->bulan == 9) {
                                                                                                                                                                                                                    echo "September";
                                                                                                                                                                                                                } elseif ($lp->bulan == 10) {
                                                                                                                                                                                                                    echo "Oktober";
                                                                                                                                                                                                                } elseif ($lp->bulan == 11) {
                                                                                                                                                                                                                    echo "November";
                                                                                                                                                                                                                } elseif ($lp->bulan == 12) {
                                                                                                                                                                                                                    echo "Desember";
                                                                                                                                                                                                                }
                                                                                                                                                                                                                ?> 2023</p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <div class="col-md-11 m-auto">
                                                                <style>
                                                                    .tabled tr td {
                                                                        color: #000;
                                                                    }
                                                                </style>
                                                                <table class="table tabled table-bordered">
                                                                    <tr class="font-weight-bold">
                                                                        <td class="text-center font-weight-bold">No.</td>
                                                                        <td width=250 class="text-center">Tanggal Mulai</td>
                                                                        <td width=200 class="text-center">Tanggal Selesai</td>
                                                                        <td width=400 class="text-center">Kegiatan</td>
                                                                        <td width=400 class="text-center">Ruangan</td>
                                                                        <td width=400 class="text-center">Teknisi</td>
                                                                    </tr>
                                                                    <?php $nn = 1;
                                                                    $bulan = $lp->bulan;
                                                                    $query = $this->db->query("SELECT * FROM tb_pemeliharaan JOIN tb_ruangan ON tb_pemeliharaan.id_ruangan=tb_ruangan.id_ruangan JOIN tb_user ON tb_pemeliharaan.id_user=tb_user.id_user WHERE MONTH(tgl_mulai)=$bulan");
                                                                    $data_laporan = $query->result();
                                                                    foreach ($data_laporan as $datalp) { ?>
                                                                        <tr>
                                                                            <td><?= $nn++; ?></td>
                                                                            <td><?= date_indo($datalp->tgl_mulai) ?></td>
                                                                            <td><?= date_indo($datalp->tgl_selesai) ?></td>
                                                                            <td><?= $datalp->deskripsi ?></td>
                                                                            <td><?= $datalp->nama_ruangan ?></td>
                                                                            <td><?= $datalp->nama ?></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </table>
                                                                <i class="text-dark">Catatan : </i>
                                                                <p class="text-dark">Untuk data lengkap terdapat didalam lampiran data pemeliharaan.</p>
                                                            </div>
                                                            <div class="col-md-11 m-auto">
                                                                <table class="table table-borderless">
                                                                    <tr>
                                                                        <td width=300>
                                                                            <p class="text-center text-dark">Diperiksa Oleh</p>
                                                                            <p class="text-center text-dark">Kepala MRC,</p>
                                                                        </td>
                                                                        <td width=300></td>
                                                                        <td>
                                                                            <p class="text-center text-dark">Subang, <?= date_indo(date('Y-m-d')) ?></p>
                                                                            <p class="text-center text-dark">Staff MRC,</p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php if ($lp->status == "acc1") { ?>
                                                                            <td>
                                                                                <?php $query = $this->db->query("SELECT * FROM tb_user WHERE tb_user.hak_akses=3;");
                                                                                $user = $query->result();
                                                                                foreach ($user as $us) { ?>
                                                                                    <p class="text-center text-dark mt-5 font-weight-bold"><u>(<?= $us->nama ?>)</u></p>
                                                                                    <p class="text-center text-dark">NIP. <?= $us->nip ?></p>
                                                                                <?php } ?>
                                                                            </td>
                                                                        <?php } elseif ($lp->status == "acc2") { ?>
                                                                            <td>
                                                                                <?php $query = $this->db->query("SELECT * FROM tb_user WHERE tb_user.hak_akses=3;");
                                                                                $user = $query->result();
                                                                                foreach ($user as $us) { ?>
                                                                                    <p class="text-center text-dark mt-5 font-weight-bold"><u>(<?= $us->nama ?>)</u></p>
                                                                                    <p class="text-center text-dark">NIP. <?= $us->nip ?></p>
                                                                                <?php } ?>
                                                                            </td>
                                                                        <?php } else { ?>
                                                                            <td class="text-center">
                                                                                <p class="badge badge-danger mt-2">Menunggu ACC Kepala MRC</p>
                                                                            </td>
                                                                        <?php } ?>
                                                                        <td></td>
                                                                        <td width=300>
                                                                            <p class="text-center text-dark mt-5 font-weight-bold"><u>(<?= $lp->nama ?>)</u></p>
                                                                            <p class="text-center text-dark">NIP. <?= $lp->nip ?></p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3">
                                                                            <p class="text-center text-dark">Mengetahui,</p>
                                                                            <p class="text-center text-dark">Waka Sarana dan Prasarana,</p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php if ($lp->status == "acc1") { ?>
                                                                            <td colspan="3" class="text-center">
                                                                                <p class="badge badge-danger mt-2 shadow">Menunggu ACC Kepala MRC</p>
                                                                            </td>
                                                                        <?php } elseif ($lp->status == "acc2") { ?>
                                                                            <td colspan="3">
                                                                                <?php $query = $this->db->query("SELECT * FROM tb_user WHERE tb_user.hak_akses=4;");
                                                                                $user = $query->result();
                                                                                foreach ($user as $u) { ?>
                                                                                    <p class="text-center text-dark mt-5 font-weight-bold"><u>(<?= $u->nama ?>)</u></p>
                                                                                    <p class="text-center text-dark">NIP. <?= $u->nip ?></p>
                                                                                <?php } ?>
                                                                            </td>
                                                                        <?php } else { ?>
                                                                            <td colspan="3" class="text-center">
                                                                                <p class="badge badge-danger mt-2 shadow">Menunggu ACC Kepala MRC<br>Terlebih Dahulu</p>
                                                                            </td>
                                                                        <?php } ?>

                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?= base_url('laporan/') ?>edit/<?= $lp->id_laporan ?>" class="btn btn-sm btn-warning"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#<?= $lp->id_laporan ?>" onclick="konfirmasi_laporan('<?= $lp->id_laporan ?>','<?= $lp->bulan ?>')" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                                        <?php if ($lp->status == "acc2") { ?>
                                            <a href="<?= base_url('laporan/cetak/') . $lp->id_laporan ?>" class="btn btn-sm btn-secondary"><span class="mdi mdi-printer"></span></a>
                                        <?php } else {
                                            echo "";
                                        } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>