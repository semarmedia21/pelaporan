<?php 

foreach($data->result_array() as $d):
    $idreq = $d['reqno'];
?>
      
    <div class="modal fade" id="modal_show_det<?php echo $idreq;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Permintan</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
              
              <?php
               $this->db->select('*');
                $this->db->from('tb_det_amprah');
                $this->db->join('tb_jp', 'kode_jp = jp', 'left');
                $this->db->join('tb_petugas', 'id_petugas = petugas', 'left');
                $this->db->join('tb_status', 'id_status = status_val', 'left');
                $this->db->where('reqno', $idreq);
                $damp = $this->db->get();
                ?>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th><center>Reqno</center></th>
                                        <th><center>Jenis Perbaikan</center></th>
                                        <th><center>Uraian</center></th>
                                        <th><center>Validasi Status</center></th>
                                        <th><center>Response</center></th>
                                        <th><center>Petugas</center></th>
                                     
                                      <?php if(isset($aks)=='1'){ ?>
                                        <th><center>Action</center></th> <?php } ?>
                                    </tr>
                                </thead>
                        
                             <?php 
                           foreach($damp->result_array() as $i){

                          
                                    $no=$i['id'];
                                    $id=$i['reqno'];
                                    $ku=$i['kode_p'];
                                    $jp=$i['nama_jp'];
                                    $sval=$i['id_status'];
                                    $sres=$i['status_res'];
                                    $dsc=$i['uraian'];
                                    $pet=$i['nama_petugas'];
                              ?>
                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo $jp;?></td>
                                <td><?php echo $dsc;?></td>
                                 <td>
                                   <?php
                                if ($sval=='1') { ?>
                                  <a class="btn btn-danger btn-icon-split btn-block btn-sm ">
                                      <span class="text">
                                         Evaluasi
                                        </span>
                                   </a> 
                               <?php } 
                               if ($sval=='2') { ?>
                                  <a class="btn btn-warning btn-icon-split btn-block btn-sm " >
                                      <span class="text">
                                         Proses
                                        </span>
                                   </a> 
                               <?php }                           
                               if ($sval=='3') { ?>
                                  <a class="btn btn-success btn-icon-split btn-block btn-sm">
                                      <span class="text">
                                         Selesai
                                        </span>
                                   </a> 
                               <?php }
                                } ?>
                                  
                                </td>
                                <td><?php echo $sres;?></td>
                                <td><?php echo $pet;?></td>
   
                <?php if(isset($aks)=='1'){ ?>
                    <td width="100">
                      <a  href="<?php echo base_url().'index.php/admin/req?reqno='.$id.'&ku='.$ku?>"  class="fas fa-user-check btn-success btn-circle  "></a>
                    </td>   
                         <?php }?>
                         </tr>
                                     </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
            </div>
        </div> 
<?php endforeach;?>
            
  

<!--lihat-->

<!-- ============ MODAL HAPUS JP =============== -->
      <?php 
         foreach($data->result_array() as $i):
            $id=$i['reqno'];
        ?>
          <div class="modal fade" id="modal_hapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <?php endforeach;?>
<!--END MODAL HAPUS JP---->

<!-- ============ UPDATE STATUS =============== -->
      <?php 
         foreach($data->result_array() as $i):
            $id=$i['reqno'];
            $stt = $i['status']
        ?>
          <div class="modal fade" id="modal_status<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>


            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Daftar/update_status'?>">

              <div class="modal-body">

                <label for="basic" class="control-label col-xs-3" >Update Status</label>
                        <div class="col-xs-8">
                          <select id="basic" name="status_val" class="selectpicker show-tick form-control" data-live-search="true">
                              <?php  
                              if ($stt == '1') {
                                $ns = 'Evaluasi';
                              }if ($stt=='2') {
                                 $ns = 'Proses';
                              }if ($stt=='3') {
                                 $ns = 'Selesai';
                              }
                              ?>
                          <option data-subtext="" value="<?php echo $stt;?>"><?php echo $ns ;?></option>
                      <!-- Dropdown unit -->
                           <?php
                              foreach ($dd_st->result() as $tabel)
                                {  $kode=$tabel->id_status;
                                   $nama=$tabel->mstatus;
                                ?>
                                <option data-subtext="<?php echo $kode; ?>" value="<?php echo $kode; ?>"><?php echo $nama; ?></option>";
                             <?php }?>
                         </select>
                        </div>
                
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-danger">Simpan</button>
                </div>
              </div>
            </form>
            </div>
            </div>
        </div>
        <?php endforeach;?>