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
                        <h1 class="h3 mb-0 text-gray-800">Tabel Kelas</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>
                    <button class="btn btn-success mb-4" type="button" data-toggle="modal" data-target="#addKelas">Tambah Kelas</button>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="col-12 table table-hover table-bordered text-center" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Kelas</th>
                                            <th>Kompetensi Keahlian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Kelas</th>
                                            <th>Kompetensi Keahlian</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="text-left">
                                        <?php foreach($data['kelas'] as $i => $kelas) { ?>
                                        <tr>
                                            <td><?= $i+1 ?></td>
                                            <td><?= $kelas['nama_kelas'] ?></td>
                                            <td><?= $kelas['kompetensi_keahlian'] ?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editKelas<?= $kelas['id_kelas'] ?>">Edit</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteKelas<?= $kelas['id_kelas'] ?>">Hapus</button>
                                            </td>
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

    <!-- Kelas Modal-->
    <div class="modal fade" id="addKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BASE_URL ?>/petugas/add/kelas">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <h6 class="font-weight-bold text-center">Data Kelas</h6>
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input class="form-control" type="text" name="nama_kelas" required id="nama_kelas">
                    </div>
                    <div class="form-group">
                        <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                        <input class="form-control" type="text" name="kompetensi_keahlian" required id="kompetensi_keahlian">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php foreach($data['kelas'] as $kelas) { ?>
    <div class="modal fade" id="editKelas<?= $kelas['id_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BASE_URL ?>/petugas/edit/kelas">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <h6 class="font-weight-bold text-center">Data Kelas</h6>
                  <input type="hidden" name="id_kelas" value="<?= $kelas['id_kelas'] ?>">
                  <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input class="form-control" type="text" name="nama_kelas" required id="nama_kelas" value="<?= $kelas['nama_kelas'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                        <input class="form-control" type="text" name="kompetensi_keahlian" required id="kompetensi_keahlian" value="<?= $kelas['kompetensi_keahlian'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="deleteKelas<?= $kelas['id_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin hapus data kelas?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="<?= BASE_URL ?>/petugas/delete/kelas" method="post">
                      <input type="hidden" name="id_kelas" value="<?= $kelas['id_kelas'] ?>">
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