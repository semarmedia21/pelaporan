 <!-- ============ MODAL TAMBAH JP=============== --> 
  <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Perbaikan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Jp/simpan_jp'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Jenis Perbaikan </label>
                        <div class="col-xs-8">
                            <input name="kode_jp" class="form-control" type="text" placeholder="Kode Unit" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Jenis Perbaikan </label>
                        <div class="col-xs-8">
                            <input name="nama_jp" class="form-control" type="text" placeholder="Nama Unit" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Unit Pelaksana Perbaikan</label>
                        <div class="col-xs-8">
                          <select id="basic" name="kode_p" class="selectpicker show-tick form-control" data-live-search="true">
                          
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
<!--END MODAL ADD Jp-->

<!-- ============ MODAL EDIT JP =============== -->
    <?php 
        foreach($data->result_array() as $i):
            $id_jp=$i['id_jp'];
            $nama_jp=$i['nama_jp'];
            $kode_p=$i['kode_p'];
            $nama_unit_p=$i['nama_unit_p'];
            $kode_jp=$i['kode_jp'];
        ?>
      <div class="modal fade" id="modal_edit<?php echo $id_jp;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Perbaikan</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Jp/edit_jp'?>">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <label class="control-label col-xs-3" >Kode Ruang</label> -->
                        <!-- <div class="col-xs-8"> -->
                            <input name="id_jp" value="<?php echo $id_jp;?>" type="hidden" class="form-control" type="text" placeholder="id unit" readonly>
                        <!-- </div> -->
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Jenis Perbaikan</label>
                        <div class="col-xs-8">
                            <input name="kode_jp" value="<?php echo $kode_jp;?>" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Jenis Perbaikan</label>
                        <div class="col-xs-8">
                            <input name="nama_jp" value="<?php echo $nama_jp;?>" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Unit Pelaksana Perbaikan</label>
                        <div class="col-xs-8">
                          <select id="basic" name="kode_p" class="selectpicker show-tick form-control" data-live-search="true">
                          
                          <option data-subtext="<?php echo $kode;?>" value="<?php echo $kode_p;?>"><?php echo $nama_unit_p;?></option>
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
<!--END MODAL EDIT JP-->

<!-- ============ MODAL HAPUS JP =============== -->
      <?php 
         foreach($data->result_array() as $i):
            $id_jp=$i['id_jp'];
            $nama_jp=$i['nama_jp'];
            $kode_p=$i['kode_p'];
        ?>
          <div class="modal fade" id="modal_hapus<?php echo $id_jp;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Jenis Perbaikan </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>


            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Jp/hapus_jp'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $nama_jp;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_jp" value="<?php echo $id_jp;?>">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <?php endforeach;?>
<!-- END MODAL HAPUS JP -->