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

                    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahSiswa">Tambah siswa</button>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel siswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>NISN</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Password</th>
                                            <th>Telepon</th>
                                            <th>Kelas</th>
                                            <th>Tahun ajaran</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>NISN</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Password</th>
                                            <th>Telepon</th>
                                            <th>Kelas</th>
                                            <th>Tahun ajaran</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($data['tabel'] as $value) { ?>
                                            <tr>
                                                <td>
                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#editSiswa<?= $value['id_siswa'] ?>">Edit</button>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#hapusSiswa<?= $value['id_siswa'] ?>">Hapus</button>
                                                </td>
                                                <td><?= $value['nisn'] ?></td>
                                                <td><?= $value['nis'] ?></td>
                                                <td><?= $value['nama_siswa'] ?></td>
                                                <td><?= $value['password'] ?></td>
                                                <td><?= $value['telepon'] ?></td>
                                                <td><?= $value['nama_kelas'] ?></td>
                                                <td><?= $value['tahun_ajaran']." [Rp. ".number_format($value['nominal'], 0, ",", ".")."]" ?></td>
                                                <td><?= $value['alamat'] ?></td>
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

    <!-- Modal Tambah Siswa -->
    <div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BURL ?>/petugas/tambah/<?= $data['key'] ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah siswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="role" value="siswa">
                    <div class="form-group">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" name="nisn" id="nisn" class="form-control" required placeholder="NISN">
                    </div>
                    
                    <div class="form-group">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" name="username" id="nis" class="form-control" required placeholder="NIS">
                    </div>
                    <div class="form-group">
                        <label for="nama_siswa" class="form-label">Nama siswa</label>
                        <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" required placeholder="Nama siswa">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" name="telepon" id="telepon" class="form-control" required placeholder="Telepon">
                    </div>
                    <div class="form-group">
                        <label for="kelas_id" class="form-label">Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="custom-select" required>
                            <option value="" selected disabled hidden>Pilih kelas</option>
                            <?php foreach ($data['kelas'] as $kelas) { ?>
                                <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pembayaran_id" class="form-label">Tahun ajaran</label>
                        <select name="pembayaran_id" id="pembayaran_id" class="custom-select" required>
                            <option value="" selected disabled hidden>Pilih tahun ajaran</option>
                            <?php foreach ($data['pembayaran'] as $bayar) { ?>
                                <option value="<?= $bayar['id_pembayaran'] ?>"><?= $bayar['tahun_ajaran']." [Rp. ".number_format($bayar['nominal'], 0, ",", ".")."]" ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit & Hapus Siswa -->
    <?php foreach ($data['tabel'] as $value) { ?>
        <div class="modal fade" id="editSiswa<?= $value['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" method="post" action="<?= BURL ?>/petugas/edit/<?= $data['key'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit siswa</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_siswa" value="<?= $value['id_siswa'] ?>">
                        <div class="form-group">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="text" name="nisn" id="nisn" class="form-control" required placeholder="NISN" value="<?= $value['nisn'] ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" name="username" id="nis" class="form-control" required placeholder="NIS" value="<?= $value['nis'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_siswa" class="form-label">Nama siswa</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" required placeholder="Nama siswa" value="<?= $value['nama_siswa'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required placeholder="Password" value="<?= $value['password'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" name="telepon" id="telepon" class="form-control" required placeholder="Telepon" value="<?= $value['telepon'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="kelas_id" class="form-label">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="custom-select" required>
                                <?php foreach ($data['kelas'] as $kelas) { ?>
                                    <option value="<?= $kelas['id_kelas'] ?>"  <?= ($value['kelas_id'] === $kelas['id_kelas']) ? "selected" : "" ?>><?= $kelas['nama_kelas'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pembayaran_id" class="form-label">Tahun ajaran</label>
                            <select name="pembayaran_id" id="pembayaran_id" class="custom-select" required>
                                <?php foreach ($data['pembayaran'] as $bayar) { ?>
                                    <option value="<?= $bayar['id_pembayaran'] ?>" <?= ($value['pembayaran_id'] === $bayar['id_pembayaran']) ? "selected" : "" ?>><?= $bayar['tahun_ajaran']." [Rp. ".number_format($bayar['nominal'], 0, ",", ".")."]" ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"><?= $value['alamat'] ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    
        <div class="modal fade" id="hapusSiswa<?= $value['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" method="post" action="<?= BURL ?>/petugas/hapus/<?= $data['key'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus siswa</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_pengguna" value="<?= $value['pengguna_id'] ?>">
                        Yakin menghapus data siswa ini?<br>
                        <strong><?= $value['nis']." - ".$value['nama_siswa'] ?></strong><br><br>
                        <small><span class="text-danger">Data transaksi pembayaran</span> yang telah dilakukan oleh siswa ini akan ikut terhapus!</small>
    
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