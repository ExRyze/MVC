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

                    <button class="btn btn-success mb-4" data-toggle="modal" data-target="#tambahSiswa">Tambah siswa</button>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Siswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>NISN</th>
                                            <th>NIS</th>
                                            <th>Nama siswa</th>
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
                                            <th>Nama siswa</th>
                                            <th>Password</th>
                                            <th>Telepon</th>
                                            <th>Kelas</th>
                                            <th>Tahun ajaran</th>
                                            <th>Alamat</th>
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
                                                            <a class="dropdown-item text-warning" data-toggle="modal" data-target="#editSiswa<?= $value['id_siswa'] ?>">Edit</a>
                                                            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#hapusSiswa<?= $value['id_siswa'] ?>">Hapus</a>
                                                        </div>
                                                    </div>
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

    
    <!-- Tambah Siswa Modal-->
    <div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BURL ?>/petugas/store/<?= $data['key'] ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah siswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="role" value="siswa">
                    <div class="form-group">
                        <label class="form-label" for="nisn">NISN</label>
                        <input type="text" class="form-control" name="nisn" id="nisn" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="username">NIS</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="namaSiswa">Nama siswa</label>
                        <input type="text" class="form-control" name="namaSiswa" id="namaSiswa" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="telepon">Telepon</label>
                        <input type="text" class="form-control" name="telepon" id="telepon" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="kelasId">Kelas</label>
                        <select name="kelasId" id="kelasId" required class="custom-select">
                            <option value="" selected hidden disabled></option>
                            <?php foreach ($data['kelas'] as  $kelas) { ?>
                                <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pembayaranId">Tahun ajaran</label>
                        <select name="pembayaranId" id="pembayaranId" required class="custom-select">
                            <option value="" selected hidden disabled></option>
                            <?php foreach ($data['pembayaran'] as  $pembayaran) { ?>
                                <option value="<?= $pembayaran['id_pembayaran'] ?>"><?= $pembayaran['tahun_ajaran']." [Rp. ".number_format($pembayaran['nominal'], 0, ",", ".")."]" ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit & Hapus Siswa Modal-->
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
                        <input type="hidden" name="idSiswa" value="<?= $value['id_siswa'] ?>">
                        <div class="form-group">
                            <label class="form-label" for="nisn">NISN</label>
                            <input type="text" class="form-control" name="nisn" id="nisn" required value="<?= $value['nisn'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="username">NIS</label>
                            <input type="text" class="form-control" name="username" id="username" required value="<?= $value['nis'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="namaSiswa">Nama siswa</label>
                            <input type="text" class="form-control" name="namaSiswa" id="namaSiswa" required value="<?= $value['nama_siswa'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required value="<?= $value['password'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="telepon">Telepon</label>
                            <input type="text" class="form-control" name="telepon" id="telepon" required value="<?= $value['telepon'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="kelasId">Kelas</label>
                            <select name="kelasId" id="kelasId" required class="custom-select">
                                <?php foreach ($data['kelas'] as  $kelas) { ?>
                                    <option value="<?= $kelas['id_kelas'] ?>" <?= ($kelas['id_kelas'] === $value['kelas_id']) ? "selected" : "" ?>><?= $kelas['nama_kelas'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="pembayaranId">Tahun ajaran</label>
                            <select name="pembayaranId" id="pembayaranId" required class="custom-select">
                                <?php foreach ($data['pembayaran'] as  $pembayaran) { ?>
                                    <option value="<?= $pembayaran['id_pembayaran'] ?>" <?= ($pembayaran['id_pembayaran'] === $value['pembayaran_id']) ? "selected" : "" ?>><?= $pembayaran['tahun_ajaran']." [Rp. ".number_format($pembayaran['nominal'], 0, ",", ".")."]" ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"><?= $value['alamat'] ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="hapusSiswa<?= $value['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" method="post" action="<?= BURL ?>/petugas/remove/<?= $data['key'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus siswa</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="penggunaId" value="<?= $value['pengguna_id'] ?>">
                        Yakin hapus siswa ini?<br>
                        <strong><?= $value['nis']." - ".$value['nama_siswa'] ?></strong><br>
                        <br><small>Data <span class="text-danger font-weight-bold">transaksi pembayaran siswa ini</span> juga akan ikut terhapus.</small>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
    <?php require_once FOOT ?>