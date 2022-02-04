<?php
    $data3=$this->session->flashdata('req');

    $this->db->select('*');
    $this->db->from('tb_amprah');
    $this->db->where('reqno',$data3);
     $amp = $this->db->get();
    
 if($data3!=""){ 

    $res = $amp->row_array();
    
    // $res['reqno'] = $req1;
    $req1 = $res['reqno'];
    $tgl =$res['tanggal_req'];
    $tim = $res['waktu_req'];
    $kr = $res['kode_r'];
    $kp = $res['kode_p'];
    $sts = $res['status'];
    $val = $res['nama_val'];
    $id_u = $res['id_user'];   

     ?>                            
                                  

<form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Req/editamprah'?>">
                <div class="modal-body">
                    <div class="form-group">
                        
                        <div class="row">
                          <label class="control-label col-sm" >Reqno - ID </label>
                          </div>

                        
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="reqno" value="<?php echo $req1; ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">

                      <div class="row">
                          <div class="col-sm">
                            <input type="text" class="form-control" name="tanggal_req" placeholder="" value="<?php echo $tgl;?>">
                          </div>
                          <div class="col-sm">
                            <input type="text" class="form-control" name="waktu_req" placeholder="" value="<?php echo $tim;?>" >
                          </div>
                      </div>
                    </div>
                    
                  

                    <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Ruangan Pemohon</label>
                        <div class="col-xs-8">
                          <select id="basic" name="kode_r" class="selectpicker show-tick form-control" data-live-search="true">
                          
                          <option data-subtext="<?php echo $kr;?>" value="<?php echo $kr;?>"><?php echo $kr;?></option>
                      <!-- Dropdown unit -->
                           <?php
                              foreach ($dr->result() as $tabel)
                                {  $kode=$tabel->kode_ruang;
                                   $nama=$tabel->nama_ruang;
                                ?>
                                <option data-subtext="<?php echo $kode; ?>" value="<?php echo $kode; ?>"><?php echo $nama; ?></option>";
                             <?php }
                          ?>

                         </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Unit Pelaksana</label>
                        <div class="col-xs-8">
                          <select id="basic" name="kode_u" class="selectpicker show-tick form-control" data-live-search="true">
                          
                          <option data-subtext="<?php echo $kp;?>" value="<?php echo $kp;?>"><?php echo $kp;?></option>
                      <!-- Dropdown unit -->
                           <?php
                              foreach ($du->result() as $tabel)
                                {  $kode1=$tabel->kode_p;
                                   $nama1=$tabel->nama_unit_p;
                                ?>
                                <option data-subtext="<?php echo $kode1; ?>" value="<?php echo $kode1; ?>"><?php echo $nama1; ?></option>";
                             <?php }
                          ?>

                         </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Pemohon </label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="id_user" value="" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Penanggung Jawab </label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="nama_val" value="" readonly="readonly">
                        </div>
                    </div>


                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-danger">Simpan</button>
                </div>
            </form>

<?php }
?>