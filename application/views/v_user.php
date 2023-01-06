<div class="row">
    <div class="col-12">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <a href="<?= base_url(''); ?>user/tambah" class="btn btn-primary btn-sm"><i class="mdi mdi-plus-circle"></i> Tambah</a>
                <h2 class="mx-auto text-uppercase">Kelola User</h2>
            </div>
            <div class="card-body">
                <div class="responsive-data-table">
                    <table id="responsive-data-table" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Hak Akses</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no  = 1;
                            foreach ($user as $row) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="<?php
                                                    if (!empty($row->foto)) {
                                                        echo base_url('assets/foto/user/') . $row->foto;
                                                    } else {
                                                        echo base_url('assets/img/barang/not_found.jpg');
                                                    }
                                                    ?>" class="img-thumbnail" width="100px"></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= $row->jabatan ?></td>
                                    <td><?php
                                        if ($row->hak_akses == '1') {
                                            echo "Admin";
                                        } elseif ($row->hak_akses == '2') {
                                            echo "Staff";
                                        } elseif ($row->hak_akses == '3') {
                                            echo "Kepala MRC";
                                        } elseif ($row->hak_akses == '4') {
                                            echo "Wakasek";
                                        }
                                        ?></td>
                                    <td>
                                        <button data-toggle="modal" data-target="#exampleModal<?= $row->id_user ?>" class="btn btn-sm btn-info"><span class="mdi mdi-eye"></span></button>

                                        <div class="modal fade" id="exampleModal<?= $row->id_user; ?>" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <table class="table table-borderless">
                                                                <tr>
                                                                    <td>Foto</td>
                                                                    <td>: <img src="<?php
                                                                                    if (!empty($row->foto)) {
                                                                                        echo base_url('assets/foto/user/') . $row->foto;
                                                                                    } else {
                                                                                        echo base_url('assets/img/barang/not_found.jpg');
                                                                                    }
                                                                                    ?>" class="img-thumbnail" width="100px"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>NIP</td>
                                                                    <td>: <?= $row->nip ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama</td>
                                                                    <td>: <?= $row->nama ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jabatan</td>
                                                                    <td>: <?= $row->jabatan ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Akses</td>
                                                                    <td>: <?php
                                                                            if ($row->hak_akses == '1') {
                                                                                echo "Admin";
                                                                            } elseif ($row->hak_akses == '2') {
                                                                                echo "Staff";
                                                                            } elseif ($row->hak_akses == '3') {
                                                                                echo "Kepala MRC";
                                                                            } elseif ($row->hak_akses == '4') {
                                                                                echo "Wakasek";
                                                                            }
                                                                            ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Username</td>
                                                                    <td>: <?= $row->username ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="<?= base_url('user/') ?>edit/<?= $row->id_user ?>" class="btn btn-sm btn-warning"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#<?= $row->id_user ?>" onclick="konfirmasi_user('<?= $row->id_user ?>','<?= $row->nama ?>')" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
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