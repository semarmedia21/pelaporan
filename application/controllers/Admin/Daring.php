<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Daring extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Daring_model');
        $this->load->model('User_model');
         if($this->session->userdata('status') != "login"){
            redirect("Admin/Login");
        }
    }
    
    function index(){
        $x['data_u']=$this->User_model->show_user();
        $x['data']=$this->Daring_model->show_daring();
          $x['ses_nama']=$this->session->userdata('nama');
          $x['ses_id']=$this->session->userdata('id');
           $x['aks']=$this->session->userdata('akses');
        $this->load->view('admin/daring/overview',$x);
    }

    function simpan_daring(){
        $id = $this->input->post('id');
        $tgl = $this->input->post('tgl');
        $wkt = $this->input->post('wkt');
        $pel = $this->input->post('pel');
        $keg = $this->input->post('keg');
        
        $this->Daring_model->simpan_daring($id,$tgl,$wkt,$pel,$keg);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
            redirect('Admin/Daring/');
        
    }


    function edit_daring(){
       
        $id = $this->input->post('id');
        $tgl = $this->input->post('tgl');
        $wkt = $this->input->post('wkt');
        $pel = $this->input->post('pel');
        $keg = $this->input->post('keg');
        $this->Daring_model->edit_daring($id,$tgl,$wkt,$pel,$keg);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
        redirect('Admin/Daring/');
        
    }

    function hapus_daring(){
        $id=$this->input->post('id');
        $this->Daring_model->hapus_daring($id);
            $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
        redirect('Admin/Daring/');
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
                 ->setTitle("Data Kegiatan Daring")
                 ->setSubject("Kegiatan Daring")
                 ->setDescription("Laporan kegiatan daring")
                 ->setKeywords("Data Daring");
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
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "REKAP LAPORAN KEGIATAN DARING");
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
    $excel->setActiveSheetIndex(0)->setCellValue('B5', "TANGGAL"); // Set kolom B3 
    $excel->setActiveSheetIndex(0)->setCellValue('C5', "WAKTU"); // Set kolom 
    $excel->setActiveSheetIndex(0)->setCellValue('D5', "PELAKSANA"); // Set kolom 
    $excel->setActiveSheetIndex(0)->setCellValue('E5', "DETAIL KEGIATAN"); // Set kolom 

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
    
   
    $vtanggal=$this->input->post('bulan');
    $lap=$this->Daring_model->download_daring($vtanggal)->result();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($lap as $data){ // Lakukan looping pada variabel siswa
    // foreach($lapamp as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tanggal);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->waktu);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->pelaksana);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->kegiatan);
      
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
     
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); 
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); 
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); 
    
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Rekap Kegiatan Daring");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Laporan Daring '.$tgl.'.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
      }

  }

