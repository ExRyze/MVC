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
                        <h1 class="h3 mb-0 text-gray-800">Tabel Masyarakat</h1>
                    </div>
                    
                    <?php Flasher::setFlasher(); ?>
                    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahMasyarakat">Tambah Masyarakat</button>

                    <table class="table table-hover table-bordered text-center">
                      <thead>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                      </thead>
                      <tbody class="text-left">
                        <?php foreach($data['masyarakat'] as $i => $masyarakat) { ?>
                          <tr>
                            <td class="text-center"><?= $i+1 ?></td>
                            <td><?= $masyarakat['nik'] ?></td>
                            <td><?= $masyarakat['nama'] ?></td>
                            <td><?= $masyarakat['telp'] ?></td>
                            <td class="d-flex w-100">
                              <button class="btn btn-warning mx-2" data-toggle="modal" data-target="#editMasyarakat<?= $i ?>">Edit</button>
                              <button class="btn btn-danger mx-2" data-toggle="modal" data-target="#deleteMasyarakat<?= $i ?>">Hapus</button>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                      </tfoot>
                    </table>

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

    <div class="modal fade" id="tambahMasyarakat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" action="<?= BASE_URL ?>/masyarakat/add" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Masyarakat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="telp">No. Telepon</label>
                    <input type="text" name="telp" id="telp" class="form-control">
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php foreach($data['masyarakat'] as $i => $masyarakat) { ?>
      <div class="modal fade" id="editMasyarakat<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" action="<?= BASE_URL ?>/masyarakat/edit" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Masyarakat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="nik" value="<?= $masyarakat['nik'] ?>">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $masyarakat['nama'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="telp">No. Telepon</label>
                    <input type="text" name="telp" id="telp" class="form-control" value="<?= $masyarakat['telp'] ?>">
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
      </div>

      <div class="modal fade" id="deleteMasyarakat<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" action="<?= BASE_URL ?>/masyarakat/delete" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Masyarakat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="nik" value="<?= $masyarakat['nik'] ?>">
                  Data pengaduan serta tanggapan tentang pengaduan dari data masyarakat ini akan ikut terhapus... <br><br>
                  Apakah Anda yakin menghapus data masyarakat ini?<br><small>-- <strong><?= $masyarakat['nama']." / ".$masyarakat['telp'] ?></strong></small>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
      </div>
    <?php } ?>

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