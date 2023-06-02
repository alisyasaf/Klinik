<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
}
//include('../templates/header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../templates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../templates/css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="ajax.js"></script>

</head>
<div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"  href='home_admin.php'>
                <div class="sidebar-brand-text mx-6z mt-4">Klinik BeautyHope</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 mt-4">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="btn nav-link" ">
                <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="btn nav-link" href='view_pasien.php'>
                <span>Data Pasien</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="btn nav-link" href='view_dokter.php'">
                <span>Data Dokter</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="btn nav-link" href='view_jadwal.php'">
                <span>Data Jadwal</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="btn nav-link" href='view_kons.php'">
                <span>Data Konsultasi</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">


           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                       

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
            
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                    <div id="page" class="jumbotron pt-0 bg-light justify-content-center">
                        <h1 class="display-5">Hello, Admin <b><?= $_SESSION['nama_lengkap'] ?></b></h1>
                        <p class="lead"> Selamat datang, anda berhasil Login sebagai <b><?= $_SESSION['username'] ?></b> </p>
                        <hr class="my-4">
                            <a href="logout.php" class="btn">Logout</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; PBP MINI PROJECT</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../templates/vendor/jquery/jquery.min.js"></script>
    <script src="../templates/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../templates/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../templates/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../templates/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../templates/js/demo/chart-area-demo.js"></script>
    <script src="../templates/js/demo/chart-pie-demo.js"></script>

</body>

</html>