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

                    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahPembayaran">Tambah pembayaran</button>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel pembayaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Tahun ajaran</th>
                                            <th>Nominal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>Tahun ajaran</th>
                                            <th>Nominal</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($data['tabel'] as $value) { ?>
                                            <tr>
                                                <td>
                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#editPembayaran<?= $value['id_pembayaran'] ?>">Edit</button>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#hapusPembayaran<?= $value['id_pembayaran'] ?>">Hapus</button>
                                                </td>
                                                <td><?= $value['tahun_ajaran'] ?></td>
                                                <td><?= "Rp. ".number_format($value['nominal'], 0, ",", ".") ?></td>
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

    <!-- Modal Tambah Pembayaran -->
    <div class="modal fade" id="tambahPembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BURL ?>/petugas/tambah/<?= $data['key'] ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah pembayaran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tahun_ajaran" class="form-label">Tahun ajaran</label>
                        <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" required placeholder="yyyy/yyyy">
                    </div>
                    <div class="form-group">
                        <label for="nominal" class="form-label">Nominal</label>
                        <input type="number" name="nominal" id="nominal" min="0" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit & Hapus Pembayaran -->
    <?php foreach ($data['tabel'] as $value) { ?>
        <div class="modal fade" id="editPembayaran<?= $value['id_pembayaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" method="post" action="<?= BURL ?>/petugas/edit/<?= $data['key'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit pembayaran</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_pembayaran" value="<?= $value['id_pembayaran'] ?>">
                        <div class="form-group">
                            <label for="tahun_ajaran" class="form-label">Tahun ajaran</label>
                            <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" required placeholder="yyyy/yyyy" value="<?= $value['tahun_ajaran'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" name="nominal" id="nominal" min="0" required class="form-control" value="<?= $value['nominal'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    
        <div class="modal fade" id="hapusPembayaran<?= $value['id_pembayaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" method="post" action="<?= BURL ?>/petugas/hapus/<?= $data['key'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus pembayaran</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_pembayaran" value="<?= $value['id_pembayaran'] ?>">
                        Yakin menghapus data pembayaran ini?<br>
                        <strong><?= $value['tahun_ajaran']." - Rp. ".number_format($value['nominal'], 0, ",", ".") ?></strong><br><br>
                        <small><span class="text-danger">Data siswa</span> dalam tahun ajaran ini dan <span class="text-danger">data transaksi pembayaran</span>nya juga akan ikut terhapus!</small>
    
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