<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pembayaran SPP - Entri Pembayaran SPP</title>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="<?= VENDOR ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= CSS ?>/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .bulan-item:last-child {
            margin-bottom: 0!important;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once SIDEBAR; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once TOPBAR; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php Flasher::flasher() ?>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Entri Pembayaran SPP</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <div class="row">

                        <!-- Pie Chart -->
                        <div class="col-xl-3">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <h6 class="m-0">Profile</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body d-flex flex-column text-center">
                                    <div class="d-flex justify-content-center mb-4">
                                        <img class="col-6 rounded-circle" src="<?= IMG ?>/undraw_profile.svg">
                                    </div>
                                    <div>
                                        <h5><?= $data['siswa']['nama'] ?></h5>
                                        <small><?= $data['siswa']['nisn']." / ".$data['siswa']['nis'] ?></small><br>
                                        <small><?= $data['siswa']['tahun'] ?></small><br>
                                        <small><?= $data['siswa']['nama_kelas'] ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Area Chart -->
                        <div class="col-xl-9">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <h6 class="m-0">Bulan pembayaran</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body d-flex flex-wrap">
                                    <?php for($i=0; $i<=11; $i++) { ?>
                                        <?php foreach ($data['pembayaran'] as $bayar) { if($bayar['bulan_dibayar'] === $data['bulan'][$i]) { ?>
                                            <div class="col-xl-3 mb-3 bulan-item">
                                                <div class="card shadow border-success">
                                                    <div class="card-body text-center">
                                                        <h6><?= $data['bulan'][$i] ?></h6>
                                                        <p>Rp. <?= number_format($bayar['jumlah_bayar'], 0, ',', '.') ?></p>
                                                        <button class="btn btn-success">Lunas!</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $data['created'] = true; } } if(!$data['created']) { ?>
                                        <div class="col-xl-3 mb-3 bulan-item">
                                            <div class="card shadow border-danger">
                                                <div class="card-body text-center">
                                                    <h6><?= $data['bulan'][$i] ?></h6>
                                                    <p>Rp. <?= number_format($data['siswa']['nominal'], 0, ',', '.') ?></p>
                                                    <form action="<?= BASE_URL ?>/petugas/transaksi" method="post">
                                                        <input type="hidden" name="nisn" value="<?= $data['siswa']['nisn'] ?>">
                                                        <input type="hidden" name="id_spp" value="<?= $data['siswa']['id_spp'] ?>">
                                                        <input type="hidden" name="jumlah" value="<?= $data['siswa']['nominal'] ?>">
                                                        <input type="hidden" name="bulan" value="<?= $data['bulan'][$i] ?>">
                                                        <input type="hidden" name="tahun" value="<?= ($i<=5) ? substr($data['siswa']['tahun'], 0, 4) : substr($data['siswa']['tahun'], 5, 4) ?>">
                                                        <button class="btn btn-danger" type="submit">Bayar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } $data['created'] = false; } ?>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ExRyze 2022</span>
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

    <!-- Bootstrap core JavaScript-->
    <script src="<?= VENDOR ?>/jquery/jquery.min.js"></script>
    <script src="<?= VENDOR ?>/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= VENDOR ?>/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= JS ?>/sb-admin-2.min.js"></script>

</body>

</html>