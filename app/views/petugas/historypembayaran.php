<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pembayaran SPP - History Pembayaran</title>

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
                        <h1 class="h3 mb-0 text-gray-800">History Pembayaran</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

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