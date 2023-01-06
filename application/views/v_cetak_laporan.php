<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan</title>
    <link id="sleek-css" rel="stylesheet" href="<?= base_url('assets/') ?>css/sleek.css" />
    <style>
        table tr td p {
            font-size: 20px;
        }

        table div table tr td {
            font-size: 20px;
        }

        div i p {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <?php $nmr = 1;
    foreach ($laporan as $lp) { ?>
        <table class="table table-borderless">
            <tr style="border-bottom: 5px solid #000; ">
                <td width=200 class="text-center"><img src="<?= base_url('assets/img/jabar.png') ?>" width="130px" alt=""><br><b class="btn btn-rounded btn-sm btn-outline-dark">NPSN : 20233680</b></td>

                <td colspan="3" class="align-middle">
                    <div class="text-dark font-weight-bold text-center mr-5" style="line-height: 0.2;">
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
                <td colspan="4" class="text-center">
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
        <div class="col-md-12 m-auto">
            <style>
                .tabled tr td {
                    color: #000;
                    font-size: 18px;
                }
            </style>
            <table class="table tabled table-bordered">
                <tr class="font-weight-bold">
                    <td class="text-center font-weight-bold">No.</td>
                    <td width=250 class="text-center">Tanggal Mulai</td>
                    <td width=250 class="text-center">Tanggal Selesai</td>
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
            <i style="font-size: 18px;" class="text-dark">Catatan : </i>
            <p style="font-size: 18px;" class="text-dark">Untuk data lengkap terdapat didalam lampiran data pemeliharaan.</p>
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
    <?php } ?>
</body>
<script>
    window.print();
</script>
</html>