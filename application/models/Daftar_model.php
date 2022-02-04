<?php
class Daftar_model extends CI_Model{

      public function tampil_it()   {    
        $this->db->select('tb_amprah.`reqno`');
        $this->db->select('tb_amprah.`tanggal_req`');
        $this->db->select('tb_amprah.`waktu_req`');
        $this->db->select('tb_amprah.`status`');
        $this->db->select('tb_amprah.`nama_val`');
        $this->db->select('tb_amprah.`id_user`');
        $this->db->select('tb_ruang.`kode_ruang`');
        $this->db->select('tb_ruang.`nama_ruang`');
        $this->db->select('tb_unit_p.`kode_p`');
        $this->db->select('tb_unit_p.`nama_unit_p`');
        $this->db->select('tb_jp.`nama_jp`');
        $this->db->select('tb_petugas.`nama_petugas`');
      

        $this->db->from('tb_amprah');
        $this->db->join('tb_ruang', 'kode_ruang = kode_r', 'left');
        $this->db->join('tb_unit_p', 'kode_p = kode_pl', 'left');
        $this->db->join('tb_det_amprah', 'tb_amprah.`reqno` = tb_det_amprah.`reqno`','left outer');
        $this->db->join('tb_petugas', 'tb_det_amprah.`petugas` = tb_petugas.`id_petugas`','left');

        $this->db->join('tb_jp', 'tb_det_amprah.`jp` = tb_jp.`kode_jp`','left');

        $this->db->where('tb_amprah.`kode_pl`','IT'  );
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('tanggal_req', 'DESC');
        $this->db->order_by('waktu_req', 'DESC');
        $query = $this->db->get();
    return $query;
        }

