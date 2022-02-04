<?php

class Main extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Main_model');
	}

	public function index()
	{
        // load view admin/main.php
        $x['grafik'] = $this->Main_model->laporanTahunan();
        $x['petugas'] = $this->Main_model->index_petugas();
        $x['task'] = $this->Main_model->pekerjaan();
        $x['data_u']=$this->User_model->show_user();
        $x['ses_nama']=$this->session->userdata('nama');
        $x['aks']=$this->session->userdata('akses');
        $x['ses_id']=$this->session->userdata('id');
        $this->load->view('admin/main',$x);
	}
}