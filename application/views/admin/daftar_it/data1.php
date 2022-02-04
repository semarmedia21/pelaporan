

<?php  foreach ($hitung_data as $i): 
?>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-baru-tab" data-toggle="pill" href="#pills-baru" role="tab" aria-controls="pills-baru" aria-selected="true">ANTRIAN BARU <span class="badge badge-danger blinking"> <?= $i->baru?> </span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-proses-tab" data-toggle="pill" href="#pills-proses" role="tab" aria-controls="pills-proses" aria-selected="false">DALAM PROSES <span class="badge badge-warning blinking"> <?= $i->proses?> </span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-selesai-tab" data-toggle="pill" href="#pills-selesai" role="tab" aria-controls="pills-selesai" aria-selected="false">SELESAI <span class="badge badge-success blinking"><?= $i->selesai ?> </span></a>
  </li>
</ul>
<?php endforeach; ?>

<div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-baru" role="tabpanel" aria-labelledby="pills-baru-tab">
        <div style="float:right;">
        <div class="input-group" >
            <div class="input-group-prepend">
                <button class="btn btn-primary mb-3"><span class="input-group-addon"><i class="fas fa-search "></i></span></button>
            </div>
             <input class="form-control small mb-3 " id="cari1" type="text" placeholder="Search.." aria-discribedby="basic-addon2">
        </div>
        </div>

          <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th><center></center></th>
                                        <th><center>Reqno</center></th>
                                        <th><center>Tanggal</center></th>
                                        <th><center>Pemohon</center></th>
                                        <th><center>Unit Asal</center></th>
                                        <th><center>Pelaksana - Pekerjaan</center></th>
                                        <th><center>Status</center></th>
                                        <th><center>Petugas</center></th>
                                        <th><center>Jumlah Detail</center></th>
                                        
                                    </tr>
                                </thead>
                                <tbody id="tabelbaru">
                                 <?php 

                                    foreach($data_baru->result_array() as $d):
                                         $reqno = $d['reqno'];
                                         $tgl = $d['tanggal_req'];
                                         $wkt = $d['waktu_req'];
                                         $kr = $d['kode_ruang'];
                                         $nr = $d['nama_ruang'];
                                         $ku = $d['kode_p'];
                                         $nu = $d['nama_unit_p'];
                                         $jp = $d['nama_jp'];
                                         $stt = $d['status_val'];
                                         $n_val = $d['nama_val'];
                                         $pet = $d['nama_petugas'];
                                         $user = $d['id_user'];

                                                $this->db->where('reqno', $reqno);
                                                $this->db->from('tb_det_amprah');
                                         $cnt = $this->db->count_all_results();
                                  ?>
                                
                                <tr>  
                                <td></td>
                                <td><?php echo $reqno;?></td>
                                <td><?php echo $tgl.' - ' .$wkt;?></td>
                                <td><?php echo $user;?></td>
                                <td><?php echo $nr;?></td>
                                <td><?php echo $nu.' - ' .$jp;?></td>
                                <td>
                                <?php
                                if ($stt=='1') { ?>
                                  <a class="btn btn-danger btn-icon-split btn-block btn-sm ">
                                      <span class="text">
                                         Evaluasi..
                                        </span>
                                   </a> 
                               <?php } 
                               if ($stt=='2') { ?>
                                  <a class="btn btn-warning btn-icon-split btn-block btn-sm " >
                                      <span class="text">
                                         Proses..
                                        </span>
                                   </a> 
                               <?php }                           
                               if ($stt=='3') { ?>
                                  <a class="btn btn-success btn-icon-split btn-block btn-sm">
                                      <span class="text">
                                         Selesai
                                        </span>
                                   </a> 
                               <?php } ?>

                                </td>

                                <td><?php echo $pet;?></td>

                                <td> <center>
                                <a data-placement="top" data-toggle="modal" data-target="#modal_show_det<?php echo $reqno; ?>" data-popup="tooltip" title="<?php echo $reqno; ?>"  class="btn btn-primary btn-circle ">
                                    <span class="font-weight-bold"> <?php echo $cnt; ?> </span></a>
                                    <a  href="<?php echo base_url().'index.php/admin/req?reqno='.$reqno.'&ku='.$ku?>"  class="fas fa-user-check btn-success btn-circle  "></a>
                                </center></td>                              
                              </tr>
                             <?php endforeach;?>
                              </tbody>
              </table>
          </div>
       </div>


        <div class="tab-pane fade" id="pills-proses" role="tabpanel" aria-labelledby="pills-proses-tab">
           <div class="table-responsive">
             <div style="float:right;">
                <div class="input-group" >
                    <div class="input-group-prepend">
                        <button class="btn btn-primary mb-3"><span class="input-group-addon"><i class="fas fa-search "></i></span></button>
                    </div>
                     <input class="form-control small mb-3 " id="cari2" type="text" placeholder="Search.." aria-discribedby="basic-addon2">
                </div>
             </div>
              <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th><center></center></th>
                                        <th><center>Reqno</center></th>
                                        <th><center>Tanggal</center></th>
                                        <th><center>Pemohon</center></th>
                                        <th><center>Unit Asal</center></th>
                                        <th><center>Pelaksana - Pekerjaan</center></th>
                                        <th><center>Status</center></th>
                                        <th><center>Petugas</center></th>
                                        <th><center>Jumlah Detail</center></th>
                                        
                                    </tr>
                                </thead>
                            
                            <tbody id='tabelproses'>
                             <?php 

                                foreach($data_proses->result_array() as $d):
                                     $reqno = $d['reqno'];
                                     $tgl = $d['tanggal_req'];
                                     $wkt = $d['waktu_req'];
                                     $kr = $d['kode_ruang'];
                                     $nr = $d['nama_ruang'];
                                     $ku = $d['kode_p'];
                                     $nu = $d['nama_unit_p'];
                                     $jp = $d['nama_jp'];
                                     $stt = $d['status_val'];
                                     $n_val = $d['nama_val'];
                                     $pet = $d['nama_petugas'];
                                     $user = $d['id_user'];

                                            $this->db->where('reqno', $reqno);
                                            $this->db->from('tb_det_amprah');
                                     $cnt = $this->db->count_all_results();


                              ?>
                              
                            <tr>  
                                <td></td>
                                <td><?php echo $reqno;?></td>
                                <td><?php echo $tgl.' - ' .$wkt;?></td>
                                <td><?php echo $user;?></td>
                                <td><?php echo $nr;?></td>
                                <td><?php echo $nu.' - ' .$jp;?></td>
                                <td>
                                <?php
                                if ($stt=='1') { ?>
                                  <a class="btn btn-danger btn-icon-split btn-block btn-sm ">
                                      <span class="text">
                                         Evaluasi..
                                        </span>
                                   </a> 
                               <?php } 
                               if ($stt=='2') { ?>
                                  <a class="btn btn-warning btn-icon-split btn-block btn-sm " >
                                      <span class="text">
                                         Proses..
                                        </span>
                                   </a> 
                               <?php }                           
                               if ($stt=='3') { ?>
                                  <a class="btn btn-success btn-icon-split btn-block btn-sm">
                                      <span class="text">
                                         Selesai
                                        </span>
                                   </a> 
                               <?php } ?>

                                </td>

                                <td><?php echo $pet;?></td>

                                <td> <center>
                                <a data-placement="top" data-toggle="modal" data-target="#modal_show_det<?php echo $reqno; ?>" data-popup="tooltip" title="<?php echo $reqno; ?>"  class="btn btn-primary btn-circle ">
                                    <span class="font-weight-bold"> <?php echo $cnt; ?> </span></a>

                                    <a  href="<?php echo base_url().'index.php/admin/req?reqno='.$reqno.'&ku='.$ku?>"  class="fas fa-user-check btn-success btn-circle  "></a>
                                  

                                </center></td>
                               
                                 
                                    </tr>
                             <?php endforeach;?>
                                    </tbody>
                                        </table>
                </div>
          </div>
     

        <!-- list tab igd -->
          <div class="tab-pane fade" id="pills-selesai" role="tabpanel" aria-labelledby="pills-selesai-tab">
            <!-- TABEL NAMA IGD -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th><center></center></th>
                                        <th><center>Reqno</center></th>
                                        <th><center>Tanggal</center></th>
                                        <th><center>Pemohon</center></th>
                                        <th><center>Unit Asal</center></th>
                                        <th><center>Pelaksana - Pekerjaan</center></th>
                                        <th><center>Status</center></th>
                                        <th><center>Petugas</center></th>
                                        <th><center>Jumlah Detail</center></th>
                                        
                                    </tr>
                                </thead>
                            <tbody>
                             <?php 

                                foreach($data_selesai->result_array() as $d):
                                     $reqno = $d['reqno'];
                                     $tgl = $d['tanggal_req'];
                                     $wkt = $d['waktu_req'];
                                     $kr = $d['kode_ruang'];
                                     $nr = $d['nama_ruang'];
                                     $ku = $d['kode_p'];
                                     $nu = $d['nama_unit_p'];
                                     $jp = $d['nama_jp'];
                                     $stt = $d['status_val'];
                                     $n_val = $d['nama_val'];
                                     $pet = $d['nama_petugas'];
                                     $user = $d['id_user'];

                                            $this->db->where('reqno', $reqno);
                                            $this->db->from('tb_det_amprah');
                                     $cnt = $this->db->count_all_results();


                              ?>

                            <tr>  
                                <td></td>
                                <td><?php echo $reqno;?></td>
                                <td><?php echo $tgl.' - ' .$wkt;?></td>
                                <td><?php echo $user;?></td>
                                <td><?php echo $nr;?></td>
                                <td><?php echo $nu.' - ' .$jp;?></td>
                                <td>
                                <?php
                                if ($stt=='1') { ?>
                                  <a class="btn btn-danger btn-icon-split btn-block btn-sm ">
                                      <span class="text">
                                         Evaluasi..
                                        </span>
                                   </a> 
                               <?php } 
                               if ($stt=='2') { ?>
                                  <a class="btn btn-warning btn-icon-split btn-block btn-sm " >
                                      <span class="text">
                                         Proses..
                                        </span>
                                   </a> 
                               <?php }                           
                               if ($stt=='3') { ?>
                                  <a class="btn btn-success btn-icon-split btn-block btn-sm">
                                      <span class="text">
                                         Selesai
                                        </span>
                                   </a> 
                               <?php } ?>

                                </td>

                                <td><?php echo $pet;?></td>

                                <td> <center>
                                <a data-placement="top" data-toggle="modal" data-target="#modal_show_det<?php echo $reqno; ?>" data-popup="tooltip" title="<?php echo $reqno; ?>"  class="btn btn-primary btn-circle ">
                                    <span class="font-weight-bold"> <?php echo $cnt; ?> </span></a>
                                  

                                    <a  href="<?php echo base_url().'index.php/admin/req?reqno='.$reqno.'&ku='.$ku?>"  class="fas fa-user-check btn-success btn-circle  "></a>
                                  

                                </center></td>
                               
                                 
                         </tr>
                             <?php endforeach;?>
                                     </tbody>
                                    </table>
            </div>
      </div>


</div>






 