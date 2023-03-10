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
                                            <th>Kelas</th>
                                            <th>Tahun ajaran</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>NISN</th>
                                            <th>NIS</th>
                                            <th>Nama siswa</th>
                                            <th>Kelas</th>
                                            <th>Tahun ajaran</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($data['tabel'] as  $value) { ?>
                                            <tr>
                                                <td>
                                                    <a class="btn btn-primary" href="<?= BURL ?>/petugas/entri/<?= $value['nis'] ?>">Transaksi</a>
                                                </td>
                                                <td><?= $value['nisn'] ?></td>
                                                <td><?= $value['nis'] ?></td>
                                                <td><?= $value['nama_siswa'] ?></td>
                                                <td><?= $value['nama_kelas'] ?></td>
                                                <td><?= $value['tahun_ajaran']." [Rp. ".number_format($value['nominal'], 0, ",", ".")."]" ?></td>
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
    <?php require_once FOOT ?>