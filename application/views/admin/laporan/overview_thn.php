<!DOCTYPE html>
<html lang="en">

<head>

<?php $this->load->view("admin/_partials/head.php") ?>
<link href="<?php echo base_url('https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet')?>">
<link href="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css')?>" rel="stylesheet">



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
                        <h1 class="h3 mb-0 text-gray-800">Rekap Permintaan Tahunan</h1>

                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <?php $this->load->view("admin/_partials/crud_notif.php")?>

                   
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Rekap Tahunan</h6>
                        </div>

                        <div class="card-body">

                <form method="post" action="<?php echo base_url().'index.php/Admin/Laporan/exportXls'?>">
                    <div class="form-group">
                       <div class="input-group col-sm-5">
                          <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>&nbsp

                          <br> <input type="month" class="form-control" name="vtanggal" id="vtanggal"> <br>
                          &nbsp <span class="input-group-btn">
                          <button id="tampil" class="btn btn-success" type="button"><i class="fa fa-search fa-fw"></i> Tampil</button>
                          </span>
                       </div>
                    </div>

                   
                  <div id="download" style='display:none;' class="form-group">
                      <input type="submit" class="btn btn-success btn-sm" value="DOWNLOAD EXCEL">
                     
                      </div>                 
                  </form>
 
                <div id="tampil_laporan_thn" class="row"></div>
                

                </div>
                
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
  
      <?php $this->load->view("admin/_partials/modal.php")?>
    <!-- Bootstrap core JavaScript-->

<!-- 
    ====================================================================== -->
    <!-- Bootstrap core JavaScript-->
<?php $this->load->view("admin/_partials/js.php")?>

<script>
//   $(document).ready(function(){
//   $("#tahun").datepicker({
//      format: "yyyy",
//      viewMode: "years", 
//      minViewMode: "years",
//      autoclose:true
//   });   
// })


   $(function(){
    $("#tampil").click(function(){
       var vtanggal = $("#vtanggal").val();
       
       $.ajax({
          url:"<?php echo base_url().'index.php/Admin/Laporan/tampil_laporan_thn'?>",
          type:"POST",
          data:"vtanggal="+vtanggal,
          cache:false,
          success:function(html){
          $("#tampil_laporan_thn").html(html);
          $("#download").show();
          }
       })

      })
     
   })

$function()
   function addid(){
   var vtanggal1 = $("#vtanggal").val();
   $.ajax({
    url: "<?php echo base_url().'index.php/Admin/Laporan/exportXls'?>",
    type: "POST",
    data:"vtanggal1="+vtanggal1,
    cache: false,
    success: function(result){
            console.log(result); 
        }
    });

}

</script>

</body>

</html>