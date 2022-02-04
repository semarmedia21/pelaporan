<?php

class Monitor extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Monitor_model');
	}

	public function index()
	{
        // load view admin/main.php
        $x['data_u']=$this->User_model->show_user();
        $x['ses_nama']=$this->session->userdata('nama');
        $x['aks']=$this->session->userdata('akses');
        $x['ses_id']=$this->session->userdata('id');
        $x['mon']=$this->Monitor_model->data();
        $this->load->view('admin/monitoring/overview',$x);
	}

    public function simpan_mon(){

        $this->form_validation->set_rules('tgl', 'tgl', 'required');

        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/Monitor/');

        }else{
                $tgl = $this->input->post('tgl');

                $qs1 = $this->input->post('softsel');
                if ($qs1 =='ya') {
                    $Q1 ='Terdapat masalah / kendala';
                } else {
                    $Q1 ='Berjalan dengan baik';
                }
                
                    $sf = $this->input->post('msoftarea');
                    if (empty($sf)) {
                        $soft ='--';
                        
                    } else {
                       $soft = $sf;
                    }
                
                        $ss = $this->input->post('msoftsol');
                        if(empty($ss)){
                            $ssoft ='--';
                        } else {
                            $ssoft = $ss;
                        }

                $qs2 = $this->input->post('hardsel');
                if ($qs2 =='ya') {
                    $Q2 ='Terdapat masalah / kendala';
                } else {
                    $Q2 ='Berjalan dengan baik';
                }
                
                    $ha = $this->input->post('hardarea');
                    if (empty($ha)) {
                        $hard ='--';
                        
                    } else {
                       $hard = $ha;
                    }
                
                        $hs = $this->input->post('hardsol');
                        if(empty($hs)){
                            $shard ='--';
                        } else {
                            $shard = $hs;
                        }

                 $qs3 = $this->input->post('jarsel');
                if ($qs3 =='ya') {
                    $Q3 ='Terdapat masalah / kendala';
                } else {
                    $Q3 ='Berjalan dengan baik';
                }
                
                    $ja = $this->input->post('jararea');
                    if (empty($ja)) {
                        $jar ='--';
                        
                    } else {
                       $jar = $ja;
                    }
                
                        $js = $this->input->post('jarsol');
                        if(empty($js)){
                            $sjar ='--';
                        } else {
                            $sjar = $js;
                        }

        $this->Monitor_model->insert_mon2(
            $tgl,
            $Q1,
            $soft,
            $ssoft,
            $Q2,
            $hard,
            $shard,
            $Q3,
            $jar,
            $sjar);
        $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
        redirect('Admin/Monitor/');
        }
    }

    public function edit_mon(){

        $this->form_validation->set_rules('tgl', 'tgl', 'required');

        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/Monitor/');

        }else{
                $id = $this->input->post('id');
                $tgl = $this->input->post('tgl');

                $qs1 = $this->input->post('softsel');
                if ($qs1 =='ya') {
                    $Q1 ='Terdapat masalah / kendala';
                } else {
                    $Q1 ='Berjalan dengan baik';
                }
                
                    $sf = $this->input->post('msoftarea');
                    if (empty($sf)) {
                        $soft ='--';
                        
                    } else {
                       $soft = $sf;
                    }
                
                        $ss = $this->input->post('msoftsol');
                        if(empty($ss)){
                            $ssoft ='--';
                        } else {
                            $ssoft = $ss;
                        }

                $qs2 = $this->input->post('hardsel');
                if ($qs2 =='ya') {
                    $Q2 ='Terdapat masalah / kendala';
                } else {
                    $Q2 ='Berjalan dengan baik';
                }
                
                    $ha = $this->input->post('hardarea');
                    if (empty($ha)) {
                        $hard ='--';
                        
                    } else {
                       $hard = $ha;
                    }
                
                        $hs = $this->input->post('hardsol');
                        if(empty($hs)){
                            $shard ='--';
                        } else {
                            $shard = $hs;
                        }

                 $qs3 = $this->input->post('jarsel');
                if ($qs3 =='ya') {
                    $Q3 ='Terdapat masalah / kendala';
                } else {
                    $Q3 ='Berjalan dengan baik';
                }
                
                    $ja = $this->input->post('jararea');
                    if (empty($ja)) {
                        $jar ='--';
                        
                    } else {
                       $jar = $ja;
                    }
                
                        $js = $this->input->post('jarsol');
                        if(empty($js)){
                            $sjar ='--';
                        } else {
                            $sjar = $js;
                        }

        $this->Monitor_model->edit_mon2(
            $id,
            $tgl,
            $Q1,
            $soft,
            $ssoft,
            $Q2,
            $hard,
            $shard,
            $Q3,
            $jar,
            $sjar);
        $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
        redirect('Admin/Monitor/');
        }
    }

    function hapus_mon(){
        $id=$this->input->post('id');
        $this->Monitor_model->hapus_monitor($id);
            $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
        redirect('Admin/Monitor/');
    }

    public function exportXls(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $tgl=date("Y-m-d H:i:s");
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Monitoring")
                 ->setSubject("Monitoring IT")
                 ->setDescription("Laporan Monitoring IT")
                 ->setKeywords("Data Monitoring IT");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "REKAP MONITORING APLIKASI & INFRASTRUKTUR IT");
    $excel->getActiveSheet()->mergeCells('A1:E1');
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14); 
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

    $excel->setActiveSheetIndex(0)->setCellValue('A2', "Data dan Informasi");
    $excel->getActiveSheet()->mergeCells('A2:E2');
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14); 
    $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

    $excel->setActiveSheetIndex(0)->setCellValue('A3', "Rumah Sakit Jiwa Provinsi Bali");
    $excel->getActiveSheet()->mergeCells('A3:E3');    
    $excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(14); 
    $excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
  
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A5', "NO"); // Set kolom A3
    $excel->getActiveSheet()->mergeCells('A5:A6'); 
   
    $excel->setActiveSheetIndex(0)->setCellValue('B5', "TANGGAL");
    $excel->getActiveSheet()->mergeCells('B5:B6'); 

    $excel->setActiveSheetIndex(0)->setCellValue('C5', "MONITORING SOFTWARE"); 
    $excel->getActiveSheet()->mergeCells('C5:E5');  
    $excel->getActiveSheet()->getStyle('C5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('C5')->getFont()->setSize(14); 
    $excel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 


    $excel->setActiveSheetIndex(0)->setCellValue('F5', "MONITORING HARDWARE"); 
    $excel->getActiveSheet()->mergeCells('F5:H5'); 
    $excel->getActiveSheet()->getStyle('F5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('F5')->getFont()->setSize(14); 
    $excel->getActiveSheet()->getStyle('F5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 


    $excel->setActiveSheetIndex(0)->setCellValue('I5', "MONITORING JARINGAN"); 
    $excel->getActiveSheet()->mergeCells('I5:K5');
    $excel->getActiveSheet()->getStyle('I5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('I5')->getFont()->setSize(14); 
    $excel->getActiveSheet()->getStyle('I5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    
    $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K5')->applyFromArray($style_col);
    
    //================================END ROW 5


    $excel->setActiveSheetIndex(0)->setCellValue('A6', ""); // Set kolom A3
    $excel->setActiveSheetIndex(0)->setCellValue('B6', ""); // Set kolom B3 
    $excel->setActiveSheetIndex(0)->setCellValue('C6', "STATUS");
    $excel->getActiveSheet()->getStyle('C6')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('C6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $excel->setActiveSheetIndex(0)->setCellValue('D6', "MASALAH"); 
    $excel->getActiveSheet()->getStyle('D6')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('D6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $excel->setActiveSheetIndex(0)->setCellValue('E6', "TINDAKAN"); // Set kolom
    $excel->getActiveSheet()->getStyle('E6')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('E6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $excel->setActiveSheetIndex(0)->setCellValue('F6', "STATUS");
    $excel->getActiveSheet()->getStyle('F6')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('F6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $excel->setActiveSheetIndex(0)->setCellValue('G6', "MASALAH");
    $excel->getActiveSheet()->getStyle('G6')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('G6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $excel->setActiveSheetIndex(0)->setCellValue('H6', "TINDAKAN");
    $excel->getActiveSheet()->getStyle('H6')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $excel->setActiveSheetIndex(0)->setCellValue('I6', "STATUS");
    $excel->getActiveSheet()->getStyle('I6')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('I6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $excel->setActiveSheetIndex(0)->setCellValue('J6', "MASALAH"); 
    $excel->getActiveSheet()->getStyle('J6')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('J6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// Set kolom 

    $excel->setActiveSheetIndex(0)->setCellValue('K6', "TINDAKAN"); 
    $excel->getActiveSheet()->getStyle('K6')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('K6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

   $excel->getActiveSheet()->getStyle('A6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K6')->applyFromArray($style_col);
//=================================== END ROW 6
    $vtanggal=$this->input->post('bulan');
    $lap=$this->Monitor_model->download_monitoring($vtanggal)->result();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 7; // Set baris pertama untuk isi tabel adalah baris ke 4

    foreach($lap as $data){ // Lakukan looping pada variabel siswa
    // foreach($lapamp as $data){ // Lakukan looping pada variabel siswa
      
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tanggal);
      
       $qu1= $data->q1;
        $m_soft=$data->mon_soft;
        $s_soft=$data->sol_soft;

        $qu2= $data->q2;
        $m_hard=$data->mon_hard;
        $s_hard=$data->sol_hard;

        $qu3= $data->q3;
        $m_jar=$data->mon_jar;
        $s_jar=$data->sol_jar;
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $qu1);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $m_soft);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $s_soft);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $qu2);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $m_hard);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $s_soft);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $qu3);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $m_jar);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $s_jar);
   
     
      
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.($numrow+0))->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.($numrow+0))->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.($numrow+0))->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.($numrow+0))->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.($numrow+0))->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.($numrow+0))->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.($numrow+0))->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.($numrow+0))->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.($numrow+0))->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.($numrow+0))->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.($numrow+0))->applyFromArray($style_row);
  
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); 
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); 
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); 
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); 
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); 
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); 
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); 
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); 


    $excel->getActiveSheet()->getStyle('A1:K100')
    ->getAlignment()->setWrapText(true);  
    
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Monitoring IT");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Monitoring_IT '.$tgl.'.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
      }
}