<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view("admin/_partials/head.php") ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php")?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("admin/_partials/navbar.php")?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lintas Aplikasi - SIMRS</h1>
                    </div>

                        <?php $this->load->view("admin/_partials/crud_notif.php")?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Aktifkan Pasien</h6>
                        </div>

                <div class="card-body">

                   
               <!-- ======================================= -->


               <form method="post" action="<?php echo base_url().'index.php/Admin/sim/cari_regno'?>">
                     <div class="form-group">
                        <label class="control-label ">Cari Pasien</label>
                      <div class="row">
                          <div class="col-sm-4">
                            <input type="text" name="regno" class="form-control">
                          </div>

                          <div class="col-sm-2">
                             <button class="form-control btn btn-sm btn-success" type="submit"><i class="fa fa-search fa-fw"></i> Cari Pasien</button>
                          </div>
                      </div>
                    </div>

                   
                  </form>
<?php


if ($this->uri->segment(4) == true) {  ?>

<div class="table-responsive">
<table class="table table-hover table-striped table-bordered" id="dataTable" cellspacing="0" width="100%">

  <thead>
       <tr>
          <th><center>NRM</center></th>
          <th><center>Regno</center></th>
           <th><center>Nama Pasien</center></th>
           <th><center>Alamat</center></th>
           <th><center>Kabupaten</center></th>
           <th><center>MRS</center></th>
           <th><center>Status Rawat</center></th>
            <th><center>Status</center></th>
            <th><center>Aksi</center></th>
       </tr>
  </thead>
 
  <tbody>
    <?php foreach($data_regno as $row):?>
    <tr>
       <td><center><?php echo $row->NRM;?></center></td>
       <td><center><?php echo $row->regno;?></center></td>
       <td><center><?php echo $row->Nama;?></center></td>
        <td><center><?php echo $row->Alamat;?></center></td>  
        <td><center><?php echo $row->kabupaten;?></center></td>  
        <td><center><?php echo $row->dateCI;?></center></td> 
        <?php 
         $srawat = $row->StatusRawat;
         if($srawat=='1') {
             $sr='Rawat Jalan';
         }elseif($srawat=='2'){
            $sr='Rawat Inap';
         }elseif($srawat=='3'){
            $sr='IGD';
         }
        ?>

        <td><center><?php echo $sr;?></center></td>  
        
        <?php $flag = $row->flag;
              $po = $row->pas_out;
              $regno = $row->regno;
         ?>
        <td><center><?php echo $flag .' - '. $po; ?></center></td> 
        <td><center>

         <?php if($flag == 'CI'){ ?>
            <button class="btn btn-secondary" disabled="button">Sedang Aktif</button>
        <?php }else{ ?>
            <a class="btn btn-small text-success" data-popup="tooltip"  data-toggle="modal" data-target="#modal_aktif<?php echo $regno;?>"> <i class="fas fa-check-double"></i> Aktifkan</a>

        <?php } ?>

        <a class="btn btn-small text-info" data-popup="tooltip"  data-toggle="modal" data-target="#modal_bayar<?php echo $regno;?>"> <i class="fas fa-hand-holding-usd"></i> Tgl Bayar</a>
        
        </center></td> 
   </tr>
  <?php endforeach;?>
 </tbody>
</table>
</div>

<?php } ?>

                        </div>
                        <!-- /.card sadow-->
                    </div>

               
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("admin/_partials/footer.php")?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php $this->load->view("admin/_partials/scrolltop.php")?>

    <!-- Logout Modal-->
      <?php 
      if ($this->uri->segment(4) == true) {  
        $this->load->view("admin/simrs/aktifkan_px/modal.php");
    } ?>
  
    <?php $this->load->view("admin/_partials/modal.php")?>

    
    <!-- Bootstrap core JavaScript-->

<!-- 
    ====================================================================== -->
    <!-- Bootstrap core JavaScript-->
<?php $this->load->view("admin/_partials/js.php")?>



</body>

</html>