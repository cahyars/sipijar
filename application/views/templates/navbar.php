<!-- Header -->
<header class="main-header" id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
        </button>
        <!-- search form -->
        <div class="search-form d-none d-lg-inline-block">
        <p class="text-uppercase">pemeliharaan infrastruktur jaringan dan komputer - smkn 1 subang</p>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <img src="<?php if (!empty($_SESSION['foto'])) {
                                        echo base_url('assets/foto/user/') . $_SESSION['foto'];
                                    } else {
                                        echo base_url('assets/foto/user/not_found.png');
                                    } ?>" class="user-image" alt="User Image" />
                        <span class="d-none d-lg-inline-block"><?= $_SESSION['nama']; ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <!-- User image -->
                        <li class="dropdown-header">
                            <img src="<?php if (!empty($_SESSION['foto'])) {
                                            echo base_url('assets/foto/user/') . $_SESSION['foto'];
                                        } else {
                                            echo base_url('assets/foto/user/not_found.png');
                                        } ?>" class="img-circle" alt="User Image" />
                            <div class="d-inline-block">
                                <?= $_SESSION['nama'] ?> <small class="pt-1"><?= $_SESSION['jabatan'] ?></small>
                            </div>
                        </li>


                        <!-- <li>
                            <a href="<?= base_url(); ?>user-profile.html">
                                <i class="mdi mdi-account"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>#">
                                <i class="mdi mdi-email"></i> Message
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
                        </li>
                        <li class="right-sidebar-in">
                            <a href="<?= base_url(); ?>javascript:0"> <i class="mdi mdi-settings"></i> Setting </a>
                        </li> -->

                        <!-- <li class="dropdown-footer"> -->
                        <li>
                            <a href="#" onclick="logout()"> <i class="mdi mdi-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- ====================================
          ——— CONTENT WRAPPER
          ===================================== -->
<div class="content-wrapper">
    <div class="content">