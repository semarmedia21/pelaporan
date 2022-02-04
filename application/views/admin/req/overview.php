<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view("admin/_partials/head.php") ?>

</head>

<style type="text/css">
    .button {
/*  background-color: #004A7F;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 20px;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;*/
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}
</style>

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
                        <h1 class="h3 mb-0 text-gray-800">Formulir Permintaan</h1>

                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <?php $this->load->view("admin/_partials/crud_notif.php")?>


 <!-- ==================================Mulai dari nol YAA=============== -->
                    <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Formulir Permintaan</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                                                     
                            <?php $this->load->view("admin/req/req_form.php")?>               
                                   
                                <?php if(empty($_GET['reqno'])){ ?>

                                     <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_add_new"> <i class="fa fa-plus-circle"></i> Tambah </button>

                                    <hr>
                                     <div class="d-sm-flex align-items-center justify-content-between mb-4">     
                                  <h6 class=" mb-0 text-gray-800">Klik Tombol Tambah diatas untuk membuat permintaan baru</h6> </div>
                              <?php  
                               }

                                ?>
                                </div>
                            </div>

                        </div>

                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Permintaan </h6>
                        </div>
                        
                        <div class="card-body">
                        <?php if(empty($_GET['reqno'])){ ?>
                             <hr>
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">     
                            <p class=" mb-0 text-gray-800">*tombol tambah akan muncul setelah permintaan terdaftar. Mohon isi detail permintaan dan uraian lengkap dengan klik tombol tambah diatas</p> </div>
                             
                              <?php
                          } ?>
                        

                        <?php $this->load->view("admin/req/data.php")?> 

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
   <?php $this->load->view("admin/req/modal.php") ?> 
           <?php $this->load->view("admin/_partials/modal.php")?>
    <!-- Bootstrap core JavaScript-->

<!-- 
    ====================================================================== -->
    <!-- Bootstrap core JavaScript-->
<?php $this->load->view("admin/_partials/js.php")?>
  
<!-- <script>
    $('.select2').select2();


    $('#basic2').selectpicker({
        liveSearch: true,
        maxOptions: 1
        });

</script>


    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

    <script type="text/javascript">
    $('#notifikasi').slideDown('slow').delay(5000).slideUp('slow');
    </script>

    <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-popup=tooltip]",
        container: "body"
    })
    </script> -->



</body>

</html>