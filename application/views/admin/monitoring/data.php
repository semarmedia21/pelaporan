                            <div class="table-responsive">
                              <!-- table table-hover table-striped table-bordered -->
                               <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modal_download"><i class="fa fa-download"></i> DOWNLOAD EXCEL </button>   
                               <hr>

                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th><center></center></th>
                                        <th><center>Tanggal</center></th>
                                        <th><center>Monitoring Software</center></th>
                                        <th><center>Monitoring Hardware</center></th>
                                        <th><center>Monitoring Jaringan</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                        
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
                              ?>
                            <tr>
                              <td width="5"></td>
                                <td width="100"><?php echo $tgl;?></td>

                                <td width="250"><?php echo $q1 ?> <hr> 
                                  <?php if($q1 == 'Terdapat masalah / kendala') { ?>
                                  Masalah  : <?php echo $soft; ?><hr> 
                                  solusi  : <?php echo $ssoft; 
                                  } ?>
                                  </td>

                                <td width="250"><?php echo $q2 ;?><hr>
                                   <?php if($q2 == 'Terdapat masalah / kendala') { ?>
                                  Masalah : <?php echo $hard;?><hr> 
                                  solusi : <?php echo $shard; 
                                  }?> </td>

                                <td width="250"><?php echo $q3 ;?><hr>
                                   <?php if($q3 == 'Terdapat masalah / kendala') { ?>
                                  Masalah : <?php echo $jar;?><hr> 
                                  solusi : <?php echo $sjar; 
                                  }?></td>

                                <td width="150">

                    <a class="btn btn-small text-secondary" data-popup="tooltip" title="Edit Data" data-placement="top" data-toggle="modal" data-target="#modal_edit<?php echo $id;?>"> <i class="fas fa-edit"></i> Edit</a>

                    <a class="btn btn-small text-danger" data-popup="tooltip" title="Hapus Data" data-placement="top" data-toggle="modal" data-target="#modal_hapus<?php echo $id;?>"> <i class="fas fa-trash"></i> Hapus</a>
                         </td>   
                         </tr>
                             <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                   


