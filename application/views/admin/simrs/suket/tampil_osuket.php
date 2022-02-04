
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered" id="dataTable" cellspacing="0" width="100%">

  <thead>
       <tr>
       
          <th><h2><center>Register SK Online</center></h2></th>
          <th><h2><center>SK Dilayanain</center></h2></th>
           <th><h2><center>SK Offline</center></h2></th>
           <th><h2><center>Total Pelayanan SK</center></h2></th>
       </tr>
  </thead>
 
  <tbody>
    <?php foreach($data_tot_suket as $row):?>
    <tr>
     
       <td><h1><center><?php echo $row->regonline;?></center></h1></td>
       <td><h1><center><?php echo $row->dilayani;?></center></h1></td>
       <td><h1><center><?php echo $row->langsung;?></center></h1></td>
       <td><h1><center><?php echo $row->total;?></center></h1></td>
        
   </tr>
  <?php endforeach;?>
 </tbody>
</table>
</div>

  






 