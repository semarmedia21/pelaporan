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
                            <h6 class="m-0 font-weight-bold text-primary">Ketersediaan Tempat tidur</h6>
                        </div>

                        

                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-plus-circle"></i> Tambah Tempat tidur</button>

                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-download"></i> DOWNLOAD</button>
                            <hr>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th><center>Kode Ruang</center></th>
                                        <th><center>Nama Ruangan</center></th>
                                        <th><center>Kelas</center></th>
                                        <th><center>Jumlah Bed</center></th>
                                         <th><center>Jumlah Isi</center></th>
                                         <th><center>Jumlah Kosong</center></th>
                                         <th><center>Last Update</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                            
                                <?php 
                                    foreach($data->result_array() as $i):
                                        $kd_tt=$i['kdruang'];
                                        $nama_tt =$i['namaruangan'];
                                        $tt_kelas=$i['kelas'];
                                        $tt_tot=$i['jmlbed'];
                                        $tt_isi =$i['jmlisi'];
                                        $tt_sisa =$i['jmlkosong'];
                                        $tt_upd =$i['updatetime'];
                                        ?>
                                <tr>
                                    <td><?php echo $kd_tt;?></td>
                                    <td><?php echo $nama_tt;?></td>
                                    <td><?php echo $tt_kelas;?></td>
                                    <td><?php echo $tt_tot;?></td>
                                    <td><?php echo $tt_isi;?></td>
                                    <td><?php echo $tt_sisa;?></td>
                                    <td><?php echo $tt_upd;?></td>
                                    
                                    
                                    <td width="250">
                                        <a class="btn btn-small text-info" data-popup="tooltip" title="Edit Data" data-placement="top" data-toggle="modal" data-target="#modal_edit<?php echo $kd_tt;?>"> <i class="fas fa-upload"></i> Update Ketersediaan</a>

                                        <!-- <a class="btn btn-small text-danger" data-popup="tooltip" title="Hapus Data" data-placement="top" data-toggle="modal" data-target="#modal_hapus<?php echo $kd_tt;?>"> <i class="fas fa-trash"></i> Hapus</a> -->
                                    </td>   
                                </tr>
                                <?php endforeach;?>
                            </tbody>


                            </table>

                        </div>
                            <!-- /.card body -->
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
   <?php $this->load->view("admin/simrs/modal.php") ?>
    <?php $this->load->view("admin/_partials/modal.php")?>
    <!-- Bootstrap core JavaScript-->

<!-- 
    ====================================================================== -->
    <!-- Bootstrap core JavaScript-->
<?php $this->load->view("admin/_partials/js.php")?>

<script type="text/javascript">
    $(document).on("input", "#tt_isi, tt_tot", function(e) {
    var bed = parseInt($('#tt_tot').val());
    var isi = parseInt($('#tt_isi').val());

    $('#tt_sisa').val(bed - isi); 
    });

</script>



</body>

</html>