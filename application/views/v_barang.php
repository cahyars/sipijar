<div class="row">
    <div class="col-12">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <a href="<?= base_url(''); ?>barang/tambah" class="btn btn-primary btn-sm"><i class="mdi mdi-plus-circle"></i> Tambah</a>
                <h2 class="mx-auto text-uppercase">Kelola Barang</h2>
            </div>
            <div class="card-body">
                <div class="responsive-data-table">
                    <table id="responsive-data-table" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr class="bg-light">
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Barang</th>
                                <th>Ruangan</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no  = 1;
                            foreach ($barang as $row) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td>
                                        <?php if ($row->foto_barang == null) : ?>
                                            <img src="<?= base_url('assets/') ?>img/barang/not_found.jpg" alt="" width="100px">
                                        <?php else : ?>
                                            <img src="<?= base_url('assets/') ?>foto/barang/<?= $row->foto_barang ?>" alt="" width="100px">
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $row->nama_barang ?></td>
                                    <td><?= $row->nama_ruangan ?></td>
                                    <td><?php
                                        if ($row->jenis == "komputer_lab") {
                                            echo "Komputer LAB";
                                        } elseif ($row->jenis == "komputer_office") {
                                            echo "Komputer Office";
                                        } else {
                                            echo "Peralatan Jaringan";
                                        }
                                        ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($row->status_barang == "b") {
                                            echo "<p class='badge badge-sm badge-success'>Baik</p>";
                                        } elseif ($row->status_barang == "rr") {
                                            echo "<p class='badge badge-sm badge-warning'>Rusak Ringan</p>";
                                        } elseif ($row->status_barang == "rb") {
                                            echo "<p class='badge badge-sm badge-danger'>Rusak Berat</p>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#exampleModal<?= $row->id_barang ?>" class="btn btn-sm btn-info"><span class="mdi mdi-eye"></span></button>

                                        <div class="modal fade" id="exampleModal<?= $row->id_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Barang : <?= $row->nama_barang; ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Riwayat Pemaliharaan Barang :</p>
                                                        <table class="table table-responsive table-bordered">
                                                            <tr class="bg-light">
                                                                <th>No</th>
                                                                <th>Tanggal</th>
                                                                <th>Kondisi</th>
                                                                <th>Teknisi</th>
                                                            </tr>
                                                            <?php
                                                            $nom = 1;
                                                            $query = $this->db->query("SELECT * FROM tb_pemeliharaan JOIN tb_pemeliharaan_barang ON tb_pemeliharaan_barang.id_pemeliharaan=tb_pemeliharaan.id_pemeliharaan JOIN tb_barang ON tb_pemeliharaan_barang.id_barang_pelihara=tb_barang.id_barang JOIN tb_user ON tb_pemeliharaan.id_user=tb_user.id_user WHERE tb_barang.id_barang=$row->id_barang;");
                                                            $brg = $query->result();
                                                            foreach ($brg as $b) { ?>
                                                                <tr>
                                                                    <td><?= $nom++; ?></td>
                                                                    <td><?= $b->tgl_selesai; ?></td>
                                                                    <td><?php
                                                                        if ($b->status == "b") {
                                                                            echo "<p class='text-success'>Baik</p>";
                                                                        } elseif ($b->status == "rr") {
                                                                            echo "<p class='text-warning'>Rusak Ringan</p>";
                                                                        } elseif ($b->status == "rb") {
                                                                            echo "<p class='text-danger'>Rusak Berat</p>";
                                                                        } ?>
                                                                    </td>
                                                                    <td><?= $b->nama; ?></td>
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

                                        <a href="<?= base_url('barang/') ?>edit/<?= $row->id_barang ?>" class="btn btn-sm btn-warning"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#<?= $row->id_barang ?>" onclick="konfirmasi_barang('<?= $row->id_barang ?>','<?= $row->nama_barang ?>')" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
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