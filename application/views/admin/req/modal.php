 <!-- <-- ============ MODAL TAMBAH amprah=============== --> 
    <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Permintaan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>

        <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Req/inputamprah'?>">
                <div class="modal-body">
                    <div class="form-group">
                        
                        <div class="row">
                          <label class="control-label col-sm" >Reqno - ID </label>
                          <h6 class="col-sm m-0 font-weight-bold text-success "> TS : <?php echo date("Y-m-d H:i:s");?></h6>
                        </div>

                        
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="reqno" value="<?php echo $kode; ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">

                      <div class="row">
                          <div class="col-sm">
                            <input type="text" class="form-control" name="tanggal_req" placeholder="" value="<?php echo date("Y-m-d");?>" hidden="true">
                          </div>
                          <div class="col-sm">
                            <input type="text" class="form-control" name="waktu_req" placeholder="" value="<?php echo date("H:i:s");?>" hidden="true">
                          </div>
                      </div>
                    </div>
                    
                  

                    <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Ruangan Pemohon</label>
                        <div class="col-xs-8">
                          <select id="basic" name="kode_r" class="selectpicker show-tick form-control" data-live-search="true" required>
                          
                          <option data-subtext="" value="">Pilih</option>
                      <!-- Dropdown unit -->
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

                    <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Unit Pelaksana</label>
                        <div class="col-xs-8">
                          <select id="basic" name="kode_u" class="selectpicker show-tick form-control" data-live-search="true" required>
                          
                          <option data-subtext="" value="">Pilih</option>
                      <!-- Dropdown unit -->
                           <?php
                              foreach ($du->result() as $tabel)
                                {  $kode1=$tabel->kode_p;
                                   $nama1=$tabel->nama_unit_p;
                                ?>
                                <option data-subtext="<?php echo $nama1; ?>" value="<?php echo $kode1; ?>"><?php echo $nama1; ?></option>";
                             <?php }
                          ?>

                         </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Pemohon </label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="id_user" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Penanggung Jawab </label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="nama_val" value="" required>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button  type="submit" class="btn btn-danger">Simpan</button>
                </div>
           </form>

          </div>
        </div>
      </div> 
        <!-- tambahan  --></div>
<!--END MODAL ADD amprah-->

 <!-- <-- ============ MODAL TAMBAH DETAIL AMPRAH=============== --> 
     <div class="modal fade" id="modal_add_det" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Detail Permintaan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>

        <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Req/input_damprah'?>">
                <div class="modal-body">
                    <div class="form-group">
                        
                        <div class="row">
                          <label class="control-label col-sm" >Reqno - ID </label>
                          <h6 class="col-sm m-0 font-weight-bold text-success "> TS : <?php echo date("Y-m-d H:i:s");?></h6>
                        </div>

                        
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="reqno" value="<?php echo $_GET['reqno']; ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">

                      <div class="row">
                          <div class="col-sm">
                            <input type="text" class="form-control" name="tgl_req" placeholder="" value="<?php echo date("Y-m-d");?>" hidden="true">
                          </div>
                          <div class="col-sm">
                            <input type="text" class="form-control" name="wkt_req" placeholder="" value="<?php echo date("H:i:s");?>" hidden="true">
                          </div>
                      </div>
                    </div>
                    
                  

                    <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Jenis Pekerjaan</label>
                        <div class="col-xs-8">
                          <select id="basic" name="jp" class="selectpicker show-tick form-control" data-live-search="true" required>
                          
                          <option data-subtext="" value="" >Pilih</option>
                      <!-- Dropdown unit -->
                           <?php
                            $kd_unit = $_GET['ku'];
                            $dp = $this->db->get_where('tb_jp', array('kode_p' => $kd_unit)) ;

                              foreach ($dp->result() as $tabel)
                                {  $kode=$tabel->kode_jp;
                                   $nama=$tabel->nama_jp;
                                ?>
                                <option data-subtext="<?php echo $nama; ?>" value="<?php echo $kode; ?>"><?php echo $nama; ?></option>";
                             <?php }
                          ?>

                         </select>
                        </div>
                    </div>

                    <input type="text" class="form-control" name="ku" placeholder="" value="<?php echo $kd_unit ?>" hidden="true">

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Uraian Lengkap </label>
                        <div class="col-xs-8">
                          <textarea class="form-control" rows="5" cols="50" name ="det" required></textarea>
                            <!-- <input type="text" class="form-control" name="id_user" value="" readonly="readonly"> -->
                        </div>
                    </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button  type="submit" class="btn btn-danger">Simpan</button>
                </div>
           </form>

          </div>
        </div>
      </div> </div>   