        function hitung_data(){
       $hasil = $this->db->query( "
        SELECT count(id) as total,
        sum(case when status_val= '1' then 1 else 0 end) AS baru,
        sum(case when status_val = '2' then 1 else 0 end) AS proses,
        sum(case when status_val = '3' then 1 else 0 end) AS selesai
        FROM tb_det_amprah ");
       return $hasil;
        }

    public function tampil_it_baru()   {    
        $this->db->select('tb_amprah.`reqno`');
        $this->db->select('tb_amprah.`tanggal_req`');
        $this->db->select('tb_amprah.`waktu_req`');
        $this->db->select('tb_det_amprah.`status_val`');
        $this->db->select('tb_amprah.`nama_val`');
        $this->db->select('tb_amprah.`id_user`');
        $this->db->select('tb_ruang.`kode_ruang`');
        $this->db->select('tb_ruang.`nama_ruang`');
        $this->db->select('tb_unit_p.`kode_p`');
        $this->db->select('tb_unit_p.`nama_unit_p`');
        $this->db->select('tb_jp.`nama_jp`');
        $this->db->select('tb_petugas.`nama_petugas`');
      

        $this->db->from('tb_amprah');
        $this->db->join('tb_ruang', 'kode_ruang = kode_r', 'left');
        $this->db->join('tb_unit_p', 'kode_p = kode_pl', 'left');
        $this->db->join('tb_det_amprah', 'tb_amprah.`reqno` = tb_det_amprah.`reqno`','left outer');
        $this->db->join('tb_petugas', 'tb_det_amprah.`petugas` = tb_petugas.`id_petugas`','left');

        $this->db->join('tb_jp', 'tb_det_amprah.`jp` = tb_jp.`kode_jp`','left');

        $this->db->where('tb_amprah.`kode_pl`','IT'  );
        $this->db->where('tb_det_amprah.`status_val`','1'  );

        $this->db->order_by('status', 'ASC');
        $this->db->order_by('tanggal_req', 'DESC');
        $this->db->order_by('waktu_req', 'DESC');
        $query = $this->db->get();
    return $query;
        }

    public function tampil_it_proses()   {    
        $this->db->select('tb_amprah.`reqno`');
        $this->db->select('tb_amprah.`tanggal_req`');
        $this->db->select('tb_amprah.`waktu_req`');
        $this->db->select('tb_det_amprah.`status_val`');
        $this->db->select('tb_amprah.`nama_val`');
        $this->db->select('tb_amprah.`id_user`');
        $this->db->select('tb_ruang.`kode_ruang`');
        $this->db->select('tb_ruang.`nama_ruang`');
        $this->db->select('tb_unit_p.`kode_p`');
        $this->db->select('tb_unit_p.`nama_unit_p`');
        $this->db->select('tb_jp.`nama_jp`');
        $this->db->select('tb_petugas.`nama_petugas`');
      
      

        $this->db->from('tb_amprah');
        $this->db->join('tb_ruang', 'kode_ruang = kode_r', 'left');
        $this->db->join('tb_unit_p', 'kode_p = kode_pl', 'left');
        $this->db->join('tb_det_amprah', 'tb_amprah.`reqno` = tb_det_amprah.`reqno`','left outer');
        $this->db->join('tb_petugas', 'tb_det_amprah.`petugas` = tb_petugas.`id_petugas`','left');

        $this->db->join('tb_jp', 'tb_det_amprah.`jp` = tb_jp.`kode_jp`','left');

        $this->db->where('tb_amprah.`kode_pl`','IT'  );
        $this->db->where('tb_det_amprah.`status_val`','2'  );
        
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('tanggal_req', 'DESC');
        $this->db->order_by('waktu_req', 'DESC');
        $query = $this->db->get();
    return $query;
        }

    public function tampil_it_selesai()   {    
       $this->db->select('tb_amprah.`reqno`');
        $this->db->select('tb_amprah.`tanggal_req`');
        $this->db->select('tb_amprah.`waktu_req`');
        $this->db->select('tb_det_amprah.`status_val`');
        $this->db->select('tb_amprah.`nama_val`');
        $this->db->select('tb_amprah.`id_user`');
        $this->db->select('tb_ruang.`kode_ruang`');
        $this->db->select('tb_ruang.`nama_ruang`');
        $this->db->select('tb_unit_p.`kode_p`');
        $this->db->select('tb_unit_p.`nama_unit_p`');
        $this->db->select('tb_jp.`nama_jp`');
        $this->db->select('tb_petugas.`nama_petugas`');
      
      

        $this->db->from('tb_amprah');
        $this->db->join('tb_ruang', 'kode_ruang = kode_r', 'left');
        $this->db->join('tb_unit_p', 'kode_p = kode_pl', 'left');
        $this->db->join('tb_det_amprah', 'tb_amprah.`reqno` = tb_det_amprah.`reqno`','left outer');
        $this->db->join('tb_petugas', 'tb_det_amprah.`petugas` = tb_petugas.`id_petugas`','left');

        $this->db->join('tb_jp', 'tb_det_amprah.`jp` = tb_jp.`kode_jp`','left');

        $this->db->where('tb_amprah.`kode_pl`','IT'  );
        $this->db->where('tb_det_amprah.`status_val`','3'  );
        
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('tanggal_req', 'DESC');
        $this->db->order_by('waktu_req', 'DESC');
        $query = $this->db->get();
    return $query;
        }

    public function tampil_hum()   {    
        $this->db->select('tb_amprah.`reqno`');
        $this->db->select('tb_amprah.`tanggal_req`');
         $this->db->select('tb_amprah.`waktu_req`');
        $this->db->select('tb_amprah.`status`');
        $this->db->select('tb_amprah.`nama_val`');
        $this->db->select('tb_amprah.`id_user`');
        $this->db->select('tb_ruang.`kode_ruang`');
         $this->db->select('tb_ruang.`nama_ruang`');
         $this->db->select('tb_unit_p.`kode_p`');
        $this->db->select('tb_unit_p.`nama_unit_p`');
        $this->db->select('tb_jp.`nama_jp`');
        $this->db->select('tb_petugas.`nama_petugas`');
      

        $this->db->from('tb_amprah');
        $this->db->join('tb_ruang', 'kode_ruang = kode_r', 'left');
        $this->db->join('tb_unit_p', 'kode_p = kode_pl', 'left');
        $this->db->join('tb_det_amprah', 'tb_amprah.`reqno` = tb_det_amprah.`reqno`','left outer');
        $this->db->join('tb_petugas', 'tb_det_amprah.`petugas` = tb_petugas.`id_petugas`','left');

        $this->db->join('tb_jp', 'tb_det_amprah.`jp` = tb_jp.`kode_jp`','left');

        $this->db->where('tb_amprah.`kode_pl`','hum'  );
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('tanggal_req', 'DESC');
        $this->db->order_by('waktu_req', 'DESC');
        $query = $this->db->get();
    return $query;
        }

     function hapus_amp($id)
        {
           $hasil=$this->db->query("DELETE FROM tb_amprah WHERE reqno='$id'");
        return $hasil;
        }

    function hapus_damp($id)
        {
           $hasil=$this->db->query("DELETE FROM tb_det_amprah WHERE reqno='$id'");
        return $hasil;
        }

     function dd_status() {  
                $query= $this->db->get('tb_status');
                return $query;
            }
    function update_status($id, $status){
        $hasil=$this->db->query("UPDATE tb_amprah SET status ='$status' WHERE reqno='$id'");
        return $hsl;
    }

      // Update record
  function updateUser($id,$field,$value){

    // Update
    $data=array($field => $value);
    $this->db->where('id',$id);
    $this->db->update('tb_det_amprah',$data);
  }
    }
    