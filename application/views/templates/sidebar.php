<!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="<?= base_url(); ?>" title="Sleek Dashboard">
                <img class="brand-icon" src="<?= base_url(''); ?>assets/img/smk.png" alt="" width="30" height="33" viewBox="0 0 30 33">
                <span class="brand-name text-truncate">SIPIJARKOM</span>
            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="" data-simplebar style="height: 100%;">
            <?php if ($_SESSION['hak_akses'] == "admin") { ?>
                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">
                    <li <?php
                        if ($this->uri->segment(1) == "dashboard") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>dashboard">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li <?php
                        if ($this->uri->segment(1) == "jadwal" && $this->uri->segment(2) == "") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>jadwal">
                            <i class="mdi mdi-calendar-text"></i>
                            <span class="nav-text">Jadwal</span>
                        </a>
                    </li>

                    <li <?php
                        if ($this->uri->segment(2) == "kelola") {
                            echo "class='active'";
                        } elseif ($this->uri->segment(1) == "jadwal" && $this->uri->segment(2) == "tambah") {
                            echo "class='active'";
                        } else {
                            echo "";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>jadwal/kelola">
                            <i class="mdi mdi-calendar-plus"></i>
                            <span class="nav-text">Kelola Jadwal</span>
                        </a>
                    </li>

                    <li <?php
                        if ($this->uri->segment(1) == "pemeliharaan") {
                            echo "class='active'";
                        } elseif ($this->uri->segment(1) == "pemeliharaan" && $this->uri->segment(2) == "tambah") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>pemeliharaan">
                            <i class="mdi mdi-view-list"></i>
                            <span class="nav-text">Pemeliharaan</span>
                        </a>
                    </li>

                    <li <?php
                        if ($this->uri->segment(1) == "barang") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>barang">
                            <i class="mdi mdi-laptop-chromebook"></i>
                            <span class="nav-text">Kelola Barang</span>
                        </a>
                    </li>

                    <li <?php
                        if ($this->uri->segment(1) == "ruangan") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>ruangan">
                            <i class="mdi mdi-home"></i>
                            <span class="nav-text">Kelola Ruangan</span>
                        </a>
                    </li>

                    <li <?php
                        if ($this->uri->segment(1) == "user") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>user">
                            <i class="mdi mdi-account"></i>
                            <span class="nav-text">Kelola User</span>
                        </a>
                    </li>

                    <li <?php
                        if ($this->uri->segment(1) == "laporan") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>laporan">
                            <i class="mdi mdi-folder-open"></i>
                            <span class="nav-text">Kelola Laporan</span>
                        </a>
                    </li>
                </ul>
            <?php } elseif ($_SESSION['hak_akses'] == "staff") { ?>
                <ul class="nav sidebar-inner" id="sidebar-menu">
                    <li <?php
                        if ($this->uri->segment(1) == "dashboard") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>dashboard">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li <?php
                        if ($this->uri->segment(1) == "jadwal" && $this->uri->segment(2) == "") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>jadwal">
                            <i class="mdi mdi-calendar-text"></i>
                            <span class="nav-text">Jadwal</span>
                        </a>
                    </li>
                    <li <?php
                        if ($this->uri->segment(1) == "pemeliharaan") {
                            echo "class='active'";
                        } elseif ($this->uri->segment(1) == "pemeliharaan" && $this->uri->segment(2) == "tambah") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>pemeliharaan">
                            <i class="mdi mdi-view-list"></i>
                            <span class="nav-text">Pemeliharaan</span>
                        </a>
                    </li>
                    <li <?php
                        if ($this->uri->segment(1) == "barang") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>barang">
                            <i class="mdi mdi-laptop-chromebook"></i>
                            <span class="nav-text">Kelola Barang</span>
                        </a>
                    </li>
                    <li <?php
                        if ($this->uri->segment(1) == "laporan") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>laporan">
                            <i class="mdi mdi-folder-open"></i>
                            <span class="nav-text">Kelola Laporan</span>
                        </a>
                    </li>
                </ul>
            <?php } elseif ($_SESSION['hak_akses'] == "kepala") { ?>
                <ul class="nav sidebar-inner" id="sidebar-menu">
                    <li <?php
                        if ($this->uri->segment(1) == "dashboard") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>dashboard">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li <?php
                        if ($this->uri->segment(1) == "jadwal" && $this->uri->segment(2) == "") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>jadwal">
                            <i class="mdi mdi-calendar-text"></i>
                            <span class="nav-text">Jadwal</span>
                        </a>
                    </li>
                    <li <?php
                        if ($this->uri->segment(1) == "pemeliharaan") {
                            echo "class='active'";
                        } elseif ($this->uri->segment(1) == "pemeliharaan" && $this->uri->segment(2) == "tambah") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>pemeliharaan">
                            <i class="mdi mdi-view-list"></i>
                            <span class="nav-text">Pemeliharaan</span>
                        </a>
                    </li>
                    <li <?php
                        if ($this->uri->segment(1) == "laporan") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>laporan">
                            <i class="mdi mdi-folder-open"></i>
                            <span class="nav-text">Kelola Laporan</span>
                        </a>
                    </li>
                </ul>
            <?php } elseif ($_SESSION['hak_akses'] == "wakasek") { ?>
                <ul class="nav sidebar-inner" id="sidebar-menu">
                    <li <?php
                        if ($this->uri->segment(1) == "dashboard") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>dashboard">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li <?php
                        if ($this->uri->segment(1) == "jadwal" && $this->uri->segment(2) == "") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>jadwal">
                            <i class="mdi mdi-calendar-text"></i>
                            <span class="nav-text">Jadwal</span>
                        </a>
                    </li>
                    <li <?php
                        if ($this->uri->segment(1) == "laporan") {
                            echo "class='active'";
                        }
                        ?>>
                        <a class="sidenav-item-link" href="<?= base_url(); ?>laporan">
                            <i class="mdi mdi-folder-open"></i>
                            <span class="nav-text">Kelola Laporan</span>
                        </a>
                    </li>
                </ul>
            <?php } ?>
        </div>

    </div>
</aside>


<!-- ====================================
        ——— PAGE WRAPPER
        ===================================== -->
<div class="page-wrapper">