<!--END MODAL DETAIL AMPRAH-->

<!-- ============ MODAL EDIT AMPRAH =============== -->
  <?php 
    if(isset($_GET['reqno']))
  { 
    $idreq = $_GET['reqno'];

    $this->db->select('*');
    $this->db->from('tb_amprah');
    $this->db->join('tb_ruang', 'kode_ruang = kode_r', 'left');
    $this->db->join('tb_unit_p', 'kode_p = kode_pl', 'left');
    $this->db->where('reqno', $idreq);
    $query = $this->db->get();

      $d = $query->row_array();
       $reqno = $d['reqno'];
       $tgl = $d['tanggal_req'];
       $wkt = $d['waktu_req'];
       $kr = $d['kode_ruang'];
       $nr = $d['nama_ruang'];
       $ku = $d['kode_p'];
       $nu = $d['nama_unit_p'];
       $stt = $d['status'];
       $n_val = $d['nama_val'];
       $user = $d['id_user'];

        ?>
        <div class="modal fade" id="modal_edit<?php echo $reqno;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Permintan</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

             <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Req/editamprah'?>">
                <div class="modal-body">
                    <div class="form-group">
                        
                        <div class="row">
                          <label class="control-label col-sm" >Reqno - ID </label>
                          <h6 class="col-sm m-0 font-weight-bold text-success "> TS : <?php echo date("Y-m-d H:i:s");?></h6>
                        </div>

                        
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="reqno" value="<?php echo $idreq; ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">

                      <div class="row">
                          <div class="col-sm">
                            <input type="text" class="form-control" name="tanggal_req" placeholder="" value="<?php echo $tgl;?>" hidden="true">
                          </div>
                          <div class="col-sm">
                            <input type="text" class="form-control" name="waktu_req" placeholder="" value="<?php echo $wkt;?>" hidden="true">
                          </div>
                      </div>
                    </div>
                    
                  

                    <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Ruangan Pemohon</label>
                        <div class="col-xs-8">
                          <select id="basic" name="kode_r" class="selectpicker show-tick form-control" data-live-search="true" required>
                          
                          <option data-subtext="<?php echo $kr; ?>" value="<?php echo $kr; ?>"><?php echo $nr; ?></option>";
                      <!-- Dropdown unit -->
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

                    <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Unit Pelaksana</label>
                        <div class="col-xs-8">
                          <select id="basic" name="kode_u" class="selectpicker show-tick form-control" data-live-search="true" required>

                          <option data-subtext="<?php echo $ku; ?>" value="<?php echo $ku; ?>"><?php echo $nu;?></option>";
                      <!-- Dropdown unit -->
                           <?php
                              foreach ($du->result() as $tabel)
                                {  $kode1=$tabel->kode_p;
                                   $nama1=$tabel->nama_unit_p;
                                ?>
                                <option data-subtext="<?php echo $nama1; ?>" value="<?php echo $kode1; ?>"><?php echo $nama1; ?></option>";
                             <?php }
                          ?>

                         </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Pemohon </label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="id_user" value="<?php echo $user; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Penanggung Jawab </label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="nama_val" value="<?php echo $n_val; ?>" required>
                        </div>
                    </div>

                    <input type="text" class="form-control" name="status" value="<?php echo $stt; ?>" hidden="true" >

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button  type="submit" class="btn btn-danger">Simpan</button>
                </div>
           </form>
            </div>
            </div>
        </div> </div>  
        <?php } ?> 
<!--END MODAL EDIT AMPRAH-->

