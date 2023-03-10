<?php require_once HEAD ?>
<body id="page-top">

    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #headerTabel {
                display: block !important;
            }

            #dataTable *, #headerTabel {
                visibility: visible !important;
            }
        }
    </style>

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

                    <button onclick="javascript:window.print()" class="btn btn-success mb-3">Generate laporan</button>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">History transaksi pembayaran</h6>
                        </div>
                        <div class="card-body">
                            <h1 class="text-center d-none mb-3" id="headerTabel">Laporan Pembayaran SPP</h1>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Data siswa</th>
                                            <?php foreach ($data['bulan'] as $bulan) { ?>
                                                <th><?= $bulan ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Data siswa</th>
                                            <?php foreach ($data['bulan'] as $bulan) { ?>
                                                <th><?= $bulan ?></th>
                                            <?php } ?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($data['siswa'] as  $value) { ?>
                                            <tr>
                                                <td>
                                                    <?= $value['nama_siswa'] ?><br>
                                                    <?= $value['nisn']." / ".$value['nis'] ?><br>
                                                    <?= $value['nama_kelas']." - ".$value['tahun_ajaran'] ?>
                                                </td>
                                                <?php foreach ($data['bulan'] as $bulan) { ?>
                                                    <?php foreach ($value['bulan'] as $vbulan) { ?>
                                                        <?php if ($bulan === $vbulan) { ?>
                                                            <td class="text-success text-center"><span class="d-none">lunas</span><i class="fas fa-fw fa-check"></i></td>
                                                        <?php $data['created'] = true; break;} ?>
                                                    <?php } ?>
                                                    <?php if (!$data['created']) { ?>
                                                        <td class="text-danger text-center"><span class="d-none">nunggak</span><i class="fas fa-fw fa-times"></i></td>
                                                    <?php } ?>
                                                <?php $data['created'] = false;} ?>
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