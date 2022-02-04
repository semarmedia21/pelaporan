
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered" id="dataTable" cellspacing="0" width="100%">

  <thead>
       <tr>
       
          <th><h2><center>Rawat Inap</center></h2></th>
          <th><h2><center>Rawat Jalan</center></h2></th>
           <th><h2><center>Gawat Darurat</center></h2></th>
           <th><h2><center>TOTAL PENGUNJUNG</center></h2></th>
       </tr>
  </thead>
 
  <tbody>
    <?php foreach($data_pengunjung as $row):?>
    <tr>
      <?= 
      $total2 = $row->ri + $row->rj + $row->igd;?>
       <td><h1><center><?php echo $row->ri;?></center></h1></td>
       <td><h1><center><?php echo $row->rj;?></center></h1></td>
       <td><h1><center><?php echo $row->igd;?></center></h1></td>
        <!-- <td><h1><center><?php echo $row->total;?></center></h1></td>   -->
        <td><h1><center><?php echo $total2;?></center></h1></td>  
   </tr>
  <?php endforeach;?>
 </tbody>
</table>
</div>

  


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-ri-tab" data-toggle="pill" href="#pills-ri" role="tab" aria-controls="pills-ri" aria-selected="true">LIST RAWAT INAP</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-rj-tab" data-toggle="pill" href="#pills-rj" role="tab" aria-controls="pills-rj" aria-selected="false">LIST RAWAT JALAN</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-igd-tab" data-toggle="pill" href="#pills-igd" role="tab" aria-controls="pills-igd" aria-selected="false">LIST GAWAT DARURAT</a>
  </li>
</ul>


<div class="tab-content" id="pills-tabContent">
<!-- LIST TAB RANAP -->
  <div class="tab-pane fade show active" id="pills-ri" role="tabpanel" aria-labelledby="pills-ri-tab">
<!-- TABEL NAMA RANAP -->
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="dataTable" cellspacing="0" width="100%">
          <thead>
               <tr>
                  <th><center>No</center></th>
                   <th><center>NRM</center></th>
                  <th><center>Nama Pasien</center></th>
                   <th><center>Alamat</center></th>
                   <th><center>Kabupaten</center></th>
               </tr>
          </thead>
         
          <tbody>
          
            <?php $no=0; foreach( $det_nama_ri as $row1): $no++?>
            <tr>
               <td><center><?php echo $no;?></center></td>
               <td><center><?php echo $row1->pasien_id;?></center></td>
               <td><center><?php echo $row1->pasien_nm;?></center></td>
                <td><?php echo $row1->alamat;?></td> 
                <td><?php echo $row1->kabupaten;?></td>  
           </tr>
          <?php endforeach;?>
         </tbody>

        </table>
        </div>
<!-- END TABEL NAMA -->
  </div>
  <!-- END TAB RANAP -->


<!-- LIST RAWAT JALAN -->
  <div class="tab-pane fade" id="pills-rj" role="tabpanel" aria-labelledby="pills-rj-tab">
<!-- TABEL NAMA RJ -->
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="dataTable" cellspacing="0" width="100%">
          <thead>
               <tr>
                  <th><center>No</center></th>
                   <th><center>NRM</center></th>
                  <th><center>Nama Pasien</center></th>
                   <th><center>Alamat</center></th>
                   <th><center>Kabupaten</center></th>
               </tr>
          </thead>
         
          <tbody>
          
            <?php $no=0; foreach( $det_nama_rj as $row1): $no++?>
            <tr>
               <td><center><?php echo $no;?></center></td>
               <td><center><?php echo $row1->pasien_id;?></center></td>
               <td><center><?php echo $row1->pasien_nm;?></center></td>
                <td><?php echo $row1->alamat;?></td> 
                <td><?php echo $row1->kabupaten;?></td>    

           </tr>
          <?php endforeach;?>
         </tbody>

        </table>
        </div>
<!-- END TABEL NAMA -->
  </div>
<!-- END LIST RAJAL   -->

<!-- list tab igd -->
  <div class="tab-pane fade" id="pills-igd" role="tabpanel" aria-labelledby="pills-igd-tab">
    <!-- TABEL NAMA IGD -->
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="dataTable" cellspacing="0" width="100%">
          <thead>
               <tr>
                  <th><center>No</center></th>
                   <th><center>NRM</center></th>
                  <th><center>Nama Pasien</center></th>
                   <th><center>Alamat</center></th>
                   <th><center>Kabupaten</center></th>
               </tr>
          </thead>
         
          <tbody>
          
            <?php $no=0; foreach( $det_nama_igd as $row1): $no++?>
            <tr>
               <td><center><?php echo $no;?></center></td>
               <td><center><?php echo $row1->pasien_id;?></center></td>
               <td><center><?php echo $row1->pasien_nm;?></center></td>
                <td><?php echo $row1->alamat;?></td> 
                <td><?php echo $row1->kabupaten;?></td>    
           </tr>
          <?php endforeach;?>
         </tbody>

        </table>
        </div>
<!-- END TABEL NAMA -->
  </div>
</div>






 