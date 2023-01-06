<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Acara Pemeliharaan</title>
    <link id="sleek-css" rel="stylesheet" href="<?= base_url('assets/') ?>css/sleek.css" />
    <style>
        body {
            font-family: arial;
            color: #000;
            font-size: 14px;
        }

        table tr td p {
            font-size: 18px;
        }

        table div table tr td {
            font-size: 18px;
        }

        .tabled tr td {
            color: #000;
            border: 0.5px solid #000000;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <?php foreach ($pemeliharaan as $row) { ?>
        <?php if ($row->status_pemeliharaan == "selesai") { ?>
            <table class="table table-borderless">
                <!-- <tr style="border-bottom: 5px solid #000; ">
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
            </tr> -->
                <tr style="border-bottom: 5px solid #000; ">
                    <td width=200 class="text-center"><img class="mt-2" src="<?= base_url('assets/img/smk.png') ?>" width="125px" alt=""></td>

                    <td class="align-middle">
                        <div class="text-dark font-weight-bold text-center" style="line-height: 0.2; font-size: 18px;">
                            <h4 class="font-weight-bold">MAINTENANCE REPAIR AND CALIBRATION</h4>
                            <h4 class="font-weight-bold">SMK NEGERI 1 SUBANG</h4>
                            <p>Jl. Arief Rahman Hakim No.35, Kel. Cigadung</p>
                            <p>Kabupaten Subang - 41213</p>
                        </div>
                    </td>
                    <td width=200 class="text-center"><img class="mt-2" src="<?= base_url('assets/img/mr.png') ?>" width="125px" alt=""></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">
                        <p class="font-weight-bold mt-3 mb-2">BERITA ACARA PELAKSANAAN PEMELIHARAAN</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-justify text-dark">
                        <p>Pada hari <?php
                                        echo longdate_indo($row->tgl_selesai); ?>, telah dilaksanakan kegiatan pemeliharaan yang dikerjakan oleh :</p>
                    </td>
                </tr>
                <!-- Data Teknisi -->
                <tr>
                    <td>
                        <p class="font-weight-bold ml-2">Nama Lengkap</p>
                    </td>
                    <td class="text-dark">
                        <p>: <?= $row->nama ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="font-weight-bold ml-2">NIP</p>
                    </td>
                    <td class="text-dark">
                        <p>: <?= $row->nip ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="font-weight-bold ml-2">Jabatan</p>
                    </td>
                    <td class="text-dark">
                        <p>: <?= $row->jabatan ?></p>
                    </td>
                </tr>
                <!-- Data Ruangan -->
                <tr>
                    <td colspan="3">
                        <p>Selaku teknisi pada kegiatan <b><?= $row->deskripsi ?></b> dengan keterangan :</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="font-weight-bold ml-2">Ruangan</p>
                    </td>
                    <td class="text-dark">
                        <p>: <?= $row->nama_ruangan ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="font-weight-bold ml-2">Tanggal Mulai</p>
                    </td>
                    <td class="text-dark">
                        <p>: <?= date_indo($row->tgl_mulai) ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="font-weight-bold ml-2">Tanggal Selesai</p>
                    </td>
                    <td class="text-dark">
                        <p>: <?= date_indo($row->tgl_selesai) ?></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p>Hasil akhir dari kondisi barang yang dilakukan pemeliharaan ditampilkan pada tabel berikut :</p>
                    </td>
                </tr>
            </table>
            <div class="col-md-11 m-auto">
                <table class="table tabled">
                    <tr class="font-weight-bold">
                        <td class="text-center font-weight-bold">No.</td>
                        <td width=250 class="text-center">Nama Barang</td>
                        <td width=200 class="text-center">Status</td>
                        <td width=400 class="text-center">Keterangan</td>
                        <td width=400 class="text-center">Estimasi Biaya</td>
                    </tr>
                    <?php $nn = 1; { ?>
                        <tr>
                            <td width=10><?= $nn++; ?></td>
                            <td><?= $row->nama_barang; ?></td>
                            <td class="text-center"><?php if ($row->status_barang == "b") {
                                                        echo "Baik";
                                                    } elseif ($row->status_barang == "rr") {
                                                        echo "Rusak Ringan";
                                                    } elseif ($row->status_barang == "rb") {
                                                        echo "Rusak Berat";
                                                    } ?></td>
                            <td><?= $row->keterangan; ?></td>
                            <td>Rp. <?= $row->biaya; ?> </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <br>
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
                        <td>
                            <?php $query = $this->db->query("SELECT * FROM tb_user WHERE tb_user.hak_akses=3;");
                            $user = $query->result();
                            foreach ($user as $us) { ?>
                                <p class="text-center text-dark mt-5 font-weight-bold"><u>(<?= $us->nama ?>)</u></p>
                                <p class="text-center text-dark">NIP. <?= $us->nip ?></p>
                            <?php } ?>
                        </td>
                        <td></td>
                        <td width=300>
                            <p class="text-center text-dark mt-5 font-weight-bold"><u>(<?= $row->nama ?>)</u></p>
                            <p class="text-center text-dark">NIP. <?= $row->nip ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p class="text-center text-dark">Mengetahui,</p>
                            <p class="text-center text-dark">Waka Sarana dan Prasarana,</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <?php $query = $this->db->query("SELECT * FROM tb_user WHERE tb_user.hak_akses=4;");
                            $user = $query->result();
                            foreach ($user as $u) { ?>
                                <p class="text-center text-dark mt-5 font-weight-bold"><u>(<?= $u->nama ?>)</u></p>
                                <p class="text-center text-dark">NIP. <?= $u->nip ?></p>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </div>
        <?php } else { ?>
            <center>
                <h1 class="btn btn-danger btn-lg m-5">TIDAK DAPAT MENCETAK BERITA ACARA!</h1>
            </center>
        <?php } ?>
    <?php } ?>
</body>
<script>
    window.print();
</script>

</html>