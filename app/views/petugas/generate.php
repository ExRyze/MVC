<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pembayaran SPP - Tabel Kelas</title>

    <!-- Custom fonts for this template-->
    <link href="<?= VENDOR ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= CSS ?>/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= VENDOR ?>/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .section-print {
                position: fixed;
                left: 0;
                top: 0;
            }
            .section-print, .section-print * {
                visibility: visible!important;
            }
        }
    </style>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
                        <h1 class="h3 mb-0 text-gray-800">Tabel Kelas</h1>
                        <button class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" type="button" onclick="javascript:window.print()"><i class="fas fa-download fa-sm text-white-50"></i> Generate Laporan</button>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered text-center section-print" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Siswa</th>
                                            <th>Kelas</th>
                                            <th>Tahun ajaran</th>
                                            <?php foreach($data['bulan'] as $bulan) { ?>
                                            <th><?= $bulan ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Siswa</th>
                                            <th>Kelas</th>
                                            <th>Tahun ajaran</th>
                                            <?php foreach($data['bulan'] as $bulan) { ?>
                                            <th><?= $bulan ?></th>
                                            <?php } ?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($data['siswa'] as $siswa) { ?>
                                        <tr>
                                            <td><?= $siswa['nama'] ?></td>
                                            <td><?= $siswa['nama_kelas'] ?></td>
                                            <td><?= $siswa['tahun'] ?></td>
                                            <?php foreach ($data['bulan'] as $bulan) {
                                                foreach ($siswa['bulan'] as $sbulan) {
                                                    if ($bulan === $sbulan) { ?>
                                                    <td><p class="d-none">lunas</p><i class="fas fa-check fa-sm text-success"></i></td>
                                            <?php $data['created'] = true; } } if(!$data['created']) { ?>
                                                <td><p class="d-none">nunggak</p><i class="fas fa-times fa-sm text-danger"></i></td>
                                            <?php } $data['created'] = false; } ?>
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