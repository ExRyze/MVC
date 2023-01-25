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
                        <input class="form-control" type="text" name="nik" id="nik" placeholder="NIK" value="<?= (!empty($_POST['nik']))? $_POST['nik'] : '' ?>">
                      </div>
                      <div class="flex-fill mx-2">
                        <label for="nama">Nama:</label>
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama" value="<?= (!empty($_POST['nama']))? $_POST['nama'] : '' ?>">
                      </div>
                      <div class="mx-2">
                        <label for="status">Filter:</label>
                        <select class="custom-select" name="status" id="status">
                          <option value="0" <?= (isset($_POST['status'])) ? (($_POST['status'] === "0")? "selected" : '') : '' ?>>Belum ditindaklanjuti</option>
                          <option value="proses" <?= (!empty($_POST['status']) && $_POST['status'] === "proses")? "selected" : '' ?>>Dalam proses</option>
                          <option value="selesai" <?= (!empty($_POST['status']) && $_POST['status'] === "selesai")? "selected" : '' ?>>Telah selesai</option>
                          <option value="ditolak" <?= (!empty($_POST['status']) && $_POST['status'] === "ditolak")? "selected" : '' ?>>Laporan ditolak</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary ml-2">Search</button>
                    </form>

                    <div class="d-flex">
                      <?php if(!empty($data['laporan'])) { ?>
                        <?php foreach($data['laporan'] as $laporan) { ?>
                          <div class="px-2 col-6 mb-3">
                            <a class="card text-dark text-decoration-none" type="button" data-toggle="modal" data-target="#laporan<?= $laporan['id_pengaduan'] ?>">
                              <div class="card-body d-flex">
                                <div class="col-4 overflow-hidden">
                                  <img src="<?= LAPORAN.'/'.$laporan['foto'] ?>" alt="<?= $laporan['foto'] ?>" class="col-12">
                                </div>
                                <div class="col-8 pl-4">
                                  <h3 class="m-0"><?= $laporan['judul_laporan'] ?></h3>
                                  <p class="mb-3">
                                    <small>Uploaded by <strong><?= $laporan['nama'] ?></strong>, <?= date("d F Y h:i:s A", strtotime($laporan['tgl_pengaduan'])) ?><br>
                                    Status: 
                                    <?= ($laporan['status'] === "proses") ? "<strong class='text-warning'>Dalam proses</strong>" : (($laporan['status'] === "ditolak") ? "<strong class='text-danger'>Ditolak</strong>" : (($laporan['status'] === "selesai") ? "<strong class='text-success'>Selesai</strong>" : "<strong>Belum ditindaklanjuti</strong>")) ?>
                                    </small></p>
                                  <p class="m-0" style="text-indent: 1.5rem;"><?= $laporan['isi_laporan'] ?></p>
                                </div>
                              </div>
                            </a>
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

    <?php foreach($data['laporan'] as $laporan) { ?>
      <div class="modal fade" id="laporan<?= $laporan['id_pengaduan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="column">
                      <h5 class="modal-title" id="exampleModalLabel"><?= $laporan['judul_laporan'] ?></h5>
                      <p class="m-0"><small>Uploaded by <strong><?= $laporan['nama'] ?></strong>, <?= date("d F Y h:i:s A", strtotime($laporan['tgl_pengaduan'])) ?><br>
                      Status: 
                      <?= ($laporan['status'] === "proses") ? "<strong class='text-warning'>Dalam proses</strong>" : (($laporan['status'] === "ditolak") ? "<strong class='text-danger'>Ditolak</strong>" : (($laporan['status'] === "selesai") ? "<strong class='text-success'>Selesai</strong>" : "<strong>Belum ditindaklanjuti</strong>")) ?></small></p>
                    </div>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="col-12 mb-3 d-flex justify-content-center">
                    <img src="<?= LAPORAN.'/'.$laporan['foto'] ?>" alt="<?= $laporan['foto'] ?>" class="col-4">
                  </div>
                  <div class="col-11 mx-auto">
                    <p class="m-0" style="text-indent: 1.5rem;"><?= $laporan['isi_laporan'] ?></p>
                  </div>
                </div>
                <?php if(isset($_SESSION['petugas'])) { ?>
                <form class="modal-footer justify-content-start" method="post" action="">
                  <h5 class="modal-title text-left col-12">Tanggapan <?php if(isset($laporan['id_tanggapan'])) { ?><br> <p class="mb-3"><small>Uploaded by <strong><?= $laporan['petugas_username'] ?> / <?= $laporan['petugas_telp'] ?></strong>, <?= date("d F Y h:i:s A", strtotime($laporan['tgl_pengaduan'])) ?></small></p><?php } ?></h5>
                  <?php if(isset($laporan['id_tanggapan'])) { ?> <input type="hidden" name="id_tanggapan" value="<?= $laporan['id_tanggapan'] ?>"> <?php } ?>
                  <input type="hidden" name="id_pengaduan" value="<?= $laporan['id_pengaduan'] ?>">
                  <textarea name="tanggapan" id="tanggapan" class="col-12" rows="10"><?= (isset($laporan['id_tanggapan'])) ? $laporan['tanggapan'] : '' ?></textarea>
                  <div class="col-12 d-flex flex-wrap justify-content-end">
                    <input type="submit" class="btn btn-danger mx-2" name="submit" value="Tolak">
                    <input type="submit" class="btn btn-warning mx-2" name="submit" value="Proses">
                    <input type="submit" class="btn btn-success mx-2" name="submit" value="Selesai">
                    <input type="submit" class="btn btn-info mx-2" name="submit" value="Belum ditindaklanjuti">
                  </div>
                </form>
                <?php } else { ?>
                  <?php if(isset($laporan['id_tanggapan'])) { ?>
                  <div class="modal-footer justify-content-start">
                    <h5 class="modal-title text-left col-12">Tanggapan <br> <p class="mb-3">
                      <small>Uploaded by <strong><?= $laporan['petugas_username'] ?> / <?= $laporan['petugas_telp'] ?></strong>, <?= date("d F Y h:i:s A", strtotime($laporan['tgl_pengaduan'])) ?></small></p></h5>
                    <p class="col-11 mx-auto"><?= $laporan['tanggapan'] ?></p>
                  </div>
                <?php }} ?>
            </div>
        </div>
      </div>
    <?php } ?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= VENDOR ?>/jquery/jquery.min.js"></script>
    <script src="<?= VENDOR ?>/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= VENDOR ?>/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= JS ?>/sb-admin-2.min.js"></script>

</body>

</html>