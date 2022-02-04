
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered" id="dataTable" cellspacing="0" width="100%">

  <thead>
       <tr>
           <th><h2><center>TOTAL PASIEN COVID-19 - By MRS</center></h2></th>
           <th><h2><center>TOTAL PASIEN COVID-19 - By KRS</center></h2></th>
           <th><h2><center>TOTAL PASIEN COVID-19 DALAM PERAWATAN</center></h2></th>
           <th><h2><center>MILESTONE PASIEN COVID-19</center></h2></th>
       </tr>
  </thead>
 
  <tbody>
   
    <tr> 
        <?php foreach($by_mrs as $mrs):?>
        <td><h1><center><?php echo $mrs->total;?></center></h1></td>  
        <?php endforeach;?>
        
        <?php foreach($by_krs as $krs):?>
        <td><h1><center><?php echo $krs->total;?></center></h1></td>  
        <?php endforeach;?>

        <?php foreach($rawat as $rawat):?>
        <td><h1><center><?php echo $rawat->total;?></center></h1></td>  
        <?php endforeach;?>

        <?php foreach($miles as $miles):?>
        <td><h1><center><?php echo $miles->total;?></center></h1></td>  
        <?php endforeach;?>
   </tr>
 
 </tbody>
</table>
</div>



<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-c19mrs-tab" data-toggle="pill" href="#pills-c19mrs" role="tab" aria-controls="pills-c19mrs" aria-selected="true">LIST PASIEN COVID by MRS</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="pills-c19krs-tab" data-toggle="pill" href="#pills-c19krs" role="tab" aria-controls="pills-c19krs" aria-selected="true">LIST PASIEN COVID by KRS</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-c19rw-tab" data-toggle="pill" href="#pills-c19rw" role="tab" aria-controls="pills-c19rw" aria-selected="true">LIST PASIEN COVID DALAM PERAWATAN</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="pills-c19-mil-tab" data-toggle="pill" href="#pills-c19mil" role="tab" aria-controls="pills-c19mil" aria-selected="true">MILESTONE PASIEN COVID</a>
  </li>
</ul>

<div class="tab-content" id="pills-tabContent">
<!-- LIST TAB RANAP -->
  <div class="tab-pane fade show active" id="pills-c19mrs" role="tabpanel" aria-labelledby="pills-c19mrs-tab">
<!-- TABEL NAMA RANAP -->
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="dataTable" cellspacing="0" width="100%">
          <thead>
               <tr>
                  <th><center>No</center></th>
                  <th><center>MRS</center></th>
                  <th><center>KRS</center></th>
                   <th><center>NRM</center></th>
                  <th><center>Nama Pasien</center></th>
                   <th><center>Alamat</center></th>
                   <th><center>Kabupaten</center></th>
                   <th><center>Sal</center></th>
                   <th><center>Dx_utama</center></th>
                   <th><center>ICD</center></th>
               </tr>
          </thead>
         
          <tbody>
            <?php $no=0; foreach( $covid19_mrs as $row1): $no++?>
            <tr>
               <td><center><?php echo $no;?></center></td>
               <td><center><?php echo $row1->dateCI;?></center></td>
               <td><center><?php echo $row1->outdate;?></center></td>
               <td><center><?php echo $row1->NRM;?></center></td>
               <td><center><?php echo $row1->Nama;?></center></td>
                <td><?php echo $row1->Alamat;?></td> 
                <td><?php echo $row1->kabupaten;?></td>  
                <td><?php echo $row1->sal;?></td>  
                <td><?php echo $row1->dx_utama;?></td>  
                <td><?php echo $row1->ICD;?></td>  
           </tr>
          <?php endforeach;?>
         </tbody>

        </table>
    </div>
<!-- END TABEL NAMA -->
  </div>
  <!-- END TAB mrs -->


<!-- LIST TAB krs -->
  <div class="tab-pane fade" id="pills-c19krs" role="tabpanel" aria-labelledby="pills-c19krs-tab">
