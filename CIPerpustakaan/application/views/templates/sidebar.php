        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Home'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KELOMPOK 2</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading"> Book </div>
            <!-- QUERY MENU -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Buku'); ?>">
                    <i class="fas fa-clipboard-list"></i>
                    <span> List Buku </span></a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Peminjaman'); ?>">
                    <i class="fas fa-box"></i>
                    <span> Peminjaman </span></a>
            </li>
            <hr class="sidebar-divider mt-3">
            <div class="sidebar-heading"> Anggota </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Anggota'); ?>">
                    <i class="fas fa-user-friends"></i>
                    <span> List Anggota</span></a>
            </li>


            <hr class="sidebar-divider mt-3">

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('login/logout'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End  of Sidebar -->