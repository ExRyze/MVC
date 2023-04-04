<!-- Cek role -->
<?php if($_SESSION['spp']['role'] === "siswa") {$path = "siswa";} else {$path = "petugas";} ?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-money-bill-wave"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pembayaran SPP <sup>ukk</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= (str_contains($data['page'], "Home")) ? "active" : "" ?>">
        <a class="nav-link" href="<?= BURL ?>/<?= $path ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Tools
    </div>
    <?php if($_SESSION['spp']['role'] != "siswa") { ?>
    <!-- Nav Item - Charts -->
    <li class="nav-item <?= (str_contains($data['page'], "Entri")) ? "active" : "" ?>">
        <a class="nav-link" href="<?= BURL ?>/<?= $path ?>/entri">
            <i class="fas fa-fw fa-list"></i>
            <span>Entri Pembayaran</span></a>
    </li>
    <?php } ?>
    <!-- Nav Item - Charts -->
    <li class="nav-item <?= (str_contains($data['page'], "History")) ? "active" : "" ?>">
        <a class="nav-link" href="<?= BURL ?>/<?= $path ?>/history">
            <i class="fas fa-fw fa-history"></i>
            <span>History Transaksi</span></a>
    </li>
    <?php if($_SESSION['spp']['role'] === "admin") { ?>
    <!-- Nav Item - Charts -->
    <li class="nav-item <?= (str_contains($data['page'], "Laporan")) ? "active" : "" ?>">
        <a class="nav-link" href="<?= BURL ?>/<?= $path ?>/laporan">
            <i class="fas fa-fw fa-file"></i>
            <span>Generate Laporan</span></a>
    </li>
    <?php } ?>
    <?php if($_SESSION['spp']['role'] != "siswa") { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Tabel
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= (str_contains($data['page'], "Tabel")) ? "active" : "" ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-table"></i>
            <span>Tabel</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tabel:</h6>
                <a class="collapse-item" href="<?= BURL ?>/<?= $path ?>/tabel/kelas">Kelas</a>
                <?php if($_SESSION['spp']['role'] === "admin") { ?>
                <a class="collapse-item" href="<?= BURL ?>/<?= $path ?>/tabel/pembayaran">Pembayaran</a>
                <a class="collapse-item" href="<?= BURL ?>/<?= $path ?>/tabel/siswa">Siswa</a>
                <a class="collapse-item" href="<?= BURL ?>/<?= $path ?>/tabel/petugas">Petugas</a>
                <?php } ?>
            </div>
        </div>
    </li>
    <?php } ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>