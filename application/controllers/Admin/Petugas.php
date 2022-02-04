<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Petugas extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Petugas_model');
        $this->load ->model('User_model');
         if($this->session->userdata('status') != "login"){
            redirect("Admin/Login");
        }
    }
    
    function index(){
        $x['data_u']=$this->User_model->show_user();
        $x['data']=$this->Petugas_model->show_petugas();
        $x['dd']= $this->Petugas_model->tampil_dd();
          $x['ses_nama']=$this->session->userdata('nama');
          $x['aks']=$this->session->userdata('akses');
          $x['ses_id']=$this->session->userdata('id');
        $this->load->view('admin/petugas/overview',$x);
    }

    function simpan_p(){

        $this->form_validation->set_rules('nama_p', 'nama_p', 'required');
         $this->form_validation->set_rules('kode_p', 'kode_p', 'required');
        
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/Petugas/');
        }else{
        $id_p = $this->input->post('id_p');
        $nama_p=$this->input->post('nama_p');
        $kode_p=$this->input->post('kode_p');
        $this->Petugas_model->simpan_p($id_p,$nama_p,$kode_p);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
            redirect('Admin/Petugas/');
        }
    }


    function edit_p(){
        $this->form_validation->set_rules('id_p', 'id_p', 'required');
        $this->form_validation->set_rules('nama_p', 'nama_p', 'required');
        $this->form_validation->set_rules('kode_p', 'kode_p', 'required');
        
        
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/Petugas/');
        }else{
        $id_p = $this->input->post('id_p');
        $nama_p=$this->input->post('nama_p');
        $kode_p=$this->input->post('kode_p');

        $this->Petugas_model->edit_p($id_p,$nama_p,$kode_p);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
        redirect('Admin/Petugas/');
        }
    }

    function hapus_p(){
        $this->form_validation->set_rules('id_p',  'required');
        $id_p=$this->input->post('id_p');
        $this->Petugas_model->hapus_p($id_p);
            $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
        redirect('Admin/Petugas/');
    }
 

}
