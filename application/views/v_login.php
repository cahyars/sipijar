<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">

  <title>Login | SIPIJARKOM</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
  <link href="<?= base_url('assets/'); ?>css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="<?= base_url('assets/'); ?>css/sleek.css" />

  <!-- FAVICON -->
  <link href="<?= base_url('assets/'); ?>img/smk.png" rel="shortcut icon" />

  <link href="<?= base_url('assets/'); ?>options/optionswitch.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/sweetalert2/sweetalert2.min.css">

  <script src="<?= base_url('assets/'); ?>plugins/nprogress/nprogress.js"></script>
  <style>
    @media only screen and (max-width: 800px) {
      .container {
        margin-top: 50px;
        margin-bottom: 50px;
      }
    }
  </style>
</head>

<body class="" id="body">
  <div class="container d-flex align-items-center justify-content-center" style="margin-top: 100px;">
    <div class="row justify-content-center col-lg-10 col-md-10 col-sm-12">
      <div class="card-group d-flex flex-column flex-lg-row flex-md-row shadow">
        <div class="card">
          <div class="card-body p-5">
            <h2 class="text-dark text-center mb-3">Sign In</h2>
            <p class="text-dark text-center mb-5">Silahkan login untuk masuk aplikasi</p>
            <form action="<?= base_url('login/proses_login'); ?>" method="POST">
              <div class="row">
                <div class="form-group col-md-12 mb-4">
                  <input type="text" class="form-control input-lg" placeholder="Username" name="username" required>
                </div>

                <div class="form-group col-md-12 ">
                  <input type="password" class="form-control input-lg" placeholder="Password" name="password" required>
                </div>

                <div class="col-md-6 mx-auto mt-5">
                  <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-body text-center p-5 bg-primary">
            <h4 class="text-light">SISTEM INFORMASI PEMELIHARAAN INFRASTRUKTUR JARINGAN DAN KOMPUTER</h4>
            <img src="<?= base_url('assets/'); ?>img/smk.png" class="m-5 w-50 align-middle align-items-center" alt="">
            <h5 class="mt-3 text-light">SMK NEGERI 1 SUBANG</h5>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url(''); ?>assets/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url(''); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(''); ?>assets/js/sleek.js"></script>
  <script src="<?= base_url('assets/') ?>vendors/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="<?= base_url(''); ?>assets/options/optionswitcher.js"></script>
  <?= $this->session->flashdata('pesan'); ?>
</body>

</html>