<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Instansi Register Page | Morvin - Admin & Dashboard Template</title>
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
</head>


<body class="authentication-bg bg-primary">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">

                <div class="home-btn"><a href="/" class="text-white router-link-active"><i class="fas fa-home h2"></i></a></div>


                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">


                                    <div class="text-center">
                                        <a href="index.html">
                                            <img src="<?= base_url(); ?>assets/images/logo-dark.png" height="22" alt="logo">
                                        </a>

                                        <h5 class="text-primary mb-2 mt-4">Instansi Register</h5>
                                        <p class="text-muted">Get your free Instansi account now.</p>
                                    </div>

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

                                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>instansi/tambah">

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
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Register</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="mb-0">By registering you agree to the Morvin <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <p>Already have an account ? <a href="<?= base_url(); ?>user/login" class="fw-bold text-white"> Login </a> </p>
                            <p>© <script>
                                    document.write(new Date().getFullYear())
                                </script> Morvin. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
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