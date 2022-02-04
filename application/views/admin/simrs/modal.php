 <!-- ============ MODAL TAMBAH TT =============== --> 
 
<!--END MODAL ADD TT -->

<!-- ============ MODAL EDIT TT=============== -->
    <?php 
        foreach($data->result_array() as $i):
          
              $kd_tt=$i['kdruang'];
              $kd_tt_apli=$i['kd_ruang_aplicares'];
              $nama_tt =$i['namaruangan'];
              $tt_kelas=$i['kelas'];
              $tt_tot=$i['jmlbed'];
              $tt_isi =$i['jmlisi'];
              $tt_sisa =$i['jmlkosong'];
              $tt_upd =$i['updatetime'];
                                      
        ?>
      <div class="modal fade" id="modal_edit<?php echo $kd_tt;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Ketersediaan Bed</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <form name="bed" class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Sim/edit_tt'?>">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <label class="control-label col-xs-3" >Kode Ruang</label> -->
                        <!-- <div class="col-xs-8"> -->
                            <input name="kd_tt" value="<?php echo $kd_tt;?>" type="hidden" class="form-control" type="text" placeholder="" readonly>

                            <input name="kd_tt_apli" value="<?php echo $kd_tt_apli;?>" type="hidden" class="form-control" type="text" placeholder="" readonly>
                        <!-- </div> -->
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Ruangan</label>
                        <div class="col-xs-8">
                            <input name="nama_tt" value="<?php echo $nama_tt;?>" class="form-control" type="text" placeholder="" required readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kelas </label>
                        <div class="col-xs-8">
                            <input name="tt_kelas" value="<?php echo $tt_kelas;?>" class="form-control" type="text" placeholder="" required readonly>
                        </div>
                    </div>
                  <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah TT </label>
                        <div class="col-xs-8">
                            <input name="tt_tot" id="tt_tot" value="<?php echo $tt_tot;?>" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah TT Terpakai </label>
                        <div class="col-xs-8">
                            <input name="tt_isi" id="tt_isi" value="<?php echo $tt_isi;?>" class="form-control" type="text" placeholder=""  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah TT Kosong </label>
                        <div class="col-xs-8">
                            <input name="tt_sisa" id="tt_sisa"  value="<?php echo $tt_sisa;?>" class="form-control" type="text" placeholder=""  required readonly>
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


<!--END MODAL EDIT TT-->

<!-- ============ MODAL HAPUS TT =============== -->
     
<!-- END MODAL HAPUS TT -->