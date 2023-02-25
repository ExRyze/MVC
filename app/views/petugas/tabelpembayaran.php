<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pembayaran SPP - Tabel Pembayaran</title>

    <!-- Custom fonts for this template-->
    <link href="<?= VENDOR ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= CSS ?>/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= VENDOR ?>/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Tabel Pembayaran</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>
                    <a class="btn btn-success mb-3" href="<?= BASE_URL ?>/petugas/entri">Tambah Pembayaran</a>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Petugas</th>
                                        <th>Siswa</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Bulan / Tahun</th>
                                        <th>SPP</th>
                                        <th>Jumlah Pembayaran</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Action</th>
                                        <th>Petugas</th>
                                        <th>Siswa</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Bulan / Tahun</th>
                                        <th>SPP</th>
                                        <th>Jumlah Pembayaran</th>
                                    </tr>
                                </tfoot>
                                <tbody class="text-left">
                                    <?php foreach($data['pembayaran'] as $pembayaran) { ?>
                                    <tr>
                                        <td>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                <button type="button" class="dropdown-item text-warning" data-toggle="modal" data-target="#editPembayaran<?= $pembayaran['id_pembayaran'] ?>">Edit</button>
                                                <button type="button" class="dropdown-item text-danger" data-toggle="modal" data-target="#deletePembayaran<?= $pembayaran['id_pembayaran'] ?>">Hapus</button>
                                            </div>
                                        </div>
                                        </td>
                                        <td><?= $pembayaran['username'] ?></td>
                                        <td><?= $pembayaran['nama'] ?></td>
                                        <td><?= date("d F Y", strtotime($pembayaran['tgl_bayar'])) ?></td>
                                        <td><?= $pembayaran['bulan_dibayar']." / ".$pembayaran['tahun_dibayar'] ?></td>
                                        <td>
                                        <strong>Tahun :</strong> <?= $pembayaran['tahun'] ?> <br>
                                        <strong>Nominal :</strong> Rp. <?= number_format($pembayaran['nominal'], 0, ',', '.') ?>
                                        </td>
                                        <td><?= number_format($pembayaran['jumlah_bayar'], 0, ',', '.') ?></td>
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

    <!-- Pembayaran Modal-->
    <?php foreach($data['pembayaran'] as $pembayaran) { ?>
      <div class="modal fade" id="editPembayaran<?= $pembayaran['id_pembayaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BASE_URL ?>/petugas/edit/pembayaran">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pembayaran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="font-weight-bold text-center">Data Pembayaran</h6>
                    <input type="hidden" name="id_pembayaran" value="<?= $pembayaran['id_pembayaran'] ?>">
                    <input type="hidden" name="id_spp" value="<?= $pembayaran['id_spp'] ?>">
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" name="nisn" id="nisn" class="form-control" value="<?= $pembayaran['nisn'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" name="nis" id="nis" class="form-control" value="<?= $pembayaran['nis'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $pembayaran['nama'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_bayar">Jumlah Bayar</label>
                        <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" value="<?= $pembayaran['nominal'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="deletePembayaran<?= $pembayaran['id_pembayaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pembayaran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin hapus data pembayaran?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <form action="<?= BASE_URL ?>/petugas/delete/pembayaran" method="post">
                      <input type="hidden" name="id_pembayaran" value="<?= $pembayaran['id_pembayaran'] ?>">
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

    <!-- Page level plugins -->
    <script src="<?= VENDOR ?>/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= VENDOR ?>/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= JS ?>/demo/datatables-demo.js"></script>

</body>

</html>