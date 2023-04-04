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

                    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahPetugas">Tambah petugas</button>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel petugas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Nama petugas</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>Nama petugas</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($data['tabel'] as $value) { ?>
                                            <tr>
                                                <td>
                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#editPetugas<?= $value['id_petugas'] ?>">Edit</button>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#hapusPetugas<?= $value['id_petugas'] ?>">Hapus</button>
                                                </td>
                                                <td><?= $value['nama_petugas'] ?></td>
                                                <td><?= $value['username'] ?></td>
                                                <td><?= $value['password'] ?></td>
                                                <td><?= $value['role'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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

    <!-- Modal Tambah Petugas -->
    <div class="modal fade" id="tambahPetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BURL ?>/petugas/tambah/<?= $data['key'] ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah petugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_petugas" class="form-label">Nama petugas</label>
                        <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" required placeholder="Nama petugas">
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Username petugas</label>
                        <input type="text" name="username" id="username" class="form-control" required placeholder="Username petugas">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="custom-select" required>
                            <option value="petugas">petugas</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit $ Hapus Petugas -->
    <?php foreach ($data['tabel'] as $value) { ?>
        <div class="modal fade" id="editPetugas<?= $value['id_petugas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" method="post" action="<?= BURL ?>/petugas/edit/<?= $data['key'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit petugas</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_petugas" value="<?= $value['id_petugas'] ?>" required>
                        <div class="form-group">
                            <label for="nama_petugas" class="form-label">Nama petugas</label>
                            <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" required placeholder="Nama petugas" value="<?= $value['nama_petugas'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="username" class="form-label">Username petugas</label>
                            <input type="text" name="username" id="username" class="form-control" required placeholder="Username petugas" value="<?= $value['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required placeholder="Password" value="<?= $value['password'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="custom-select" required>
                                <option value="petugas" <?= ($value['role'] === "petugas") ? "selected" : "" ?>>petugas</option>
                                <option value="admin" <?= ($value['role'] === "admin") ? "selected" : "" ?>>admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    
        <div class="modal fade" id="hapusPetugas<?= $value['id_petugas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" method="post" action="<?= BURL ?>/petugas/hapus/<?= $data['key'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus petugas</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_pengguna" value="<?= $value['pengguna_id'] ?>" required>
                        Yakin menghapus data petugas ini?<br>
                        <strong><?= $value['username'].' - '.$value['nama_petugas'] ?></strong><br><br>
                        <small><span class="text-danger">Data transaksi pembayaran</span> yang telah diproses oleh petugas ini akan ikut terhapus!</small>
    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
<?php require_once(FOOT); ?>