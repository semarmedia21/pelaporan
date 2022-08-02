<?php

class Laporan extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Laporan_model');
	}

	public function index()
	{
        // load view admin/main.php
        $x['lap_amp']=$this->Laporan_model->amprah();
        $x['lap_det_amp']=$this->Laporan_model->det_amprah();
        $x['data_u']=$this->User_model->show_user();
        $x['ses_nama']=$this->session->userdata('nama');
        $x['aks']=$this->session->userdata('akses');
        $x['ses_id']=$this->session->userdata('id');
        $this->load->view('admin/laporan/overview',$x);
	}

    function lap_thn(){
        $x['lap_amp']=$this->Laporan_model->amprah();
        $x['lap_det_amp']=$this->Laporan_model->det_amprah();
        $x['data_u']=$this->User_model->show_user();
        $x['ses_nama']=$this->session->userdata('nama');
        $x['aks']=$this->session->userdata('akses');
        $x['ses_id']=$this->session->userdata('id');
        $this->load->view('admin/laporan/overview_thn',$x);
    }

    function tampil_laporan(){
    $vtanggal=$this->input->post('vtanggal');
    $data['tampil_data']=$this->Laporan_model->tampil_data($vtanggal)->result();
    $this->load->view('admin/laporan/tampil_laporan',$data);
    }

     function tampil_laporan_thn(){
    $vtanggal=$this->input->post('vtanggal');
    $data['tampil_data']=$this->Laporan_model->tampil_data_thn($vtanggal)->result();
    $data['tampil_tot']=$this->Laporan_model->tot_data_thn($vtanggal)->result();
    $this->load->view('admin/laporan/tampil_laporan_thn',$data);
    }

    // public function exportPdf() {
    //         $tgl_awal = date('Y-m-d', strtotime($this->input->post('tanggal_awal')));
    //         $tgl_akhir = date('Y-m-d', strtotime($this->input->post('tanggal_akhir')));
    //         $lapamp = $this->Laporan_model->cari2($tgl_awal, $tgl_akhir);
    //         $tanggal = date('d-m-Y');
     
    //         $pdf = new \TCPDF();
    //         $pdf->AddPage();
    //         $pdf->SetFont('', 'B', 14);
    //         $pdf->Cell(115, 0, "Laporan Permintaan IT - ".$tanggal, 0, 1, 'L');
    //         $pdf->Cell(115, 0, "Tanggal Awal: ".date('d-m-Y', strtotime($this->input->post('tanggal_awal'))), 0, 1, 'L');
    //         $pdf->Cell(115, 0, "Tanggal Akhir: ".date('d-m-Y', strtotime($this->input->post('tanggal_akhir'))), 0, 1, 'L');
    //         $pdf->SetAutoPageBreak(true, 0);
             
    //         // Add Header
    //         $pdf->Ln(10);
    //         $pdf->SetFont('', 'B', 12);
    //         $pdf->Cell(10, 8, "No", 1, 0, 'C');
    //         $pdf->Cell(35, 8, "Reqno", 1, 0, 'C');
    //         $pdf->Cell(35, 8, "Tanggal", 1, 0, 'C');
    //         $pdf->Cell(35, 8, "Ruang/Unit", 1, 0, 'C');
    //         $pdf->Cell(50, 8, "Pemohon", 1, 0, 'C');
    //         $pdf->Cell(50, 8, "Penanggung jawab", 1, 0, 'C');
    //         $pdf->Cell(35, 8, "Jenis Pekerjaan", 1, 0, 'C');
    //         $pdf->Cell(50, 8, "Uraian", 1, 0, 'C');
    //         $pdf->Cell(15, 8, "Status", 1, 1, 'C');
    //         $pdf->SetFont('', '', 12);
     
    //         foreach($lapamp->result_array() as $k => $amprah) {
    //             $this->addRow($pdf, $k+1, $amprah);
    //         }
     
    //         $tanggal = date('d-m-Y');
    //         $pdf->Output('Laporan Permintaan IT - '.$tanggal.'.pdf'); 
    // }
 
    // private function addRow($pdf, $no, $amprah) {
 
    //     $pdf->Cell(10, 8, $no, 1, 0, 'C');
    //     $pdf->Cell(35, 8, $amprah['reqno'], 1, 0, '');
    //     $pdf->Cell(35, 8, date('d-m-Y', strtotime($amprah['tanggal'])), 1, 0, 'C');
    //     $pdf->Cell(35, 8, $amprah['nama_ruang'], 1, 0, 'C');
    //     $pdf->Cell(50, 8, $amprah['id_user'], 1, 0, 'C');
    //     $pdf->Cell(50, 8, $amprah['nama_val'], 1, 0, 'C');
    //     $pdf->Cell(35, 8, $amprah['nama_jp'], 1, 0, 'C');
    //     $pdf->Cell(50, 8, $amprah['uraian'], 1, 0, 'C');
    //     $pdf->Cell(35, 8, $amprah['mstatus'], 1, 1, 'C');
    //     // $pdf->Cell(15, 8, "Rp. ".number_format($amprah['total'], 2, ',' , '.'), 1, 1, 'L');
    // }

