<!-- ============ MODAL aktifkan=============== -->
  <?php foreach($data_regno as $row):
     $nrm = $row->NRM;
        $regno = $row->regno;
        $nama = $row->Nama;
         $alamat = $row->Alamat;
         $kab= $row->kabupaten; 
         $ci = $row->dateCI;
         $srawat = $row->StatusRawat;
                       if($srawat=='1') {
                           $sr='Rawat Jalan';
                       }elseif($srawat=='2'){
                          $sr='Rawat Inap';
                       }elseif($srawat=='3'){
                          $sr='IGD';
                       }
        $flag =  $row->flag;
        $po =  $row->pas_out;                     
      ?>

      <div class="modal fade" id="modal_aktif<?php echo $regno;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">AKTIFKAN PASIEN</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Sim/aktifkan_px'?>">
                <div class="modal-body">
                  <h2>YAKIN AKTIFKAN...????? CEK KEMBALI YA BROOOO....!!!</h2>
                    <div class="form-group">
                      <label>NRM</label>
                            <input name="nrm" value="<?php echo $nrm;?>" class="form-control" type="text"readonly>
                    </div>

                    <div class="form-group">
                      <label>REGNO</label>
                            <input name="regno" value="<?php echo $regno;?>" class="form-control" type="text" placeholder="id unit" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                            <input name="nrm" value="<?php echo $nama;?>" class="form-control" type="text"readonly>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                            <input name="alamat" value="<?php echo $alamat;?>"  class="form-control" type="text" readonly>
                    </div>
                    <div class="form-group">
                      <label>Kabupaten</label>
                            <input name="kabupaten" value="<?php echo $kab;?>" class="form-control" type="text"  readonly>
                    </div>
                    <div class="form-group">
                      <label>MRS</label>
                            <input name="MRS" value="<?php echo $ci;?>" class="form-control" type="text"  readonly>
                    </div>
                    <div class="form-group">
                      <label>Status Rawat</label>
                            <input name="srawat" value="<?php echo $sr;?>" class="form-control" type="text"  readonly>
                    </div>
                    <div class="form-group">
                      <label>Status Sistem</label>
                            <input name="pasout" value="<?php echo $flag ." - ". $po;?>"  class="form-control" type="text" readonly>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-success">AKTIFKAN</button>
                </div>
            </form>
            </div>
            </div>
        </div>

    <?php endforeach;?>
<!--END MODAL AKTIFKAN-->

<!-- ============ MODAL BAYAR=============== -->
  <?php foreach($data_bayar as $row):
        $nrm = $row->NRM;
        $regno = $row->regno;
        $nama = $row->Nama;
        $ci = $row->dateCI;
        $co = $row->OutDate;
        $tgl = $row->Tanggal;
        $bayar = $row->TGLBayar;
        $srawat = $row->StatusRawat;
                       if($srawat=='1') {
                           $sr='Rawat Jalan';
                       }elseif($srawat=='2'){
                          $sr='Rawat Inap';
                       }elseif($srawat=='3'){
                          $sr='IGD';
                       }
                           
      ?>

      <div class="modal fade" id="modal_bayar<?php echo $regno;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">UBAH BAYAR</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Admin/Sim/ubah_bayar'?>">
                <div class="modal-body">
                  <h2>UBAH TANGGAL BAYAR...????? CEK KEMBALI YA BROOOO....!!!</h2>
                    <div class="form-group">
                      <label>NRM</label>
                            <input name="nrm" value="<?php echo $nrm;?>" class="form-control" type="text"readonly>
                    </div>

                    <div class="form-group">
                      <label>REGNO</label>
                            <input name="regno" value="<?php echo $regno;?>" class="form-control" type="text" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                            <input name="nrm" value="<?php echo $nama;?>" class="form-control" type="text"readonly>
                    </div>
                    <div class="form-group">
                      <label>MRS</label>
                            <input name="MRS" value="<?php echo $ci;?>" class="form-control" type="text"  readonly>
                    </div>
                    <div class="form-group">
                      <label>KRS</label>
                            <input name="MRS" value="<?php echo $co;?>" class="form-control" type="text"  readonly>
                    </div>
                    <div class="form-group">
                      <label>Status Rawat</label>
                            <input name="srawat" value="<?php echo $sr;?>" class="form-control" type="text"  readonly>
                    </div>
                    <div class="form-group">
                      <label>Last Input</label>
                            <input name="tgl" value="<?php echo $tgl;?>"  class="form-control" type="text" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tgl Bayar</label>
                            <input name="tgl_bayar" value="<?php echo $bayar;?>"  class="form-control" type="date" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-success">UPDATE !</button>
                </div>
            </form>
            </div>
            </div>
        </div>
       


    <?php endforeach;?>
<!--END MODAL AKTIFKAN-->






 