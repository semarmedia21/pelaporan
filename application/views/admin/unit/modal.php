<!-- ============ MODAL TAMBAH Unit=============== -->
     <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Unit Pelaksana / Unit</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Unit_p/simpan_unit'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Unit Pelaksana </label>
                        <div class="col-xs-8">
                            <input name="kode_p" class="form-control" type="text" placeholder="Kode Unit" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Unit Pelaksana </label>
                        <div class="col-xs-8">
                            <input name="nama_unit_p" class="form-control" type="text" placeholder="Nama Unit" required>
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
<!--END MODAL ADD unit-->

<!-- ============ MODAL EDIT unit =============== -->
    <?php 
        foreach($data->result_array() as $i):
            $id_unit_p=$i['id_unit_p'];
            $nama_unit_p=$i['nama_unit_p'];
            $kode_p=$i['kode_p'];
        ?>
        
        <div class="modal fade" id="modal_edit<?php echo $id_unit_p;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Unit Pelaksana</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Unit_p/edit_unit'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <!-- <label class="control-label col-xs-3" >Kode Ruang</label> -->
                        <!-- <div class="col-xs-8"> -->
                            <input name="id_unit_p" value="<?php echo $id_unit_p;?>" type="hidden" class="form-control" type="text" placeholder="id unit" readonly>
                        <!-- </div> -->
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Unit Pelaksana</label>
                        <div class="col-xs-8">
                            <input name="kode_p" value="<?php echo $kode_p;?>" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Unit Pelaksana</label>
                        <div class="col-xs-8">
                            <input name="nama_unit_p" value="<?php echo $nama_unit_p;?>" class="form-control" type="text" placeholder="" required>
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
            <!-- div tambahan -->
          </div>

    <?php endforeach;?>
<!--END MODAL EDIT unit-->

<!-- ============ MODAL HAPUS unit =============== -->
      <?php 
         foreach($data->result_array() as $i):
            $id_unit_p=$i['id_unit_p'];
            $nama_unit_p=$i['nama_unit_p'];
            $kode_p=$i['kode_p'];
        ?>
          <div class="modal fade" id="modal_hapus<?php echo $id_unit_p;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Unit Pelaksana / Unit</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>


            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Unit_p/hapus_unit'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $nama_unit_p;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_unit_p" value="<?php echo $id_unit_p;?>">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <?php endforeach;?>
<!--END MODAL HAPUS unit-->