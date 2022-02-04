              

                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Unit Pelaksana</h6>
                        </div>

                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus-circle"></i> Tambah </button>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                      
                                    <tr>

                                        <th><center>Kode Unit </center></th>
                                        <th><center>Nama unit</center></th>
                                        <th><center>Action</center></th>
                                        
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php foreach ($all as $unit): ?>
                                    <tr>
                                        <td width="150">
                                            <?php echo $unit->kode_p ?>
                                        </td>
                                        <td>
                                            <?php echo $unit->nama_unit_p ?>
                                        </td>

                                <td  width="250">
                                 
                                    <div class="tooltip-demo">
                      

                                      <a data-toggle="modal" data-target="#modal-edit<?=$unit->id_unit_p;?>" class="btn btn-small text-secondary" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i>Edit</a>

                                    

                                      <a data-popup="tooltip" data-placement="top" title="Hapus Data" onclick="deleteConfirm(' <?php echo site_url('admin/unit_p/hapus/'.$unit->id_unit_p) ?>')"
                                             href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                    </div>
                                
                              </td>
                                                                               
                                     
                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>


                                </table>
                            </div>
                        </div>
                    </div>

               


