
 <?php if(isset($_GET['reqno'])){ 

 	$idreq = $_GET['reqno'];

$this->db->select('*');
$this->db->from('tb_det_amprah');
$this->db->join('tb_jp', 'kode_jp = jp', 'left');
$this->db->join('tb_petugas', 'id_petugas = petugas', 'left');
$this->db->join('tb_status', 'id_status = status_val', 'left');
$this->db->where('reqno', $idreq);
    $damp = $this->db->get();
       ?>

  
     

                            <div class="d-sm-flex align-items-center justify-content-between mb-4">     
                            <p class=" mb-0 text-gray-800">Mohon isi detail permintaan dan uraian lengkap dengan klik tombol tambah </p> </div>
                            
                            <button type="button" class="btn button btn-danger btn-md" data-toggle="modal" data-target="#modal_add_det"> <i class="fa fa-plus-circle"></i> Tambah Detail dan item Perbaikan </button>
                            <hr>

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
                                        <th><center>Action</center></th> 
                                   
                                    </tr>
                                </thead>
                        
                             <?php 
                           foreach($damp->result_array() as $i):
                                    $no=$i['id'];
                                    $id=$i['reqno'];
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
                               <?php } ?>
                                  
                                </td>

                                <td><?php echo $sres;?></td>
                                <td><?php echo $pet;?></td>
                                
                    <td >

                    <a class="btn btn-small text-secondary" data-popup="tooltip" title="Edit Data" data-placement="top" data-toggle="modal" data-target="#modal_edit_det<?php echo $no;?>"> <i class="fas fa-edit"></i> Edit</a>

                    <a class="btn btn-small text-danger" data-popup="tooltip" title="Hapus Data" data-placement="top" data-toggle="modal" data-target="#modal_hapus_det<?php echo $no;?>"> <i class="fas fa-trash"></i> Hapus</a>

                    <?  if(isset($aks)=='1'){ ?>
                     <a class="btn btn-small text-success" data-popup="tooltip" title="Respons" data-placement="top" data-toggle="modal" data-target="#modal_respons<?php echo $no;?>"> <i class="fas fa-check"></i> Response</a>
                   <? } ?>
                         </td>   

                         </tr>
                             <?php endforeach;?>
                                     </tbody>
                                </table>
                            </div>
                   


   <?php  } ?>