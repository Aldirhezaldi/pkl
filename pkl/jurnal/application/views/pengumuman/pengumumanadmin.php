<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8" />
    <title>Halaman Utama Pengumuman</title>
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
                    <div class="topbar-social-icon me-3 d-none d-md-block">
                        <ul class="list-inline title-tooltip m-0">
                        </ul>
                    </div>
                </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="data:<?= $_SESSION['tipe_foto']; ?>;base64,<?= $_SESSION['foto']; ?>" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1"><?= $_SESSION['nama']; ?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <?php if ($_SESSION['level'] == 'super admin') : ?>
                                <a class="dropdown-item" href="<?= base_url(); ?>user/dashboardadmin"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                            <?php elseif ($_SESSION['level'] == 'admin instansi') : ?>
                                <a class="dropdown-item" href="<?= base_url(); ?>user/dashboardadmininstansi"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                            <?php elseif ($_SESSION['level'] == 'user') : ?>
                                <a class="dropdown-item" href="<?= base_url(); ?>user/dashboarduser"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                            <?php endif; ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="<?= base_url(); ?>user/logout"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>
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
                                    <?php elseif ($_SESSION['level'] == 'admin instansi') : ?>
                                        <li><a href="<?= base_url(); ?>kegiatan/kegiatanjuli2021adminins">Juli 2021</a></li>
                                        <li><a href="<?= base_url(); ?>kegiatan/kegiatanagt2021adminins">Agustus 2021</a></li>
                                    <?php elseif ($_SESSION['level'] == 'user') : ?>
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
                        </li>

                        <li>
                            <?php if ($_SESSION['level'] == 'super admin') : ?>
                                <a href="<?= base_url(); ?>instansi" class="waves-effect">
                                    <i class="dripicons-store"></i>
                                    <span>Instansi</span>
                                </a>
                            <?php elseif ($_SESSION['level'] == 'admin instansi') : ?>
                                </a> -->
                            <?php elseif ($_SESSION['level'] == 'user') : ?>
                            <?php endif; ?>
                        </li>

                        <li>
                            <?php if ($_SESSION['level'] == 'super admin') : ?>
                            <?php elseif ($_SESSION['level'] == 'admin instansi') : ?>
                                <a href="<?= base_url(); ?>divisi/divisiadminins" class="waves-effect">
                                    <i class="mdi mdi-bank"></i>
                                    <span>Divisi</span>
                                </a>
                            <?php elseif ($_SESSION['level'] == 'user') : ?>
                            <?php endif; ?>
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
                                    <h4>Pengumuman Instansi</h4>
                                    </ol>
                                </div>
                            </div>
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
                                        <div class="clearfix"></div>
                                        <div class="row align-items-center">
                                            <div class="col-xl-12">
                                                <header style="border-bottom: 2px solid lightblue;">
                                                    <h1 style="display: inline-block; margin-left: 400px; font-weight: bold; color:steelblue;">Pengumuman</h1>
                                                </header>
                                                <div class="col-xl-12" style="margin-top: 15px;">
                                                    <div class="row">
                                                        <div class="col-12 text-white d-flex justify-content-center" style="flex: 0 0 100%;">
                                                            <?php foreach ($instansi as $row) : ?>
                                                                <a href="<?= base_url(); ?>pengumuman/pengumumanadminperins/<?= $row['id_instansi']; ?>" class="btn">
                                                                    <div class="card bg-secondary">
                                                                        <div class="card-header bg-dark text-white">
                                                                            <center><?= $row['nama_instansi']; ?></center>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="">
                                                                                <?php if (!empty($row['logo'])) : ?>
                                                                                    <center><img src="data:<?= $row['tipe_logo']; ?>;base64,<?= $row['logo']; ?>" alt="foto" style="width: 100px; height: 100px;" /></center>
                                                                                <?php else : ?>
                                                                                    <?= ('No Photo'); ?><br>
                                                                                    <img style="width: 100px; height: 100px; margin-top: 5px;" />
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </form> -->
                                                                    </div>
                                                                </a>
                                                            <?php endforeach; ?>
                                                            <?php
                                                            if (!empty($edit_kegiatan_user)) { ?>
                                                                <script>
                                                                    getAlert();
                                                                </script>
                                                            <?php } ?> -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- container-fluid -->
                    </div>
                    <!-- End Page-content -->

                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> © Morvin.
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