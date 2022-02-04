 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
 
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('main') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-battle-net"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIAMP <sup>2.0 </sup></div>
            </a>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('main') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
               Permintaan 
            </div>
            <!-- Nav Item - Permintaan -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'req' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('admin/req') ?>">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Formulir</span></a>
            </li>

              <li class="nav-item <?php echo $this->uri->segment(3) == 'it' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('admin/daftar/it') ?>">
                    <i class="fas fa-fw fa-list-ul"></i>
                    <span>Daftar Permintaan IT</span></a>
            </li>
             <li class="nav-item <?php echo $this->uri->segment(3) == 'humas' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('admin/daftar/humas') ?>">
                    <i class="fas fa-fw fa-list-ul"></i>
                    <span>Daftar Permintaan HUMAS</span></a>
            </li>



        <?php if(in_array($aks, array('1','8'))){ ?>

            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
              Monitoring
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'monitor' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('admin/monitor') ?>">
                    <i class="far fa-fw fa-clipboard"></i>
                    <span>Monitoring IT</span></a>
            </li>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'daring' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('admin/daring') ?>">
                    <i class="fas fa-fw fa-video"></i>
                    <span>Kegiatan Daring</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
             <!--  <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Formulir</span></a>
            </li> -->

                <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               Laporan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLap"
                    aria-expanded="true" aria-controls="collapseLap">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseLap" class="collapse" aria-labelledby="headingLap"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List Laporan:</h6>
                        <a class="collapse-item" href="<?php echo site_url('admin/laporan') ?>" > Laporan Bulanan IT</a>
                        <a class="collapse-item" href="<?php echo site_url('admin/laporan/lap_humas') ?>" > Laporan Bulanan Humas</a>
                      <!--   <a class="collapse-item" href="utilities-border.html">Laporan 2</a>
                        <a class="collapse-item" href="utilities-animation.html">Laporan 3</a>
                        <a class="collapse-item" href="utilities-other.html">Laporan 4</a> -->
                    </div>
                </div>
            </li>
           
             <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
               Utility
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item <?php echo $this->uri->segment(2) == 'ruang' ? 'active': '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtil"
                    aria-expanded="true" aria-controls="collapseUtil">
                    <i class="fas fa-fw fa-cubes"></i>
                    <span>Utility</span>
                </a>
                <div id="collapseUtil" class="collapse" aria-labelledby="headingUtil" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola</h6>
                        <a class="collapse-item" href="<?php echo site_url('admin/jp') ?>">Daftar Jenis Perbaikan</a>
                        <a class="collapse-item" href="<?php echo site_url('admin/ruang') ?>" >Daftar Ruangan</a>
                        <a class="collapse-item" href="<?php echo site_url('admin/unit_p') ?>" >Daftar Unit Pelaksana</a>
                         <a class="collapse-item" href="<?php echo site_url('admin/Petugas') ?>" >Daftar Petugas</a>
                         <?php if($aks=='8') {?>
                         <a class="collapse-item" href="<?php echo site_url('admin/user') ?>" >Daftar User</a>
                     <?php } ?>
                    </div>
                </div>
            </li>

             <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->


        <?php } ?>

            <div class="sidebar-heading">
               Lintas Aplikasi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item <?php echo $this->uri->segment(2) == 'sim' ? 'active': '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtil2"
                    aria-expanded="true" aria-controls="collapseUtil">
                    <i class="fas fa-fw fa-cubes"></i>
                    <span>SIM-RS</span>
                </a>
                <div id="collapseUtil2" class="collapse" aria-labelledby="headingUtil" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola</h6>
                        <a class="collapse-item" href="<?php echo site_url('admin/sim/pengunjung') ?>">Rekap Pengunjung</a>
                        <a class="collapse-item" href="<?php echo site_url('admin/sim/pengunjung2') ?>">Rekap Pengunjung <b>NEW</b></a>
                        <a class="collapse-item" href="<?php echo site_url('admin/sim/covid_19') ?>">Data PX COVID-19</a>
                        <?php if(in_array($aks, array('1','8'))){ ?>
                        <a class="collapse-item" href="<?php echo site_url('admin/sim/tt') ?>">Kapasitas Bed</a>
                        <a class="collapse-item" href="<?php echo site_url('admin/sim/ci_co') ?>">Aktifkan PX</a>
                        <?php } ?>
                    </div>
                </div>
            </li>

             <li class="nav-item <?php echo $this->uri->segment(3) == 'o_suket' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('admin/sim/o_suket') ?>">
                    <i class="far fa-fw fa-flag"></i>
                    <span>Data Antrian Online</span></a>
            </li>


            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


           
        </ul>
        <!-- End of Sidebar -->
