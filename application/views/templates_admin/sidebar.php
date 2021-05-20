<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3" style="font-size: 16px;">PERPUSTAKAAN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('beranda'); ?>" style="font-size: 20px;">Beranda</a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="font-size: 15px; color: white">
                <?= $this->session->userdata('nama'); ?>
            </div>


            <!-- Nav Item - Indonesia Bagian Tengah -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('Buku'); ?>" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-book-reader"></i>
                    <span>Daftar Buku</span>
                </a>

            </li>

            <!-- Nav Item - Indonesia Bagian Barat -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('admin'); ?>" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user"></i>
                    <span>Daftar Member</span>
                </a>
            </li>

            <!-- Nav Item - Indonesia Bagian Timur -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('transaksi'); ?>" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-paper-plane"></i>
                    <span>Daftar Transaksi</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <h3 style="color: blue; margin-top: 10px;"><strong>Perpustakaan</strong></h3>
                    </form>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?= base_url('auth/logout'); ?>" class="btn btn-primary">Logout</a></li>
                    </ul>

                </nav>
                <!-- End of Topbar -->