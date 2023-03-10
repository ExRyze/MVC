<?php require_once HEAD ?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once SIDE ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once TOP ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php Flasher::getMessage(); ?>

                    <div class="row">
                        
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5>Profile siswa</h5>
                                </div>
                                <div class="card-body text-center">
                                    <div class="d-flex justify-content-center mb-3">
                                        <img class="img-profile rounded-circle col-6" src="<?= IMG ?>/undraw_profile.svg">
                                    </div>
                                    <h5><?= $_SESSION['sppsch2']['nama_siswa'] ?></h5><br>
                                    <small><?= $_SESSION['sppsch2']['tahun_ajaran'] ?></small><br>
                                    <small><?= $_SESSION['sppsch2']['nama_kelas'] ?></small>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5>Transaksi pembayaran</h5>
                                </div>
                                <div class="card-body d-flex flex-wrap">
                                    <?php foreach ($data['bulan'] as $ib => $bulan) { ?>
                                        <?php foreach ($data['transaksi'] as $value) { ?>
                                            <?php if ($bulan === $value['bulan_dibayar']) { ?>
                                                <div class="col-xl-3 col-lg-4 mb-4">
                                                    <div class="card">
                                                        <div class="card-body d-flex flex-column aling-items-center text-center">
                                                        <?= $bulan ?>
                                                            <span><?= "Rp. ".number_format($_SESSION['sppsch2']['nominal'], 0, ",", ".") ?></span>
                                                            <a class="btn btn-success">Lunas</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php $data['created'] = true; break;} ?>
                                        <?php } ?>
                                        <?php if (!$data['created']) { ?>
                                            <div class="col-xl-3 col-lg-4 mb-4">
                                                <div class="card">
                                                    <div class="card-body d-flex flex-column aling-items-center text-center">
                                                    <?= $bulan ?>
                                                        <span><?= "Rp. ".number_format($_SESSION['sppsch2']['nominal'], 0, ",", ".") ?></span>
                                                        <a class="btn btn-danger">Belum lunas</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php $data['created'] = false;} ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once COPY ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<?php require_once FOOT  ?>