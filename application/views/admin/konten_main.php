 <!-- Content Row -->
                    <div class="row">

                        <div class="col-md-3 col-md-6 mb-2">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                Antrian Baru</div>
                                            <div class="h3 mb-0 font-weight-bold text-gray-800"> <?php
                                            $this->db->where('status', '1');
                                            $this->db->from('tb_amprah');
                                            $cnt = $this->db->count_all_results();
                                            echo $cnt ;

                                            ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users-cog fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-xl-6 mb-2">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                                Total Permintaan Masuk</div>
                                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                // $this->db->where('reqno', $reqno);
                                                $this->db->from('tb_amprah');
                                                $cnt = $this->db->count_all_results();
                                                echo $cnt ;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tasks fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-2">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">Total Permintaan Selesai
                                            </div>
                                            <div class="h3 mb-0 font-weight-bold text-gray-800"> <?php
                                            $this->db->where('status', '3');
                                            $this->db->from('tb_amprah');
                                            $cnt = $this->db->count_all_results();
                                            echo $cnt ;
                                            ?>
                                         </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-double fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-2">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                                Total Permintaan Dalam Proses</div>
                                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                                <?php     
                                                    $this->db->select('*');
                                                    $this->db->from("tb_det_amprah");
                                                    $this->db->join('tb_amprah', "tb_amprah.reqno = tb_det_amprah.reqno");
                                                    $this->db->where('tb_amprah.status', '2');
                                                    $cnt  = $this->db->count_all_results();
                                                    echo $cnt ;
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sliders-h fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-2">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                                Total Item Permintaan</div>
                                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $this->db->from('tb_det_amprah');
                                                $cnt = $this->db->count_all_results();
                                                echo $cnt ;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cogs fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-xl-3 col-md-6 mb-2">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-dark text-uppercase mb-1">
                                                Total Item Selesai</div>
                                            <div class="h3 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                                                    
                                                $this->db->select('*');
                                                $this->db->from("tb_det_amprah");
                                                $this->db->join('tb_amprah', "tb_amprah.reqno = tb_det_amprah.reqno");
                                                $this->db->where('tb_amprah.status', '3');
                                                $cnt  = $this->db->count_all_results();
                                                                            echo $cnt ;
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-double fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>

<!-- Content Row -->

            <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Permintaan Setiap Bulan</h6>
                                </div>
                                <!-- Card Body -->
                               
                                <div class="card-body">
                                    <?php $this->load->view('admin/pills_chart.php') ?>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Jenis Pekerjaan</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPie"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> SIM RS
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> HARDWARE
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> JARINGAN
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> SOFTWARE
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> DARING
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color:#ca33ff;"
                                            ></i> DOK VIDIO
                                        </span>

                                         <span class="mr-2">
                                            <i class="fas fa-circle" style="color:#e3037d;"
                                            ></i> DATA & INFORMASI
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            <div class="row">
                <!-- Bar Chart -->
                <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Index Petugas</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">                                    
                                    <?php $this->load->view('admin/pills_idx.php') ?>
                                </div>
                            </div>
                        </div>
            </div>
