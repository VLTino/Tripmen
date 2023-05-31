<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';

$lg = mysqli_query($conn,"SELECT * FROM `logo`");
$hdr = query("SELECT * FROM `header`");

if (isset($_POST["sbmlogo"])){
    if(editlogo($_POST)){
        echo "<script>
        alert('data berhasil diedit');
        document.location.href = 'header.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal diedit');
        document.location.href = 'header.php';
        </script>";
    }
}

if (isset($_POST["submithdr"])) {
    if (editheader($_POST)) {
        echo "<script>
        alert('data berhasil diedit');
        document.location.href = 'header.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal diedit');
        document.location.href = 'header.php';
        </script>";
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - LandingPage</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="header.php">
                    <i class="fas fa-fw fa-hat-cowboy"></i>
                    <span>Header</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="content1.php">
                    <i class="fas fa-fw fa-angry"></i>
                    <span>Content-1/Masalah</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Content-2/About</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="promo.php">
                    <i class="fas fa-fw fa-percentage"></i>
                    <span>Content-3/Promo</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-car"></i>
                    <span>Kendaraan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom:</h6>
                        <a class="collapse-item" href="kendaraan.php"><i class="fas fa-hat-cowboy-side"></i> Header Utama</a>
                        <a class="collapse-item" href="mobil.php"><i class="fas fa-car-alt"></i> Mobil</a>
                        <a class="collapse-item" href="motor.php"><i class="fas fa-motorcycle"></i> Motor</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="benefit.php">
                    <i class="fas fa-fw fa-box-open"></i>
                    <span>Benefit</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="testi.php">
                    <i class="fas fa-fw fa-history"></i>
                    <span>Testimonial</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="fasilitas.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Fasilitas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sistem.php">
                    <i class="fas fa-fw fa-sync-alt"></i>
                    <span>Sistem</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="footer.php">
                    <i class="fas fa-fw fa-shoe-prints"></i>
                    <span>Footer/Iklan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="whatsapp.php">
                    <i class="fas fa-fw fa-phone-alt"></i>
                    <span>Whatsapp</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        



                       

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                    <?php while ($row = mysqli_fetch_assoc($lg)): ?>
                            <input type="hidden" name="gambarlama" value="<?php echo $row["logo"]; ?>">
                        
                        Logo <br>
                        <img src="../img/<?php echo $row["logo"]; ?>" alt="" srcset="" style="width:300px;">
                        <?php endwhile; ?>
                        <input type="file" class="form-control-file" name="gambar"><br>
                        <button type="submit" class="btn btn-primary" name="sbmlogo">Submit</button>

                    </form>
                    <br>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">

                            Backgronud Image <br>
                            <?php foreach ($hdr as $hd) :?>
                            <img src="../img/<?php echo $hd["bg"];?>" alt="" srcset="" style="width:50%;border:solid black;">

                            <img src="" alt="" srcset="">
                            <input type="file" class="form-control-file" name="gambar">
                            Header
                            <input type="text" name="header" id="" class="form-control" value="<?php echo $hd["header"] ;?>">
                            Teks
                            <textarea name="teks" id="" cols="30" rows="10" class="form-control"><?php echo $hd["teks"]; ?></textarea><br>
                            <button type="submit" class="btn btn-primary" name="submithdr">Submit</button>
                            <?php endforeach; ?>
                        </div>
                    </form>

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
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