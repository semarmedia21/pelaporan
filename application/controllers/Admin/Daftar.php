<?php

class Daftar extends CI_Controller {
   function __construct(){
        parent::__construct();
        $this->load->model('Daftar_model');
        $this->load->model('User_model');
    }

public function index()
    {

    }

	function it()
	{
        $x['data_u']=$this->User_model->show_user();
        $x['data'] = $this->Daftar_model->tampil_it();
        $x['data_baru'] = $this->Daftar_model->tampil_it_baru();
        $x['data_proses'] = $this->Daftar_model->tampil_it_proses();
        $x['data_selesai'] = $this->Daftar_model->tampil_it_selesai();
        $x['hitung_data'] = $this->Daftar_model->hitung_data()->result();
        $x['dd_st']= $this->Daftar_model->dd_status();
          $x['ses_nama']=$this->session->userdata('nama');
          $x['ses_id']=$this->session->userdata('id');
          $x['aks']=$this->session->userdata('akses');
          
        $this->load->view('admin/daftar_it/overview', $x); 
	}

   
   function humas()
    {
        $x['data_u']=$this->User_model->show_user();
        $x['data'] = $this->Daftar_model->tampil_hum();
        $x['dd_st']= $this->Daftar_model->dd_status();
          $x['ses_nama']=$this->session->userdata('nama');
          $x['ses_id']=$this->session->userdata('id');
          $x['aks']=$this->session->userdata('akses');
          
        $this->load->view('admin/daftar_hum/overview', $x); 
    }
	
	 function hapus_amp(){
        $this->form_validation->set_rules('id', 'id', 'required');
        $id=$this->input->post('id');
        $this->Daftar_model->hapus_amp($id);
        $this->Daftar_model->hapus_damp($id);
            $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
        redirect('Admin/Daftar/');
    }

  	 function update_status(){
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('status_val', 'status_val', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/Daftar/');
        }else{
        $id = $this->input->post('id');
        $status=$this->input->post('status_val');
        $this->Daftar_model->update_status($id,$status);
            $this->session->set_flashdata('sukses',"Status telah diperbaharui");
        redirect('Admin/daftar/');
        }
    }

    public function updateuser(){
     // POST values
     $id = $this->input->post('id');
     $field = $this->input->post('field');
     $value = $this->input->post('value');

     // Update records
     $this->Daftar_model->updateUser($id,$field,$value);

     echo 1;
     exit;
   }


}