<?php require_once(HEAD); ?>
<?php $created = false; ?>
<body id="page-top bg-secondary">

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

                <a class="btn btn-secondary mb-3" href="<?= BURL ?>/petugas/entri">Kembali</a>
                
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Profile -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header text-primary">
                                    <h5 class="m-0">Profile</h5>
                                </div>
                                <div class="card-body d-flex flex-column text-center align-items-center">
                                    <div class="d-flex justify-content-center mb-4 col-12">
                                        <img class="img-profile rounded-circle col-6" src="<?= IMG ?>/undraw_profile.svg">   
                                    </div>
                                    Data Siswa :
                                    <h5><?= $data['siswa']['nama_siswa'] ?></h5><br><br>
                                    <table class="text-left">
                                        <tbody>
                                            <tr>
                                                <td>NISN</td>
                                                <td>:</td>
                                                <td><?= $data['siswa']['nisn'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>NIS</td>
                                                <td>:</td>
                                                <td><?= $data['siswa']['nis'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kelas</td>
                                                <td>:</td>
                                                <td><?= $data['siswa']['nama_kelas'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tahun ajaran</td>
                                                <td>:</td>
                                                <td><?= $data['siswa']['tahun_ajaran'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Transaksi Pembayaran -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header text-primary">
                                    <h5 class="m-0">Transaksi</h5>
                                </div>
                                <div class="card-body d-flex flex-wrap">
                                    <?php foreach ($data['bulan'] as $ib => $bulan) { ?>
                                        <?php foreach ($data['transaksi'] as $transaksi) { ?>
                                            <?php if ($bulan === $transaksi['bulan_dibayar']) { ?>
                                                <div class="col-xl-3 col-lg-4 mb-3">
                                                    <div class="card">
                                                        <div class="card-body d-flex flex-column align-items-center text-center">
                                                            <div class="mb-3"><?= $bulan ?> <br> Rp. <?= number_format($data['siswa']['nominal'], 0, ",", ".") ?></div>
                                                            <button class="btn btn-success" data-toggle="modal" data-target="#bulan<?= $ib ?>">Lunas</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php $created = true; break;} ?>
                                        <?php } ?>
                                        <?php if ($created === false) { ?>
                                            <div class="col-xl-3 col-lg-4 mb-3">
                                                <div class="card">
                                                    <div class="card-body d-flex flex-column align-items-center text-center">
                                                        <div class="mb-3"><?= $bulan ?> <br> Rp. <?= number_format($data['siswa']['nominal'], 0, ",", ".") ?></div>
                                                        <button class="btn btn-danger" data-toggle="modal" data-target="#bulan<?= $ib ?>">Bayar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php $created = false;} ?>
                                </div>
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

    <!-- Alert -->
    <?php foreach ($data['bulan'] as $ib => $bulan) { ?>
        <?php foreach ($data['transaksi'] as $transaksi) { ?>
            <?php if ($bulan === $transaksi['bulan_dibayar']) { ?>
                <div class="modal fade" id="bulan<?= $ib ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Lunas</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Pembayaran bulan ini sudah dibayar pada tanggal : <br>
                                <strong><?= date("Y-m-d h:i:s A", strtotime($transaksi['tanggal_bayar'])) ?></strong> diproses oleh <strong><?= $transaksi['nama_petugas'] ?></strong>.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $created = true; break;} ?>
        <?php } ?>
        <?php if ($created === false) { ?>
        <div class="modal fade" id="bulan<?= $ib ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form class="modal-content" action="<?= BURL ?>/petugas/tambah/transaksi" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bayar?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Yakin melakukan transaksi pembayaran untuk bulan <br>
                            <strong><?= $bulan ?> - <?= ($ib <= 5) ? substr($data['siswa']['tahun_ajaran'], 0, 4) : substr($data['siswa']['tahun_ajaran'], 5, 4) ?></strong>?<br>
                            <input type="hidden" name="bulan_dibayar" value="<?= $bulan ?>">
                            <input type="hidden" name="tahun_dibayar" value="<?= ($ib <= 5) ? substr($data['siswa']['tahun_ajaran'], 0, 4) : substr($data['siswa']['tahun_ajaran'], 5, 4) ?>">
                            <input type="hidden" name="siswa_id" value="<?= $data['siswa']['id_siswa'] ?>">
                            <input type="hidden" name="petugas_id" value="<?= $_SESSION['spp']['id_petugas'] ?>">
                            <input type="hidden" name="pembayaran_id" value="<?= $data['siswa']['pembayaran_id'] ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <button class="btn btn-danger" type="submit">Bayar</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
    <?php $created = false;} ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
<?php require_once(FOOT); ?>