public function exportXls(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $tgl=date("Y-m-d H:i:s");
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Permintaan")
                 ->setSubject("Amprahan")
                 ->setDescription("Laporan Total Item Permintaan")
                 ->setKeywords("Data amprah");
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
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "REKAP LAPORAN PERMINTAAN IT");
    $excel->getActiveSheet()->mergeCells('A1:I1');
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14); 
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

    $excel->setActiveSheetIndex(0)->setCellValue('A2', "Data dan Informasi");
    $excel->getActiveSheet()->mergeCells('A2:I2');
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14); 
    $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

    $excel->setActiveSheetIndex(0)->setCellValue('A3', "Rumah Sakit Jiwa Provinsi Bali");
    $excel->getActiveSheet()->mergeCells('A3:I3');    
    $excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(14); 
    $excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
  
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A5', "NO"); // Set kolom A3 
    $excel->setActiveSheetIndex(0)->setCellValue('B5', "REQNO"); // Set kolom B3 
    $excel->setActiveSheetIndex(0)->setCellValue('C5', "TANGGAL"); // Set kolom 
    $excel->setActiveSheetIndex(0)->setCellValue('D5', "RUANGAN"); // Set kolom 
    $excel->setActiveSheetIndex(0)->setCellValue('E5', "PEMOHON"); // Set kolom 
    $excel->setActiveSheetIndex(0)->setCellValue('F5', "PENANGGUNG JAWAB"); // 
    $excel->setActiveSheetIndex(0)->setCellValue('G5', "PERIHAL"); // Set kolom D3 
    $excel->setActiveSheetIndex(0)->setCellValue('H5', "URAIAN"); // Set kolom E3 
    $excel->setActiveSheetIndex(0)->setCellValue('I5', "STATUS"); // Set kolom F3 
    $excel->setActiveSheetIndex(0)->setCellValue('J5', "PETUGAS"); // Set kolom F3 

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
   
    $vtanggal=$this->input->post('bulan');
    $lap=$this->Laporan_model->tampil_data($vtanggal)->result();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($lap as $data){ // Lakukan looping pada variabel siswa
    // foreach($lapamp as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->reqno);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->tanggal_req);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_ruang);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->id_user);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->nama_val);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->nama_jp);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->uraian);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->mstatus);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->nama_petugas);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); 
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); 
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); 
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); 
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); 
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);  
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Rekap Permintaan");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Laporan Amprah IT '.$tgl.'.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }

// ================================================================================
  
  public function exportXls_hum(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $tgl=date("Y-m-d H:i:s");
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Permintaan")
                 ->setSubject("Amprahan")
                 ->setDescription("Laporan Total Item Permintaan")
                 ->setKeywords("Data amprah");
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
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "REKAP LAPORAN PERMINTAAN HUMAS");
    $excel->getActiveSheet()->mergeCells('A1:I1');
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14); 
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

    $excel->setActiveSheetIndex(0)->setCellValue('A2', "Data dan Informasi");
    $excel->getActiveSheet()->mergeCells('A2:I2');
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14); 
    $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

    $excel->setActiveSheetIndex(0)->setCellValue('A3', "Rumah Sakit Jiwa Provinsi Bali");
    $excel->getActiveSheet()->mergeCells('A3:I3');    
    $excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(14); 
    $excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
  
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A5', "NO"); // Set kolom A3 
    $excel->setActiveSheetIndex(0)->setCellValue('B5', "REQNO"); // Set kolom B3 
    $excel->setActiveSheetIndex(0)->setCellValue('C5', "TANGGAL"); // Set kolom 
    $excel->setActiveSheetIndex(0)->setCellValue('D5', "RUANGAN"); // Set kolom 
    $excel->setActiveSheetIndex(0)->setCellValue('E5', "PEMOHON"); // Set kolom 
    $excel->setActiveSheetIndex(0)->setCellValue('F5', "PENANGGUNG JAWAB"); // 
    $excel->setActiveSheetIndex(0)->setCellValue('G5', "PERIHAL"); // Set kolom D3 
    $excel->setActiveSheetIndex(0)->setCellValue('H5', "URAIAN"); // Set kolom E3 
    $excel->setActiveSheetIndex(0)->setCellValue('I5', "STATUS"); // Set kolom F3 
    $excel->setActiveSheetIndex(0)->setCellValue('J5', "PETUGAS"); // Set kolom F3 

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
   
    $vtanggal=$this->input->post('bulan');
    $lap=$this->Laporan_model->tampil_data_hum($vtanggal)->result();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($lap as $data){ // Lakukan looping pada variabel siswa
    // foreach($lapamp as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->reqno);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->tanggal_req);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_ruang);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->id_user);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->nama_val);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->nama_jp);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->uraian);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->mstatus);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->nama_petugas);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); 
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); 
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); 
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); 
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); 
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);  
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Rekap Permintaan");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Laporan Amprah HUMAS '.$tgl.'.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
}
 
