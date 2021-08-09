<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Halaman Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url(); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
</head>

<body class="authentication-bg bg-primary">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">
                                    <div class="text-center">
                                        <a href="<?= base_url(); ?>user/login">
                                            <img src="<?= base_url(); ?>assets/images/logo-dark.png" height="22" alt="logo" />
                                        </a>

                                        <h5 class="text-primary mb-2 mt-4">Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue to Morvin.</p>
                                    </div>

                                    <div class="=alert alert-warning" role="alert">
                                        <?php
                                        if (isset($pesan)) {
                                            echo $pesan;
                                        } else {
                                            echo "Masukkan email dan password";
                                        }
                                        ?>
                                    </div>

                                    <form class="form-horizontal mt-4 pt-2" method="post" action="<?= base_url(); ?>user/proses_login">
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" />
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customControlInline" />
                                                <label class="form-label" for="customControlInline">Remember me</label>
                                            </div>
                                        </div>

                                        <div>
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">
                                                Log In
                                            </button>
                                        </div>
                                    </form>

                                    <!-- <script>
                                        swal("Hello world!");
                                    </script> -->

                                    <script>
                                        function getAlertSuperAdmin() {
                                            swal({
                                                title: "Login Successful",
                                                text: "Anda akan menuju ke halaman Dashboard Super Admin",
                                                icon: "success",
                                                buttons: false,
                                                timer: 3000,
                                                closeOnClickOutside: false,
                                            }).then(() => {
                                                window.location.href = `<?= base_url(); ?>user/dashboardadmin`;
                                            });
                                        }

                                        function getAlertAdminInstansi() {
                                            swal({
                                                title: "Login Successful",
                                                text: "Anda akan menuju ke halaman Dashboard Admin Instansi",
                                                icon: "success",
                                                buttons: false,
                                                timer: 3000,
                                                closeOnClickOutside: false,
                                            }).then(() => {
                                                window.location.href = `<?= base_url(); ?>user/dashboardadmininstansi`;
                                            });
                                        }

                                        function getAlertUser() {
                                            swal({
                                                title: "Login Successful",
                                                text: "Anda akan menuju ke halaman Dashboard User",
                                                icon: "success",
                                                buttons: false,
                                                timer: 3000,
                                                closeOnClickOutside: false,
                                            }).then(() => {
                                                window.location.href = `<?= base_url(); ?>user/dashboarduser`;
                                            });
                                        }

                                        function getAlertFailed() {
                                            swal({
                                                title: "Login Failed",
                                                text: "Periksa kembali email dan password anda",
                                                icon: "error",
                                                buttons: false,
                                                timer: 3000,
                                                closeOnClickOutside: false,
                                            });
                                        }
                                    </script>

                                    <style>
                                        .swal-modal .swal-text {
                                            text-align: center;
                                        }

                                        .swal-overlay {
                                            background-color: rgba(128, 128, 255, 0.7);
                                        }
                                    </style>

                                    <?php if (!empty($login_super_admin)) : ?>
                                        <script>
                                            getAlertSuperAdmin();
                                        </script>
                                    <?php elseif (!empty($login_admin_ins)) : ?>
                                        <script>
                                            getAlertAdminInstansi();
                                        </script>
                                    <?php elseif (!empty($login_user)) : ?>
                                        <script>
                                            getAlertUser();
                                        </script>
                                    <?php endif; ?>

                                    <?php if (isset($pesan)) { ?>
                                        <script>
                                            getAlertFailed();
                                        </script>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <p>
                                Belum punya Akun User?<a href="<?= base_url(); ?>user" class="fw-bold text-white">
                                    Registrasi Akun User Baru</a>
                            </p>
                            <!-- <p>
                                Instansi belum terdaftar?<a href="<?= base_url(); ?>instansi/tambah" class="fw-bold text-white">
                                    Registrasi Instansi Baru</a>
                            </p>
                            <p>
                                Belum punya Akun Admin Instansi?<a href="<?= base_url(); ?>user/tambahuserinstansi" class="fw-bold text-white">
                                    Registrasi Akun Admin Instansi Baru</a>
                            </p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Log In page -->
    </div>

    <script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>

    <script src="<?= base_url(); ?>assets/js/app.js"></script>
</body>

</html>