<!-- TABEL NAMA RANAP -->
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="dataTable" cellspacing="0" width="100%">
          <thead>
               <tr>
                  <th><center>No</center></th>
                  <th><center>MRS</center></th>
                  <th><center>KRS</center></th>
                   <th><center>NRM</center></th>
                  <th><center>Nama Pasien</center></th>
                   <th><center>Alamat</center></th>
                   <th><center>Kabupaten</center></th>
                   <th><center>Sal</center></th>
                   <th><center>Dx_utama</center></th>
                   <th><center>ICD</center></th>
               </tr>
          </thead>
         
          <tbody>
          
            <?php $no=0; foreach( $covid19_krs as $row1): $no++?>
            <tr>
               <td><center><?php echo $no;?></center></td>
               <td><center><?php echo $row1->dateCI;?></center></td>
               <td><center><?php echo $row1->outdate;?></center></td>
               <td><center><?php echo $row1->NRM;?></center></td>
               <td><center><?php echo $row1->Nama;?></center></td>
                <td><?php echo $row1->Alamat;?></td> 
                <td><?php echo $row1->kabupaten;?></td>  
                <td><?php echo $row1->sal;?></td>  
                <td><?php echo $row1->dx_utama;?></td>  
                <td><?php echo $row1->ICD;?></td>  
           </tr>
          <?php endforeach;?>
         </tbody>

        </table>
      </div>
<!-- END TABEL NAMA -->
  </div>
  <!-- END TAB RANAP -->

<!-- LIST TAB rawat -->
  <div class="tab-pane fade" id="pills-c19rw" role="tabpanel" aria-labelledby="pills-c19rw-tab">
<!-- TABEL NAMA RANAP -->
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="dataTable" cellspacing="0" width="100%">
          <thead>
               <tr>
                  <th><center>No</center></th>
                  <th><center>MRS</center></th>
                   <th><center>NRM</center></th>
                  <th><center>Nama Pasien</center></th>
                   <th><center>Alamat</center></th>
                   <th><center>Kabupaten</center></th>
                   <th><center>Sal</center></th>
                   <th><center>Dx_utama</center></th>
                   <th><center>ICD</center></th>
               </tr>
          </thead>
         
          <tbody>
          
            <?php $no=0; foreach( $covid19_rawat as $row1): $no++?>
            <tr>
               <td><center><?php echo $no;?></center></td>
               <td><center><?php echo $row1->dateCI;?></center></td>
               <td><center><?php echo $row1->NRM;?></center></td>
               <td><center><?php echo $row1->Nama;?></center></td>
                <td><?php echo $row1->Alamat;?></td> 
                <td><?php echo $row1->kabupaten;?></td>  
                <td><?php echo $row1->sal;?></td>  
                <td><?php echo $row1->dx_utama;?></td>  
                <td><?php echo $row1->ICD;?></td>  
           </tr>
          <?php endforeach;?>
         </tbody>

        </table>
      </div>
<!-- END TABEL NAMA -->
  </div>
  <!-- END TAB RANAP -->

<!-- LIST TAB rawat -->
  <div class="tab-pane fade" id="pills-c19mil" role="tabpanel" aria-labelledby="pills-c19mil-tab">
<!-- TABEL NAMA RANAP -->
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="dataTable" cellspacing="0" width="100%">
          <thead>
               <tr>
                  <th><center>No</center></th>
                  <th><center>MRS</center></th>
                   <th><center>NRM</center></th>
                  <th><center>Nama Pasien</center></th>
                   <th><center>Alamat</center></th>
                   <th><center>Kabupaten</center></th>
                   <th><center>Sal</center></th>
                   <th><center>Dx_utama</center></th>
                   <th><center>ICD</center></th>
                   <th><center>Status</center></th>
               </tr>
          </thead>
         
          <tbody>
          
            <?php $no=0; foreach( $covid19_miles as $row1): $no++
            ?>


            <tr>
               <td><center><?php echo $no;?></center></td>
               <td><center><?php echo $row1->dateCI;?></center></td>
               <td><center><?php echo $row1->NRM;?></center></td>
               <td><center><?php echo $row1->Nama;?></center></td>
                <td><?php echo $row1->Alamat;?></td> 
                <td><?php echo $row1->kabupaten;?></td>  
                <td><?php echo $row1->sal;?></td>  
                <td><?php echo $row1->dx_utama;?></td>  
                <td><?php echo $row1->ICD;?></td>  
                <td><?php 
                  $bayar = $row1->StatusBayar;
                  $pulang = $row1->outdate;
                if ($bayar =='Belum') {
                      $status ='DIRAWAT';
                      echo $status;
                    }else{
                      $status ='PULANG';
                      echo $status;?> <br> <?php echo $pulang;
                    }?></td>  
           </tr>
          <?php endforeach;?>
         </tbody>

        </table>
      </div>
<!-- END TABEL NAMA -->
  </div>
  <!-- END TAB RANAP -->

</div>






 