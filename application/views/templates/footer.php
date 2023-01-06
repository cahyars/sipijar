</div> <!-- End Content -->
</div> <!-- End Content Wrapper -->

<!-- Footer -->
<footer class="footer mt-auto shadow">
    <div class="copyright bg-white">
        <p>
            Developer &copy; <span id="copy-year"></span> by <a class="text-primary" href="#">Maintenance Repair Calibration</a>.
        </p>
    </div>
    <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
    </script>
</footer>

</div> <!-- End Page Wrapper -->
</div>
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#ruangan').change(function() {
            var id_ruangan = $('#ruangan').val();
            if (id_ruangan != '') {
                $.ajax({
                    url: "<?= base_url('pemeliharaan/cek_barang') ?>",
                    method: "POST",
                    data: {
                        id_ruangan: id_ruangan
                    },
                    success: function(data) {
                        $('#barang').html(data);
                    }
                })
            }
        })
    })
</script>
<script src="<?= base_url('assets/') ?>vendors/dropify/dropify.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/dropify/dropify.js"></script>

<script src="<?= base_url('assets/') ?>plugins/nprogress/nprogress.js"></script>
<script src="<?= base_url('assets/'); ?>vendors/fullcalendar/lib/main.js"></script>

<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/simplebar/simplebar.min.js"></script>

<script src='<?= base_url('assets/') ?>plugins/charts/Chart.min.js'></script>
<script src='<?= base_url('assets/') ?>js/chart.js'></script>
<script src='<?= base_url('assets/') ?>plugins/select2/js/select2.min.js'></script>

<script src="<?= base_url('assets/') ?>js/sleek.js"></script>
<script src="<?= base_url('assets/') ?>vendors/sweetalert2/sweetalert2.all.min.js"></script>

<script src='<?= base_url('assets/') ?>plugins/data-tables/jquery.datatables.min.js'></script>
<script src='<?= base_url('assets/') ?>plugins/data-tables/datatables.bootstrap4.min.js'></script>
<script src='<?= base_url('assets/') ?>plugins/data-tables/datatables.responsive.min.js'></script>


<script>
    function logout() {
        Swal.fire({
            title: 'Yakin untuk Logout?',
            text: "Silahkan klik Ya untuk melanjutkan",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "<?= base_url() ?>login/logout";
            }
        })
    }
</script>
<script type="text/javascript">
    function konfirmasi_ruangan(id_ruangan, nama_ruangan) {
        Swal.fire({
            title: 'Hapus Ruangan?',
            text: nama_ruangan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                window.location = "<?php echo base_url(); ?>/ruangan/hapus/" + id_ruangan;
            }
        })
    }
</script>
<script type="text/javascript">
    function konfirmasi_pemeliharaan(id_pemeliharaan, deskripsi) {
        Swal.fire({
            title: 'Hapus Data Pemeliharaan?',
            text: deskripsi,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                window.location = "<?php echo base_url(); ?>pemeliharaan/hapus/" + id_pemeliharaan;
            }
        })
    }
</script>
<script type="text/javascript">
    function konfirmasi_barang(id_barang, nama_barang) {
        Swal.fire({
            title: 'Yakin Hapus Barang?',
            text: nama_barang,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                window.location = "<?= base_url(); ?>barang/hapus/" + id_barang;
            }
        })
    }
</script>
<script type="text/javascript">
    function konfirmasi_jadwal(id_jadwal, deskripsi) {
        Swal.fire({
            title: 'Hapus Jadwal?',
            text: deskripsi,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                window.location = "<?= base_url(); ?>jadwal/hapus/" + id_jadwal;
            }
        })
    }
</script>
<script type="text/javascript">
    function konfirmasi_user(id_user, nama) {
        Swal.fire({
            title: 'Hapus User?',
            text: nama,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                window.location = "<?= base_url(); ?>/user/hapus/" + id_user;
            }
        })
    }
</script>
<?php echo $this->session->flashdata('pesan'); ?>
</body>

</html>