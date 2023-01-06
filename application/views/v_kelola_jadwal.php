<div class="row">
    <div class="col-12">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <a href="<?= base_url(''); ?>jadwal/tambah" class="btn btn-primary btn-sm"><i class="mdi mdi-plus-circle"></i> Tambah</a>
                <h2 class="mx-auto text-uppercase">Kelola Jadwal Pemeliharaan</h2>
            </div>
            <div class="card-body">
                <div class="responsive-data-table">
                    <table id="responsive-data-table" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Kegiatan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no  = 1;
                            foreach ($jadwal as $row) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->tgl_mulai ?></td>
                                    <td><?= $row->tgl_selesai ?></td>
                                    <td><?= $row->deskripsi ?></td>
                                    <td>
                                        <a href="<?= base_url('jadwal/'); ?>edit/<?= $row->id_jadwal; ?>" class="btn btn-sm btn-warning"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#<?= $row->id_jadwal ?>" onclick="konfirmasi_jadwal('<?= $row->id_jadwal ?>','<?= $row->deskripsi ?>')" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
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