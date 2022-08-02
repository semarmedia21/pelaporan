<?php
class Monitor_model extends CI_Model{

     

    public function insert_mon2($tgl,$Q1,$soft,$ssoft,$Q2,$hard,$shard,$Q3,$jar,$sjar,$kr) {  
       
          $hasil=$this->db->query("
            INSERT INTO tb_monitoring 
            VALUES('',
            '$tgl',
            '$Q1',
            '$soft',
            '$ssoft', 
            '$Q2',
            '$hard',
            '$shard',
            '$Q3',
            '$jar',
            '$sjar',
            '$kr')");

          return $hasil;
        }

    public function data(){
       $mon = $this->db->query("SELECT * FROM tb_monitoring 
       left join tb_ruang on tb_monitoring.kode_r = tb_ruang.kode_ruang
       order by tanggal DESC");
       return $mon;
    }
    // public function data_baru(){
    //    $mon = $this->db->query("SELECT * FROM tb_monitoring order by tanggal DESC");
    //    return $mon;
    // }
    // public function data_proses(){
    //    $mon = $this->db->query("SELECT * FROM tb_monitoring order by tanggal DESC");
    //    return $mon;
    // }
    // public function data_selesai(){
    //    $mon = $this->db->query("SELECT * FROM tb_monitoring where sta rder by tanggal DESC");
    //    return $mon;
    // }

    public function edit_mon2($id,$tgl,$Q1,$soft,$ssoft,$Q2,$hard,$shard,$Q3,$jar,$sjar,$kr) {  
       
          $hasil=$this->db->query("
            UPDATE tb_monitoring 
            SET tanggal = '$tgl', 
            q1 = '$Q1',
            mon_soft = '$soft',
            sol_soft = '$ssoft',
            mon_soft = '$soft',
            q2 = '$Q2',
            mon_hard = '$hard',
            sol_hard = '$shard',
            q3 = '$Q3',
            mon_jar = '$jar',
            sol_jar = '$sjar',
            kode_r = '$kr'
           WHERE id ='$id'
            ");

          return $hasil;
        }

         function hapus_monitor($id){
        $hasil=$this->db->query("DELETE FROM tb_monitoring WHERE id='$id'");
        return $hasil;
    }

     function download_monitoring($vtanggal){
      $vbulan = date("m",strtotime($vtanggal));
      $vtahun = date("Y",strtotime($vtanggal));

       $hasil = $this->db->query( "
        SELECT * FROM tb_monitoring
        WHERE YEAR(tanggal) = '$vtahun' and MONTH(tanggal)='$vbulan'
        ORDER BY tb_monitoring.`tanggal` ASC ");
       return $hasil;
    }

 }

