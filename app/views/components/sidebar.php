<?php if(str_contains($data['page'], "Siswa -")) {$role = "siswa";} else {$role = "petugas";} ?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-dollar-sign"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Pembayaran SPP</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= (str_contains($data['page'], "Home")) ? "active" : "" ?>">
      <a class="nav-link" href="<?= BURL ?>/<?= $role ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Tools
  </div>
  <?php if($_SESSION['sppsch2']['role'] != "siswa") { ?>
  <!-- Nav Item - Charts -->
  <li class="nav-item <?= (str_contains($data['page'], "Entri")) ? "active" : "" ?>">
      <a class="nav-link" href="<?= BURL ?>/<?= $role ?>/entri">
          <i class="fas fa-fw fa-list"></i>
          <span>Entri transaksi</span></a>
  </li>
  <?php } ?>
  <!-- Nav Item - Tables -->
  <li class="nav-item <?= (str_contains($data['page'], "History")) ? "active" : "" ?>">
      <a class="nav-link" href="<?= BURL ?>/<?= $role ?>/history">
          <i class="fas fa-fw fa-history"></i>
          <span>History transaksi</span></a>
  </li>
  <?php if($_SESSION['sppsch2']['role'] === "admin") { ?>
  <!-- Nav Item - Tables -->
  <li class="nav-item <?= (str_contains($data['page'], "Generate")) ? "active" : "" ?>">
      <a class="nav-link" href="<?= BURL ?>/<?= $role ?>/generate">
          <i class="fas fa-fw fa-file"></i>
          <span>Generate laporan</span></a>
  </li>
  <?php } ?>
  <?php if($_SESSION['sppsch2']['role'] != "siswa") { ?>
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item <?= (str_contains($data['page'], "Tabel")) ? "active" : "" ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabel</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Tabel:</h6>
              <a class="collapse-item" href="<?= BURL ?>/<?= $role ?>/tabel/kelas">Kelas</a>
              <?php if($_SESSION['sppsch2']['role'] === "admin") { ?>
              <a class="collapse-item" href="<?= BURL ?>/<?= $role ?>/tabel/pembayaran">Pembayaran</a>
              <a class="collapse-item" href="<?= BURL ?>/<?= $role ?>/tabel/siswa">Siswa</a>
              <a class="collapse-item" href="<?= BURL ?>/<?= $role ?>/tabel/petugas">Petugas</a>
              <a class="collapse-item" href="<?= BURL ?>/<?= $role ?>/tabel/transaksi">Transaksi</a>
              <?php } ?>
          </div>
      </div>
  </li>
  <?php } ?>

</ul>