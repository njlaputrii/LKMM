<?php
include 'koneksi.php';
 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>APLIKASI CRUD DASAR</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index_siswa.php">SMK TELKOM</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="btn btn-danger" href="logout.php">Log out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index_siswa.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=nilai">
                  <span data-feather="book"></span>
                  Nilai
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Barang
                </a>
              </li> -->
            </ul>

        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <?php
        $page = $_GET['page'];
        $aksi = $_GET['aksi'];
        
        if ($page == "nilai") {
          if ($aksi == "") {
            include "page/nilai/nilai.php";
          } elseif ($aksi == "tambah") {
            include "page/nilai/tambah.php";
          } elseif ($aksi == "ubah") {
            include "page/nilai/ubah.php";
          } elseif ($aksi == "hapus") {
            include "page/nilai/hapus.php";
          }
        // } elseif ($page == "barang") {
        //   if ($aksi == "") {
        //     include "page/barang/barang.php";
        //   } elseif ($aksi == "tambah") {
        //     include "page/barang/tambah.php";
        //   } elseif ($aksi == "ubah") {
        //     include "page/barang/ubah.php";
        //   } elseif ($aksi == "hapus") {
        //     include "page/barang/hapus.php";
        //   } 
        } elseif ($page =="") {
          include "home_siswa.php";
        }
        ?>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
 
  </body>
</html>
