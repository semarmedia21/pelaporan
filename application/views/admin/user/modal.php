 <!-- ============ MODAL TAMBAH RUANG=============== -->
     <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah User / Unit</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/User/simpan_user'?>">
                <div class="modal-body">

                   <div class="form-group">
                       
                        <div class="col-xs-8">
                            <input name="id" value="" class="form-control" type="text" placeholder="" hidden="true">
                        
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-8">
                            <input name="username" value="" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-8">
                            <input name="password" value="" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-8">
                            <input name="nama" value="" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Hp</label>
                        <div class="col-xs-8">
                            <input name="hp" value="" class="form-control" type="text" placeholder="" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-8">
                            <input name="alamat" value="" class="form-control" type="text" placeholder="" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Akses</label>
                        <div class="col-xs-8">
                            <input name="akses" value="" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Unit</label>
                        <div class="col-xs-8">
                            <input name="unit" value="" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                </div>
            </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-danger">Simpan</button>
                </div>
            </form>
          </div>
        </div>
      </div> 
<!--END MODAL ADD RUANG-->

<!-- ============ MODAL EDIT RUANG =============== -->
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
                    $str=$i['str'];
        ?>
    <div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/user/edit_user'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <!-- <label class="control-label col-xs-3" >Kode Ruang</label> -->
                        <!-- <div class="col-xs-8"> -->
                            <input name="id" value="<?php echo $id;?>" type="hidden" class="form-control" type="text" placeholder="" hidden="true">
                        <!-- </div> -->
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-8">
                            <input name="username" value="<?php echo $username;?>" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                   <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-8">
                           <?php $str2=strrev($str)?>
                            <div class="input-group" id="show_hide_password">
                              <input class="form-control" name="password" type="password"  value="<?php echo $str2;?>" required>
                              <div class="input-group-addon btn btn-info">
                                <a href=""><i class="fa fa-eye-slash icon text-white-50" aria-hidden="true"></i></a>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-8">
                            <input name="nama" value="<?php echo $nama;?>" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Hp</label>
                        <div class="col-xs-8">
                            <input name="hp" value="<?php echo $hp;?>" class="form-control" type="text" placeholder="" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-8">
                            <input name="alamat" value="<?php echo $alamat;?>" class="form-control" type="text" placeholder="" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Akses</label>
                        <div class="col-xs-8">
                            <input name="akses" value="<?php echo $akses;?>" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Unit</label>
                        <div class="col-xs-8">
                            <input name="unit" value="<?php echo $unit;?>" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-info">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div> 

    <?php endforeach;?>


<!--END MODAL EDIT RUANG-->

<!-- ============ MODAL HAPUS RUANG =============== -->
      <?php 
         foreach($data->result_array() as $i):
            $id=$i['id'];
            $username=$i['username'];
        ?>
          <div class="modal fade" id="modal_hapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus User / Unit</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>


            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/User/hapus_user'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $username;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <?php endforeach;?>
<!-- END MODAL HAPUS RUANG -->