<!-- <-- ============ MODAL Edit DETAIL AMPRAH=============== --> 
  <?php 
  if (isset($_GET['reqno'])){
      $idreq = $_GET['reqno'];
      $this->db->select('*');
      $this->db->from('tb_det_amprah');
      $this->db->join('tb_jp', 'kode_jp = jp', 'left');
      $this->db->where('reqno', $idreq);
      $mamp = $this->db->get();

       foreach($mamp->result_array() as $i):

                                    $tgl=$i['tgl_req'];
                                    $wkt=$i['wkt_req'];
                                    $no=$i['id'];
                                    $id=$i['reqno'];
                                    $jp=$i['nama_jp'];
                                    $kjp=$i['jp'];
                                    $sval=$i['status_val'];
                                    $dsc=$i['uraian'];
                                    $sres=$i['status_res'];
                                    $pet=$i['petugas'];
                              ?>
     <div class="modal fade" id="modal_edit_det<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Detail Permintaan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>

        <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Req/edit_damprah'?>">
                <div class="modal-body">
                    <div class="form-group">
                        
                        <div class="row">
                          <label class="control-label col-sm" >Reqno - ID </label>
                          <h6 class="col-sm m-0 font-weight-bold text-success "> TS : <?php echo date("Y-m-d H:i:s");?></h6>
                        </div>

                        
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="reqno" value="<?php echo $_GET['reqno']; ?>" readonly="readonly">

                             <input type="text" class="form-control" name="id" value="<?php echo $no; ?>" hidden="true">
                        </div>
                    </div>

                    <div class="form-group">

                      <div class="row">
                          <div class="col-sm">
                            <input type="text" class="form-control" name="tgl_req" placeholder="" value="<?php echo $tgl;?>" hidden="true">
                          </div>
                          <div class="col-sm">
                            <input type="text" class="form-control" name="wkt_req" placeholder="" value="<?php echo $wkt;?>" hidden="true">
                          </div>
                      </div>
                    </div>
                    
                  

                    <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Jenis Pekerjaan</label>
                        <div class="col-xs-8">
                          <select id="basic" name="jp" class="selectpicker show-tick form-control" data-live-search="true" required>
                          
                          <option data-subtext="<?php echo $jp; ?>" value="<?php echo $kjp; ?>"><?php echo $jp; ?></option>
                      <!-- Dropdown unit -->
                           <?php
                            $kd_unit = $_GET['ku'];
                            $dp = $this->db->get_where('tb_jp', array('kode_p' => $kd_unit)) ;

                              foreach ($dp->result() as $tabel)
                                {  $kode=$tabel->kode_jp;
                                   $nama=$tabel->nama_jp;
                                ?>
                                <option data-subtext="<?php echo $nama; ?>" value="<?php echo $kode; ?>"><?php echo $nama; ?></option>";
                             <?php }
                          ?>

                         </select>
                        </div>
                    </div>

                    <input type="text" class="form-control" name="ku" placeholder="" value="<?php echo $kd_unit ?>" hidden="true">

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Uraian Lengkap </label>
                        <div class="col-xs-8">
                          <textarea class="form-control" rows="5" cols="50" name ="det" value="<?php echo $dsc; ?>" required><?php echo $dsc; ?></textarea>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button  type="submit" class="btn btn-danger">Simpan</button>
                </div>
           </form>

          </div>
        </div>
      </div> </div>   
       <?php endforeach;  } ?>
<!--END MODAL DETAIL AMPRAH-->


