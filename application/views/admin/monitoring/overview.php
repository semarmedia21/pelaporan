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
                        <h1 class="h3 mb-0 text-gray-800">Monitoring Harian</h1>

                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <?php $this->load->view("admin/_partials/crud_notif.php")?>


 <!-- ==================================Mulai dari nol YAA=============== -->
                    <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Monitoring Harian</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <?php $this->load->view("admin/monitoring/form.php")?>
                                </div>
                            </div>

                        </div>

                           <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"> History Monitoring Harian</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <?php $this->load->view("admin/monitoring/data.php")?>
                                </div>
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
     <?php $this->load->view("admin/monitoring/modal.php")?>

           <?php $this->load->view("admin/_partials/modal.php")?>
    <!-- Bootstrap core JavaScript-->

<!-- 
    ====================================================================== -->
    <!-- Bootstrap core JavaScript-->
<?php $this->load->view("admin/_partials/js.php")?>

<script>
$(document).ready(function() {
  $('#software').on('change', function() {
    if (this.value == 'ya') {
      $("#msoft").show();
    } else if (this.value =='tidak'){
      $("#msoft").hide();
    }  else {
        $("#msoft").hide();
    }
  });

  $('#hardware').on('change', function() {
    if (this.value == 'ya') {
      $("#hard").show();
    } else if (this.value =='tidak'){
      $("#hard").hide();
    }else {
      $("#hard").hide();
    }
  });

   $('#jaringan').on('change', function() {
    if (this.value == 'ya') {
      $("#jar").show();
    } else if (this.value =='tidak'){
      $("#jar").hide();
    }else {
      $("#jar").hide();
    }
  });


});
</script>


  
</body>

</html>