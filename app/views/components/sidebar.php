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
  <li class="nav-item active">
      <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Tools
  </div>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
      <a class="nav-link" href="<?= BURL ?>">
          <i class="fas fa-fw fa-list"></i>
          <span>Entri transaksi</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
      <a class="nav-link" href="<?= BURL ?>">
          <i class="fas fa-fw fa-history"></i>
          <span>History transaksi</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
      <a class="nav-link" href="<?= BURL ?>">
          <i class="fas fa-fw fa-file"></i>
          <span>Generate laporan</span></a>
  </li>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabel</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Tabel:</h6>
              <a class="collapse-item" href="<?= BURL ?>/petugas/tabel/kelas">Kelas</a>
              <a class="collapse-item" href="<?= BURL ?>/petugas/tabel/pembayaran">Pembayaran</a>
              <a class="collapse-item" href="<?= BURL ?>/petugas/tabel/siswa">Siswa</a>
              <a class="collapse-item" href="<?= BURL ?>/petugas/tabel/petugas">Petugas</a>
          </div>
      </div>
  </li>

</ul>