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
                    <table class="col-12 table table-hover table-bordered text-center">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Petugas</th>
                          <th>Siswa</th>
                          <th>Tanggal Bayar</th>
                          <th>SPP</th>
                          <th>Jumlah Pembayaran</th>
                        </tr>
                      </thead>
                      <tbody class="text-left">
                        <?php foreach($data['pembayaran'] as $i => $pembayaran) { ?>
                          <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= $pembayaran['username'] ?></td>
                            <td><?= $pembayaran['nama'] ?></td>
                            <td><?= date("d F Y", strtotime($pembayaran['tgl_bayar'])) ?></td>
                            <td>
                              <strong>Tahun :</strong> <?= $pembayaran['tahun'] ?> <br>
                              <strong>Nominal :</strong> Rp. <?= number_format($pembayaran['nominal'], 2, ',', '.') ?>
                            </td>
                            <td><?= number_format($pembayaran['jumlah_bayar'], 2, ',', '.') ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                        <th>No.</th>
                          <th>Petugas</th>
                          <th>Siswa</th>
                          <th>Tanggal Bayar</th>
                          <th>SPP</th>
                          <th>Jumlah Pembayaran</th>
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

    <!-- Bootstrap core JavaScript-->
    <script src="<?= VENDOR ?>/jquery/jquery.min.js"></script>
    <script src="<?= VENDOR ?>/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= VENDOR ?>/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= JS ?>/sb-admin-2.min.js"></script>

</body>

</html>