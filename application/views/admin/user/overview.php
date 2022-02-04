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
                            <h6 class="m-0 font-weight-bold text-primary">List Data User</h6>
                        </div>


                        <div class="card-body">
                              <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-plus-circle"></i> Tambah </button><hr>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                   <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Hp</th>
                                        <th>Akses</th>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                        
            <?php 
                foreach($data->result_array() as $i):
                    $id=$i['id'];
                    $username = $i['username'];
                    $password = $i['password'];
                    $akses = $i['akses'];
                    $unit = $i['unit'];
                    $log =  $i['log'];
                    $nama = $i['nama'];
                    $alamat = $i['alamat'];
                    $hp= $i['hp'];
                    $str= $i['str'];
                    ?>
            <tr>
                <td><?php echo $username;?></td>
                <td><?php echo $password;?></td>
                <td><?php echo $nama;?></td>
                <td><?php echo $alamat;?></td>
                <td><?php echo $hp;?></td>
                <td><?php echo $akses;?></td>
                <td><?php echo $unit;?></td>
     




                <td >
                    <a class="btn btn-small text-secondary" data-popup="tooltip" title="Edit Data" data-placement="top" data-toggle="modal" data-target="#modal_edit<?php echo $id;?>"> <i class="fas fa-edit"></i> </a>

                    <a class="btn btn-small text-danger" data-popup="tooltip" title="Hapus Data" data-placement="top" data-toggle="modal" data-target="#modal_hapus<?php echo $id;?>"> <i class="fas fa-trash"></i> </a>
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
    <?php $this->load->view("admin/user/modal.php")?>

        <?php $this->load->view("admin/_partials/modal.php")?>
    <!-- Bootstrap core JavaScript-->

<!-- 
    ====================================================================== -->
    <!-- Bootstrap core JavaScript-->
<?php $this->load->view("admin/_partials/js.php")?>



  <!--   <script>
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