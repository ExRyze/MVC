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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">History transaksi pembayaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>NISN</th>
                                            <th>Nama siswa</th>
                                            <th>Kelas</th>
                                            <th>Tahun_ajaran</th>
                                            <th>Tanggal pembayaran</th>
                                            <th>Bulan - tahun dibayar</th>
                                            <th>Nama petugas</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>NISN</th>
                                            <th>Nama siswa</th>
                                            <th>Kelas</th>
                                            <th>Tahun_ajaran</th>
                                            <th>Tanggal pembayaran</th>
                                            <th>Bulan - tahun dibayar</th>
                                            <th>Nama petugas</th>
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
                                                    <a class="dropdown-item text-danger" data-toggle="modal" data-target="#hapusKelas">Hapus</a>
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

    <!-- Hapus Transaksi Modal-->
    <div class="modal fade" id="hapusKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="post" action="<?= BURL ?>/petugas/edit/<?= $data['key'] ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit transaksi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idKelas">
                    Yakin hapus transaksi ini?<br>
                    <strong></strong>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    <?php require_once FOOT ?>