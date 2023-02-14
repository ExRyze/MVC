<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASE_URL ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">Pembayaran SPP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= (isset($_SESSION['ExSPP']['user']['level'])) ? BASE_URL.'/petugas' : BASE_URL.'/siswa' ?>">
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <?php if(isset($_SESSION['ExSPP']['user']['level'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>/petugas/entri">
                    <span>Entri Pembayaran</span></a>
            </li>
            <?php } ?>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= (isset($_SESSION['ExSPP']['user']['level'])) ? BASE_URL.'/petugas/historypembayaran' : BASE_URL.'/siswa/historypembayaran' ?>">
                    <span>History Pembayaran</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php if(isset($_SESSION['ExSPP']['user']['level']) && $_SESSION['ExSPP']['user']['level'] === 'admin') { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Table</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= BASE_URL ?>/petugas/tabelsiswa">Siswa</a>
                        <a class="collapse-item" href="<?= BASE_URL ?>/petugas/tabelpetugas">Petugas</a>
                        <a class="collapse-item" href="<?= BASE_URL ?>/petugas/tabelpembayaran">Pembayaran</a>
                        <a class="collapse-item" href="<?= BASE_URL ?>/petugas/tabelkelas">Kelas</a>
                    </div>
                </div>
            </li>
            <?php } ?>

        </ul>