                        <div class="card-body">
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
                        
                             <?php 

                                foreach($data->result_array() as $d):
                                     $reqno = $d['reqno'];
                                     $tgl = $d['tanggal_req'];
                                     $wkt = $d['waktu_req'];
                                     $kr = $d['kode_ruang'];
                                     $nr = $d['nama_ruang'];
                                     $ku = $d['kode_p'];
                                     $nu = $d['nama_unit_p'];
                                     $jp = $d['nama_jp'];
                                     $stt = $d['status'];
                                     $n_val = $d['nama_val'];
                                     $pet = $d['nama_petugas'];
                                     $user = $d['id_user'];

                                            $this->db->where('reqno', $reqno);
                                            $this->db->from('tb_det_amprah');
                                     $cnt = $this->db->count_all_results();


                              ?>
                            <tr>
                          
                          <td>
                                <!-- <div class="dropdown col-sm">
                                  <button class="btn btn-info  dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <span class="text"> Action</span>
                                           
                                        </button>
                                        <div class="dropdown-menu animated--fade-in"
                                            aria-labelledby="dropdownMenuButton">
                                            
                                            <?php if(isset($aks)=='1'){ ?>
                                            <a class="dropdown-item" data-placement="top" data-toggle="modal" data-target="#modal_status<?php echo $reqno; ?>" >Update Status</a>  
                                          <?php } ?>
                            
                                            <a class="dropdown-item" href="<?php echo base_url().'index.php/admin/req?reqno='.$reqno.'&ku='.$ku?>">Edit</a>

                                            <a class="dropdown-item" data-placement="top" data-toggle="modal" data-target="#modal_hapus<?php echo $reqno; ?>" >Hapus</a> 
                                        </div> -->

                                  
                         </td>  

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


 