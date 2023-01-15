<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pembayaran SPP - Tabel Siswa</title>

    <!-- Custom fonts for this template-->
    <link href="<?= VENDOR ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= CSS ?>/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once SIDEBAR; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once TOPBAR; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php Flasher::flasher() ?>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tabel Siswa</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addSiswa">Tambah Siswa</button>
                    <table class="col-12 table table-hover table-bordered text-center">
                      <thead>
                        <tr>
                          <th>NISN</th>
                          <th>NIS</th>
                          <th>Nama</th>
                          <th>Kelas</th>
                          <th>Alamat</th>
                          <th>No Telepon</th>
                          <th>SPP</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="text-left">
                        <?php foreach($data['siswa'] as $siswa) { ?>
                          <tr>
                            <td><?= $siswa['nisn'] ?></td>
                            <td><?= $siswa['nis'] ?></td>
                            <td><?= $siswa['nama'] ?></td>
                            <td><?= $siswa['nama_kelas'] ?></td>
                            <td><?= $siswa['alamat'] ?></td>
                            <td><?= $siswa['no_telp'] ?></td>
                            <td>
                              <strong>Tahun :</strong> <?= $siswa['tahun'] ?> <br>
                              <strong>Nominal :</strong> Rp. <?= number_format($siswa['nominal'], 2, ',', '.') ?>
                            </td>
                            <td>
                              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editSiswa<?= $siswa['nisn'] ?>">Edit</button>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteSiswa<?= $siswa['nisn'] ?>">Hapus</button>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>NISN</th>
                          <th>NIS</th>
                          <th>Nama</th>
                          <th>Kelas</th>
                          <th>Alamat</th>
                          <th>No Telepon</th>
                          <th>SPP</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ExRyze 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Siswa Modal-->
    <div class="modal fade" id="addSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BASE_URL ?>/petugas/add/siswa">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <h6 class="font-weight-bold text-center">Data Siswa</h6>
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input class="form-control" type="text" name="nisn" required id="nisn">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input class="form-control" type="text" name="nis" required id="nis">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" type="text" name="nama" required id="nama">
                    </div>
                    <div class="form-group">
                        <label for="id_kelas">Kelas</label>
                        <select class="custom-select" name="id_kelas" required id="id_kelas">
                            <option value="" selected hidden disabled>Pilih Kelas...</option>
                            <?php foreach($data['kelas'] as $kelas) { ?>
                              <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No telepon</label>
                        <input class="form-control" type="text" name="no_telp" required id="no_telp">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" required id="alamat" rows="2"></textarea>
                    </div>
                    <div class="border border-3 border-dark mb-3"></div>
                    <h6 class="font-weight-bold text-center">Data SPP</h6>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input class="form-control" type="text" name="tahun" required id="tahun">
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input class="form-control" type="number" name="nominal" required id="nominal">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php foreach($data['siswa'] as $siswa) { ?>
      <div class="modal fade" id="editSiswa<?= $siswa['nisn'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BASE_URL ?>/petugas/edit/siswa">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <h6 class="font-weight-bold text-center">Data Siswa</h6>
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input class="form-control" type="text" name="nisn" readonly value="<?= $siswa['nisn'] ?>" id="nisn">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input class="form-control" type="text" name="nis" readonly value="<?= $siswa['nis'] ?>" id="nis">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" type="text" name="nama" required value="<?= $siswa['nama'] ?>" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="id_kelas">Kelas</label>
                        <select class="custom-select" name="id_kelas" required id="id_kelas">
                            <option value="" selected hidden disabled>Pilih Kelas...</option>
                            <?php foreach($data['kelas'] as $kelas) { ?>
                              <option value="<?= $kelas['id_kelas'] ?>" <?= ($siswa['id_kelas'] === $kelas['id_kelas']) ? 'selected' : '' ?>><?= $kelas['nama_kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No telepon</label>
                        <input class="form-control" type="text" name="no_telp" required value="<?= $siswa['no_telp'] ?>" id="no_telp">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" required id="alamat" rows="2"><?= $siswa['alamat'] ?></textarea>
                    </div>
                    <div class="border border-3 border-dark mb-3"></div>
                    <h6 class="font-weight-bold text-center">Data SPP</h6>
                    <input type="hidden" name="id_spp" value="<?= $siswa['id_spp'] ?>">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input class="form-control" type="text" name="tahun" required value="<?= $siswa['tahun'] ?>" id="tahun">
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input class="form-control" type="number" name="nominal" required value="<?= $siswa['nominal'] ?>" id="nominal">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="deleteSiswa<?= $siswa['nisn'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Siswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin hapus data siswa?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="<?= BASE_URL ?>/petugas/delete/siswa" method="post">
                      <input type="hidden" name="nisn" value="<?= $siswa['nisn'] ?>">
                      <input type="hidden" name="nis" value="<?= $siswa['nis'] ?>">
                      <input type="hidden" name="id_spp" value="<?= $siswa['id_spp'] ?>">
                      <button type="submit" class="btn btn-primary" >Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= VENDOR ?>/jquery/jquery.min.js"></script>
    <script src="<?= VENDOR ?>/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= VENDOR ?>/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= JS ?>/sb-admin-2.min.js"></script>

</body>

</html>