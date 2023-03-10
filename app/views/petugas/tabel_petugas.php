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

                    <?php Flasher::getMessage() ?>

                    <button class="btn btn-success mb-4" data-toggle="modal" data-target="#tambahPetugas">Tambah petugas</button>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Petugas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Nama petugas</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Password</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>Nama petugas</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Password</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($data['tabel'] as  $value) { ?>
                                            <tr>
                                                <td>
                                                    <div class="dropdown no-arrow">
                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-bottom shadow animated--fade-in"
                                                            aria-labelledby="dropdownMenuLink">
                                                            <div class="dropdown-header">Action:</div>
                                                            <a class="dropdown-item text-warning" data-toggle="modal" data-target="#editPetugas<?= $value['id_petugas'] ?>">Edit</a>
                                                            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#hapusPetugas<?= $value['id_petugas'] ?>">Hapus</a>
                                                        </div>
                                                    </div>
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

    
    <!-- Tambah Petugas Modal-->
    <div class="modal fade" id="tambahPetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BURL ?>/petugas/store/<?= $data['key'] ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah petugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="namaPetugas">Nama petugas</label>
                        <input type="text" class="form-control" name="namaPetugas" id="namaPetugas" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="role">Role</label>
                        <select name="role" id="role" required class="custom-select">
                            <option value="" selected hidden disabled></option>
                            <option value="petugas">Petugas</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit & Hapus Petugas Modal-->
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
                        <input type="hidden" name="idPetugas" value="<?= $value['id_petugas'] ?>">
                        <div class="form-group">
                            <label class="form-label" for="namaPetugas">Nama petugas</label>
                            <input type="text" class="form-control" name="namaPetugas" id="namaPetugas" required value="<?= $value['nama_petugas'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required value="<?= $value['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required value="<?= $value['password'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="role">Role</label>
                            <select name="role" id="role" required class="custom-select">
                                <option value="petugas" <?= ($value['role'] === "petugas") ? "selected" : "" ?>>Petugas</option>
                                <option value="admin" <?= ($value['role'] === "admin") ? "selected" : "" ?>>Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="hapusPetugas<?= $value['id_petugas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" method="post" action="<?= BURL ?>/petugas/remove/<?= $data['key'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit petugas</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idPengguna" value="<?= $value['pengguna_id'] ?>">
                        Yakin hapus petugas ini?<br>
                        <strong><?= $value['nama_petugas']." - ".$value['username'] ?></strong><br>
                        <br><small>Data <span class="text-danger font-weight-bold">transaksi pembayaran petugas ini</span> juga akan ikut terhapus.</small>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
    <?php require_once FOOT ?>