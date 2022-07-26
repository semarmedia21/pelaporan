<!DOCTYPE html>
<html lang="en">

<head>

   <?php $this->load->view("admin/_partials/head.php") ?>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"> <img src="<?php echo base_url('assets/images/login.jpg')?>" width="500" height="450" alt=""> </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silakan Login</h1>
                                    </div>
                                    <?php $this->load->view("admin/_partials/crud_notif.php")?>
                                    <form class="user" action="<?php echo base_url().'index.php/admin/login/aksi_login'; ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" required>
                                        </div>
                                     
                                       <button type="submit" class="btn btn-primary btn-block"> Login</button> 

                                       <a href="<?php echo site_url('admin/main'); ?>" class="btn btn-danger  btn-block">
                                            <i></i> Kembali Ke Halaman Utama
                                        </a>
                                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php $this->load->view("admin/_partials/js.php")?>

</body>

</html>