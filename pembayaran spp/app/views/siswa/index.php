<?php require_once(HEAD); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once(SBAR); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once(TBAR); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php Flasher::getPesan(); ?>
                    
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card shodow">
                                <div class="card-body d-flex justify-content-center">
                                    <video class="col-10" autoplay muted loop>
                                        <source src="<?= VIDEO ?>/file_example_MP4_640_3MG.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once(COPY); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
<?php require_once(FOOT); ?>