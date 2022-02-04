<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sim extends CI_Controller {
    function __construct(){

        parent::__construct();
       
        $this->load->model('Jp_model');
        $this->load->model('Sim_model');
        $this->load ->model('User_model');
         // if($this->session->userdata('status') != "login"){
         //    redirect("Admin/Login");
        // }

    }

    function index(){
        $x['data_u']=$this->User_model->show_user();
          $x['ses_nama']=$this->session->userdata('nama');
          $x['aks']=$this->session->userdata('akses');
          $x['ses_id']=$this->session->userdata('id'); 
          if($this->session->userdata('status') != "login"){
            redirect("Admin/Login"); }

    }

    function pengunjung(){
        $x['data_u']=$this->User_model->show_user();
          $x['ses_nama']=$this->session->userdata('nama');
          $x['aks']=$this->session->userdata('akses');
          $x['ses_id']=$this->session->userdata('id'); 
        // $x['data_pengunjung']=$this->Sim_model->tampil_data($vtanggal)->result();
         $this->load->view('admin/simrs/data_pengunjung_rs',$x);
    }

    function pengunjung2(){
        $x['data_u']=$this->User_model->show_user();
          $x['ses_nama']=$this->session->userdata('nama');
          $x['aks']=$this->session->userdata('akses');
          $x['ses_id']=$this->session->userdata('id'); 
        // $x['data_pengunjung']=$this->Sim_model->tampil_data($vtanggal)->result();
         $this->load->view('admin/simrs/data_pengunjung_rs2',$x);
    }

    function o_suket(){
        $x['data_u']=$this->User_model->show_user();
          $x['ses_nama']=$this->session->userdata('nama');
          $x['aks']=$this->session->userdata('akses');
          $x['ses_id']=$this->session->userdata('id'); 
        // $x['data_pengunjung']=$this->Sim_model->tampil_data($vtanggal)->result();
         $this->load->view('admin/simrs/suket/data_suket',$x);
    }

     function covid_19(){
        $x['data_u']=$this->User_model->show_user();
          $x['ses_nama']=$this->session->userdata('nama');
          $x['aks']=$this->session->userdata('akses');
          $x['ses_id']=$this->session->userdata('id'); 
        // $x['data_pengunjung']=$this->Sim_model->tampil_data($vtanggal)->result();
         $this->load->view('admin/simrs/data_covid19_rs',$x);
    }

    function ci_co(){
        $x['data_u']=$this->User_model->show_user();
          $x['ses_nama']=$this->session->userdata('nama');
          $x['aks']=$this->session->userdata('akses');
          $x['ses_id']=$this->session->userdata('id'); 

          if($this->uri->segment(4) == TRUE){
            $regno = $this->uri->segment(4);
            $x['data_regno']=$this->Sim_model->cari_regno($regno)->result();
            $x['data_bayar']=$this->Sim_model->cari_bayar($regno)->result();
          }
           if($this->session->userdata('status') != "login"){
            redirect("Admin/Login"); }
         $this->load->view('admin/simrs/aktifkan_px/sim_ci_co',$x);
    }

    function aktifkan_px(){
    $regno=$this->input->post('regno');
    $this->Sim_model->aktifkan_px($regno);
    $this->Sim_model->hapus_bayar($regno);
        $this->session->set_flashdata('sukses',"BILLING PASIEN TELAH DIAKTIFKAN !");
    redirect("admin/sim/ci_co/$regno");
    }

    function ubah_bayar(){
    $regno=$this->input->post('regno');
    $bayar=$this->input->post('tgl_bayar');
    $this->Sim_model->update_bayar($regno,$bayar);
    $this->session->set_flashdata('sukses',"TANGGAL BAYAR DIUBAH !");
    redirect("admin/sim/ci_co/$regno");
    }

    function cari_regno(){
    $regno=$this->input->post('regno');
    redirect("admin/sim/ci_co/$regno");
    }

// caripengunjung
    function c_data_pengunjung(){
    $vtanggal=$this->input->post('vtanggal');
    $x['data_pengunjung']=$this->Sim_model->tampil_data($vtanggal)->result();
    $x['det_nama_rj']=$this->Sim_model->data_nama_RJ($vtanggal)->result();
    $x['det_nama_ri']=$this->Sim_model->data_nama_RI($vtanggal)->result();
    $x['det_nama_igd']=$this->Sim_model->data_nama_IGD($vtanggal)->result();
    $this->load->view('admin/simrs/tampil_pengunjung',$x);
    }

     function c_data_pengunjung2(){
    $vtanggal=$this->input->post('vtanggal');
    $x['data_pengunjung']=$this->Sim_model->tampil_data2($vtanggal)->result();
    $x['det_nama_rj']=$this->Sim_model->data_nama_RJ2($vtanggal)->result();
    $x['det_nama_ri']=$this->Sim_model->data_nama_RI2($vtanggal)->result();
    $x['det_nama_igd']=$this->Sim_model->data_nama_IGD2($vtanggal)->result();
    $this->load->view('admin/simrs/tampil_pengunjung2',$x);
    }

     function c_data_suket(){
    $vtanggal=$this->input->post('vtanggal');
    $x['data_tot_suket']=$this->Sim_model->total_suket($vtanggal)->result();
    // $x['det_suket_ol']=$this->Sim_model->data_nama_ol($vtanggal)->result();
    // $x['det_suket_ok']=$this->Sim_model->data_nama_ok($vtanggal)->result();
    // $x['det_suket_of']=$this->Sim_model->data_nama_of($vtanggal)->result();
    $this->load->view('admin/simrs/suket/tampil_osuket',$x);
    }

// cari covid
    function c_data_covid19(){
    $vtanggal=$this->input->post('vtanggal');
    $x['by_mrs']=$this->Sim_model->by_mrs($vtanggal)->result();
    $x['by_krs']=$this->Sim_model->by_krs($vtanggal)->result();
    $x['rawat']=$this->Sim_model->rawat($vtanggal)->result();
    $x['miles']=$this->Sim_model->miles($vtanggal)->result();
    $x['covid19_mrs']=$this->Sim_model->data_covid19_mrs($vtanggal)->result();
    $x['covid19_krs']=$this->Sim_model->data_covid19_krs($vtanggal)->result();
    $x['covid19_rawat']=$this->Sim_model->data_covid19_dirawat($vtanggal)->result();
    $x['covid19_miles']=$this->Sim_model->data_covid19_miles($vtanggal)->result();
    $this->load->view('admin/simrs/tampil_covid19',$x);
    }
    
    

    function tt(){
        $x['data_u']=$this->User_model->show_user();
          $x['ses_nama']=$this->session->userdata('nama');
          $x['aks']=$this->session->userdata('akses');
          $x['ses_id']=$this->session->userdata('id'); 
        $x['data']=$this->Sim_model->show_tt();
         $this->load->view('admin/simrs/overview',$x);
    }

    function edit_tt(){

        $this->form_validation->set_rules('tt_tot', 'tt_tot', 'required');
        $this->form_validation->set_rules('tt_isi', 'tt_isi', 'required');
        $this->form_validation->set_rules('kd_tt', 'kd_tt', 'required');
        $this->form_validation->set_rules('kd_tt_apli', 'kd_tt_apli', 'required');
         
        
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/Sim/tt');
        }else{
        $id_tt = $this->input->post('kd_tt');
        $id_tt_apli = $this->input->post('kd_tt_apli');
        $tt_tot = $this->input->post('tt_tot');
        $tt_isi = $this->input->post('tt_isi');
        $tt_sisa = $tt_tot - $tt_isi;
        
        $this->Sim_model->edit_tt($id_tt,$tt_tot,$tt_isi,$tt_sisa);

        $this->Sim_model->edit_tt_aplicares($id_tt_apli,$tt_tot,$tt_isi,$tt_sisa);

        $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
            redirect('Admin/Sim/tt');
       
        // $this->Sim_model->edit_tt($id_tt,$tt_tot,$tt_isi,$tt_sisa);
        // if($this->Sim_model->run()==TRUE){
        //     $this->Sim_model->edit_tt_apli($id_tt_apli,$tt_tot,$tt_isi,$tt_sisa);  
        //     $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
        //     redirect('Admin/Sim/');
        //         } 
           }
        
    }


 

}
