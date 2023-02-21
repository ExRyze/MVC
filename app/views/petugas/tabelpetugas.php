<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pembayaran SPP - Tabel Petugas</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Tabel Petugas</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>
                    <button class="btn btn-success mb-3" type="button" data-toggle="modal" data-target="#addPetugas">Tambah Petugas</button>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="col-12 table table-hover table-bordered text-center" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Nama_petugas</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Nama_petugas</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody class="text-left">
                                    <?php foreach($data['petugas'] as $i => $petugas) { ?>
                                    <tr>
                                        <td><?= $i+1 ?></td>
                                        <td><?= $petugas['username'] ?></td>
                                        <td><?= $petugas['password'] ?></td>
                                        <td><?= $petugas['nama_petugas'] ?></td>
                                        <td><?= $petugas['level'] ?></td>
                                        <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editPetugas<?= $petugas['id_petugas'] ?>">Edit</button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletePetugas<?= $petugas['id_petugas'] ?>">Hapus</button>
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

    <!-- Petugas Modal-->
    <div class="modal fade" id="addPetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BASE_URL ?>/petugas/add/petugas">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <h6 class="font-weight-bold text-center">Data Petugas</h6>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" required id="username">
                    </div>
                    <div class="form-group">
                        <label for="nama_petugas">Nama petugas</label>
                        <input class="form-control" type="text" name="nama_petugas" required id="nama_petugas">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" required id="password">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="custom-select" name="level" required id="level">
                            <option value="" selected hidden disabled>Pilih Level...</option>
                            <option value="admin">admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php foreach($data['petugas'] as $petugas) { ?>
      <div class="modal fade" id="editPetugas<?= $petugas['id_petugas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BASE_URL ?>/petugas/edit/petugas">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <h6 class="font-weight-bold text-center">Data Petugas</h6>
                  <input type="hidden" name="id_petugas" value="<?= $petugas['id_petugas'] ?>">
                  <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" required id="username" value="<?= $petugas['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama_petugas">Nama petugas</label>
                        <input class="form-control" type="text" name="nama_petugas" required id="nama_petugas" value="<?= $petugas['nama_petugas'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" required id="password" value="<?= $petugas['password'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="custom-select" name="level" required id="level">
                            <option value="admin" <?= ($petugas['level'] === 'admin') ? 'selected' : '' ?>>admin</option>
                            <option value="petugas" <?= ($petugas['level'] === 'petugas') ? 'selected' : '' ?>>Petugas</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="deletePetugas<?= $petugas['id_petugas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Petugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin hapus data petugas?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="<?= BASE_URL ?>/petugas/delete/petugas" method="post">
                      <input type="hidden" name="id_petugas" value="<?= $petugas['id_petugas'] ?>">
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