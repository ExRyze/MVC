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

                    <?php Flasher::getMessage(); ?>

                    <button class="btn btn-success mb-4" data-toggle="modal" data-target="#tambahKelas">Tambah kelas</button>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Kelas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Nama kelas</th>
                                            <th>Kopetensi keahlian</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>Nama kelas</th>
                                            <th>Kopetensi keahlian</th>
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
                                                            <a class="dropdown-item text-warning" data-toggle="modal" data-target="#editKelas<?= $value['id_kelas'] ?>">Edit</a>
                                                            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#hapusKelas<?= $value['id_kelas'] ?>">Hapus</a>
                                                        </div>
                                                    </div>
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

    
    <!-- Tambah Kelas Modal-->
    <div class="modal fade" id="tambahKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BURL ?>/petugas/store/<?= $data['key'] ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="namaKelas">Nama kelas</label>
                        <input type="text" class="form-control" name="namaKelas" id="namaKelas" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="kompetensiKeahlian">Kompetensi keahlian</label>
                        <select name="kompetensiKeahlian" id="kompetensiKeahlian" required class="custom-select">
                            <option value="" selected hidden disabled></option>
                            <?php foreach ($data['kelas'] as  $kelas) { ?>
                                <option value="<?= $kelas ?>"><?= $kelas ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit & Hapus Kelas Modal-->
    <?php foreach ($data['tabel'] as $value) { ?>
        <div class="modal fade" id="editKelas<?= $value['id_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" method="post" action="<?= BURL ?>/petugas/edit/<?= $data['key'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit kelas</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idKelas" value="<?= $value['id_kelas'] ?>">
                        <div class="form-group">
                            <label class="form-label" for="namaKelas">Nama kelas</label>
                            <input type="text" class="form-control" name="namaKelas" id="namaKelas" required value="<?= $value['nama_kelas'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="kompetensiKeahlian">Kompetensi keahlian</label>
                            <select name="kompetensiKeahlian" id="kompetensiKeahlian" required class="custom-select">
                                <?php foreach ($data['kelas'] as  $kelas) { ?>
                                    <option value="<?= $kelas ?>" <?= ($value['kompetensi_keahlian'] === $kelas) ? "selected" : "" ?>><?= $kelas ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="hapusKelas<?= $value['id_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" method="post" action="<?= BURL ?>/petugas/remove/<?= $data['key'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit kelas</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idKelas" value="<?= $value['id_kelas'] ?>">
                        Yakin hapus kelas ini?<br>
                        <strong><?= $value['nama_kelas']." - ".$value['kompetensi_keahlian'] ?></strong><br>
                        <br><small>Data <span class="text-danger font-weight-bold">siswa dalam kelas ini</span> dan data <span class="text-danger font-weight-bold">transaksi pembayaran siswanya</span> juga akan ikut terhapus.</small>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
    <?php require_once FOOT ?>