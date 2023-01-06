<div class="row">
    <div class="col-12">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <a href="<?= base_url(''); ?>ruangan/tambah" class="btn btn-primary btn-sm"><i class="mdi mdi-plus-circle"></i> Tambah</a>
                <h2 class="mx-auto text-uppercase">Kelola Ruangan</h2>
            </div>
            <div class="card-body">
                <div class="responsive-data-table">
                    <table id="responsive-data-table" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Ruangan</th>
                                <th>Daftar Barang</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $n  = 1;
                            foreach ($ruangan as $row) { ?>
                                <tr>
                                    <td><?= $n++; ?></td>
                                    <td><?php if ($row->foto == NULL) : ?>
                                            <img src="<?= base_url('assets/') ?>img/not_found.jpg ?>" alt="" width="100px">
                                        <?php else : ?>
                                            <img src="<?= base_url('assets/') ?>foto/ruangan/<?= $row->foto ?>" alt="" width="100px">
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $row->nama_ruangan ?></td>
                                    <td><button data-toggle="modal" data-target="#exampleModal<?= $row->id_ruangan ?>" class="btn btn-sm btn-info"><span class="mdi mdi-eye"></span> Lihat Barang</button>

                                        <div class="modal fade" id="exampleModal<?= $row->id_ruangan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Jumlah Barang : <button class="btn btn-success"><?php $query = $this->db->query("SELECT * FROM tb_barang WHERE tb_barang.id_ruangan=$row->id_ruangan");
                                                                                                                                                        echo $query->num_rows(); ?></button></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-responsive table-bordered">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Barang</th>
                                                                <th>Jenis</th>
                                                                <th>Kondisi</th>
                                                            </tr>
                                                            <?php $no = 1;
                                                            $query = $this->db->query("SELECT * FROM tb_barang WHERE tb_barang.id_ruangan=$row->id_ruangan");
                                                            $data = $query->result();
                                                            foreach ($data as $br) {
                                                            ?>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $br->nama_barang ?></td>
                                                                    <td><?= $br->jenis ?></td>
                                                                    <td><?php
                                                                        $query = $this->db->query("SELECT * FROM tb_barang WHERE tb_barang.id_barang=$br->id_barang;");
                                                                        $brg = $query->result();
                                                                        foreach ($brg as $b) {
                                                                            if ($b->status_barang == "b") {
                                                                                echo "<p class='btn btn-sm btn-primary'>Baik</p>";
                                                                            } elseif ($b->status_barang == "rr") {
                                                                                echo "<p class='btn btn-sm btn-warning'>Rusak Ringan</p>";
                                                                            } elseif ($b->status_barang == "rb") {
                                                                                echo "<p class='btn btn-sm btn-danger'>Rusak Berat</p>";
                                                                            }
                                                                        } ?>
                                                                    </td>
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
                                    </td>
                                    <td>
                                        <a href="<?= base_url('ruangan/') ?>edit/<?= $row->id_ruangan ?>" class="btn btn-sm btn-warning"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#<?= $row->id_ruangan ?>" onclick="konfirmasi_ruangan('<?= $row->id_ruangan ?>','<?= $row->nama_ruangan ?>')" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
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
<!-- Modal -->