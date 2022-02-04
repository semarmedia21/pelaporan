<!-- ============ MODAL TAMBAH=============== -->
     <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan Daring</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Daring/simpan_daring'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal</label>
                        <div class="col-xs-8">
                            <input name="tgl" class="form-control" type="date" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Waktu </label>
                        <div class="col-xs-8">
                            <input name="wkt" class="form-control" type="time" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" > Pelaksana / Penyelenggara </label>
                        <div class="col-xs-8">
                            <input name="pel" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" > Detail Kegiatan </label>
                        <div class="col-xs-8">
                            <textarea name="keg" class="form-control" required></textarea>
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
<!--END MODAL ADD -->

<!-- ============ MODAL EDIT  =============== -->
    <?php 
        foreach($data->result_array() as $i):
            $id=$i['id'];
            $tgl =$i['tanggal'];
            $wkt=$i['waktu'];
            $pel=$i['pelaksana'];
            $keg=$i['kegiatan'];
        ?>
        
        <div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Kegiatan Daring</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Daring/edit_daring'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal</label>
                        <div class="col-xs-8">
                            <input name="id" class="form-control" type="text" value="<?php echo $id;?>" hidden="true">

                            <input name="tgl" class="form-control" type="date" value="<?php echo $tgl;?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Waktu </label>
                        <div class="col-xs-8">
                            <input name="wkt" class="form-control" type="time" value="<?php echo $wkt;?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" > Pelaksana / Penyelenggara </label>
                        <div class="col-xs-8">
                            <input name="pel" class="form-control" type="text"  value="<?php echo $pel;?>"required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" > Detail Kegiatan </label>
                        <div class="col-xs-8">
                            <textarea name="keg" class="form-control" required> <?php echo $keg;?></textarea>
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
           $id=$i['id'];
            $tgl =$i['tanggal'];
            $wkt=$i['waktu'];
            $pel=$i['pelaksana'];
            $keg=$i['kegiatan'];
           
        ?>
          <div class="modal fade" id="modal_hapus<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Kegiatan Daring</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>


            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Daring/hapus_daring'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus kegiatan <b><?php echo $keg;?></b> tanggal : <b><?php echo $tgl;?></b></p>
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
<!--END MODAL HAPUS unit-->

<!--END MODAL DOWNLOAD-->
 <div class="modal fade" id="modal_download" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">DOWNLOAD LAPORAN DARING</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Daring/exportXls'?>">
                <div class="modal-body">

                    <div class="form-group">

                    <label class="control-label col-xs-3" > Pilih Rentang Bulan </label>

                       <div class="input-group col-lg">
                          <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                          <input type="month" name="bulan" class="form-control">
                          
                       </div>
                    </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-success">DOWNLOAD</button>
                </div>
            </form>
          </div>
        </div>
      </div> 
<!--END MODAL ADD -->