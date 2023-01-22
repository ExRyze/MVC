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
                <div class="container-fluid container-home">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
                    </div>

                    <form action="" class="d-flex align-items-end mb-3" method="post">
                      <div class="flex-fill mr-2">
                        <label for="nik">NIK:</label>
                        <input class="form-control" type="text" name="nik" id="nik" placeholder="NIK">
                      </div>
                      <div class="flex-fill mx-2">
                        <label for="nama">Nama:</label>
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama">
                      </div>
                      <div class="mx-2">
                        <label for="order">Order By:</label>
                        <select class="custom-select" name="order" id="order">
                          <option value="Baru">Baru</option>
                          <option value="Lama">Lama</option>
                          <option value="Status">Status</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary ml-2">Search</button>
                    </form>

                    <div class="d-flex">
                      <?php if(!empty($data['laporan'])) { ?>
                        <?php foreach($data['laporan'] as $laporan) { ?>
                          <div class="px-2 col-6 mb-3">
                          <div class="card">
                            <div class="card-body d-flex">
                              <div class="col-4 overflow-hidden">
                                <img src="<?= LAPORAN.'/'.$laporan['foto'] ?>" alt="<?= $laporan['foto'] ?>" class="col-12">
                              </div>
                              <div class="col-8 pl-4">
                                <h3 class="m-0"><?= $laporan['judul_laporan'] ?></h3>
                                <p class="mb-3"><small>Uploaded by <strong><?= $laporan['nama'] ?></strong>, <?= date("d F Y", strtotime($laporan['tgl_pengaduan'])) ?></small></p>
                                <p class="m-0" style="text-indent: 1.5rem;"><?= $laporan['isi_laporan'] ?></p>
                              </div>
                            </div>
                          </div>
                          </div>
                        <?php } ?>
                      <?php } else {Flasher::setFlasher();} ?>

                    </div>


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