<?php
  require "config.php";
  
  if( isset( $_SESSION["login"] ) ){
    header("Location:home.php");
    exit;
    die;
  }

  if( isset( $_POST["submit"] ) ){
    if( daftar($_POST) > 0 ){
      $_SESSION["pesan"] = ["data" => "Kamu", "notif" => "berhasil daftar", "color" => "success"];
      header("Location:index.php");
      exit;
      die;
    }else{
      $_SESSION["pesan"] = ["data" => "Kamu", "notif" => "gagal daftar", "color" => "danger"];
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">

              <!-- alert -->
              <?php
                if( isset($_SESSION["pesan"]) && $_SESSION["pesan"] !== NULL ) :
              ?>
                <div class="alert bg-<?= $_SESSION["pesan"]["color"] ?> text-white alert-dismissible fade show" role="alert">
                  <?= $_SESSION["pesan"]["data"] ?> <strong><?= $_SESSION["pesan"]["notif"] ?>!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php
              endif;
              ?>
              <!-- end alert -->

              <h4>Belum Punya Akun?</h4>
              <h6 class="font-weight-light">Daftar sangat mudah dengan langkah dibawah.</h6>
              <form class="pt-3" method="post" action="">
                <div class="form-group">
                  <input type="text" required class="form-control form-control-lg rounded" name="nama" placeholder="Nama">
                </div>
                <div class="form-group">
                  <input type="text" required class="form-control form-control-lg rounded" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg rounded" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="index.html">DAFTAR</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Sudah punya akun? <a href="index.php" class="text-primary">Login disini</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="vendors/jquery/jquery.js"></script>
  <script src="js/script.js"></script>
  <!-- endinject -->
</body>

</html>
<?php
  stopSession();
?>