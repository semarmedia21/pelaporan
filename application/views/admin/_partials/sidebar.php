 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
 
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('main') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-battle-net"></i>
                </div>
                <!-- <div class="sidebar-brand-text mx-3">SIAMP <sup>2.0 </sup></div> -->
                <div class="sidebar-brand-text mx-3" >SIPIT </div>
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
            <?php if(in_array($aks, array('','8'))){ ?>
            <!-- Nav Item - Permintaan -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'req' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('admin/req') ?>">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Formulir</span></a>
            </li>
            <?php } ?>

              <li class="nav-item <?php echo $this->uri->segment(3) == 'it' ? 'active': '' ?>">
                <a class="nav-link" href="<?php echo site_url('admin/daftar/it') ?>">
                    <i class="fas fa-fw fa-list-ul"></i>
                    <span>Daftar Permintaan IT</span></a>
            </li>

        <?php if(in_array($aks, array('6','8'))){ ?>

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
                        <a class="collapse-item" href="<?php echo site_url('admin/laporan/lap_thn') ?>" > Laporan Tahunan IT</a>
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

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


           
        </ul>
        <!-- End of Sidebar -->
