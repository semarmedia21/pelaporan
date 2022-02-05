<?php
class Main_model extends CI_Model{

      public function amprah()   {    
            return $this->db->get('tb_amprah');
        }

      public function det_amprah()   {    
      return $this->db->get('tb_det_amprah');
        }
  
  function laporanTahunan(){
  $bc = $this->db->query("
        SELECT
        IFNULL((SELECT COUNT(reqno) FROM (tb_amprah) WHERE((MONTH(tanggal_req)=1)AND (YEAR(tanggal_req)=2021))),0) AS `Januari`,
        IFNULL((SELECT COUNT(reqno) FROM (tb_amprah)WHERE((MONTH(tanggal_req)=2)AND (YEAR(tanggal_req)=2021))),0) AS `Februari`,
        IFNULL((SELECT COUNT(reqno) FROM (tb_amprah)WHERE((MONTH(tanggal_req)=3)AND (YEAR(tanggal_req)=2021))),0) AS `Maret`,
        IFNULL((SELECT COUNT(reqno) FROM (tb_amprah)WHERE((MONTH(tanggal_req)=4)AND (YEAR(tanggal_req)=2021))),0) AS `April`,
        IFNULL((SELECT COUNT(reqno) FROM (tb_amprah)WHERE((MONTH(tanggal_req)=5)AND (YEAR(tanggal_req)=2021))),0) AS `Mei`,
        IFNULL((SELECT COUNT(reqno) FROM (tb_amprah)WHERE((MONTH(tanggal_req)=6)AND (YEAR(tanggal_req)=2021))),0) AS `Juni`,
        IFNULL((SELECT COUNT(reqno) FROM (tb_amprah)WHERE((MONTH(tanggal_req)=7)AND (YEAR(tanggal_req)=2021))),0) AS `Juli`,
        IFNULL((SELECT COUNT(reqno) FROM (tb_amprah)WHERE((MONTH(tanggal_req)=8)AND (YEAR(tanggal_req)=2021))),0) AS `Agustus`,
        IFNULL((SELECT COUNT(reqno) FROM (tb_amprah)WHERE((MONTH(tanggal_req)=9)AND (YEAR(tanggal_req)=2021))),0) AS `September`,
        IFNULL((SELECT COUNT(reqno) FROM (tb_amprah)WHERE((MONTH(tanggal_req)=10)AND (YEAR(tanggal_req)=2021))),0) AS `Oktober`,
        IFNULL((SELECT COUNT(reqno) FROM (tb_amprah)WHERE((MONTH(tanggal_req)=11)AND (YEAR(tanggal_req)=2021))),0) AS `November`,
        IFNULL((SELECT COUNT(reqno) FROM (tb_amprah)WHERE((MONTH(tanggal_req)=12)AND (YEAR(tanggal_req)=2021))),0) AS `Desember`
        FROM tb_amprah GROUP BY YEAR(tanggal_req)
        ");
  return $bc;
  
 }

  function index_petugas(){
    $this->db->group_by('tb_petugas.`nama_petugas`');
    $this->db->SELECT('tb_petugas.`nama_petugas`');
    $this->db->SELECT("count(tb_det_amprah.`petugas`) as total");
    $this->db->FROM('tb_det_amprah');
    $this->db->JOIN('tb_petugas', 'tb_det_amprah.`petugas` = tb_petugas.`id_petugas`');
    $this->db->order_by('id_petugas', 'ASC');
    // $this->db->WHERE(YEAR('tb_det_amprah.`tgl_req`'),'2021');
    $query = $this->db->get()->result();
    return $query;
  }

  function pekerjaan_2021(){
    $que = $this->db->query("SELECT nama_petugas, 
    COUNT(IF(jp = 'SIM-IT', 1, NULL)) 'simrs',
    COUNT(IF(jp = 'HD-IT', 1, NULL)) 'hardware',
    COUNT(IF(jp = 'JR-IT', 1, NULL)) 'jaringan',
    COUNT(IF(jp = 'DR-IT', 1, NULL)) 'daring',
    COUNT(IF(jp = 'MS-IT', 1, NULL)) 'software',
    COUNT(IF(jp = 'VID-IT', 1, NULL)) 'vidio',
    COUNT(IF(jp = 'DT', 1, NULL)) 'data',
    COUNT(jp) 'total'

    FROM tb_det_amprah 
    INNER JOIN tb_petugas
    ON tb_det_amprah.`petugas` = tb_petugas.`id_petugas` 
    WHERE YEAR(tb_det_amprah.`tgl_req`) ='2021'
    GROUP BY nama_petugas ORDER BY id_petugas ASC");

    return $que;
  }

  function pekerjaan_2022(){
    $que = $this->db->query("SELECT nama_petugas, 
    COUNT(IF(jp = 'SIM-IT', 1, NULL)) 'simrs',
    COUNT(IF(jp = 'HD-IT', 1, NULL)) 'hardware',
    COUNT(IF(jp = 'JR-IT', 1, NULL)) 'jaringan',
    COUNT(IF(jp = 'DR-IT', 1, NULL)) 'daring',
    COUNT(IF(jp = 'MS-IT', 1, NULL)) 'software',
    COUNT(IF(jp = 'VID-IT', 1, NULL)) 'vidio',
    COUNT(IF(jp = 'DT', 1, NULL)) 'data',
    COUNT(jp) 'total'

    FROM tb_det_amprah 
    INNER JOIN tb_petugas
    ON tb_det_amprah.`petugas` = tb_petugas.`id_petugas` 
    WHERE YEAR(tb_det_amprah.`tgl_req`) ='2022'
    GROUP BY nama_petugas ORDER BY id_petugas ASC");

    return $que;
  }
// 
}