<!-- <-- ============ MODAL RESPONS DETAIL AMPRAH=============== --> 
  <?php 
  if (isset($_GET['reqno'])){
      $idreq = $_GET['reqno'];
      $this->db->select('*');
      $this->db->from('tb_det_amprah');
      $this->db->join('tb_jp', 'kode_jp = jp', 'left');
      $this->db->where('reqno', $idreq);
      $mamp = $this->db->get();

       foreach($mamp->result_array() as $i):

                                    $tgl=$i['tgl_req'];
                                    $wkt=$i['wkt_req'];
                                    $no=$i['id'];
                                    $id=$i['reqno'];
                                    $jp=$i['nama_jp'];
                                    $kjp=$i['jp'];
                                    $sval=$i['status_val'];
                                    $dsc=$i['uraian'];
                                    $sres=$i['status_res'];
                                    $pet=$i['petugas'];
                              ?>
     <div class="modal fade" id="modal_respons<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Respons Petugas</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>

        <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Req/edit_respon'?>">
                <div class="modal-body">
                    <div class="form-group">
                        
                        <div class="row">
                          <label class="control-label col-sm" >Reqno - ID </label>
                          <h6 class="col-sm m-0 font-weight-bold text-success "> TS : <?php echo date("Y-m-d H:i:s");?></h6>
                        </div>

                        
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="reqno" value="<?php echo $_GET['reqno']; ?>" readonly="readonly">

                             <input type="text" class="form-control" name="id" value="<?php echo $no; ?>" hidden="true">
                        </div>
                    </div>

                    <div class="form-group">

                      <div class="row">
                          <div class="col-sm">
                            <input type="text" class="form-control" name="tgl_req" placeholder="" value="<?php echo $tgl;?>" hidden="true">
                          </div>
                          <div class="col-sm">
                            <input type="text" class="form-control" name="wkt_req" placeholder="" value="<?php echo $wkt;?>" hidden="true">
                          </div>
                      </div>
                    </div>
                    
                  
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Uraian Lengkap </label>
                        <div class="col-xs-8">
                          <textarea readonly class="form-control" rows="2" cols="20" name ="det" value="<?php echo $dsc; ?>" required><?php echo $dsc; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Validasi Status</label>
                        <div class="col-xs-8">
                          <select id="basic" name="vs" class="selectpicker show-tick form-control" data-live-search="true" required>
                          
                          <?php  
                              if ($sval == '1') {
                                $ns = 'Evaluasi';
                              }if ($sval=='2') {
                                 $ns = 'Proses';
                              }if ($sval=='3') {
                                 $ns = 'Selesai';
                              }
                              ?>
                          <option data-subtext="<?php echo $sval;?>" value="<?php echo $sval;?>"><?php echo $ns ;?></option>
                      <!-- Dropdown unit -->
                           <?php
                            
                            $ds = $this->db->get('tb_status') ;

                              foreach ($ds->result() as $s)
                                {  $kode=$s->id_status;
                                   $status=$s->mstatus;
                                ?>
                                <option data-subtext="<?php echo $kode; ?>" value="<?php echo $kode; ?>"><?php echo $status; ?></option>";
                             <?php }
                          ?>

                         </select>
                        </div>
                    </div>

                    <input type="text" class="form-control" name="ku" placeholder="" value="<?php echo $kd_unit ?>" hidden="true">

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Catatan </label>
                        <div class="col-xs-8">
                          <textarea class="form-control" rows="2" cols="20" name ="respon" value="<?php echo $sres; ?>" required><?php echo $sres; ?></textarea>
                        </div>
                    </div>

                      <div class="form-group">
                        <label for="basic" class="control-label col-xs-3" >Petugas</label>
                        <div class="col-xs-8">
                          <select id="basic" name="petugas" class="selectpicker show-tick form-control" data-live-search="true" required>
                          <?                    
                            $pet1 = $this->db->get_where('tb_petugas', array('id_petugas' => $pet)) ;

                              foreach ($pet1->result() as $t)
                                {  $kode1=$t->id_petugas;
                                   $nama1=$t->nama_petugas;
                          ?>
                          <option data-subtext="" value="<?php echo $kode1;?>"><?php echo $nama1 ;?></option>
                        <?php } ?>

                      <!-- Dropdown unit -->
                           <?php
                            
                            $dpet = $this->db->get('tb_petugas') ;
                              foreach ($dpet->result() as $p)
                                {  $kode=$p->id_petugas;
                                   $nama=$p->nama_petugas;
                                ?>
                                <option data-subtext="<?php echo $kode; ?>" value="<?php echo $kode; ?>"><?php echo $nama; ?></option>";
                             <?php }
                          ?>

                         </select>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button  type="submit" class="btn btn-danger">Simpan</button>
                </div>
           </form>

          </div>
        </div>
      </div> </div>   
       <?php endforeach;  } ?>
<!--END MODAL RESPONS AMPRAH-->

<!-- ============ MODAL HAPUS det =============== -->
      <?php 
      if (isset($_GET['reqno'])) {
        # code...
   
      $idreq = $_GET['reqno'];
      $kunit = $_GET['ku'];
      $this->db->select('*');
      $this->db->from('tb_det_amprah');
      $this->db->join('tb_jp', 'kode_jp = jp', 'left');
      $this->db->where('reqno', $idreq);
      $mamp = $this->db->get();

       foreach($mamp->result_array() as $i):
                                    $no=$i['id'];
                                    $id=$i['reqno'];
                                    $jp=$i['nama_jp'];
                                    $kjp=$i['jp'];
                                    $sval=$i['status_val'];
                                    $dsc=$i['uraian'];
                              ?>

          <div class="modal fade" id="modal_hapus_det<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus detail Permintaan </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>


            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Req/hapus_det'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $dsc;?></b></p>
                </div>
                <div class="modal-footer">
                   <input type="text" class="form-control" name="reqno" value="<?php echo $id; ?>" hidden="true">
                    <input type="text" class="form-control" name="kode_u" value="<?php echo $kunit; ?>" hidden="true">

                    <input type="hidden" name="id" value="<?php echo $no;?>">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <?php endforeach; } ?>
<!-- END MODAL HAPUS det -->

<!-- ============ MODAL HAPUS amprah =============== -->
      <?php 
         foreach($tampil->result_array() as $i):
            $id=$i['reqno'];
        ?>
          <div class="modal fade" id="modal_hapus_tot<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Permintaan</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>


            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Daftar/hapus_amp'?>">
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus semua record <b><?php echo $id;?></b> <br>
                    Data yang sudah terhapus tidak dapat dikembalikan</p>
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
        <?php endforeach;     ?>
<!--END MODAL HAPUS amprah---->