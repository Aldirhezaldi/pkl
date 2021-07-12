<!doctype html>
<html lang="en">

    <head>
        
        
        <meta charset="utf-8" />
        <title>Form Validation | Morvin - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= base_url(); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


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
                        <a href="<?= base_url(); ?>index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?= base_url(); ?>assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url(); ?>assets/images/logo-dark.png" alt="" height="20">
                            </span>
                        </a>

                        <a href="<?= base_url(); ?>index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url(); ?>assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url(); ?>assets/images/logo-light.png" alt="" height="20">
                            </span>
                        </a>
                    </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>


                        <div class="topbar-social-icon me-3 d-none d-md-block">
                            <ul class="list-inline title-tooltip m-0">
                                <li class="list-inline-item">
                                    <a href="<?= base_url(); ?>email-inbox.html" data-bs-toggle="tooltip" data-placement="top" title="Email">
                                     <i class="mdi mdi-email-outline"></i>
                                    </a>
                                </li>
                        
                                <li class="list-inline-item">
                                    <a href="<?= base_url(); ?>chat.html" data-bs-toggle="tooltip" data-placement="top" title="Chat">
                                     <i class="mdi mdi-tooltip-outline"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="<?= base_url(); ?>calendar.html" data-bs-toggle="tooltip" data-placement="top" title="Calendar">
                                     <i class="mdi mdi-calendar"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="<?= base_url(); ?>pages-invoice.html" data-bs-toggle="tooltip" data-placement="top" title="Printer">
                                     <i class="mdi mdi-printer"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
            
                    </div>

                     <!-- Search input -->
                     <div class="search-wrap" id="search-wrap">
                        <div class="search-bar">
                            <input class="search-input form-control" placeholder="Search" />
                            <a href="<?= base_url(); ?>#" class="close-search toggle-search" data-target="#search-wrap">
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
                                <a href="<?= base_url(); ?>javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?= base_url(); ?>assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> German </span>
                                </a>

                                <!-- item-->
                                <a href="<?= base_url(); ?>javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?= base_url(); ?>assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Italian </span>
                                </a>

                                <!-- item-->
                                <a href="<?= base_url(); ?>javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?= base_url(); ?>assets/images/flags/french.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> French </span>
                                </a>

                                <!-- item-->
                                <a href="<?= base_url(); ?>javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?= base_url(); ?>assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Spanish </span>
                                </a>

                                <!-- item-->
                                <a href="<?= base_url(); ?>javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?= base_url(); ?>assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Russian </span>
                                </a>
                            </div>
                        </div>

    
           

           

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell-outline bx-tada"></i>
                                <span class="badge bg-danger rounded-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="<?= base_url(); ?>#!" class="small"> View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="<?= base_url(); ?>" class="text-reset notification-item">
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
                                    <a href="<?= base_url(); ?>" class="text-reset notification-item">
                                        <div class="media">
                                            <img src="<?= base_url(); ?>assets/images/users/avatar-3.jpg"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">James Lemire</h6>
                                                <div class="font-size-13 text-muted">
                                                    <p class="mb-1">It will seem like simplified English.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="<?= base_url(); ?>" class="text-reset notification-item">
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

                                    <a href="<?= base_url(); ?>" class="text-reset notification-item">
                                        <div class="media">
                                            <img src="<?= base_url(); ?>assets/images/users/avatar-4.jpg"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
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
                                    <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="<?= base_url(); ?>javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                                    </a>
                                </div>
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
                            <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-wallet-outline font-size-16 align-middle me-1"></i> My Wallet</a>
                            <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-end">11</span><i class="mdi mdi-cog-outline font-size-16 align-middle me-1"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline font-size-16 align-middle me-1"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="<?= base_url(); ?>user/logout"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="mdi mdi-cog-outline font-size-20"></i>
                            </button>
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
                <a href="<?= base_url(); ?>user/dashboardadmin" class="waves-effect">
                    <i class="dripicons-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" class="waves-effect">
                    <i class="dripicons-to-do"></i>
                    <span>Forms</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="dripicons-mail"></i>
                    <span>Pengumuman</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="<?= base_url(); ?>email-inbox.html">Inbox</a></li>
                    <li><a href="<?= base_url(); ?>email-read.html">Email Read</a></li>
                    <li><a href="<?= base_url(); ?>email-compose.html">Email Compose</a></li>
                </ul>
            </li>

            <li>
                <a href="<?= base_url(); ?>instansi" class="waves-effect">
                    <i class="dripicons-store"></i>
                    <span>Instansi</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="dripicons-user-group"></i>
                    <span>User</span>
                </a>
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
                                     <h4>Form Validation</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?= base_url(); ?>javascript: void(0);">Morvin</a></li>
                                             <li class="breadcrumb-item"><a href="<?= base_url(); ?>javascript: void(0);">Forms</a></li>
                                             <li class="breadcrumb-item active">Form Validation</li>
                                         </ol>
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                <div class="float-end d-none d-sm-block">
                                </div>
                             </div>
                         </div>
                        </div>
                     </div>
                     <!-- end page title -->    


                    <div class="container-fluid">

                        <div class="page-content-wrapper">
                        <?php
                                    if (isset($error)) {
                                        echo "ERROR UPLOAD : <br/>";
                                        print_r($error);
                                        echo "<hr/>";
                                    }
                                    ?>

                                    <?php if (validation_errors()) : ?>
                                        <div class="alert alert-danger" role="alert"><?= validation_errors() ?>
                                        </div>
                                    <?php endif ?>

                                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>instansi/tambahinstansi">
    
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title">Tambah Data Instansi</h4>
                                            <p class="card-title-desc">Menambah Data Instansi.</p>
            
                                            <form class="custom-validation" action="#">
                                            <div class="mb-3">
                                            <label for="namainstansi">Nama Instansi</label>
                                            <input type="text" class="form-control" id="namainstansi" name="namainstansi" placeholder="Enter Nama Instansi">
                                        </div>

                                        <div class="mb-3">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter Alamat">
                                        </div>

                                        <div class="mb-3">
                                            <label for="deskripsiinstansi">Deskripsi</label>
                                            <br>
                                            <textarea rows="5" cols="60" class="form-control" id="deskripsiinstansi" name="deskripsiinstansi" placeholder="Enter Deskripsi Instansi"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                        </div>

                                        <div class="mb-3">
                                            <label for="telp">Telepon</label>
                                            <input type="text" class="form-control" id="telp" name="telp" placeholder="Enter Telepon">
                                        </div>

                                        <div class="mb-3">
                                            <label for="logo">Logo</label>
                                            <input type="file" name="logo" class="form-control" id="logo">
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success waves-effect" type="submit">Tambah</button>
                                        </div>
                                                        <a href="<?= base_url(); ?>instansi" type="reset" class="btn btn-danger waves-effect">
                                                            Keluar
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
            
                                <!-- <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="header-title">Range validation</h4>
                                            <p class="card-title-desc">Parsley is a javascript form validation
                                                library. It helps you provide your users with feedback on their form
                                                submission before sending it to your server.</p>
            
                                            <form action="#" class="custom-validation">
            
                                                <div class="mb-3">
                                                    <label>Min Length</label>
                                                    <div>
                                                        <input type="text" class="form-control" required
                                                                data-parsley-minlength="6" placeholder="Min 6 chars."/>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Max Length</label>
                                                    <div>
                                                        <input type="text" class="form-control" required
                                                                data-parsley-maxlength="6" placeholder="Max 6 chars."/>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Range Length</label>
                                                    <div>
                                                        <input type="text" class="form-control" required
                                                                data-parsley-length="[5,10]"
                                                                placeholder="Text between 5 - 10 chars length"/>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Min Value</label>
                                                    <div>
                                                        <input type="text" class="form-control" required
                                                                data-parsley-min="6" placeholder="Min value is 6"/>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Max Value</label>
                                                    <div>
                                                        <input type="text" class="form-control" required
                                                                data-parsley-max="6" placeholder="Max value is 6"/>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Range Value</label>
                                                    <div>
                                                        <input class="form-control" required type="text range" min="6"
                                                                max="100" placeholder="Number between 6 - 100"/>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Regular Exp</label>
                                                    <div>
                                                        <input type="text" class="form-control" required
                                                                data-parsley-pattern="#[A-Fa-f0-9]{6}"
                                                                placeholder="Hex. Color"/>
                                                    </div>
                                                </div>
            
                                                <div class="mb-0">
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                            Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary waves-effect">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
            
                                        </div>
                                    </div> -->
                                <!-- </div> end col -->
                            </div> <!-- end row -->

                        </div>
        
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

              
                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Morvin.
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

                    <a href="<?= base_url(); ?>javascript:void(0);" class="right-bar-toggle ms-auto">
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

        <script src="<?= base_url(); ?>assets/libs/parsleyjs/parsley.min.js"></script>

        <script src="<?= base_url(); ?>assets/js/pages/form-validation.init.js"></script>

        <!-- <script src="<?= base_url(); ?>assets/js/app.js"></script> -->

    </body>
</html>
