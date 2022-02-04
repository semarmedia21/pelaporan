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
                        <h1 class="h3 mb-0 text-gray-800">Utility</h1>
                    </div>

                    <?php $this->load->view("admin/_partials/crud_notif.php")?>

                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Data Unit Pelaksana</h6>
                        </div>

                        <div class="card-body">
                              <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-plus-circle"></i> Tambah </button><hr>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th><center>Kode Unit Pelaksana</center></th>
                                        <th><center>Nama Unit Pelaksana</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                        
                            <?php 
                                foreach($data->result_array() as $i):
                                    $id_unit_p=$i['id_unit_p'];
                                    $nama_unit_p =$i['nama_unit_p'];
                                    $kode_p=$i['kode_p'];
                                    ?>
                            <tr>
                                <td><?php echo $kode_p;?></td>
                                <td><?php echo $nama_unit_p;?></td>
                                <td width="250">
                                    <a class="btn btn-small text-secondary" data-popup="tooltip" title="Edit Data" data-placement="top" data-toggle="modal" data-target="#modal_edit<?php echo $id_unit_p;?>"> <i class="fas fa-edit"></i> Edit</a>

                                    <a class="btn btn-small text-danger" data-popup="tooltip" title="Hapus Data" data-placement="top" data-toggle="modal" data-target="#modal_hapus<?php echo $id_unit_p;?>"> <i class="fas fa-trash"></i> Hapus</a>

                  
                                    </td>   
                                </tr>
                                <?php endforeach;?>
                            </tbody>


                                </table>
                            </div>
                        </div> 
                    </div>
            

               
            </div>
                <!-- /.container-fluid -->

            </div
            >
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
    <?php $this->load->view("admin/unit/modal.php")?>
    
    <?php $this->load->view("admin/_partials/modal.php")?>
    <!-- Bootstrap core JavaScript-->

<!-- 
    ====================================================================== -->
    <!-- Bootstrap core JavaScript-->
<?php $this->load->view("admin/_partials/js.php")?>

<!--  <script>
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
    </script>
 -->


</body>

</html>