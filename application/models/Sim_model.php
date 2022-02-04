<?php 
class Sim_model extends CI_Model{
    
    function show_tt(){
        $db2 = $this->load->database('sim', TRUE);
        $hasil= $db2->query("SELECT * FROM smt_bedroom");
        return $hasil;
            }

  

    function edit_tt($id_tt,$tt_tot,$tt_isi,$tt_sisa){
        $db2 = $this->load->database('sim', TRUE);

        $hasil=$db2->query("UPDATE smt_bedroom SET jmlbed ='$tt_tot', jmlisi = '$tt_isi', jmlkosong = '$tt_sisa' WHERE kdruang='$id_tt'");
        return $hasil;
    }

    function edit_tt_aplicares($id_tt_apli,$tt_tot,$tt_isi,$tt_sisa){
        $db2 = $this->load->database('sim', TRUE);
        $hasil=$db2->query("UPDATE smt_aplicares_stokroom SET kapasitas ='$tt_tot', tersedia = '$tt_sisa' WHERE koderuang='$id_tt_apli'");
        return $hasil;
    }

    function tampil_data($vtanggal){
      $db2 = $this->load->database('sim', TRUE);
        $vdate = date($vtanggal);
       $hasil = $db2->query( "
        SELECT count(dateCI) as total,
        sum(case when statusRawat = '2' then 1 else 0 end) AS ri,
        sum(case when statusRawat = '1' then 1 else 0 end) AS rj,
        sum(case when statusRawat = '3' then 1 else 0 end) AS igd
        FROM smt_hregistrasi WHERE dateCI ='$vdate' AND NRM NOT LIKE '%Cancel%'");
       return $hasil;
  }  

   function tampil_data2($vtanggal){
      $db2 = $this->load->database('sim2', TRUE);
        $vdate = date($vtanggal);
       $hasil = $db2->query( "
        SELECT count(reg_id) as total,
        sum(case when lokasi_id like '%02.%' then 1 else 0 end) AS ri,
        sum(case when is_ranap = '0' and lokasi_id <> '03.01' then 1 else 0 end) AS rj,
        sum(case when is_ranap = '0' and lokasi_id = '03.01' then 1 else 0 end) AS igd
        FROM reg_pasien WHERE tgl_registrasi like '%$vdate%' AND is_billing='1' and is_active='1'");
       return $hasil;
  }  

  function total_suket($vtanggal){
      $db2 = $this->load->database('sim2', TRUE);
        $vdate = date($vtanggal);
       $hasil = $db2->query( "
       SELECT COUNT(DISTINCT pasien_id) as total,
       (SELECT COUNT(regonline_id) from reg_suket_online WHERE tgl_periksa='$vdate') as regonline,
      (SELECT COUNT(DISTINCT pasien_id) from reg_pasien WHERE jenispelayanan_cd='01' and regonline_id !='' and is_active='1' AND is_deleted='0' and DATE(tgl_registrasi)='$vdate') as dilayani,
      (SELECT COUNT(DISTINCT pasien_id) from reg_pasien WHERE jenispelayanan_cd='01' and regonline_id ='' and is_active='1' AND is_deleted='0'  and DATE(tgl_registrasi)='$vdate') as langsung
      from reg_pasien 
      WHERE is_active='1' AND is_deleted='0' and jenispelayanan_cd='01' and DATE(tgl_registrasi)='$vdate' ");
       return $hasil;
  }  


  function cari_regno($regno){
      $db2 = $this->load->database('sim', TRUE);
       $hasil = $db2->query( " 
        SELECT smt_hregistrasi.`NRM`,
        smt_hregistrasi.`dateCI`,
        smt_hregistrasi.`regno`, 
        smt_rmedikhis.`Nama`,
        smt_rmedikhis.`Alamat`, 
        smt_hregistrasi.`StatusRawat`, 
        smt_hregistrasi.`pas_out`, 
        smt_hregistrasi.`flag`, 
        smt_reg_kabupaten.`kabupaten`
        FROM smt_hregistrasi
        INNER JOIN smt_rmedikhis
        ON smt_hregistrasi.`NRM`=smt_rmedikhis.`NRM`
        INNER JOIN smt_reg_kabupaten
        ON smt_rmedikhis.`Kabupaten`=smt_reg_kabupaten.`id_kabupaten`
        WHERE smt_hregistrasi.`regno`='$regno' 
        or smt_hregistrasi.`NRM`='$regno'
        or smt_rmedikhis.`Nama` like '%$regno%' ");

       return $hasil;
  }  

   function cari_bayar($regno){
      $db2 = $this->load->database('sim', TRUE);
       $hasil = $db2->query( " 
        SELECT smt_hregistrasi.`NRM`,
        smt_hregistrasi.`dateCI`,
        smt_hregistrasi.`OutDate`,
        smt_dregistrasi.`Tanggal`,
        smt_dregistrasi.`TGLBayar`,
        smt_hregistrasi.`regno`, 
        smt_rmedikhis.`Nama`,
        smt_hregistrasi.`StatusRawat` 
        FROM smt_hregistrasi
        INNER JOIN smt_rmedikhis
        ON smt_hregistrasi.`NRM`=smt_rmedikhis.`NRM`
        INNER JOIN smt_dregistrasi
        ON smt_dregistrasi.`regno`=smt_hregistrasi.`regno`
        WHERE smt_dregistrasi.`regno`='$regno' 
        and smt_dregistrasi.`POLSAL`='XX' ");

       return $hasil;
  }  

  function aktifkan_px($regno){
      $db2 = $this->load->database('sim', TRUE);
       $hasil = $db2->query( " 
        UPDATE smt_hregistrasi 
        SET smt_hregistrasi.`flag` ='CI',
        smt_hregistrasi.`pas_out` = 'IN'
        WHERE smt_hregistrasi.`regno`='$regno' ");
       return $hasil;
  }  

   function update_bayar($regno,$bayar){
      $db2 = $this->load->database('sim', TRUE);
       $hasil = $db2->query( " 
        UPDATE smt_dregistrasi 
        SET smt_dregistrasi.`TGLBayar` = '$bayar', 
        smt_dregistrasi.`Tanggal` = '$bayar'
        WHERE smt_dregistrasi.`regno`='$regno' 
        AND smt_dregistrasi.`POLSAL` = 'XX' ");
       return $hasil;
  }  

  function hapus_bayar($regno){
      $db2 = $this->load->database('sim', TRUE);
       $hasil = $db2->query( " 
       DELETE FROM smt_dregistrasi
        WHERE smt_dregistrasi.`regno`='$regno' 
        AND smt_dregistrasi.`POLSAL` = 'XX' ");
       return $hasil;
  }  

    function data_nama_RI($vtanggal){
      $db2 = $this->load->database('sim', TRUE);
        $vdate = date($vtanggal);
       $hasil = $db2->query( " 
         SELECT smt_hregistrasi.`NRM`, smt_rmedikhis.`Nama`,smt_rmedikhis.`Alamat`, smt_hregistrasi.`StatusRawat`, smt_reg_kabupaten.`kabupaten`
        FROM smt_hregistrasi
        INNER JOIN smt_rmedikhis
        ON smt_hregistrasi.`NRM`=smt_rmedikhis.`NRM`
        INNER JOIN smt_reg_kabupaten
        ON smt_rmedikhis.`Kabupaten`=smt_reg_kabupaten.`id_kabupaten`
        WHERE statusRawat='2' and dateCI ='$vdate'");
       return $hasil;
  }  

  function data_nama_RJ($vtanggal){
      $db2 = $this->load->database('sim', TRUE);
        $vdate = date($vtanggal);
       $hasil = $db2->query( " 
         SELECT smt_hregistrasi.`NRM`, smt_rmedikhis.`Nama`,smt_rmedikhis.`Alamat`, smt_hregistrasi.`StatusRawat`, smt_reg_kabupaten.`kabupaten`
        FROM smt_hregistrasi
        INNER JOIN smt_rmedikhis
        ON smt_hregistrasi.`NRM`=smt_rmedikhis.`NRM`
        INNER JOIN smt_reg_kabupaten
        ON smt_rmedikhis.`Kabupaten`=smt_reg_kabupaten.`id_kabupaten`
        WHERE statusRawat='1' and dateCI ='$vdate'");
       return $hasil;
  }  
    function data_nama_IGD($vtanggal){
      $db2 = $this->load->database('sim', TRUE);
        $vdate = date($vtanggal);
       $hasil = $db2->query( " 
         SELECT smt_hregistrasi.`NRM`, smt_rmedikhis.`Nama`,smt_rmedikhis.`Alamat`, smt_hregistrasi.`StatusRawat`, smt_reg_kabupaten.`kabupaten`
        FROM smt_hregistrasi
        INNER JOIN smt_rmedikhis
        ON smt_hregistrasi.`NRM`=smt_rmedikhis.`NRM`
        INNER JOIN smt_reg_kabupaten
        ON smt_rmedikhis.`Kabupaten`=smt_reg_kabupaten.`id_kabupaten`
        WHERE statusRawat='3' and dateCI ='$vdate'");
       return $hasil;
  }  


 function data_covid19_mrs($vtanggal){
      $db2 = $this->load->database('sim', TRUE);

      $vbulan = date("m",strtotime($vtanggal));
      $vtahun = date("Y",strtotime($vtanggal));

        // $vdate = date($vtanggal);
       $hasil = $db2->query( " 
        SELECT smt_hregistrasi.`NRM`, 
        smt_hregistrasi.`dateCI`, 
        smt_hregistrasi.`outdate`,
        smt_rmedikhis.`Nama`,
        smt_rmedikhis.`Alamat`, 
        smt_reg_kabupaten.`kabupaten`,
        smt_sal.`sal`,
        smt_periksa_rj.`dx_utama`,
        smt_icdx.`ICD` 
        FROM smt_hregistrasi
        INNER JOIN smt_rmedikhis
        ON smt_hregistrasi.`nrm`=smt_rmedikhis.`nrm`
        INNER JOIN smt_reg_kabupaten
        ON smt_rmedikhis.`Kabupaten`=smt_reg_kabupaten.`id_kabupaten`
        INNER JOIN smt_sal
        ON smt_hregistrasi.`kdsal` = smt_sal.`kdsal`
        INNER JOIN smt_periksa_rj
        ON smt_hregistrasi.`regno` = smt_periksa_rj.`regno`
        INNER JOIN smt_icdx
        ON smt_periksa_rj.`dx_utama` = smt_icdx.`KodeIcd`
        -- GROUP BY smt_hregistrasi.`regno`
        WHERE 
        YEAR(dateCI) = '$vtahun' 
        and MONTH(dateCI)='$vbulan'  
        AND smt_periksa_rj.`dx_utama`='B34.2'
        OR smt_periksa_rj.`dx_utama`='Z03.8'
        ORDER BY smt_hregistrasi.`dateCI` ASC
        ");

       return $hasil;
  }  
 
  function data_covid19_krs($vtanggal){
      $db2 = $this->load->database('sim', TRUE);
      
      $vbulan = date("m",strtotime($vtanggal));
      $vtahun = date("Y",strtotime($vtanggal));

       $hasil = $db2->query( " 
        SELECT smt_hregistrasi.`NRM`, 
        smt_hregistrasi.`dateCI`, 
        smt_hregistrasi.`outdate`, 
        smt_rmedikhis.`Nama`,
        smt_rmedikhis.`Alamat`, 
        smt_reg_kabupaten.`kabupaten`,
        smt_sal.`sal`,
        smt_periksa_rj.`dx_utama`,
        smt_icdx.`ICD` 
        FROM smt_hregistrasi
        INNER JOIN smt_rmedikhis
        ON smt_hregistrasi.`nrm`=smt_rmedikhis.`nrm`
        INNER JOIN smt_reg_kabupaten
        ON smt_rmedikhis.`Kabupaten`=smt_reg_kabupaten.`id_kabupaten`
        INNER JOIN smt_sal
        ON smt_hregistrasi.`kdsal` = smt_sal.`kdsal`
        INNER JOIN smt_periksa_rj
        ON smt_hregistrasi.`regno` = smt_periksa_rj.`regno`
        INNER JOIN smt_icdx
        ON smt_periksa_rj.`dx_utama` = smt_icdx.`KodeIcd`

        -- GROUP BY smt_hregistrasi.`regno`

        WHERE YEAR(outdate) = '$vtahun' 
        and MONTH(outdate)='$vbulan'  
        AND smt_periksa_rj.`dx_utama`='B34.2'
        OR smt_periksa_rj.`dx_utama`='Z03.8'
        ORDER BY smt_hregistrasi.`outdate` ASC
         ");
       
       return $hasil;
  }  


 function data_covid19_dirawat($vtanggal){
      $db2 = $this->load->database('sim', TRUE);
      
      $vbulan = date("m",strtotime($vtanggal));
      $vtahun = date("Y",strtotime($vtanggal));

       $hasil = $db2->query( " 
        SELECT smt_hregistrasi.`NRM`, 
        smt_hregistrasi.`dateCI`, 
        smt_hregistrasi.`outdate`, 
        smt_rmedikhis.`Nama`,
        smt_rmedikhis.`Alamat`, 
        smt_reg_kabupaten.`kabupaten`,
        smt_sal.`sal`,
        smt_periksa_rj.`dx_utama`,
        smt_icdx.`ICD` 
        FROM smt_hregistrasi
        INNER JOIN smt_rmedikhis
        ON smt_hregistrasi.`nrm`=smt_rmedikhis.`nrm`
        INNER JOIN smt_reg_kabupaten
        ON smt_rmedikhis.`Kabupaten`=smt_reg_kabupaten.`id_kabupaten`
        INNER JOIN smt_sal
        ON smt_hregistrasi.`kdsal` = smt_sal.`kdsal`
        INNER JOIN smt_periksa_rj
        ON smt_hregistrasi.`regno` = smt_periksa_rj.`regno`
        INNER JOIN smt_icdx
        ON smt_periksa_rj.`dx_utama` = smt_icdx.`KodeIcd`

        -- GROUP BY smt_hregistrasi.`regno`

        WHERE YEAR(outdate) = '2000'
        AND smt_hregistrasi.`kdsal`='SK'   
        AND smt_periksa_rj.`dx_utama`='B34.2'
        OR smt_periksa_rj.`dx_utama`='Z03.8'
        ORDER BY smt_hregistrasi.`dateCI` ASC
         ");
       
       return $hasil;
  }  

  function data_covid19_miles($vtanggal){
      $db2 = $this->load->database('sim', TRUE);
      $vbulan = date("m",strtotime($vtanggal));
      $vtahun = date("Y",strtotime($vtanggal));

       $hasil = $db2->query( " 
        SELECT smt_hregistrasi.`NRM`, 
        smt_hregistrasi.`dateCI`, 
        smt_hregistrasi.`outdate`, 
        smt_hregistrasi.`StatusBayar`, 
        smt_rmedikhis.`Nama`,
        smt_rmedikhis.`Alamat`, 
        smt_reg_kabupaten.`kabupaten`,
        smt_sal.`sal`,
        smt_periksa_rj.`dx_utama`,
        smt_icdx.`ICD` 
        FROM smt_hregistrasi
        INNER JOIN smt_rmedikhis
        ON smt_hregistrasi.`nrm`=smt_rmedikhis.`nrm`
        INNER JOIN smt_reg_kabupaten
        ON smt_rmedikhis.`Kabupaten`=smt_reg_kabupaten.`id_kabupaten`
        INNER JOIN smt_sal
        ON smt_hregistrasi.`kdsal` = smt_sal.`kdsal`
        INNER JOIN smt_periksa_rj
        ON smt_hregistrasi.`regno` = smt_periksa_rj.`regno`
        INNER JOIN smt_icdx
        ON smt_periksa_rj.`dx_utama` = smt_icdx.`KodeIcd`

        WHERE smt_periksa_rj.`dx_utama`='B34.2'
        OR smt_periksa_rj.`dx_utama`='Z03.8'
        ORDER BY smt_hregistrasi.`dateCI` DESC
         ");
       
       return $hasil;
  }  

    function by_mrs($vtanggal){
      $db2 = $this->load->database('sim', TRUE);
      $vbulan = date("m",strtotime($vtanggal));
      $vtahun = date("Y",strtotime($vtanggal));

       $hasil = $db2->query( "
        SELECT count(smt_hregistrasi.`regno`) as total
        FROM smt_hregistrasi
        INNER JOIN smt_sal
        ON smt_hregistrasi.`kdsal` = smt_sal.`kdsal`
        INNER JOIN smt_periksa_rj
        ON smt_hregistrasi.`regno` = smt_periksa_rj.`regno`
        INNER JOIN smt_icdx
        ON smt_periksa_rj.`dx_utama` = smt_icdx.`KodeIcd`
        WHERE YEAR(dateCI) = '$vtahun' 
        and MONTH(dateCI)='$vbulan'  
        AND smt_hregistrasi.`NRM` NOT LIKE '%Cancel%'
        AND smt_periksa_rj.`dx_utama`='B34.2'
        OR smt_periksa_rj.`dx_utama`='Z03.8'
        ");
       return $hasil;
  }  

    function by_krs($vtanggal){
      $db2 = $this->load->database('sim', TRUE);
      $vbulan = date("m",strtotime($vtanggal));
      $vtahun = date("Y",strtotime($vtanggal));

       $hasil = $db2->query( "
         SELECT count(smt_hregistrasi.`regno`) as total
        FROM smt_hregistrasi
        INNER JOIN smt_sal
        ON smt_hregistrasi.`kdsal` = smt_sal.`kdsal`
        INNER JOIN smt_periksa_rj
        ON smt_hregistrasi.`regno` = smt_periksa_rj.`regno`
        INNER JOIN smt_icdx
        ON smt_periksa_rj.`dx_utama` = smt_icdx.`KodeIcd`
        WHERE YEAR(outdate) = '$vtahun' 
        and MONTH(outdate)='$vbulan'  
        AND smt_hregistrasi.`NRM` NOT LIKE '%Cancel%'
        AND smt_periksa_rj.`dx_utama`='B34.2'
        OR smt_periksa_rj.`dx_utama`='Z03.8'
        ");
       return $hasil;
  }  
  
   function rawat($vtanggal){
      $db2 = $this->load->database('sim', TRUE);
      $vbulan = date("m",strtotime($vtanggal));
      $vtahun = date("Y",strtotime($vtanggal));

       $hasil = $db2->query( "
         SELECT count(smt_hregistrasi.`regno`) as total
        FROM smt_hregistrasi
        INNER JOIN smt_sal
        ON smt_hregistrasi.`kdsal` = smt_sal.`kdsal`
        INNER JOIN smt_periksa_rj
        ON smt_hregistrasi.`regno` = smt_periksa_rj.`regno`
        INNER JOIN smt_icdx
        ON smt_periksa_rj.`dx_utama` = smt_icdx.`KodeIcd`
        WHERE YEAR(outdate) = '2000'
        AND smt_hregistrasi.`kdsal`='SK'
        AND smt_hregistrasi.`NRM` NOT LIKE '%Cancel%'
        AND smt_periksa_rj.`dx_utama`='B34.2'
        OR smt_periksa_rj.`dx_utama`='Z03.8'
        ");
       return $hasil;
  }  

function miles($vtanggal){
      $db2 = $this->load->database('sim', TRUE);
      $vbulan = date("m",strtotime($vtanggal));
      $vtahun = date("Y",strtotime($vtanggal));

       $hasil = $db2->query( "
         SELECT count(smt_hregistrasi.`regno`) as total
        FROM smt_hregistrasi
        INNER JOIN smt_sal
        ON smt_hregistrasi.`kdsal` = smt_sal.`kdsal`
        INNER JOIN smt_periksa_rj
        ON smt_hregistrasi.`regno` = smt_periksa_rj.`regno`
        INNER JOIN smt_icdx
        ON smt_periksa_rj.`dx_utama` = smt_icdx.`KodeIcd`
        WHERE  smt_hregistrasi.`NRM` NOT LIKE '%Cancel%'
        AND smt_periksa_rj.`dx_utama`='B34.2'
        OR smt_periksa_rj.`dx_utama`='Z03.8'
        ");
       return $hasil;
  }   

   function data_nama_RI2($vtanggal){
      $db3 = $this->load->database('sim2', TRUE);
        $vdate = date($vtanggal);
       $hasil = $db3->query( " 
         SELECT pasien_id, pasien_nm, alamat, kabupaten
          FROM reg_pasien
          WHERE lokasi_id like '%02.%' and is_active ='1' and is_billing='1' and tgl_registrasi like '%$vdate%'");
       return $hasil;
  }  

  function data_nama_RJ2($vtanggal){
      $db3 = $this->load->database('sim2', TRUE);
        $vdate = date($vtanggal);
       $hasil = $db3->query( " 
        SELECT pasien_id, pasien_nm, reg_id, alamat, kabupaten
        FROM reg_pasien
        WHERE  is_ranap ='0' and is_billing ='1' and is_active='1' and lokasi_id <> '03.01' and tgl_registrasi like '%$vdate%'");
       return $hasil;
  }  
    function data_nama_IGD2($vtanggal){
      $db3 = $this->load->database('sim2', TRUE);
        $vdate = date($vtanggal);
       $hasil = $db3->query( " 
         SELECT pasien_id, pasien_nm, reg_id, alamat, kabupaten
          from reg_pasien
          WHERE is_ranap ='0' and is_billing ='1' and is_active='1' and lokasi_id = '03.01' and tgl_registrasi like '%$vdate%'");
       return $hasil;
  }  
    
}