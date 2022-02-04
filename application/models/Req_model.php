<?php
class Req_model extends CI_Model{

      public function tampil()   {    
            return $this->db->get('tb_amprah');
        }

      function dd_ruang() {  
                $query = $this->db->get('tb_ruang');
                return $query;
            }

     function dd_unit() {  
                $query= $this->db->get('tb_unit_p');
                return $query;
            }
     function dd_jp() {  
                $query = $this->db->get('tb_jp');
                return $query;
            }


        public function editAmprah($data){
            $this->db->where('reqno', $data['reqno']);
            $this->db->update('tb_amprah', $data) ;
        }

          public function edit_Damprah($data){
            $this->db->where('reqno', $data['reqno']);
            $this->db->where('id', $data['id']);
            $this->db->update('tb_det_amprah', $data) ;
        }

          public function edit_respon($data){
            $this->db->where('reqno', $data['reqno']);
            $this->db->where('id', $data['id']);
            $this->db->update('tb_det_amprah', $data) ;
        }

           function hapus_det($id)
        {
           $hasil=$this->db->query("DELETE FROM tb_det_amprah WHERE id ='$id'");
        return $hasil;
        }

        public function inputAmprah($data){
            $this->db->insert('tb_amprah', $data);    
        }

        public function input_Damprah($data){
            $this->db->insert('tb_det_amprah', $data);    
        }
 
        public function kode(){
          $this->db->select('RIGHT(tb_amprah.reqno,3) as reqno', FALSE);
          $this->db->order_by('reqno','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('tb_amprah');  //cek dulu apakah ada sudah ada kode di tabel.    
          
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->reqno) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $tgl=date('dmy');
              $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
              $kodetampil = "AMP"."-".$tgl."-".$batas;  //format kode
              return $kodetampil;  
         }

    }
    