                          

      <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Monitor/simpan_mon'?>">
                <div class="modal-body">
                   <div class="form-group">
                        <label class="control-label col-xs-3" ><b>Tanggal</b></label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="tgl" value=""  required>
                        </div>
                     </div>
                     <hr> <hr>

                     <div class="form-group">
                        <label class="control-label col-xs-3" ><b>Unit/Ruangan</b></label>
                        <div class="col-sm-4">
                        <select id="basic" name="kode_r" class="selectpicker show-tick form-control" data-live-search="true" required>
                          <option data-subtext="" value="">Pilih</option>
                            <?php
                              foreach ($dr->result() as $tabel)
                                {  $kode=$tabel->kode_ruang;
                                   $nama=$tabel->nama_ruang;
                                ?>
                                <option data-subtext="<?php echo $nama; ?>" value="<?php echo $kode; ?>"><?php echo $nama; ?></option>";
                             <?php }
                          ?>
                         </select>
                         </div>
                     </div>
                     <hr> <hr>

                    <div class="form-group">
                        <label for="software" class="control-label col-xs-3" ><b>Monitoring Software</b></label>
                        
                        <select class="form-control col-sm-4" id='software' name='softsel' required>
                                <option value="">-Pilih-</option>
                                <option value="ya">Terdapat Kendala</option>
                                <option value="tidak">Berjalan Dengan Baik</option>
                        </select>

                        </div>
                    <div class="form-group" style='display:none;' id='msoft'>
                        <label class="control-label col-xs-3" name="msoftlab" >Uraian kendala / masalah software </label>
                        <div class="col-xs-8">
                            <textarea class="form-control" rows="5" cols="50" name ="msoftarea" value="" ></textarea>
                        </div>

                         <label class="control-label col-xs-3" name="msoftlab" >Solusi / Dapat diatasi? </label>
                        <div class="col-xs-8">
                            <textarea class="form-control" rows="5" cols="50" name ="msoftsol" value="" ></textarea>
                        </div>
                    </div>
                    <hr> <hr>
                    <div class="form-group">
                        <label for="hardware" class="control-label col-xs-3" ><b>Monitoring Hardware </b></label>
                      <select class="form-control col-sm-4" id='hardware' name='hardsel' required>
                                <option value="">-Pilih-</option>
                                <option value="ya">Terdapat Kendala</option>
                                <option value="tidak">Berjalan Dengan Baik</option>
                        </select>
                        </div>
                    <div class="form-group" style='display:none;' id='hard'>
                        <label class="control-label col-xs-3" name="hardlab" >Uraian kendala / masalah Hardware </label>
                        <div class="col-xs-8">
                            <textarea class="form-control" rows="5" cols="50" name ="hardarea" value="" ></textarea>
                        </div>

                        <label class="control-label col-xs-3" name="hardlab" >Uraian Solusi / Dapat diatasi? </label>
                        <div class="col-xs-8">
                            <textarea class="form-control" rows="5" cols="50" name ="hardsol" value="" ></textarea>
                        </div>
                    </div>
                    <hr> <hr>

                     <div class="form-group">
                        <label for="jaringan" class="control-label col-xs-3" ><b>Monitoring Jaringan </b></label>

                         <select class="form-control col-sm-4" id='jaringan' name='jarsel' required>
                                <option value="">-Pilih-</option>
                                <option value="ya">Terdapat Kendala</option>
                                <option value="tidak">Berjalan Dengan Baik</option>
                            </select>
                        </div>

                    <div class="form-group" style='display:none;' id='jar'>
                        <label class="control-label col-xs-3" name="jarlab" ><b>Uraian kendala / masalah Jaringan </b></label>
                        <div class="col-xs-8">
                            <textarea class="form-control" rows="5" cols="50" name ="jararea" value="" ></textarea>
                        </div>

                         <label class="control-label col-xs-3" name="jarlab" ><b>Uraian Solusi / Dapat diatasi? </b></label>
                        <div class="col-xs-8">
                            <textarea class="form-control" rows="5" cols="50" name ="jarsol" value="" ></textarea>
                        </div>
                    </div>
                    <hr> <hr>
                   
                <div class="form-group">
                    <button class="btn btn-secondary" aria-hidden="true">Reset</button>
                    <button class="btn btn-danger" >Simpan</button>
                </div>
            </form>

