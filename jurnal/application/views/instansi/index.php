<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Instansi Index Page | Morvin - Admin & Dashboard Template</title>
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

                <table border="1" width="75%" style="text-align:center;">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Logo</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($instansi->result() as $row) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->kode_instansi; ?></td>
                            <td><?= $row->nama_instansi; ?></td>
                            <td><?= $row->alamat; ?></td>
                            <td><?= $row->deskripsi_instansi; ?></td>
                            <td><?= $row->email; ?></td>
                            <td><?= $row->telp; ?></td>
                            <td><img src="data:<?= $row->tipe_logo; ?>;base64,<?= $row->logo; ?>" width="400" height="200"></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">


                        <div class="mt-5 text-center text-white">
                            <p>Back <a href="<?= base_url(); ?>user/login" class="fw-bold text-white"> Login </a> </p>
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