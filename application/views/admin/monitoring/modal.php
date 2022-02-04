<script type='text/javascript'>
$(document).ready(function() {
  $('#software2').on('change', function() {
    if (this.value == 'ya') {
      $("#msoft2").show();
    } else if (this.value =='tidak'){
      $("#msoft2").hide();
    }  else {
        $("#msoft2").hide();
    }
  });

  $('#hardware2').on('change', function() {
    if (this.value == 'ya') {
      $("#hard2").show();
    } else if (this.value =='tidak'){
      $("#hard2").hide();
    }else {
      $("#hard2").hide();
    }
  });

   $('#jaringan2').on('change', function() {
    if (this.value == 'ya') {
      $("#jar2").show();
    } else if (this.value =='tidak'){
      $("#jar2").hide();
    }else {
      $("#jar2").hide();
    }
  });


});
</script>
<!-- ============ MODAL EDIT  =============== -->
    <?php 
        foreach($mon->result_array() as $i):
            $id=$i['id'];
            $tgl=$i['tanggal'];

            $q1=$i['q1'];
            $soft=$i['mon_soft'];
            $ssoft=$i['sol_soft'];

            $q2=$i['q2'];
            $hard=$i['mon_hard'];
            $shard=$i['sol_hard'];

            $q3=$i['q3'];
            $jar=$i['mon_jar'];
            $sjar=$i['sol_jar'];

            if ($q1 == 'Terdapat masalah / kendala') {
                $code = 'ya';
            }elseif ($q1 == 'Berjalan dengan baik') {
                 $code = 'tidak';
            }else{
                 $code = "";
            }

            if ($q2 == 'Terdapat masalah / kendala') {
                $code2 = 'ya';
            }elseif ($q2 == 'Berjalan dengan baik') {
                 $code2 = 'tidak';
            }else{
                 $code2 = "";
            }

              if ($q3 == 'Terdapat masalah / kendala') {
                $code3 = 'ya';
            }elseif ($q3 == 'Berjalan dengan baik') {
                 $code3 = 'tidak';
            }else{
                 $code3 = "";
            }
        ?>
        
    <div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Monitoring</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Monitor/edit_mon'?>">
                <div class="modal-body">

                     <div class="form-group">
                        <label class="control-label col-md-3" ><b>Tanggal</b></label>
                        <div class="col-lg-12">
                             <input type="text" class="form-control" name="id" value="<?php echo $id;?>"  hidden="true">

                            <input type="date" class="form-control" name="tgl" value="<?php echo $tgl;?>"  required>
                        </div>
                     </div>
                     <hr> 

                    <div class="form-group">
                        <label for="software" class="control-label col-xs-3" ><b>Monitoring Software</b></label>
                        
                        <select class="form-control col-lg-12" id='software2' name='softsel' required>
                                <option value="<?php echo $code;?>"><?php echo $q1;?></option>
                                <option value="ya">Terdapat Kendala</option>
                                <option value="tidak">Berjalan Dengan Baik</option>
                        </select>

                        </div>
                    <div class="form-group"  id='msoft2'>
                        <label class="control-label col-xs-3" name="msoftlab" >Uraian kendala / masalah software </label>
                        <div class="col-lg-12">
                            <textarea class="form-control" rows="5" cols="50" name ="msoftarea" ><?php echo $soft;?></textarea>
                        </div>

                         <label class="control-label col-xs-3" name="msoftlab" >Solusi / Dapat diatasi? </label>
                        <div class="col-lg-12">
                            <textarea class="form-control" rows="5" cols="50" name ="msoftsol" ><?php echo $ssoft;?></textarea>
                        </div>

                    </div>
                    <hr> <hr>

                    <div class="form-group">
                        <label for="hardware" class="control-label col-xs-3" ><b>Monitoring Hardware </b></label>
                      <select class="form-control col-lg-12" id='hardware2' name='hardsel' required>
                                <option value="<?php echo $code2;?>"><?php echo $q2;?></option>
                                <option value="ya">Terdapat Kendala</option>
                                <option value="tidak">Berjalan Dengan Baik</option>
                        </select>
                        </div>
                    <div class="form-group" style='' id='hard2'>
                        <label class="control-label col-xs-3" name="hardlab" >Uraian kendala / masalah Hardware </label>
                        <div class="col-lg-12">
                            <textarea class="form-control" rows="5" cols="50" name ="hardarea"  ><?php echo $hard;?></textarea>
                        </div>

                        <label class="control-label col-xs-3" name="hardlab" >Uraian Solusi / Dapat diatasi? </label>
                        <div class="col-lg-12">
                            <textarea class="form-control" rows="5" cols="50" name ="hardsol" ><?php echo $shard;?></textarea>
                        </div>
                    </div>
                    <hr> <hr>

                     <div class="form-group">
                        <label for="jaringan" class="control-label col-xs-3" ><b>Monitoring Jaringan </b></label>

                         <select class="form-control col-lg-12" id='jaringan2' name='jarsel' required>
                                <option value="<?php echo $code3;?>"><?php echo $q3;?></option>
                                <option value="ya">Terdapat Kendala</option>
                                <option value="tidak">Berjalan Dengan Baik</option>
                            </select>
                        </div>

                    <div class="form-group" style='' id='jar2'>
                        <label class="control-label col-xs-3" name="jarlab" ><b>Uraian kendala / masalah Jaringan </b></label>
                        <div class="col-lg-12">
                            <textarea class="form-control" rows="5" cols="50" name ="jararea"  ><?php echo $jar;?></textarea>
                        </div>

                         <label class="control-label col-xs-3" name="jarlab" ><b>Uraian Solusi / Dapat diatasi? </b></label>
                        <div class="col-lg-12">
                            <textarea class="form-control" rows="5" cols="50" name ="jarsol" ><?php echo $sjar;?></textarea>
                        </div>
                    </div>
                    <hr> <hr>
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
         foreach($mon->result_array() as $i):
          $id=$i['id'];
            $tgl=$i['tanggal'];

           
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


            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Monitor/hapus_mon'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus Monitoring tanggal : <b><?php echo $tgl;?></b></p>
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
            <h5 class="modal-title" id="exampleModalLabel">DOWNLOAD LAPORAN MONITORING</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/monitor/exportXls'?>">
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