<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8" />
    <title>Dashboard | Morvin - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="<?= base_url(); ?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url(); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>


</head>


<body>
    <?php if (!isset($_SESSION['nama'])) {
        redirect('user/login');
    } ?>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                    <?php if ($_SESSION['level'] == 'super admin') : ?>
                        <a href="<?= base_url(); ?>user/dashboardadmin" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?= base_url(); ?>assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url(); ?>assets/images/logo-dark.png" alt="" height="20">
                            </span>
                        </a>

                        <a href="<?= base_url(); ?>user/dashboardadmin" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url(); ?>assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url(); ?>assets/images/logo-light.png" alt="" height="20">
                            </span>
                        </a>
                            <?php elseif ($_SESSION['level'] == 'admin instansi') : ?>
                                <a href="<?= base_url(); ?>user/dashboardadmininstansi" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?= base_url(); ?>assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url(); ?>assets/images/logo-dark.png" alt="" height="20">
                            </span>
                        </a>

                        <a href="<?= base_url(); ?>user/dashboardadmininstansi" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url(); ?>assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url(); ?>assets/images/logo-light.png" alt="" height="20">
                            </span>
                        </a>
                            <?php elseif ($_SESSION['level'] == 'user') : ?>
                                <a href="<?= base_url(); ?>user/dashboarduser" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?= base_url(); ?>assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url(); ?>assets/images/logo-dark.png" alt="" height="20">
                            </span>
                        </a>

                        <a href="<?= base_url(); ?>user/dashboarduser" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url(); ?>assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url(); ?>assets/images/logo-light.png" alt="" height="20">
                            </span>
                        </a>
                            <?php endif; ?>
                        
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>


                    <div class="topbar-social-icon me-3 d-none d-md-block">
                        <ul class="list-inline title-tooltip m-0">
                            <li class="list-inline-item">
                                <a href="email-inbox.html" data-bs-toggle="tooltip" data-placement="top" title="Email">
                                    <i class="mdi mdi-email-outline"></i>
                                </a>
                            </li>

                            <!-- <li class="list-inline-item">
                                <a href="chat.html" data-bs-toggle="tooltip" data-placement="top" title="Chat">
                                    <i class="mdi mdi-tooltip-outline"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="calendar.html" data-bs-toggle="tooltip" data-placement="top" title="Calendar">
                                    <i class="mdi mdi-calendar"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="pages-invoice.html" data-bs-toggle="tooltip" data-placement="top" title="Printer">
                                    <i class="mdi mdi-printer"></i>
                                </a>
                            </li> -->
                        </ul>
                    </div>


                </div>

                <!-- Search input -->
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <input class="search-input form-control" placeholder="Search" />
                        <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                            <i class="mdi mdi-close-circle"></i>
                        </a>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="dropdown d-none d-lg-inline-block">
                        <button type="button" class="btn header-item toggle-search noti-icon waves-effect" data-target="#search-wrap">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                    </div>

                    <div class="dropdown d-none d-md-block ms-2">
                        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="me-2" src="<?= base_url(); ?>assets/images/flags/us.jpg" alt="Header Language" height="16"> English <span class="mdi mdi-chevron-down"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="<?= base_url(); ?>assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> German </span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="<?= base_url(); ?>assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Italian </span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="<?= base_url(); ?>assets/images/flags/french.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> French </span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="<?= base_url(); ?>assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Spanish </span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="<?= base_url(); ?>assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Russian </span>
                            </a>
                        </div>
                    </div>






                    <!-- <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div> -->

                    <!-- <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-bell-outline bx-tada"></i>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small"> View All</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="mdi mdi-cart text-white"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Your order is placed</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <img src="data:<?= $_SESSION['tipe_foto']; ?>;base64,<?= $_SESSION['foto']; ?>" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1"><?= $_SESSION['nama']; ?></h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">It will seem like simplified English.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                                <i class="mdi mdi-check text-white"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <img src="<?= base_url(); ?>assets/images/users/avatar-4.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top">
                                <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                                </a>
                            </div>
                        </div>
                    </div> -->

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="data:<?= $_SESSION['tipe_foto']; ?>;base64,<?= $_SESSION['foto']; ?>" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1"><?= $_SESSION['nama']; ?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-wallet-outline font-size-16 align-middle me-1"></i> My Wallet</a>
                            <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-end">11</span><i class="mdi mdi-cog-outline font-size-16 align-middle me-1"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline font-size-16 align-middle me-1"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="<?= base_url(); ?>user/logout"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>

                    <!-- <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-cog-outline font-size-20"></i>
                        </button>
                    </div> -->

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">


                <div class="user-sidebar text-center">
                    <div class="dropdown">
                        <div class="user-img">
                            <img src="data:<?= $_SESSION['tipe_foto']; ?>;base64,<?= $_SESSION['foto']; ?>" alt="" class="rounded-circle">
                            <span class="avatar-online bg-success"></span>
                        </div>
                        <div class="user-info">
                            <h5 class="mt-3 font-size-16 text-white"><?= $_SESSION['nama']; ?></h5>
                            <span class="font-size-13 text-white-50"><?= $_SESSION['level']; ?></span><br>
                            <span class="font-size-13 text-white-50"><?= $_SESSION['email']; ?></span>
                        </div>
                    </div>
                </div>



                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <?php if ($_SESSION['level'] == 'super admin') : ?>
                                <a href="<?= base_url(); ?>user/dashboardadmin" class="waves-effect">
                                    <i class="dripicons-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            <?php elseif ($_SESSION['level'] == 'admin instansi') : ?>
                                <a href="<?= base_url(); ?>user/dashboardadmininstansi" class="waves-effect">
                                    <i class="dripicons-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            <?php elseif ($_SESSION['level'] == 'user') : ?>
                                <a href="<?= base_url(); ?>user/dashboarduser" class="waves-effect">
                                    <i class="dripicons-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            <?php endif; ?>
                        </li>

                        <li>
                            <?php if ($_SESSION['level'] == 'super admin') : ?>
                                <a href="<?= base_url(); ?>kegiatan/kegiatanadmin" class="waves-effect">
                                    <i class="dripicons-to-do"></i>
                                    <span>Kegiatan</span>
                                </a>
                            <?php elseif ($_SESSION['level'] == 'admin instansi') : ?>
                                <a href="<?= base_url(); ?>kegiatan/kegiatanadminins" class="has-arrow waves-effect">
                                    <i class="dripicons-to-do"></i>
                                    <span>Kegiatan</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php if ($_SESSION['level'] == 'super admin') : ?>
                                        <!-- <li><a href="<?= base_url(); ?>user/useradmin">Super Admin</a></li>
                                        <li><a href="<?= base_url(); ?>user/useradmininstansiadmin">Admin Instansi</a></li>
                                        <li><a href="<?= base_url(); ?>user/user">User</a></li> -->
                                    <?php elseif ($_SESSION['level'] == 'admin instansi') : ?>
                                        <li><a href="<?= base_url(); ?>kegiatan/kegiatanjuli2021adminins">Juli 2021</a></li>
                                        <li><a href="<?= base_url(); ?>kegiatan/kegiatanagt2021adminins">Agustus 2021</a></li>
                                    <?php elseif ($_SESSION['level'] == 'user') : ?>
                                        <!-- <li><a href="<?= base_url(); ?>user/useruser">User</a></li> -->
                                    <?php endif; ?>
                                </ul>
                            <?php elseif ($_SESSION['level'] == 'user') : ?>
                                <a href="<?= base_url(); ?>kegiatan/kegiatanuser" class="waves-effect">
                                    <i class="dripicons-to-do"></i>
                                    <span>Kegiatan</span>
                                </a>
                            <?php endif; ?>
                        </li>

                        <li>
                            <?php if ($_SESSION['level'] == 'super admin') : ?>
                                <a href="<?= base_url(); ?>pengumuman/pengumumanadmin" class="waves-effect">
                                    <i class="dripicons-broadcast"></i>
                                    <span>Pengumuman</span>
                                </a>
                            <?php elseif ($_SESSION['level'] == 'admin instansi') : ?>
                                <a href="<?= base_url(); ?>pengumuman/pengumumanadminins" class="waves-effect">
                                    <i class="dripicons-broadcast"></i>
                                    <span>Pengumuman</span>
                                </a>
                            <?php elseif ($_SESSION['level'] == 'user') : ?>
                                <a href="<?= base_url(); ?>pengumuman/pengumumanuser" class="waves-effect">
                                    <i class="dripicons-broadcast"></i>
                                    <span>Pengumuman</span>
                                </a>
                            <?php endif; ?>
                            <!-- <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?= base_url(); ?>email-inbox.html">Inbox</a></li>
                                <li><a href="<?= base_url(); ?>email-read.html">Email Read</a></li>
                                <li><a href="<?= base_url(); ?>email-compose.html">Email Compose</a></li>
                            </ul> -->
                        </li>

                        <li>
                            <?php if ($_SESSION['level'] == 'super admin') : ?>
                                <a href="<?= base_url(); ?>instansi" class="waves-effect">
                                    <i class="dripicons-store"></i>
                                    <span>Instansi</span>
                                </a>
                            <?php elseif ($_SESSION['level'] == 'admin instansi') : ?>
                                <!-- <a href="<?= base_url(); ?>instansi" class="waves-effect">
                                    <i class="dripicons-store"></i>
                                    <span>Instansi</span>
                                </a> -->
                            <?php elseif ($_SESSION['level'] == 'user') : ?>
                                <!-- <a href="<?= base_url(); ?>instansi" class="waves-effect">
                                    <i class="dripicons-store"></i>
                                    <span>Instansi</span>
                                </a> -->
                            <?php endif; ?>
                        </li>

                        <li>
                            <?php if ($_SESSION['level'] == 'super admin') : ?>
                                <!-- <a href="<?= base_url(); ?>divisi/divisiadmin" class="waves-effect">
                                    <i class="dripicons-broadcast"></i>
                                    <span>Divisi</span>
                                </a> -->
                            <?php elseif ($_SESSION['level'] == 'admin instansi') : ?>
                                <a href="<?= base_url(); ?>divisi/divisiadminins" class="waves-effect">
                                    <i class="mdi mdi-bank"></i>
                                    <span>Divisi</span>
                                </a>
                            <?php elseif ($_SESSION['level'] == 'user') : ?>
                                <!-- <a href="<?= base_url(); ?>divisi/divisiuser" class="waves-effect">
                                    <i class="dripicons-broadcast"></i>
                                    <span>Divisi</span>
                                </a> -->
                            <?php endif; ?>
                            <!-- <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?= base_url(); ?>email-inbox.html">Inbox</a></li>
                                <li><a href="<?= base_url(); ?>email-read.html">Email Read</a></li>
                                <li><a href="<?= base_url(); ?>email-compose.html">Email Compose</a></li>
                            </ul> -->
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="dripicons-user-group"></i>
                                <span>User</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <?php if ($_SESSION['level'] == 'super admin') : ?>
                                    <li><a href="<?= base_url(); ?>user/useradmin">Super Admin</a></li>
                                    <li><a href="<?= base_url(); ?>user/useradmininstansiadmin">Admin Instansi</a></li>
                                    <li><a href="<?= base_url(); ?>user/user">User</a></li>
                                <?php elseif ($_SESSION['level'] == 'admin instansi') : ?>
                                    <li><a href="<?= base_url(); ?>user/useradmininsadminins">Admin Instansi</a></li>
                                    <li><a href="<?= base_url(); ?>user/useradminins">User</a></li>
                                <?php elseif ($_SESSION['level'] == 'user') : ?>
                                    <li><a href="<?= base_url(); ?>user/useruser">User</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="page-title">
                                    <h4>Dashboard</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Morvin</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="float-end d-none d-sm-block">
                                    <a href="" class="btn btn-success">Add Widget</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="container-fluid">

                    <div class="page-content-wrapper">


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">

                                        <!-- <h1>Selamat Datang Super Admin:</h1>
                                        <h3 style="color: blue;"><?= $_SESSION['nama']; ?></h3><br> -->



                                        <!-- <h4 class="header-title mb-4 float-sm-start">Quick Summary</h4>

                                        <div class="float-sm-end">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Day</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Week</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Month</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#">Year</a>
                                                </li>
                                            </ul>
                                        </div> -->

                                        <div class="clearfix"></div>


                                        <div class="row align-items-center">
                                            <div class="col-xl-12">

                                                <!-- <div>
                                                    <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                                                </div> -->

                                                <header style="border-bottom: 2px solid lightblue;">
                                                    <!-- <a class="btn btn-info" style="color: #ffffff; margin-bottom: 10px;" href="<?= base_url(); ?>pengumuman/tambahdatapengumumanadminins">
                                                        Add</a> -->
                                                    <h1 style="display: inline-block; margin-left: 385px; font-weight: bold; color:steelblue;">Pengumuman</h1>
                                                </header>
                                                <form class="" method="post" action="<?= base_url(); ?>pengumuman/tambahpengumumanuser">
                                                    <table class="table table-bordered table-hover table-info" style="text-align:justify; margin-top: 15px;">
                                                        <thead class="thead-dark">
                                                            <tr style="text-align: center;">
                                                                <th>No</th>
                                                                <th>Tanggal</th>
                                                                <th>Pukul</th>
                                                                <!-- <th>Bulan</th> -->
                                                                <!-- <th>Nama User</th> -->
                                                                <th>Asal Instansi</th>
                                                                <th>Judul</th>
                                                                <!-- <th>Isi</th> -->
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            foreach ($pengumuman as $row) {
                                                                // var_dump($row);
                                                            ?>
                                                                <tr>
                                                                    <td style="text-align:center;"><?= $no++; ?></td>
                                                                    <td style="text-align:center;">
                                                                        <?= date("d-m-Y", strtotime($row['tanggal_pengumuman'])); ?>
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <?= date("H:i", strtotime($row['tanggal_pengumuman'])); ?>
                                                                    </td>
                                                                    <!-- <td style="text-align:center;">
                                                                        <?php $datenumber = substr($row['tanggal_pengumuman'], 5, 2); ?>
                                                                        <?= $datenumber; ?>
                                                                    </td> -->
                                                                    <!-- <td style="text-align:center;"><?= $row['nama_user'] ?></td> -->
                                                                    <td style="text-align:center;"><?= $row['nama_instansi'] ?></td>
                                                                    <td><?= $row['judul'] ?></td>
                                                                    <!-- <td><?= $row['isi'] ?></td> -->
                                                                    <!-- <td>
                                                                        <?php if (!empty($row['foto'])) : ?>
                                                                            <center><img src="data:<?= $row['tipe_foto']; ?>;base64,<?= $row['foto']; ?>" width="100" height="100"></center>
                                                                        <?php elseif (empty($row['foto'])) : ?>
                                                                            <p style="text-align:center;">No Photo</p>
                                                                        <?php endif; ?>
                                                                    </td> -->
                                                                    <td>
                                                                        <!-- <a class="btn btn-danger" style="color: #ffffff; margin-top: 8px;" onclick="getAlert(<?= $row['id_pengumuman']; ?>)">
                                                                            Delete</a> -->
                                                                        <script>
                                                                            function getAlert(id) {
                                                                                swal({
                                                                                        title: "Delete Confirmation",
                                                                                        text: "Data akan dihapus?",
                                                                                        icon: "warning",
                                                                                        buttons: true,
                                                                                        dangerMode: true,
                                                                                        closeOnClickOutside: false,
                                                                                    })
                                                                                    .then((willDelete) => {
                                                                                        if (willDelete) {
                                                                                            swal({
                                                                                                title: "Success",
                                                                                                text: "Data berhasil dihapus!",
                                                                                                icon: "success",
                                                                                            }).then(() => {
                                                                                                window.location.href = `<?= base_url(); ?>pengumuman/hapusdatapengumumanadminins/${id}`;
                                                                                            })
                                                                                        } else {
                                                                                            swal({
                                                                                                title: "Alert",
                                                                                                text: "Data batal dihapus!",
                                                                                            });
                                                                                        }
                                                                                    });
                                                                            }

                                                                            function getDetail(judul, isi, foto, tipe_foto) {
                                                                                swal({
                                                                                    content: {
                                                                                        element: "img",
                                                                                        attributes: {
                                                                                            src: `data:${tipe_foto};base64,${foto}`,
                                                                                            width: 150,
                                                                                            height: 150
                                                                                        }
                                                                                    },
                                                                                    title: `${judul}`,
                                                                                    text: `${isi}`,
                                                                                    closeOnClickOutside: false,
                                                                                    width: 600,
                                                                                    padding: 100
                                                                                });
                                                                            }
                                                                        </script>

                                                                        <style>
                                                                            .swal-modal .swal-text {
                                                                                color: #272727;
                                                                                text-align: justify;
                                                                            }
                                                                        </style>
                                                                        <!-- <a class="btn btn-warning" style="color: #ffffff; margin-top: 8px;" href="<?= base_url(); ?>pengumuman/editdatapengumumanadminins/<?= $row['id_pengumuman']; ?>">
                                                                            Edit</a> -->
                                                                        <a class="btn btn-primary" style="color: #ffffff; margin-top: 8px;" onclick="getDetail(`<?= $row['judul']; ?>`, `<?= $row['isi']; ?>`, `<?= $row['foto']; ?>`, `<?= $row['tipe_foto']; ?>`)">
                                                                            Detil</a>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>


                            <!-- <div class="col-xl-4">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <p class="font-size-16">Orders</p>
                                                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                        <span class="avatar-title rounded-circle bg-soft-primary">
                                                            <i class="mdi mdi-cart-outline text-primary font-size-20"></i>
                                                        </span>
                                                    </div>
                                                    <h5 class="font-size-22">58</h5>

                                                    <p class="text-muted">70% Target</p>

                                                    <div class="progress mt-3" style="height: 4px;">
                                                        <div class="progress-bar progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <p class="font-size-16">Users</p>
                                                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                        <span class="avatar-title rounded-circle bg-soft-success">
                                                            <i class="mdi mdi-account-outline text-success font-size-20"></i>
                                                        </span>
                                                    </div>
                                                    <h5 class="font-size-22">136</h5>

                                                    <p class="text-muted">80% Target</p>

                                                    <div class="progress mt-3" style="height: 4px;">
                                                        <div class="progress-bar progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="80">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Revenue Stastics</h4>

                                        <div class="media">

                                            <h4>$14,235 </h4>


                                            <div class="media-body ps-3">

                                                <div class="dropdown">
                                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Today<i class="mdi mdi-chevron-down ms-1"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Yesterday</a>
                                                        <a class="dropdown-item" href="#">Last Week</a>
                                                        <a class="dropdown-item" href="#">last Month</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <div id="stastics-chart"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mb-4">Product Traking</h4>


                                        <ul class="list-unstyled activity-wid mb-0">

                                            <li class="activity-list activity-border">
                                                <div class="activity-icon avatar-sm">

                                                    <img src="data:<?= $_SESSION['tipe_foto']; ?>;base64,<?= $_SESSION['foto']; ?>" class="avatar-sm rounded-circle" alt="">

                                                </div>
                                                <div class="media">
                                                    <div class="me-3">
                                                        <h5 class="font-size-15 mb-1">Your Manager Posted</h5>
                                                        <p class="text-muted font-size-14 mb-0"><?= $_SESSION['nama']; ?></p>
                                                    </div>

                                                    <div class="media-body">
                                                        <div class="text-end d-none d-md-block">
                                                            <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="mdi mdi-timer-outline font-size-15 text-primary"></i> 3 days</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </li>

                                            <li class="activity-list activity-border">
                                                <div class="activity-icon avatar-sm">
                                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                        <i class="ti-shopping-cart font-size-16"></i>
                                                    </span>
                                                </div>
                                                <div class="media">
                                                    <div class="me-3">
                                                        <h5 class="font-size-15 mb-1">You have 5 pending order.</h5>
                                                        <p class="text-muted font-size-14 mb-0">America</p>
                                                    </div>

                                                    <div class="media-body">
                                                        <div class="text-end d-none d-md-block">
                                                            <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="mdi mdi-timer-outline font-size-15 text-primary"></i> 1 days</p>
                                                        </div>
                                                    </div>


                                                </div>
                                            </li>

                                            <li class="activity-list activity-border">
                                                <div class="activity-icon avatar-sm">
                                                    <span class="avatar-title bg-soft-success text-success rounded-circle">
                                                        <i class="ti-user font-size-16"></i>
                                                    </span>
                                                </div>
                                                <div class="media">
                                                    <div class="me-3">
                                                        <h5 class="font-size-15 mb-1">New Order Received</h5>
                                                        <p class="text-muted font-size-14 mb-0">Thank You</p>
                                                    </div>

                                                    <div class="media-body">
                                                        <div class="text-end d-none d-md-block">
                                                            <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="mdi mdi-timer-outline font-size-15 text-primary"></i> Today</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="activity-list activity-border">
                                                <div class="activity-icon avatar-sm">

                                                    <img src="data:<?= $_SESSION['tipe_foto']; ?>;base64,<?= $_SESSION['foto']; ?>" class="avatar-sm rounded-circle" alt="">

                                                </div>
                                                <div class="media">
                                                    <div class="me-3">
                                                        <h5 class="font-size-15 mb-1">Your Manager Posted</h5>
                                                        <p class="text-muted font-size-14 mb-0"><?= $_SESSION['nama']; ?></p>
                                                    </div>

                                                    <div class="media-body">
                                                        <div class="text-end d-none d-md-block">
                                                            <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="mdi mdi-timer-outline font-size-15 text-primary"></i> 3 days</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </li>

                                            <li class="activity-list activity-border">
                                                <div class="activity-icon avatar-sm">
                                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                        <i class="ti-shopping-cart font-size-16"></i>
                                                    </span>
                                                </div>
                                                <div class="media">
                                                    <div class="me-3">
                                                        <h5 class="font-size-15 mb-1">You have 1 pending order.</h5>
                                                        <p class="text-muted font-size-14 mb-0">Dubai</p>
                                                    </div>

                                                    <div class="media-body">
                                                        <div class="text-end d-none d-md-block">
                                                            <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="mdi mdi-timer-outline font-size-15 text-primary"></i> 1 days</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </li>

                                            <li class="activity-list">
                                                <div class="activity-icon avatar-sm">
                                                    <span class="avatar-title bg-soft-success text-success rounded-circle">
                                                        <i class="ti-user font-size-16"></i>
                                                    </span>
                                                </div>
                                                <div class="media">
                                                    <div class="me-3">
                                                        <h5 class="font-size-15 mb-1">New Order Received</h5>
                                                        <p class="text-muted font-size-14 mb-0">Thank You</p>
                                                    </div>

                                                    <div class="media-body">
                                                        <div class="text-end d-none d-md-block">
                                                            <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="mdi mdi-timer-outline font-size-15 text-primary"></i> Today</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>


                                        </ul>

                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Earning Goal</h4>

                                        <div class="mt-2 text-center">


                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="mt-4 mt-sm-0">


                                                        <div id="list-chart-1" class="apex-charts" dir="ltr"></div>
                                                        <p class="text-muted mb-2 mt-2 pt-1">Total Earning:</p>
                                                        <h5 class="font-size-18 mb-1">USD 13,545.65</h5>
                                                    </div>
                                                </div>



                                                <div class="col-md-6 dash-goal">

                                                    <div class="mt-4 mt-sm-0">

                                                        <div id="list-chart-2" class="apex-charts" dir="ltr"></div>

                                                        <p class="text-muted mb-2 mt-2 pt-1">Earning Goal:</p>
                                                        <h5 class="font-size-18 mb-1">USD 84,265.45</h5>


                                                    </div>


                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Best Selling Product</h4>



                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">

                                                <div class="carousel-item active">
                                                    <div class="row align-items-center mb-5">
                                                        <div class="col-md-4">
                                                            <img src="assets/images/product/img-3.png" class="img-fluid me-3" alt="">
                                                        </div>
                                                        <div class="col-md-7 offset-md-1">

                                                            <div class="mt-4 mt-sm-0">
                                                                <p class="text-muted mb-2">Headphone</p>

                                                                <h5 class="text-primary">Blue Headphone</h5>



                                                                <div class="row no-gutters mt-4">

                                                                    <div class="col-4">

                                                                        <div class="mt-1">
                                                                            <h4>1200</h4>
                                                                            <p class="text-muted mb-1">Sold</p>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-4">

                                                                        <div class="mt-1">
                                                                            <h4>450</h4>
                                                                            <p class="text-muted mb-1">Stock</p>
                                                                        </div>


                                                                    </div>

                                                                    <div class="col-4">
                                                                        <div class="mt-4 pt-1">
                                                                            <a href="" class="btn btn-primary btn-sm">Buy
                                                                                Now</a>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="carousel-item">
                                                    <div class="row align-items-center mb-5">
                                                        <div class="col-md-4">
                                                            <img src="<?= base_url(); ?>assets/images/product/img-5.png" class="img-fluid me-3" alt="">
                                                        </div>
                                                        <div class="col-md-7 offset-md-1">

                                                            <div class="mt-4 mt-sm-0">
                                                                <p class="text-muted mb-2">T-shirt</p>

                                                                <h5 class="text-primary">Blue T-shirt</h5>



                                                                <div class="row no-gutters mt-4">

                                                                    <div class="col-4">

                                                                        <div class="mt-1">
                                                                            <h4>800</h4>
                                                                            <p class="text-muted mb-1">Sold</p>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-4">

                                                                        <div class="mt-1">
                                                                            <h4>250</h4>
                                                                            <p class="text-muted mb-1">Stock</p>
                                                                        </div>


                                                                    </div>

                                                                    <div class="col-4">
                                                                        <div class="mt-4 pt-1">
                                                                            <a href="" class="btn btn-primary btn-sm">Buy
                                                                                Now</a>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="carousel-item">
                                                    <div class="row align-items-center mb-5">
                                                        <div class="col-md-4">
                                                            <img src="<?= base_url(); ?>assets/images/product/img-1.png" class="img-fluid me-3" alt="">
                                                        </div>
                                                        <div class="col-md-7 offset-md-1">

                                                            <div class="mt-4 mt-sm-0">
                                                                <p class="text-muted mb-2">Sonic</p>

                                                                <h5 class="text-primary">Alarm clock</h5>



                                                                <div class="row no-gutters mt-4">

                                                                    <div class="col-4">

                                                                        <div class="mt-1">
                                                                            <h4>600</h4>
                                                                            <p class="text-muted mb-1">Sold</p>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-4">

                                                                        <div class="mt-1">
                                                                            <h4>150</h4>
                                                                            <p class="text-muted mb-1">Stock</p>
                                                                        </div>


                                                                    </div>

                                                                    <div class="col-4">
                                                                        <div class="mt-4 pt-1">
                                                                            <a href="" class="btn btn-primary btn-sm">Buy
                                                                                Now</a>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>







                            </div>


                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mb-4">Sales by State</h4>

                                        <div id="world-map-markers" style="height: 230px"></div>

                                        <div class="px-4 py-3 mt-4">
                                            <p class="mb-1">USA <span class="float-right">75%</span></p>
                                            <div class="progress mt-2" style="height: 6px;">
                                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">
                                                </div>
                                            </div>

                                            <p class="mt-3 mb-1">Russia <span class="float-right">55%</span></p>
                                            <div class="progress mt-2" style="height: 6px;">
                                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="55">
                                                </div>
                                            </div>

                                            <p class="mt-3 mb-1">Australia <span class="float-right">85%</span></p>
                                            <div class="progress mt-2" style="height: 6px;">
                                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="85">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>





                        </div>

                        <div class="row">

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Sales By Social Source

                                        </h4>

                                        <ul class="inbox-wid list-unstyled mb-0">
                                            <li class="inbox-list-item">
                                                <a href="#">
                                                    <div class="media">
                                                        <div class="me-3 align-self-center">
                                                            <div class="avatar-sm rounded bg-primary align-self-center">
                                                                <span class="avatar-title">
                                                                    <i class="ti-facebook text-white font-size-18"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="media-body overflow-hidden mt-1">
                                                            <h5 class="font-size-15 mb-1">Facebook Ads</h5>
                                                            <p class="text-muted mb-0">3.2k Sale - 4.2k Like</p>
                                                        </div>
                                                        <p class="ms-2 pt-3">
                                                            <i class="mdi mdi-arrow-top-right text-success me-1"></i>50%
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="inbox-list-item">
                                                <a href="#">
                                                    <div class="media">
                                                        <div class="me-3 align-self-center">
                                                            <div class="avatar-sm rounded bg-info align-self-center">
                                                                <span class="avatar-title">
                                                                    <i class="ti-twitter-alt text-white font-size-18"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="media-body overflow-hidden mt-1">
                                                            <h5 class="font-size-15 mb-1">Twitter Ads</h5>
                                                            <p class="text-muted mb-0">3.1k Sale - 3.7k Like</p>
                                                        </div>
                                                        <p class="ms-2 pt-3">
                                                            <i class="mdi mdi-arrow-top-right text-success me-1"></i>45%
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="inbox-list-item">
                                                <a href="#">
                                                    <div class="media">
                                                        <div class="me-3 align-self-center">
                                                            <div class="avatar-sm rounded bg-danger align-self-center">
                                                                <span class="avatar-title">
                                                                    <i class="ti-linkedin text-white font-size-18"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="media-body overflow-hidden mt-1">
                                                            <h5 class="font-size-15 mb-1">linkedin Ads</h5>
                                                            <p class="text-muted mb-0">4.3k Sale - 4.3k Like</p>
                                                        </div>
                                                        <p class="ms-2 pt-3">
                                                            <i class="mdi mdi-arrow-bottom-right text-danger me-1"></i>30%
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>


                                            <li class="inbox-list-item">
                                                <a href="#">
                                                    <div class="media">
                                                        <div class="me-3 align-self-center">
                                                            <div class="avatar-sm rounded bg-danger align-self-center">
                                                                <span class="avatar-title">
                                                                    <i class="ti-youtube text-white font-size-18"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="media-body overflow-hidden mt-1">
                                                            <h5 class="font-size-15 mb-1">Youtube Ads</h5>
                                                            <p class="text-muted mb-0">4.2k Sale - 3.7k Like</p>
                                                        </div>
                                                        <p class="ms-2 pt-3">
                                                            <i class="mdi mdi-arrow-top-right text-success me-1"></i>35%
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="inbox-list-item">
                                                <a href="#" class="pb-0">
                                                    <div class="media">
                                                        <div class="me-3 align-self-center">
                                                            <div class="avatar-sm rounded bg-dark align-self-center">
                                                                <span class="avatar-title">
                                                                    <i class="ti-github text-white font-size-18"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="media-body overflow-hidden mt-1">
                                                            <h5 class="font-size-15 mb-1">GitHub Ads</h5>
                                                            <p class="text-muted mb-2">4.9k Sale - 4.1k Like</p>
                                                        </div>
                                                        <p class="ms-2 pt-3">
                                                            <i class="mdi mdi-arrow-top-right text-success me-1"></i>40%
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>


                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Products of the Month</h4>
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Product</th>

                                                        <th>Customer</th>
                                                        <th>Price</th>
                                                        <th>Invoice</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>#2356</td>
                                                        <td><img src="<?= base_url(); ?>assets/images/product/img-7.png" width="42" class="me-3" alt="">Green Chair</td>
                                                        <td>Kenneth Gittens</td>
                                                        <td>$200.00</td>
                                                        <td>42</td>
                                                        <td><span class="badge badge-pill badge-soft-primary font-size-13">Pending</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>#2564</td>
                                                        <td><img src="<?= base_url(); ?>assets/images/product/img-8.png" width="42" class="me-3" alt="">Office Chair</td>
                                                        <td>Alfred Gordon</td>
                                                        <td>$242.00</td>
                                                        <td>54</td>
                                                        <td><span class="badge badge-pill badge-soft-success font-size-13">Active</span>
                                                        </td>
                                                    </tr>



                                                    <tr>
                                                        <td>#2125</td>
                                                        <td><img src="<?= base_url(); ?>assets/images/product/img-10.png" width="42" class="me-3" alt="">Gray Chair</td>
                                                        <td>Keena Reyes</td>
                                                        <td>$320.00</td>
                                                        <td>65</td>
                                                        <td><span class="badge badge-pill badge-soft-success font-size-13">Active</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>#8587</td>
                                                        <td><img src="<?= base_url(); ?>assets/images/product/img-11.png" width="42" class="me-3" alt="">Steel Chair</td>
                                                        <td>Timothy Zuniga</td>
                                                        <td>$342.00</td>
                                                        <td>52</td>
                                                        <td><span class="badge badge-pill badge-soft-primary font-size-13">Pending</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>#2354</td>
                                                        <td><img src="<?= base_url(); ?>assets/images/product/img-12.png" width="42" class="me-3" alt="">Home Chair</td>
                                                        <td>Joann Wiliams</td>
                                                        <td>$320.00</td>
                                                        <td>25</td>
                                                        <td><span class="badge badge-pill badge-soft-primary font-size-13">Pending</span>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                            <!-- </div>
                                </div>
                            </div>


                        </div>


                    </div> -->


                        </div> <!-- container-fluid -->
                    </div>
                    <!-- End Page-content -->

                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> ?? Morvin.
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end d-none d-sm-block">
                                        Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->

            <!-- Right Sidebar -->
            <div class="right-bar">
                <div data-simplebar class="h-100">
                    <div class="rightbar-title d-flex align-items-center px-3 py-4">

                        <h5 class="m-0 me-2">Settings</h5>

                        <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                            <i class="mdi mdi-close noti-icon"></i>
                        </a>
                    </div>

                    <!-- Settings -->
                    <hr class="mt-0" />
                    <h6 class="text-center mb-0">Choose Layouts</h6>

                    <div class="p-4">
                        <div class="mb-2">
                            <img src="<?= base_url(); ?>assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="layout-1">
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                            <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                        </div>

                        <div class="mb-2">
                            <img src="<?= base_url(); ?>assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="layout-2">
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">
                            <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                        </div>

                        <div class="mb-2">
                            <img src="<?= base_url(); ?>assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="layout-3">
                        </div>
                        <div class="form-check form-switch mb-5">
                            <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css">
                            <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                        </div>


                    </div>

                </div> <!-- end slimscroll-menu-->
            </div>
            <!-- /Right-bar -->

            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>

            <!-- JAVASCRIPT -->
            <script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
            <script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
            <script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
            <script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>

            <!-- apexcharts -->
            <script src="<?= base_url(); ?>assets/libs/apexcharts/apexcharts.min.js"></script>

            <!-- Plugins js-->
            <script src="<?= base_url(); ?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="<?= base_url(); ?>assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

            <script src="<?= base_url(); ?>assets/js/pages/dashboard.init.js"></script>


            <!-- <script src="<?= base_url(); ?>assets/js/app.js"></script> -->

</body>

</html>