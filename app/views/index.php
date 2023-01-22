<?php require_once HEADER; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="home">

                <!-- Topbar -->
                <?php require_once NAVBAR; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid container-home d-flex flex-column justify-content-center align-items-center">

                    <h2>Selamat Datang<?= (isset($_SESSION['petugas'])) ? ' '.$_SESSION['petugas']['username'] : '' ?>!</h2>
                    <P>Di website Pengaduan Masyarakat</P>
                    <?php if(!isset($_SESSION['petugas'])) { ?>
                    <br><a href="<?= BASE_URL ?>/lapor" class="btn btn-primary">Laporkan Masalah</a>
                    <?php } ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once FOOTER; ?>
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