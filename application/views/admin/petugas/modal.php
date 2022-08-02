 <!-- ============ MODAL TAMBAH p=============== --> 
  <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          
      <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Petugas/simpan_p'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Petugas </label>
                        <div class="col-xs-8">
                            <input name="nama_p" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                  
                    <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Unit Pelaksana</label>
                        <div class="col-xs-8">
                          <select id="basic" name="kode_p" class="selectpicker show-tick form-control" data-live-search="true" required>
                          
                          <option data-subtext="" value="">Pilih</option>
                      <!-- Dropdown unit -->
                           <?php
                              foreach ($dd->result() as $tabel)
                                {  $kode=$tabel->kode_p;
                                   $nama=$tabel->nama_unit_p;
                                ?>
                                <option data-subtext="<?php echo $kode; ?>" value="<?php echo $kode; ?>"><?php echo $nama; ?></option>";
                             <?php }
                          ?>
                         </select>
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
<!--END MODAL ADD p-->

<!-- ============ MODAL EDIT p =============== -->
    <?php 
        foreach($data->result_array() as $i):
             $id_p=$i['id_petugas'];
            $nama_p =$i['nama_petugas'];
            $jab=$i['jabatan'];
            $kode_p=$i['nama_unit_p'];
           
        ?>
      <div class="modal fade" id="modal_edit<?php echo $id_p;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Petugas/edit_p'?>">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <label class="control-label col-xs-3" >Kode Ruang</label> -->
                        <!-- <div class="col-xs-8"> -->
                            <input name="id_p" value="<?php echo $id_p;?>" type="hidden" class="form-control" type="text" placeholder="id unit" readonly>
                        <!-- </div> -->
                    </div>

                   

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Petugas</label>
                        <div class="col-xs-8">
                            <input name="nama_p" value="<?php echo $nama_p;?>" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Unit Pelaksana </label>
                        <div class="col-xs-8">
                          <select id="basic" name="kode_p" class="selectpicker show-tick form-control" data-live-search="true" required>
                          
                          <option data-subtext="<?php echo $kode;?>"  value="<?php echo $kode_p;?>"><?php echo $kode_p;?></option>
                      <!-- Dropdown unit -->
                           <?php
                              foreach ($dd->result() as $tabel)
                                {  $kode=$tabel->kode_p;
                                   $nama=$tabel->nama_unit_p;
                                ?>
                                <option data-subtext="<?php echo $kode; ?>" value="<?php echo $kode; ?>"><?php echo $nama; ?></option>";
                             <?php }
                          ?>

                         </select>
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
<!--END MODAL EDIT p-->

<!-- ============ MODAL HAPUS p =============== -->
      <?php 
         foreach($data->result_array() as $i):
             $id_p=$i['id_petugas'];
            $nama_p =$i['nama_petugas'];
            $jab=$i['jabatan'];
            $kode_p=$i['nama_unit_p'];
        ?>
          <div class="modal fade" id="modal_hapus<?php echo $id_p;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Jenis Perbaikan </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>


            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Petugas/hapus_p'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $nama_p;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_p" value="<?php echo $id_p;?>">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <?php endforeach;?>
<!-- END MODAL HAPUS p -->