<!-- Top Statistics -->

<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4">
            <div class="card-body text-center">
                <h2 class="mb-1"><?php
                                    $query = $this->db->query("SELECT * FROM tb_barang WHERE tb_barang.jenis='jaringan'");
                                    $barang = $query->num_rows();
                                    echo "$barang";
                                    ?></h2>
                <p>Perangkat Jaringan</p>
                <div class="img-responsive">
                    <img class="m-3" src="<?= base_url('assets/img/network.png') ?>" width="125px" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini  mb-4">
            <div class="card-body text-center">
                <h2 class="mb-1"><?php
                                    $query = $this->db->query("SELECT * FROM tb_barang WHERE tb_barang.jenis='komputer_lab'");
                                    $pc_lab = $query->num_rows();
                                    echo "$pc_lab";
                                    ?></h2>
                <p>Komputer LAB</p>
                <div class="img-responsive">
                    <img class="m-2" src="<?= base_url('assets/img/computer.jpg') ?>" width="120px" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4">
            <div class="card-body text-center">
                <h2 class="mb-1"><?php
                                    $query = $this->db->query("SELECT * FROM tb_barang WHERE tb_barang.jenis='komputer_office'");
                                    $pc_of = $query->num_rows();
                                    echo "$pc_of";
                                    ?></h2>
                <p class="mb-2">Komputer Office</p>
                <div class="img-responsive">
                    <img class="m-2" src="<?= base_url('assets/img/pc_aio.jpg') ?>" width="160px" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card card-mini mb-4">
            <div class="card-body bg-warning text-center">
                <h2 class="mb-1 text-white"><?php
                                            $query = $this->db->query("SELECT * FROM tb_barang WHERE tb_barang.status_barang='rr'");
                                            $rr = $query->num_rows();
                                            echo "$rr";
                                            ?></h2>
                <p class="text-white">Rusak Ringan</p>
            </div>
        </div>
        <div class="card card-mini mb-4">
            <div class="card-body bg-danger text-center">
                <h2 class="mb-1 text-white"><?php
                                            $query = $this->db->query("SELECT * FROM tb_barang WHERE tb_barang.status_barang='rb'");
                                            $rb = $query->num_rows();
                                            echo "$rb";
                                            ?></h2>
                <p class="text-white">Rusak Berat</p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-7 col-md-12">

        <!-- Sales Graph -->
        <div class="card card-default">
            <div class="card-header">
                <h2 class="text-bold">Denah Ruangan - SMKN 1 SUBANG</h2>
            </div>
            <div class="card-body">
                <img src="<?= base_url('assets/img/denah.jpeg') ?>" width="100%" alt="">
            </div>
            <div class="card-footer d-flex flex-wrap bg-white p-0">
                <div class="col-6 px-0">
                    <div class="text-center p-4">
                        <h4>75</h4>
                        <p class="mt-2">Jumlah Ruangan</p>
                    </div>
                </div>
                <div class="col-6 px-0">
                    <div class="text-center p-4 border-left">
                        <h4>250</h4>
                        <p class="mt-2">Jumlah Barang</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-5 col-md-12">

        <!-- Doughnut Chart -->
        <div class="card card-default">
            <div class="card-header justify-content-center">
                <h2>Kondisi Keseluruhan</h2>
            </div>
            <div class="card-body">
                <canvas id="doChart"></canvas>
            </div>
            <div class="card-footer d-flex flex-wrap bg-white p-0">
                <div class="col-6">
                    <div class="py-4 px-4">
                        <ul class="d-flex flex-column justify-content-between">
                            <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #4c84ff"></i>Baik</li>
                            <li><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #80e1c1 "></i>Rusak Ringan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-default">
            <div class="card-body">
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            selectable: true,
                            dayMaxEvents: true,
                        });

                        calendar.render();
                    });
                </script>
                <div id='calendar'></div>
            </div>
        </div>

    </div>
</div>