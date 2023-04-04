<?php require_once(HEAD); ?>
<?php $created = false ?>
<body id="page-top">

    <style>
        @media print {
            @page {size: landscape}

            body * {
                visibility: hidden!important;
            }

            .print table * {
                visibility: visible!important;
            }

            .print {
                position: fixed;
                top: 0;
                left: 0;
                zoom: 75%!important;
            }

            .print h2 {
                visibility: visible!important;
                display: block!important;
            }
        }
    </style>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once(SBAR); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once(TBAR); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php Flasher::getPesan(); ?>

                <button class="btn btn-success mb-3" onclick="javascript:window.print()">Generate laporan</button>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Kelas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive print">
                                <h2 class="d-none mb-5 text-center">Laporan Pembayaran SPP</h2>
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
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
                                        <?php foreach ($data['tabel'] as $value) { ?>
                                            <tr>
                                                <td>
                                                    <strong><?= $value['nama_siswa'] ?></strong><br>
                                                    <?= $value['nisn']." - ".$value['nis'] ?><br>
                                                    <?= $value['nama_kelas']." - ".$value['tahun_ajaran'] ?>
                                                </td>
                                                <?php foreach ($data['bulan'] as $ib => $bulan) { ?>
                                                    <?php foreach ($value['bulan'] as $ivb => $vbulan) { ?>
                                                        <?php if ($bulan === $vbulan) { ?>
                                                            <td class="text-success text-center" style="vertical-align: middle;"><i class="fas fa-fw fa-check"></i><br><span class="d-none">Lunas</span></td>
                                                        <?php $created = true; break;} ?>
                                                    <?php } ?>
                                                    <?php if ($created === false) { ?>
                                                        <td class="text-danger text-center" style="vertical-align: middle;"><i class="fas fa-fw fa-times"></i><br><span class="d-none">Nunggak</span></td>
                                                    <?php } ?>
                                                <?php $created = false;} ?>
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
            <?php require_once(COPY); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
<?php require_once(FOOT); ?>