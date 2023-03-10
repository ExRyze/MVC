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
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <img class="img-profile rounded-circle col-6" src="<?= IMG ?>/undraw_profile.svg">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5>Transaksi pembayaran</h5>
                                </div>
                                <div class="card-body d-flex flex-wrap">
                                    <?php foreach ($data['bulan'] as $bulan) { ?>
                                        <div class="col-xl-3 col-lg-4 mb-4">
                                            <div class="card">
                                                <div class="card-body d-flex flex-column aling-items-center text-center">
                                                    <h5><?= $bulan ?></h5>
                                                    <button class="btn btn-danger">Bayar</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
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