<?php
  require "config.php";
  $data = readData();
  if( isset($_POST["submit"]) ){
    if( tambahMahasiswa($_POST) > 0 ){
      $_SESSION["pesan"] = ["data" => "mahasiswa", "notif" => "berhasil ditambah", "color" => "primary"];
    }else{
      $_SESSION["pesan"] = ["data" => "mahasiswa", "notif" => "gagal ditambah", "color" => "danger"];
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>UAS | WEB DESIGN</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5 font-weight-500" href="home.php">UAS</a>
        <a class="navbar-brand brand-logo-mini font-weight-500" href="home.php">UAS</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face1.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          
          <!-- link sidebar -->
          
          <li class="nav-item">
            <a class="nav-link" href="home.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="mahasiswa.php">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Mahasiswa</span>
            </a>
          </li>

          <!-- end link sidebar -->

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          
          <div class="row">
            <div class="col-md-12 grid-margin">
              
              <!-- content -->

              <!-- alert -->
              <?php
                if( isset($_SESSION["pesan"]) && $_SESSION["pesan"] !== NULL ) :
              ?>
                <div class="alert bg-<?= $_SESSION["pesan"]["color"] ?> text-white alert-dismissible fade show" role="alert">
                  Data <?= $_SESSION["pesan"]["data"] ?> <strong><?= $_SESSION["pesan"]["notif"] ?>!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php
              endif;
              ?>
              <!-- end alert -->
              
              <div class="row">
                
                <!-- data mahasiswa -->
                <div class="col-lg-6 col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Data Mahasiswa</h4>
                      <p class="card-description">Berikut adalah semua data mahasiswa </p>
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Masukan kata kunci" id="input-search">
                          <div class="input-group-append">
                            <button class="btn btn-sm btn-primary" id="btn-search" type="button">Search</button>
                          </div>
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <tbody id="table-content">
                            <?php
                              foreach ( $data as $row ) :
                            ?>
                              <tr>
                                <td>
                                  <?= $row["namaMahasiswa"]; ?>
                                </td>
                                <td class="text-right">
                                  <a href="detail.php?id=<?= $row["idMhs"]; ?>" class="badge badge-primary">detail</a>
                                  <a href="ubah.php?id=<?= $row["idMhs"]; ?>" class="badge badge-success">ubah</a>
                                  <a onclick="return confirm('Yakin ingin menghapus data??')" href="hapus.php?id=<?= $row["idMhs"]; ?>" class="badge badge-danger">hapus</a>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end data mahasiswa -->
                
                <!-- form tambah data mahasiswa -->
                <div class="col-lg-6 col-md-12">
                  
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Form Tambah Data Mahasiswa</h4>
                      <p class="card-description">Isi form untuk menambah data mahasiswa baru</p>

                      <!-- form -->
                      <form action="" method="post">
                        
                        <div class="form-group">
                          <label for="npm" class="font-weight-500">NPM :</label>
                          <input required type="number" name="npmMhs" id="npm" class="form-control" placeholder="Isi NPM mahasiswa">
                        </div>
                        <div class="form-group">
                          <label for="nama" class="font-weight-500">Nama :</label>
                          <input required type="text" name="namaMahasiswa" id="nama" class="form-control" placeholder="Isi nama mahasiswa">
                        </div>
                        <div class="form-group">
                          <label for="jurusan" class="font-weight-500">Jurusan :</label>
                          <input required type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Isi jurusan mahasiswa">
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="submit">Tambah</button>

                      </form>
                      <!-- end form -->

                    </div>
                  </div>
                </div>
                <!-- form tambah data mahasiswa -->

              </div>

              <!-- end content -->
            
            </div>
          </div>
        

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made by Yunus Febriansyah<i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->

  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
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