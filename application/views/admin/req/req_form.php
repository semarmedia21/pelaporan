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

   <button type="button" class="btn button btn-danger btn-md" data-toggle="modal" data-target="#modal_add_det"> <i class="fa fa-plus-circle"></i> Tambah Detail dan item Perbaikan </button>
   
  <form class="form-horizontal" method="post" action="'?>">
                <div class="modal-body">
                    <div class="form-group">
                        
                        <div class="row">
                          <label class="control-label col-sm" >Reqno - ID </label>
                        </div>    
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="reqno" value="<?php echo $reqno  ; ?>" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                          <div class="col-sm">
                            <input type="text" class="form-control" name="tanggal_req" placeholder="" value="<?php echo $tgl;?>" readonly="readonly">
                          </div>
                          <div class="col-sm">
                            <input type="text" class="form-control" name="waktu_req" placeholder="" value="<?php echo $wkt ;?>" readonly="readonly">
                          </div>
                      </div>
                    </div>
                    
                  
                  <div class="row">
                    <div class="col-sm">
                    <label for="basic" class="control-label col-xs-3" >Ruangan Pemohon</label>
                    </div>
                    <div class="col-sm">
                    <label for="basic" class="control-label col-xs-3" >Unit Pelaksana</label>
                    </div>
                  </div>

                <div class="form-group">
                  <div class="row">
                        <div class="col-sm">
                            <input type="text" class="form-control" name="tanggal_req" placeholder="" value="<?php echo $nr;?>" readonly="readonly">
                          </div>
                          <div class="col-sm">
                            <input type="text" class="form-control" name="waktu_req" placeholder="" value="<?php echo $nu ;?>" readonly="readonly">
                          </div>
                        </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                        <label class="control-label col-xs-3" >Nama Pemohon </label>
                        </div>
                        <div class="col-sm">
                        <label class="control-label col-xs-3" >Penanggung Jawab </label>
                      </div>
                    </div>
                      
                      <div class="row">
                        <div class="col-sm">
                            <input type="text" class="form-control" name="id_user" value="<?php echo $user; ?>" readonly="readonly">
                        </div>
                   
                        <div class="col-sm">
                            <input type="text" class="form-control" name="nama_val" value="<?php echo $n_val; ?>" readonly="readonly">
                        </div>
                    </div>
                  </div>

                <div class="py-2">
                   <hr>
                   <div class="row">
                    <div class="col-sm">
                    
                    <a data-toggle="modal" data-target="#modal_edit<?php echo $reqno;?>" class="btn btn-info btn-icon-split">
                      <span class="icon text-white-50">
                         <i class="fas fa-pencil-alt"></i>
                            </span>
                             <span class="text"> &nbsp  Edit  &nbsp  </span>
                              </a>

                      <a href="#" class="btn btn-danger btn-icon-split" data-placement="top" data-toggle="modal" data-target="#modal_hapus_tot<?php echo $reqno; ?>">
                      <span class="icon text-white-50">
                         <i class="fas fa-trash-alt"></i>
                            </span>
                            <span class="text">Hapus / Batal</span>
                            </a>
                        </div>
                      

                    <div class="col-sm d-flex flex-row-reverse">
                      <a class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#modal_add_new ">
                      <span class="icon text-white-50">
                         <i class="fas fa-angle-double-right"></i>
                            </span>
                            <span class="text">Tambah Permintaan lainya</span>
                            </a> </div>
                      </div>
                      </div>
                    
                
           </form>

            

<?php }

else{ 

  // redirect("admin/Req");
  
}



  ?>


 