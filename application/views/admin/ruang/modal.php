<!-- ============ MODAL TAMBAH RUANG=============== -->
     <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Ruangan / Unit</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Ruang/simpan_ruang'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Ruangan</label>
                        <div class="col-xs-8">
                            <input name="kode_ruang" class="form-control" type="text" placeholder="Kode Ruangan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-8">
                            <input name="nama_ruang" class="form-control" type="text" placeholder="Nama Ruangan" required>
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
            $id_ruang=$i['id_ruang'];
            $nama_ruang=$i['nama_ruang'];
            $kode_ruang=$i['kode_ruang'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $id_ruang;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Ruangan / Unit</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Ruang/edit_ruang'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <!-- <label class="control-label col-xs-3" >Kode Ruang</label> -->
                        <!-- <div class="col-xs-8"> -->
                            <input name="id_ruang" value="<?php echo $id_ruang;?>" type="hidden" class="form-control" type="text" placeholder="id_ruang" readonly>
                        <!-- </div> -->
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Ruang</label>
                        <div class="col-xs-8">
                            <input name="kode_ruang" value="<?php echo $kode_ruang;?>" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Ruang</label>
                        <div class="col-xs-8">
                            <input name="nama_ruang" value="<?php echo $nama_ruang;?>" class="form-control" type="text" placeholder="" required>
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
            $id_ruang=$i['id_ruang'];
            $nama_ruang=$i['nama_ruang'];
            $kode_ruang=$i['kode_ruang'];
        ?>
          <div class="modal fade" id="modal_hapus<?php echo $id_ruang;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Ruangan / Unit</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>


            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Ruang/hapus_ruang'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $nama_ruang;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_ruang" value="<?php echo $id_ruang;?>">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <?php endforeach;?>
<!--END MODAL HAPUS RUANG-->