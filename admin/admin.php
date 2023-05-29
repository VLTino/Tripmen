<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';    

$benefit = mysqli_query($conn,"SELECT * FROM `benefit`");
$testi = mysqli_query($conn,"SELECT*FROM `testimonial`");
$admin = mysqli_query($conn,"SELECT * FROM `admin`;");
$visitor = query("SELECT `counts` FROM `visitor_counter`")
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" type="text/css">
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
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
            <li class="nav-item">
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
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom:</h6>
                        <a class="collapse-item" href="kendaraan.php"><i class="fas fa-hat-cowboy-side"></i> Header
                            Utama</a>
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

                    <!-- Topbar Search -->


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



                    <h3>SELAMAT DATANG!</h3>
                    <br>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Benefit</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ben=mysqli_num_rows($benefit);
                                           ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="50" id="benefit"><path d="M94.45 51.54C93.4 48.78 90.8 47 87.85 47c-1.6 0-3.17.55-4.42 1.55L64.07 64.04V64c0-3.86-3.14-7-7-7h-11.4c-8.19-5.28-20.97-5.27-29.17 0h-4.43c-3.86 0-7 3.14-7 7v24c0 3.86 3.14 7 7 7s7-3.14 7-7v-1h39.7c1.98 0 3.88-.73 5.35-2.05l28.46-25.62c2.2-1.97 2.93-5.03 1.87-7.79zM15.07 88c0 1.65-1.35 3-3 3s-3-1.35-3-3V64c0-1.65 1.35-3 3-3h3v27zM89.9 56.36 61.44 81.97c-.73.67-1.68 1.03-2.67 1.03h-39.7V60.09c7.14-4.32 18.05-4.14 24.86.56.33.23.73.35 1.14.35h12c1.65 0 3 1.35 3 3s-1.35 3-3 3h-12c-1.1 0-2 .9-2 2s.9 2 2 2h16c.45 0 .89-.15 1.25-.44l23.61-18.89c.54-.43 1.22-.67 1.92-.67 1.96 0 2.69 1.51 2.87 1.97s.64 2.08-.82 3.39zM49.13 39h17.88c.88 0 1.66-.58 1.92-1.42l4.06-13.5c.23-.78-.03-1.62-.66-2.13-.63-.51-1.51-.59-2.22-.19l-6.36 3.52-3.91-7.23C59.48 17.4 58.8 17 58.07 17s-1.41.4-1.76 1.05l-3.91 7.23-6.36-3.52c-.71-.39-1.59-.32-2.22.19s-.89 1.35-.66 2.13l4.06 13.5c.25.84 1.03 1.42 1.91 1.42zm3.1-9.25c.47.26 1.02.32 1.53.17s.94-.5 1.2-.97l3.12-5.75 3.12 5.75a2.002 2.002 0 0 0 2.73.8l3.82-2.12L65.52 35h-14.9l-2.22-7.37 3.83 2.12z"></path><path d="M58.07 53c13.23 0 24-10.77 24-24S71.3 5 58.07 5s-24 10.77-24 24 10.77 24 24 24zm0-44c11.03 0 20 8.97 20 20s-8.97 20-20 20-20-8.97-20-20 8.97-20 20-20z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Testimonial</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tes=mysqli_num_rows($testi); ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="50" id="customer-testimonial"><path d="M61,38H57.1431l-1.1919-3.6685a1.0088,1.0088,0,0,0-1.9023,0L52.8569,38H49a1.0087,1.0087,0,0,0-.5879,1.8091l3.1206,2.2671-1.1919,3.668A1.0088,1.0088,0,0,0,51.88,46.8623L55,44.5952l3.12,2.2671a1.01,1.01,0,0,0,1.5391-1.1182l-1.1919-3.668,3.1206-2.2671A.9872.9872,0,0,0,61,38Zm-4.6592,4.0034.4653,1.4321L55.5879,42.55a1.0087,1.0087,0,0,0-1.1758,0l-1.2183.8853.4653-1.4321a1,1,0,0,0-.3633-1.1182L52.0776,40h1.5059a1,1,0,0,0,.9512-.6909L55,37.8765l.4653,1.4326A1,1,0,0,0,56.4165,40h1.5059l-1.2183.8853A1,1,0,0,0,56.3408,42.0034ZM2.4121,39.8091l3.1206,2.2671-1.1919,3.668A1.01,1.01,0,0,0,5.88,46.8623L9,44.5952l3.12,2.2671a1.0088,1.0088,0,0,0,1.5391-1.1182l-1.1919-3.668,3.1206-2.2671A1.0087,1.0087,0,0,0,15,38H11.1431L9.9512,34.3315a1.0088,1.0088,0,0,0-1.9023,0L6.8569,38H3A.9872.9872,0,0,0,2.4121,39.8091Zm4.8838,1.0762L6.0776,40H7.5835a1,1,0,0,0,.9512-.6909L9,37.8765l.4653,1.4326A1,1,0,0,0,10.4165,40h1.5059l-1.2183.8853a1,1,0,0,0-.3633,1.1182l.4653,1.4321L9.5879,42.55a1.0087,1.0087,0,0,0-1.1758,0l-1.2183.8853.4653-1.4321A1,1,0,0,0,7.2959,40.8853ZM32,44.2969A20.1177,20.1177,0,1,0,11.8823,24.1792,20.1407,20.1407,0,0,0,32,44.2969Zm0-38A17.8823,17.8823,0,1,1,14.1177,24.1792,17.9026,17.9026,0,0,1,32,6.2969ZM50.9857,48.0047H47.1288l-1.1919-3.6685a1.0088,1.0088,0,0,0-1.9023,0l-1.1919,3.6685H38.9857a1.0087,1.0087,0,0,0-.5879,1.8091l3.1206,2.2671-1.1919,3.668a1.0088,1.0088,0,0,0,1.5391,1.1182l3.12-2.2671,3.12,2.2671a1.01,1.01,0,0,0,1.5391-1.1182l-1.1919-3.668,3.1206-2.2671A.9872.9872,0,0,0,50.9857,48.0047Zm-4.6592,4.0034.4653,1.4321-1.2183-.8853a1.0087,1.0087,0,0,0-1.1758,0L43.18,53.44l.4653-1.4321a1,1,0,0,0-.3633-1.1182l-1.2183-.8853h1.5059a1,1,0,0,0,.9512-.6909l.4653-1.4326.4653,1.4326a1,1,0,0,0,.9512.6909h1.5059L46.69,50.89A1,1,0,0,0,46.3265,52.0082Zm-8.3607-.9875H34.1089L32.917,47.3523a1.0088,1.0088,0,0,0-1.9023,0l-1.1919,3.6685H25.9659A1.0087,1.0087,0,0,0,25.378,52.83l3.1206,2.2671-1.1919,3.668a1.0088,1.0088,0,0,0,1.5391,1.1182l3.12-2.2671,3.12,2.2671a1.01,1.01,0,0,0,1.5391-1.1182l-1.1919-3.668L38.5537,52.83A.9872.9872,0,0,0,37.9659,51.0207Zm-4.6592,4.0034.4653,1.4321-1.2183-.8853a1.0087,1.0087,0,0,0-1.1758,0l-1.2183.8853.4653-1.4321a1,1,0,0,0-.3633-1.1182l-1.2183-.8853h1.5059a1,1,0,0,0,.9512-.6909l.4653-1.4326.4653,1.4326a1,1,0,0,0,.9512.6909h1.5059L33.67,53.906A1,1,0,0,0,33.3067,55.0241Zm-8.321-7.0309H21.1288l-1.1919-3.6685a1.0088,1.0088,0,0,0-1.9023,0l-1.1919,3.6685H12.9857a1.0087,1.0087,0,0,0-.5879,1.8091l3.1206,2.2671-1.1919,3.668a1.0088,1.0088,0,0,0,1.5391,1.1182l3.12-2.2671,3.12,2.2671a1.01,1.01,0,0,0,1.5391-1.1182l-1.1919-3.668,3.1206-2.2671A.9872.9872,0,0,0,24.9857,47.9932Zm-4.6592,4.0034.4653,1.4321-1.2183-.8853a1.0087,1.0087,0,0,0-1.1758,0l-1.2183.8853.4653-1.4321a1,1,0,0,0-.3633-1.1182l-1.2183-.8853h1.5059a1,1,0,0,0,.9512-.6909l.4653-1.4326.4653,1.4326a1,1,0,0,0,.9512.6909h1.5059l-1.2183.8853A1,1,0,0,0,20.3265,51.9967Zm17.61-24.1876-2.4444-.4073a5,5,0,1,0-6.9843,0l-2.4444.4073A3.6551,3.6551,0,0,0,23,31.4258v4.4077a1,1,0,0,0,.7573.97A47.2776,47.2776,0,0,0,32,38.1665a47.2776,47.2776,0,0,0,8.2427-1.3628,1,1,0,0,0,.7573-.97V31.4258A3.6551,3.6551,0,0,0,37.9365,27.8091ZM32,20.8335a3,3,0,1,1-3,3A3.0033,3.0033,0,0,1,32,20.8335Zm7,14.21a40.3671,40.3671,0,0,1-7,1.1226,40.3671,40.3671,0,0,1-7-1.1226V31.4258a1.6617,1.6617,0,0,1,1.3926-1.644L32,28.8472l5.6074.9346A1.6617,1.6617,0,0,1,39,31.4258Zm-21-7c.8318.1929,2.2393.5017,3.6628.7476a5.6279,5.6279,0,0,0-.6,1.9268c-2.1677-.3842-4.17-.8807-4.3057-.9146a1,1,0,0,1-.7573-.97V24.4258a3.6551,3.6551,0,0,1,3.0635-3.6167l2.4444-.4073a4.99,4.99,0,1,1,8.4615-3.2656A6.99,6.99,0,0,0,27.507,18.473c1.9272-2.9368-2.1565-6.2306-4.6273-3.76s.8221,6.5551,3.76,4.6273a7.1024,7.1024,0,0,0-1.36,2.5533L25,21.8472l-5.6074.9346A1.6617,1.6617,0,0,0,18,24.4258Zm30-3.6182v4.4077a1,1,0,0,1-.7573.97c-.1355.0339-2.138.53-4.3057.9146a5.6266,5.6266,0,0,0-.6-1.9268c1.4236-.2458,2.831-.5546,3.6628-.7476V24.4258a1.6617,1.6617,0,0,0-1.3926-1.644L39,21.8472l-.2793.0466a7.1024,7.1024,0,0,0-1.36-2.5533c2.9368,1.9272,6.2306-2.1565,3.76-4.6273s-6.5551.8221-4.6273,3.76a6.99,6.99,0,0,0-2.4625-1.3368,4.99,4.99,0,1,1,8.4615,3.2656l2.4444.4073A3.6551,3.6551,0,0,1,48,24.4258Z" data-name="17 Customer testimonial"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Visitor</div>
                                                <?php foreach ($visitor as $co):?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $co['counts'];  ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="col-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" clip-rule="evenodd" viewBox="0 0 48 48" width="50" id="group"><path d="M155.469,79.103C155.009,79.037 154.52,79 154,79C150.17,79 148.031,81.021 147.211,82.028C147.078,82.201 147.007,82.413 147.007,82.632C147.007,82.638 147.007,82.644 147.006,82.649C147,83.019 147,83.509 147,84C147,84.552 147.448,85 148,85L155.172,85C155.059,84.682 155,84.344 155,84C155,84 155,84 155,84C155,82.862 155,81.506 155.004,80.705C155.004,80.135 155.167,79.58 155.469,79.103ZM178,85L158,85C157.735,85 157.48,84.895 157.293,84.707C157.105,84.52 157,84.265 157,84C157,82.865 157,81.515 157.004,80.711C157.004,80.709 157.004,80.707 157.004,80.705C157.004,80.475 157.084,80.253 157.229,80.075C158.47,78.658 162.22,75 168,75C174.542,75 177.827,78.651 178.832,80.028C178.943,80.197 179,80.388 179,80.583L179,84C179,84.265 178.895,84.52 178.707,84.707C178.52,84.895 178.265,85 178,85ZM180.828,85L188,85C188.552,85 189,84.552 189,84L189,82.631C189,82.41 188.927,82.196 188.793,82.021C187.969,81.021 185.829,79 182,79C181.507,79 181.042,79.033 180.604,79.093C180.863,79.546 181,80.06 181,80.585L181,84C181,84.344 180.941,84.682 180.828,85ZM154,67C151.24,67 149,69.24 149,72C149,74.76 151.24,77 154,77C156.76,77 159,74.76 159,72C159,69.24 156.76,67 154,67ZM182,67C179.24,67 177,69.24 177,72C177,74.76 179.24,77 182,77C184.76,77 187,74.76 187,72C187,69.24 184.76,67 182,67ZM168,59C164.137,59 161,62.137 161,66C161,69.863 164.137,73 168,73C171.863,73 175,69.863 175,66C175,62.137 171.863,59 168,59Z" transform="translate(-144 -48)"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark  shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ad=mysqli_num_rows($admin);?></div>
                                        </div>
                                        <div class="col-auto">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="50"  fill-rule="evenodd" clip-rule="evenodd" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" viewBox="0 0 512 512" id="administrator"><path fill="#666" d="M211 180c-3 0-6-2-6-4 0-1-4-20 1-42 6-29 23-51 50-63 2-1 4-1 5 0 2 1 3 2 3 3 14 40 47 33 95 19 16-5 32-10 45-10 16-1 27 6 32 19 1 3-1 6-4 8-3 1-6-1-8-4-6-18-28-12-62-2-21 6-42 13-61 12-21-2-37-12-45-31-21 10-34 28-38 51-5 20-1 37-1 37 0 4-2 7-5 7-1 0-1 0-1 0zM506 511l-386 0c-4 0-6-3-6-6 0 0 0 0 0 0l0-65c0-4 0-51 83-82 5-2 9-4 13-5 16-6 21-8 40-21 1-1 2-8 0-17-1-3 1-6 4-7 3-1 7 1 8 4 2 9 3 25-5 30-20 14-27 16-43 22-4 2-8 3-13 5-40 15-58 33-66 46-9 14-9 24-9 25 0 0 0 0 0 0l0 59 374 0 0-59c0 0 0 0 0-1 0 0 0-11-11-26-9-14-31-34-77-48-21-7-24-9-40-21l-3-2c-7-5-8-19-5-29 0-3 4-5 7-5 3 1 5 4 4 8-2 8-1 15 1 16l3 2c15 11 17 13 37 19 95 31 96 83 96 87l0 65c0 3-3 6-6 6zm-130-178l0 0 0 0z"></path><path fill="#666" d="M369 320c0 0 0 0-1 0-3-1-5-4-4-7 1-5 3-11 8-15 8-7 22-24 29-59 0-2 1-4 3-4 0-1 20-9 23-24 1-9-4-20-16-32-2-2-3-5-1-7 30-56 10-94-12-116-37-37-100-50-121-39-5 3-7 7-6 12 1 2 0 4-1 5-1 2-2 2-4 3-32 2-53 13-63 31-22 40 13 103 13 104 1 2 1 5-1 7-13 12-18 23-16 32 3 15 22 23 22 24 2 0 3 2 4 4 7 35 21 52 29 59 4 4 6 10 8 14 1 3-1 7-5 8-3 1-6-1-7-5-1-3-3-7-4-8-9-8-25-26-32-63-7-3-24-13-27-31-2-12 3-26 16-40-7-15-32-71-11-110 11-21 34-34 67-38 0-8 4-14 12-19 13-7 37-7 63 1 28 8 54 22 72 41 17 16 27 35 30 55 3 22-1 46-14 70 13 14 19 28 16 40-3 18-19 28-26 31-8 37-24 55-33 63-1 1-3 5-4 9 0 3-3 4-6 4zM313 364c-30 0-59-3-82-8-3-1-5-4-4-7 1-3 4-5 7-5 22 5 50 8 79 8 28 0 56-3 78-8 3 0 6 2 7 5 0 3-2 6-5 7-22 5-51 8-80 8z"></path><path fill="#666" d="M244 469c-1,0 -1,0 -2,0 -2,0 -3,-2 -4,-3l-41 -102c-1,-3 0,-6 3,-8 3,-1 7,1 8,4l38 93 58 -48 -44 -45c-2,-3 -2,-7 1,-9 2,-2 6,-2 8,0l48 51c1,1 2,2 2,4 -1,2 -1,3 -3,4l-69 58c-1,1 -2,1 -3,1z"></path><path fill="#666" d="M382 469c-2 0-3 0-4-1l-69-57c-1-2-2-3-2-5 0-1 0-3 1-4l48-51c3-2 6-2 9 0 2 2 2 6 0 9l-44 45 58 49 38-94c2-3 5-5 8-3 3 1 5 4 3 7l-41 102c0 1-2 3-4 3 0 0-1 0-1 0zM314 328c-21 0-41-3-60-8-3-1-5-5-4-8 1-3 4-5 8-4 17 5 36 8 56 8 19 0 37-2 54-7 3-1 6 1 7 4 1 3-1 6-4 7-18 5-37 8-57 8z"></path><path fill="#666" d="M339 460l-52 0c-2,0 -4,-1 -5,-2l-12 -16c-2,-3 -2,-7 1,-9 2,-2 6,-1 8,1l11 14 46 0 11 -14c2,-2 5,-3 8,-1 3,2 3,6 1,9l-12 16c-2,1 -3,2 -5,2z"></path><path fill="#666" d="M292 511c-3,0 -6,-2 -6,-5l-5 -51c-1,-2 0,-4 1,-5 1,-1 3,-2 5,-2l52 0c2,0 3,1 4,2 2,1 2,3 2,5l-6 51c0,3 -3,5 -6,5 -3,0 -6,-3 -5,-7l4 -44 -39 0 5 44c0,4 -2,6 -5,7 -1,0 -1,0 -1,0z"></path><path fill="#ffb300" d="M115 375l-40 0c-3,0 -6,-2 -6,-6l0 -20c-8,-3 -15,-8 -22,-13l-18 10c-3,2 -6,1 -8,-2l-20 -35c-1,-1 -1,-3 -1,-4 1,-2 2,-3 3,-4l18 -10c0,-4 -1,-9 -1,-13 0,-4 1,-8 1,-13l-18 -10c-1,-1 -2,-2 -3,-4 0,-1 0,-3 1,-4l20 -35c2,-3 5,-4 8,-2l18 10c7,-5 14,-10 22,-12l0 -21c0,-4 3,-6 6,-6l40 0c4,0 6,2 6,6l0 21c8,3 16,7 22,12l18 -10c3,-2 7,-1 9,2l20 35c0,1 1,3 0,4 0,2 -1,3 -3,4l-18 10c1,4 2,9 2,13 0,4 -1,8 -2,13l18 10c2,1 3,2 3,4 1,1 0,3 0,4l-20 35c-2,3 -6,4 -9,2l-18 -10c-6,5 -14,10 -22,12l0 21c0,4 -2,6 -6,6zm-20 -51c-25,0 -45,-21 -45,-46 0,-25 20,-46 45,-46 26,0 46,21 46,46 0,25 -20,46 -46,46zm0 -80c-18,0 -33,16 -33,34 0,19 15,34 33,34 19,0 34,-15 34,-34 0,-19 -15,-34 -34,-34z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <p style="color:red;">*Syarat upload gambar:</p>
                    <p style="color:red;">Gambar 1:1 min width:500px</p>


                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white col-12">
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
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                    </div>
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