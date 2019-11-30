<?php
include_once 'controller/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="cafe.ico">

    <title>Cafe Management</title>

    <!-- Custom fonts for this template-->
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul
        class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <!-- Sidebar - Brand -->
        <a
          class="sidebar-brand d-flex align-items-center justify-content-center"
          href="index.php"
        >
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-coffee"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Cafe Ceria</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="far fa-calendar"></i>
            <span>Form Pemesanan</span></a
          >
        </li>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="menu.php">
            <i class="far fa-caret-square-down"></i>
            <span>Daftar Menu</span></a
          >
        </li>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="pelayan.php">
          <i class="fas fa-users"></i>
            <span>Daftar Pelayan</span></a
          >
        </li>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="daftarpesanan.php">
            <i class="fas fa-stream"></i>
            <span>Daftar Pesanan</span></a
          >
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="kinerjapelayan.php">
          <i class="fas fa-user-edit"></i>
            <span>Kinerja Pelayan</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav
            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
          >
            <!-- Sidebar Toggle (Topbar) -->
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3"
            >
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <h1 class="pb-2">Kinerja Pelayan</h1>
<?php
$sql = "SELECT * FROM tb_pelayan";
$result = mysqli_query($conn, $sql);
//$resultCheck = mysqli_num_rows($result);
?>
            <div class="table-responsive">
              <table class="table table-hover" id="competitor_table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pelayan</th>
                    <th scope="col">Catatan Kinerja</th>
                    <th scope="col">Gaji Bonus</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while($row = mysqli_fetch_assoc($result)):
                ?>
                <?php
                $sql = "SELECT pelayan_id, jumlah_pesanan FROM tb_pemesanan";
                $query = mysqli_query($conn, $sql);
                $catatanKinerjafromPelanggan = 0;
                $catatanKinerjafromJumlahPesanan = 0;
                $tambahan = 0;
                while($baris = mysqli_fetch_assoc($query))
                {
                    if($baris['pelayan_id'] == $row['id_pelayan'])
                    {
                        $catatanKinerjafromPelanggan += 1;
                        $catatanKinerjafromJumlahPesanan += $baris['jumlah_pesanan'];
                    }
                }
                ?>
                  <tr>
                    <th scope="row"><?=$i;?></th>
                    <td>
                      <?=$row['pelayan'];?>
                    </td>
                    <td>
                      <?="Telah melayani sebanyak " . $catatanKinerjafromJumlahPesanan . " menu dari " . $catatanKinerjafromPelanggan . " pelanggan";?>
                    </td>
                    <td>
                      <?php 
                    $temp =  intdiv($catatanKinerjafromJumlahPesanan, 5) * 30000;
                    $fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
                    echo '+' . $fmt->formatCurrency($temp, "IDR");
                      ?>
                    </td>
                  </tr>
                <?php
                $i++;
                endwhile;
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2019</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
  </body>
</html>
