<div class="row">
    <div class="col-12">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <?php if ($_SESSION['hak_akses'] == "kepala") {
                    echo ""; ?>
                <?php } else { ?>
                    <a href="<?= base_url(''); ?>pemeliharaan/tambah" class="btn btn-primary btn-sm"><i class="mdi mdi-plus-circle"></i> Tambah</a>
                <?php } ?>
                <h2 class="mx-auto text-uppercase">Data Pemeliharaan</h2>
            </div>

            <div class="card-body">
                <div class="responsive-data-table">
                    <table id="responsive-data-table" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Deskripsi</th>
                                <th>Ruangan</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pemeliharaan as $row) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->tgl_mulai ?></td>
                                    <td><?= $row->tgl_selesai ?></td>
                                    <td><?php
                                        $teks = $row->deskripsi;
                                        $jk   = 20;
                                        $tampil = substr($teks, 0, $jk);
                                        echo $tampil . '...';
                                        ?></td>
                                    <td><?= $row->nama_ruangan ?></td>
                                    <td><?php if ($row->status_pemeliharaan == "menunggu") {
                                            echo "<p class='badge badge-warning'>Menunggu</p>";
                                        } elseif ($row->status_pemeliharaan == "disetujui") {
                                            echo "<p class='badge badge-success'>Disetujui</p>";
                                        } elseif ($row->status_pemeliharaan == "ditolak") {
                                            echo "<p class='badge badge-danger'>Ditolak</p>";
                                        } elseif ($row->status_pemeliharaan == "pengerjaan") {
                                            echo "<p class='badge badge-primary'>Pengerjaan</p>";
                                        } else {
                                            echo "<p class='badge badge-secondary'>Selesai</p>";
                                        } ?></td>
                                    <td>
                                        <button data-toggle="modal" data-target="#exampleModal<?= $row->id_pemeliharaan ?>" class="btn btn-sm btn-success"><span class="mdi mdi-eye"></span></button>

                                        <!-- Modal -->
                                        <div class="modal fade bd-example-modal-lg" id="exampleModal<?= $row->id_pemeliharaan ?>" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Pemeliharaan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <td>Deskripsi</td>
                                                                <td>:</td>
                                                                <td><?= $row->deskripsi ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status</td>
                                                                <td>:</td>
                                                                <td><?php if ($row->status_pemeliharaan == "menunggu") {
                                                                        echo "<span class='text-warning'>Menunggu Konfirmasi</span>";
                                                                    } elseif ($row->status_pemeliharaan == "disetujui") {
                                                                        echo "<span class='text-success'>Disetujui</span>";
                                                                    } elseif ($row->status_pemeliharaan == "ditolak") {
                                                                        echo "<span class='text-danger'>Ditolak</span>";
                                                                    } elseif ($row->status_pemeliharaan == "pengerjaan") {
                                                                        echo "<span class='text-primary'>Pengerjaan</span>";
                                                                    } else {
                                                                        echo "<span class='text-secondary'>Selesai</span>";
                                                                    } ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Mulai</td>
                                                                <td>:</td>
                                                                <td><?= $row->tgl_mulai ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Selesai</td>
                                                                <td>:</td>
                                                                <td><?= $row->tgl_selesai ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Teknisi</td>
                                                                <td>:</td>
                                                                <td><?= $row->nama ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ruangan</td>
                                                                <td>:</td>
                                                                <td><?= $row->nama_ruangan ?></td>
                                                            </tr>
                                                        </table>
                                                        <table class="table table-bordered">
                                                            <tr class="bg-light">
                                                                <th>No</th>
                                                                <th>Nama Barang</th>
                                                            </tr>
                                                            <?php
                                                            $query = $this->db->query("SELECT * FROM tb_pemeliharaan JOIN tb_pemeliharaan_barang ON tb_pemeliharaan.id_pemeliharaan=tb_pemeliharaan_barang.id_pemeliharaan JOIN tb_barang ON tb_pemeliharaan_barang.id_barang_pelihara=tb_barang.id_barang WHERE tb_pemeliharaan.id_pemeliharaan=$row->id_pemeliharaan;");
                                                            $p_barang = $query->result();
                                                            $nomor = 1;
                                                            foreach ($p_barang as $pb) { ?>
                                                                <tr>
                                                                    <td><?= $nomor++; ?></td>
                                                                    <td><?= $pb->nama_barang; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </table>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="<?= base_url('pemeliharaan/edit/') . $row->id_pemeliharaan ?>" class="btn btn-sm btn-warning"><span class="mdi mdi-pencil"></span></a>
                                        <a href="#<?= $row->id_pemeliharaan ?>" onclick="konfirmasi_pemeliharaan('<?= $row->id_pemeliharaan ?>','<?= $row->deskripsi ?>')" class="btn btn-sm btn-danger"><span class="mdi mdi-trash-can-outline"></span></a>
                                        <?php if ($row->status_pemeliharaan == "selesai") { ?>
                                            <a href="<?= base_url('pemeliharaan/cetak/') . $row->id_pemeliharaan ?>" class="btn btn-sm btn-secondary"><span class="mdi mdi-printer"></span></a>
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