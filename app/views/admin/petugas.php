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
                        <h1 class="h3 mb-0 text-gray-800">Tabel Petugas</h1>
                    </div>
                    
                    <?php Flasher::setFlasher(); ?>
                    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahPetugas">Tambah Petugas</button>

                    <table class="table table-hover table-bordered text-center">
                      <thead>
                        <th>No.</th>
                        <th>Nama petugas</th>
                        <th>Username</th>
                        <th>No. Telepon</th>
                        <th>Level</th>
                        <th>Aksi</th>
                      </thead>
                      <tbody class="text-left">
                        <?php foreach($data['petugas'] as $i => $petugas) { ?>
                          <tr>
                            <td class="text-center"><?= $i+1 ?></td>
                            <td><?= $petugas['nama_petugas'] ?></td>
                            <td><?= $petugas['username'] ?></td>
                            <td><?= $petugas['telp'] ?></td>
                            <td><?= $petugas['level'] ?></td>
                            <td class="d-flex w-100">
                              <button class="btn btn-warning mx-2" data-toggle="modal" data-target="#editPetugas<?= $petugas['id_petugas'] ?>">Edit</button>
                              <button class="btn btn-danger mx-2" data-toggle="modal" data-target="#deletePetugas<?= $petugas['id_petugas'] ?>">Hapus</button>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <th>No.</th>
                        <th>Nama petugas</th>
                        <th>Username</th>
                        <th>No. Telepon</th>
                        <th>Level</th>
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

    <div class="modal fade" id="tambahPetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" action="<?= BASE_URL ?>/admin/add" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nama">Nama petugas</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="telp">No. Telepon</label>
                    <input type="text" name="telp" id="telp" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="custom-select">
                      <option value="admin">admin</option>
                      <option value="petugas" selected>petugas</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php foreach($data['petugas'] as $petugas) { ?>
      <div class="modal fade" id="editPetugas<?= $petugas['id_petugas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" action="<?= BASE_URL ?>/admin/edit" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="id" value="<?= $petugas['id_petugas'] ?>">
                  <div class="form-group">
                    <label for="nama">Nama petugas</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $petugas['nama_petugas'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= $petugas['username'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="telp">No. Telepon</label>
                    <input type="text" name="telp" id="telp" class="form-control" value="<?= $petugas['telp'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="custom-select">
                      <option value="admin" <?= ($petugas['level'] === "admin") ? 'selected' : '' ?>>admin</option>
                      <option value="petugas" <?= ($petugas['level'] === "petugas") ? 'selected' : '' ?>>petugas</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
      </div>

      <div class="modal fade" id="deletePetugas<?= $petugas['id_petugas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" action="<?= BASE_URL ?>/admin/delete" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Petugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="id" value="<?= $petugas['id_petugas'] ?>">
                  Apakah Anda yakin menghapus data petugas ini?<br><small>-- <strong><?= $petugas['nama_petugas']." / ".$petugas['username'] ?></strong></small>
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