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

                    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahKelas">Tambah kelas</button>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel kelas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Nama kelas</th>
                                            <th>Kompetensi keahlian</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>Nama kelas</th>
                                            <th>Kompetensi keahlian</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($data['tabel'] as $value) { ?>
                                            <tr>
                                                <td>
                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#editKelas<?= $value['id_kelas'] ?>">Edit</button>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#hapusKelas<?= $value['id_kelas'] ?>">Hapus</button>
                                                </td>
                                                <td><?= $value['nama_kelas'] ?></td>
                                                <td><?= $value['kompetensi_keahlian'] ?></td>
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

    <!-- Modal Tambah Kelas -->
    <div class="modal fade" id="tambahKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BURL ?>/petugas/tambah/<?= $data['key'] ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kelas" class="form-label">Nama kelas</label>
                        <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" required placeholder="Nama kelas">
                    </div>
                    <div class="form-group">
                        <label for="kompetensi_keahlian" class="form-label">Kompetensi keahlian</label>
                        <select name="kompetensi_keahlian" id="kompetensi_keahlian" class="custom-select" required>
                            <option value="" selected disabled hidden>Pilih kompetensi keahlian</option>
                            <?php foreach ($data['kompetensi'] as $kom) { ?>
                                <option value="<?= $kom ?>"><?= $kom ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit & Hapus Kelas -->
    <?php foreach ($data['tabel'] as $value) { ?>
        <div class="modal fade" id="editKelas<?= $value['id_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" method="post" action="<?= BURL ?>/petugas/edit/<?= $data['key'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit kelas</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_kelas" value="<?= $value['id_kelas'] ?>">
                        <div class="form-group">
                            <label for="nama_kelas" class="form-label">Nama kelas</label>
                            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" required placeholder="Nama kelas" value="<?= $value['nama_kelas'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="kompetensi_keahlian" class="form-label">Kompetensi keahlian</label>
                            <select name="kompetensi_keahlian" id="kompetensi_keahlian" class="custom-select" required>
                                <?php foreach ($data['kompetensi'] as $kom) { ?>
                                    <option value="<?= $kom ?>" <?= ($value['kompetensi_keahlian'] === $kom) ? "selected" : "" ?>><?= $kom ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    
        <div class="modal fade" id="hapusKelas<?= $value['id_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" method="post" action="<?= BURL ?>/petugas/hapus/<?= $data['key'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus kelas</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_kelas" value="<?= $value['id_kelas'] ?>">
                        Yakin menghapus data kelas ini?<br>
                        <strong><?= $value['nama_kelas']." - ".$value['kompetensi_keahlian'] ?></strong><br><br>
                        <small><span class="text-danger">Data siswa</span> dari kelas ini dan <span class="text-danger">data transaksi pembayaran</span>nya juga akan ikut terhapus!</small>
    
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