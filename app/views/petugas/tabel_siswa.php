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
                                            <th>Username</th>
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
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Telepon</th>
                                            <th>Kelas</th>
                                            <th>Tahun ajaran</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <td>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-bottom shadow animated--fade-in"
                                                    aria-labelledby="dropdownMenuLink">
                                                    <div class="dropdown-header">Action:</div>
                                                    <a class="dropdown-item text-warning" data-toggle="modal" data-target="#editSiswa">Edit</a>
                                                    <a class="dropdown-item text-danger" data-toggle="modal" data-target="#hapusSiswa">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
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
                    <div class="form-group">
                        <label class="form-label" for="nisn">NISN</label>
                        <input type="text" class="form-control" name="nisn" id="nisn" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="nis">NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis" required>
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
                        <!-- <select name="kelasId" id="kelasId" required class="custom-select">
                            <option value="" selected hidden disabled></option>
                            <?php foreach ($data['kelas'] as  $kelas) { ?>
                                <option value="<?= $kelas ?>"><?= $kelas ?></option>
                            <?php } ?>
                        </select> -->
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pembayaranId">Tahun ajaran</label>
                        <!-- <select name="pembayaranId" id="pembayaranId" required class="custom-select">
                            <option value="" selected hidden disabled></option>
                            <?php foreach ($data['kelas'] as  $kelas) { ?>
                                <option value="<?= $kelas ?>"><?= $kelas ?></option>
                            <?php } ?>
                        </select> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Siswa Modal-->
    <div class="modal fade" id="editSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <div class="form-group">
                        <label class="form-label" for="nisn">NISN</label>
                        <input type="text" class="form-control" name="nisn" id="nisn" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="nis">NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis" required>
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
                        <!-- <select name="kelasId" id="kelasId" required class="custom-select">
                            <option value="" selected hidden disabled></option>
                            <?php foreach ($data['kelas'] as  $kelas) { ?>
                                <option value="<?= $kelas ?>"><?= $kelas ?></option>
                            <?php } ?>
                        </select> -->
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pembayaranId">Tahun ajaran</label>
                        <!-- <select name="pembayaranId" id="pembayaranId" required class="custom-select">
                            <option value="" selected hidden disabled></option>
                            <?php foreach ($data['kelas'] as  $kelas) { ?>
                                <option value="<?= $kelas ?>"><?= $kelas ?></option>
                            <?php } ?>
                        </select> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Hapus Siswa Modal-->
    <div class="modal fade" id="hapusSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <input type="hidden" name="idSiswa">
                    Yakin hapus siswa ini?<br>
                    <strong></strong><br>
                    <br><small>Data <span class="text-danger font-weight-bold">transaksi pembayaran siswa ini</span> juga akan ikut terhapus.</small>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    <?php require_once FOOT ?>