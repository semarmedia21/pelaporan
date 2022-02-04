<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Req extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Req_model');
        $this->load->model('User_model');
        $this->load->model('Daftar_model');
    }
   
    public function index(){
            $data['data_u']=$this->User_model->show_user();
            $data['kode'] = $this->Req_model->kode();
            $data['tampil'] = $this->Req_model->tampil();
            $data['dr']= $this->Req_model->dd_ruang();
            $data['du']= $this->Req_model->dd_unit();
            $data['ses_nama']=$this->session->userdata('nama');
            $data['aks']=$this->session->userdata('akses');
            $data['ses_id']=$this->session->userdata('id');
            // $data['dp']= $this->Req_model->dd_jp();
            
            $this->load->view('admin/req/overview', $data); 
        }

    public function input_damprah(){
            if($_POST){
                $reqno = $this->input->post('reqno');
                $jp = $this->input->post('jp');
                $det = $this->input->post('det');
                $stts_v = $this->input->post('stts_v');
                $stts_r = $this->input->post('stts_r');
                $tgl = $this->input->post('tgl_req');
                $wkt = $this->input->post('wkt_req');
                $unit = $this->input->post('ku');
                $this->Req_model->input_Damprah(array(
                    'reqno'        =>$reqno,
                    'jp'           =>$jp,
                    'uraian'       =>$det,
                    'status_val'   =>'1',
                    'status_res'   =>'Cek',
                    'tgl_req'      =>$tgl,
                    'wkt_req'      =>$wkt,
                    'petugas'      =>'5'
                   
                ));

                $this->session->set_flashdata('sukses2', $reqno." Informasi Detail Berhasil Disimpan");
                 // $this->session->set_flashdata('req', $reqno." ");
                $idreq = $reqno;

    
                }

            redirect("admin/req?reqno=".$idreq."&ku=".$unit );
        }

         public function edit_damprah(){
            if($_POST){
                $id = $this->input->post('id');
                $reqno = $this->input->post('reqno');
                $jp = $this->input->post('jp');
                $det = $this->input->post('det');
                // $stts_v = $this->input->post('stts_v');
                // $stts_r = $this->input->post('stts_r');
                $tgl = $this->input->post('tgl_req');
                $wkt = $this->input->post('wkt_req');
                $unit = $this->input->post('ku');
                $this->Req_model->edit_Damprah(array(
                    'id'        =>$id,
                    'reqno'        =>$reqno,
                    'jp'           =>$jp,
                    'uraian'       =>$det,
                    // 'status_val'   =>$stts_v,
                    // 'status_res'   =>$stts_r,
                    'tgl_req'      =>$tgl,
                    'wkt_req'      =>$wkt
                   
                ));

                $this->session->set_flashdata('sukses2', $jp." Informasi Detail Berhasil Disimpan");
                 // $this->session->set_flashdata('req', $reqno." ");
                $idreq = $reqno;
            }

            redirect("admin/req?reqno=".$idreq."&ku=".$unit );
        }

         public function edit_respon(){
            if($_POST){
                $id = $this->input->post('id');
                $reqno = $this->input->post('reqno');
                // $jp = $this->input->post('jp');
                $det = $this->input->post('det');
                $stts_v = $this->input->post('vs');
                $stts_r = $this->input->post('respon');
                $tgl = $this->input->post('tgl_req');
                $wkt = $this->input->post('wkt_req');
                $unit = $this->input->post('ku');
                $pet = $this->input->post('petugas');

                $this->Req_model->edit_respon(array(
                    'id'        =>$id,
                    'reqno'        =>$reqno,
                    // 'jp'           =>$jp,
                    'uraian'       =>$det,
                    'status_val'   =>$stts_v,
                    'status_res'   =>$stts_r,
                    'tgl_req'      =>$tgl,
                    'wkt_req'      =>$wkt,
                    'petugas'      => $pet
                   
                ));

                
                $idreq = $reqno; 

                $val1=$this->db->query("SELECT tb_amprah.`reqno`,tb_amprah.`status`,tb_det_amprah.`status_val` FROM tb_amprah
                 LEFT JOIN tb_det_amprah
                 ON tb_amprah.`reqno` = tb_det_amprah.`reqno`
                 WHERE tb_amprah.`reqno`= '$idreq'    
                 group by status_val");
                
                $data=$val1->num_rows();
                 if ($data > 1 ){
                      $id = $idreq;
                      $status= '2';
                      $this->Daftar_model->update_status($id,$status);
                 }

                 if ($data == 1 ){
                    foreach ($val1->result_array() as $i) {
                        $stat=$i['status_val'];
                            if($stat == 1){
                                    $id = $idreq;
                                    $status= '1';
                                    $this->Daftar_model->update_status($id,$status);
                            }elseif ($stat == 3   ) {
                                    $id = $idreq;
                                    $status= '3';
                                    $this->Daftar_model->update_status($id,$status);
                            }elseif ($stat == 2  ) {
                                    $id = $idreq;
                                    $status= '2';
                                    $this->Daftar_model->update_status($id,$status);
                            }
                        }
                  
                         }

            
        }
        $this->session->set_flashdata('sukses2', $reqno." Response Berhasil Disimpan");
 
            redirect("admin/req?reqno=".$idreq."&ku=".$unit );
        }



         function hapus_det(){
        $this->form_validation->set_rules('id', 'id', 'required');
        $id=$this->input->post('id');
        $reqno = $this->input->post('reqno');
         $unit = $this->input->post('kode_u');
        $this->Req_model->hapus_det($id);
            $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
        redirect("admin/req?reqno=".$reqno."&ku=".$unit );
    }

     function hapus_amp(){
        $this->form_validation->set_rules('id', 'id', 'required');
        $id=$this->input->post('id');
        $this->Daftar_model->hapus_amp($id);
        $this->Daftar_model->hapus_damp($id);
            $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
        redirect('Admin/Req/');
    }

 
        public function inputamprah(){
            if($_POST){
                 $reqno = $this->Req_model->kode();
                // $reqno = $this->input->post('reqno');
                $tanggal = $this->input->post('tanggal_req');
                 $waktu = $this->input->post('waktu_req');
                $ruang = $this->input->post('kode_r');
                $unit = $this->input->post('kode_u');
                $status = $this->input->post('status');
                $valid = $this->input->post('nama_val');
                $pemohon = $this->input->post('id_user');

                $this->Req_model->inputAmprah(array(
                    'reqno'       =>$reqno,
                    'tanggal_req' =>$tanggal,
                    'waktu_req' =>$waktu,
                    'kode_r'      =>$ruang,
                    'kode_pl'      =>$unit,
                    'status'      =>'1',
                    'nama_val'    =>$valid,
                    'id_user'     =>$pemohon
                ));

                $this->session->set_flashdata('sukses', $reqno." Data Berhasil Disimpan");
                $idreq = $reqno;
            }
            redirect("admin/req?reqno=".$idreq."&ku=".$unit );
        }

        public function editamprah(){
            if($_POST){
                $reqno = $this->input->post('reqno');
                $tanggal = $this->input->post('tanggal_req');
                 $waktu = $this->input->post('waktu_req');
                $ruang = $this->input->post('kode_r');
                $unit = $this->input->post('kode_u');
                $status = $this->input->post('status');
                $valid = $this->input->post('nama_val');
                $pemohon = $this->input->post('id_user');

                $this->Req_model->editAmprah(array(
                    'reqno'       =>$reqno,
                    'tanggal_req' =>$tanggal,
                    'waktu_req' =>$waktu,
                    'kode_r'      =>$ruang,
                    'kode_pl'      =>$unit,
                    'status'      =>$status,
                    'nama_val'    =>$valid,
                    'id_user'     =>$pemohon
                ));
                $this->session->set_flashdata('sukses', $reqno." Data Berhasil Disimpan");
                $idreq = $reqno;
            }
              redirect("admin/req?reqno=".$idreq."&ku=".$unit );
        }
    }