<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
## ini controller Anggota
## segala jenis hal anggota akan berada pada controller inin
class Anggota extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      $this->load->model("Admin");
      $this->load->library('encrypt');
      $this->load->helper('url');
      $id = $this->session->userdata('id_akun');
        if ($id == null || $id == "") {
           $this->session->set_flashdata('info', 'sessi berakhir silahkan login kembali');
              redirect('Login');
          } 
         
    }

    function index()
    {
        $where = array('wilayah' => $this->session->userdata('wilayah'));
        $where1 = $this->session->userdata('wilayah');
        $user = $this->db->get_where('admviewakun_admin', array('id_akun' => $this->session->userdata('id_akun')))->row();
        $data = array(
            'user' => $this->db->get_where('admviewakun_admin', array('id_akun' => $this->session->userdata('id_akun')))->row(),
            'wilayah' => $this->db->get_where('admviewtrans_sgpprofile', array('wilayah' => $this->session->userdata('wilayah')))->num_rows(),
            'absensi' => $this->db->order_by('in_date','DESC')->get_where('admviewtrans_sgpabsensi',$where,50)->result(),
            'group' => $this->Admin->group($where1),
            'GroupWil' => $this->Pic->group(),
            'ktaAktif'   => $this->Pic->CountKTAWil($where1,"AKTIF"),
            'ktaTidakAktif'   => $this->Pic->CountKTAWil($where1,"TIDAK AKTIF"),
            );
            
        $this->load->view('template/header',$data);  
            switch (substr($user->id_akun,0,-7)) {
                    case 'ADM':
                        $this->load->view('security/anggota');
                    break;
                    case 'KRL':
                        $this->load->view('security/anggota');
                    break;
                    case 'PIC':
                        $this->load->view('security/anggota');
                    break;
                    case 'SPV':
                        $this->load->view('security/anggotaWil');
                    break;
                    case 'MGT':
                        $this->load->view('security/anggotaAll');
                    break; 
                default:
                    # code...
                    break;
            }
        $this->load->view('template/fotter');
    }

    function AnggotaArea($area_kerja)
    {
        $vor = $this->murry->denkrip($area_kerja);
        $wil = $this->session->userdata('wilayah');
     
        
        $data = array(
            'user' => $this->db->get_where('admviewakun_admin', array('id_akun' => $this->session->userdata('id_akun')))->row(),
            'wilayah' => $this->db->get_where('admviewtrans_sgpprofile', array ('area_kerja' => $vor))->num_rows(),
            'AnggotaWil' => $this->Admin->getAgtWil($wil, $vor)->result(),
            'area'  => $vor,
        );
        // echo '<pre>';
        // print_r($data);
        $this->load->view('template/header',$data);
        $this->load->view('security/anggota_area',$data);
        $this->load->view('template/fotter');
    }

    function AnggotaWilayah($wilayah)
    {
        $vor = $this->murry->denkrip($wilayah);
        // echo '<pre>';
        // print_r($vor);

        $where = array('wilayah' => $this->session->userdata('wilayah'));
        $data = array(
            'user' => $this->db->get_where('admviewakun_admin', array('id_akun' => $this->session->userdata('id_akun')))->row(),
            'wilayah' => $this->db->get_where('admviewtrans_sgpprofile', array('wilayah' => $this->session->userdata('wilayah')))->result(),
            'absensi' => $this->db->order_by('in_date','DESC')->get_where('admviewtrans_sgpabsensi',$where,50)->result(),
        );

        $this->load->view('template/header',$data);
        $this->load->view('security/anggota_wilayah',$data);
        $this->load->view('template/fotter');
    }

    function profiling($wil)
    {
        $where = array('wilayah' => $this->session->userdata('wilayah'));
        header('Content-Type: application/json');
        $data = $this->Admin->getProfiling($where)->row();
         echo json_encode($data);
    }

    function wilayah_list()
    {
        header('Content-Type: application/json');
        $list = $this->Pic->get_datatables();
     
        // var_dump($list);
        $data = array();
        $no = $this->input->post('start');
        // looping data mahasiswa
        foreach ($list as $Data_anggota) {
            $no++;
            $row = array();
            $row[] = $Data_anggota->npk;
            $row[] = $Data_anggota->nama;
            $row[] = $Data_anggota->area_kerja;
            $row[] = $Data_anggota->wilayah;
            $row[] = '<div class="btn-group">
            <a style="text-decoration:none;" href="'.site_url('profile').'/'.$this->murry->enkrip($Data_anggota->id_biodata).'" class="btn-icon"> <i class="ti-user"></i> Profile</a>
            </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
			"recordsTotal" => $this->Pic->count_all(),
			"recordsFiltered" => $this->Pic->count_filtered(),
            "data" => $data,
        );
    //   output to json format
    //   $this->output->set_output(json_encode($output));
        echo json_encode($output);
    }

    function ajax_list()
    {
        header('Content-Type: application/json');
        $list = $this->Admin->get_datatablesWil();
       //var_dump($list);
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $Data_anggota) {
            $no++;
            $row = array();
            $row[] = $Data_anggota->npk;
            $row[] = $Data_anggota->nama;
            $row[] = $Data_anggota->area_kerja;
            $row[] = $Data_anggota->wilayah;
            $row[] = $Data_anggota->foto;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
			"recordsTotal" => $this->Admin->count_AgtWil(),
			"recordsFiltered" => $this->Admin->count_filtered(),
            "data" => $data,
        );
      // output to json format
      // $this->output->set_output(json_encode($output));
        echo json_encode($output);
    }

    function PendAnggota()
    {
        $where = array('wilayah' => $this->session->userdata('wilayah'));
        $data = array(
            'user' => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
            'wilayah' => $this->db->get_where('admviewtrans_sgpprofile', array('wilayah' => $this->session->userdata('wilayah')))->result(),
            'absensi' => $this->db->order_by('in_date','DESC')->get_where('admviewtrans_sgpabsensi',$where,50)->result(),
        );
        $this->load->view('template/header',$data);
        $this->load->view('security/pendaftaran_anggota');
        $this->load->view('template/fotter');
    }

    function ProfileAgt($id_biodata)
    {
        $vor = $this->murry->denkrip($id_biodata);
        
        $data = array(
            'user' => $this->db->get_where('admviewakun_admin', array('id_akun' => $this->session->userdata('id_akun')))->row(),
            'profile'   => $this->db->get_where('admviewtrans_sgpprofile', array('id_biodata' => $vor))->row(),
        );
        
        $this->load->view('template/header',$data);
        $this->load->view('security/profileAnggota',$data);
        $this->load->view('template/fotter');
    }

    public function absensi()
    {
        $data = [
            'role_id'   => $this->input->post('id_biodata'),
            'bulan'     => $this->input->post('bulan'),
            'tahun'     => $this->input->post('tahun'),
            'tabel'     => 'admviewtrans_sgpabsensi',
        ];
        $this->load->view('security/absensi',$data);
    }

    public function Cetak()
    {

		$mpdf = new \Mpdf\Mpdf();
		$data2 = array(
            'data'      => $this->db->get_where('admviewtrans_sgpprofile',array('id_biodata' => $this->input->post('id_biodata'))),
            'role_id'   => $this->input->post('id_biodata'),
            'bulan'     => $this->input->post('bulan'),
            'tahun'     => $this->input->post('tahun'),
            'tabel'     => 'admviewtrans_sgpabsensi',
        );
		$data = $this->load->view('general/cetak_absensi', $data2, TRUE);
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle("Biodata Karyawan");
		$mpdf->SetAuthor("Murry Fuckin' Febrians");
		$mpdf->SetWatermarkText("I-SECURITY");
		$mpdf->showWatermarkText = true;
		$mpdf->watermark_font = 'DejaVuSansCondensed';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetHTMLFooter("&copy;Murry Febriansyah Putra");
		$mpdf->WriteHTML($data);
        $filename = "Download.pdf";
		$output = $mpdf->Output($filename);
        echo $output;
    }


    function updateFoto()
    {
        $idkaryawan = $this->input->post('id');
        $file = $this->input->post('file');
        // cek file eksis
        $cek = $this->db->get_where('admviewtrans_sgpprofile',array('id_biodata' => $idkaryawan))->row();
        $old = $cek->foto;
        if($cek->foto != ""){
          
            $path = "./assets/img/user/".$old;
            unlink($path);
            $data = array(
                'foto' => '',
            );
            $this->db->update('admisecsgp_msbiodata',$data, array('id_biodata' => $idkaryawan));
            $config['upload_path']="./assets/img/user"; //path folder file upload
            $config['allowed_types']='jpeg|jpg|png'; //type file yang boleh di upload
            $config['encrypt_name'] = TRUE; //enkripsi file name upload
            
            $this->load->library('upload',$config); //call library upload 
            if($this->upload->do_upload("file")){ //upload file
                $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
                
                $idkaryawan = $idkaryawan;//id_karyawan
                $nama = strtoupper($this->input->post('namaLengkap')); //nama
                $image= $data['upload_data']['file_name']; //set file name ke variable image
                
                $result= $this->Admin->UpdateFoto($idkaryawan,$image); //kirim value ke model m_upload
                echo 'Sukses';
            }else{
                echo 'Gagal';
            }
        }else{
            $config['upload_path']="./assets/img/user"; //path folder file upload
            $config['allowed_types']='jpeg|jpg|png'; //type file yang boleh di upload
            $config['encrypt_name'] = TRUE; //enkripsi file name upload
            
            $this->load->library('upload',$config); //call library upload 
            if($this->upload->do_upload("file")){ //upload file
                $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
                
                $idkaryawan = $idkaryawan;//id_karyawan
                $nama = strtoupper($this->input->post('namaLengkap')); //nama
                $image= $data['upload_data']['file_name']; //set file name ke variable image
                
                $result= $this->Admin->UpdateFoto($idkaryawan,$image); //kirim value ke model m_upload
                echo 'Sukses';
            }else{
                echo 'Gagal';
            }
        }
    }

    function export()
    {
        $data = array(
            'user' => $this->db->get_where('admviewakun_admin', array('id_akun' => $this->session->userdata('id_akun')))->row(),
            'wilayah' => $this->db->get_where('admviewtrans_sgpprofile', array('wilayah' => $this->session->userdata('wilayah')))->result(),
            'areaUser' => $this->db->get_where('admisec_msrole', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
        );

        $this->load->view('template/header',$data);
        $this->load->view('security/export');
        $this->load->view('template/fotter');
    }

    function exportProfile()
    {
        $wilayah = $this->input->post('wilayah');
        $area    = $this->input->post('area');
        $filename = "Biodata Data Anggota ". " " . $area ." ". $wilayah. " " . date('Y-m-d');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'REPORT PROFILING');
        $sheet->setCellValue('A2', 'I - SECURITY');
        $sheet->setCellValue('A3',$area);
        $sheet->setCellValue('A4',$wilayah);
        $sheet->setCellValue('A5', date('Y-m-d'));

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => ['borderStyle' => 'thin'],
            ],
            'color' => [
                'argb' => ['#f7df07'],
            ],
        ];
        $styleValue = [
            
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => ['borderStyle' => 'thin'],
            ],
            'color' => [
                'argb' => ['#f7df07'],
            ],
        ];
    
        $sheet->mergeCells('A6:A7');
        $sheet->mergeCells('B6:B7');
        $sheet->mergeCells('C6:C7');
        $sheet->mergeCells('D6:D7');
        $sheet->mergeCells('E6:E7');
        $sheet->mergeCells('F6:F7');
        $sheet->mergeCells('G6:G7');
        $sheet->mergeCells('H6:H7');
        $sheet->mergeCells('I6:I7');
        $sheet->mergeCells('J6:J7');
        $sheet->mergeCells('K6:K7');
        $sheet->mergeCells('L6:L7');
        $sheet->mergeCells('M6:M7');
        $sheet->mergeCells('N6:N7');
        $sheet->mergeCells('O6:O7');
        $sheet->mergeCells('P6:V6');
        $sheet->mergeCells('W6:AC6');
        $sheet->mergeCells('AD6:AD7');
        $sheet->mergeCells('AE6:AE7');
        $sheet->mergeCells('AF6:AF7');
        $sheet->getStyle('A6:AF7')->applyFromArray($styleArray);
        $sheet->setCellValue('A6', 'NO');
        $sheet->setCellValue('B6', 'AREA KERJA');
        $sheet->setCellValue('C6', 'WILAYAH');
        $sheet->setCellValue('D6', 'GOLONGAN DARAH');
        $sheet->setCellValue('E6', 'NPK');
        $sheet->setCellValue('F6', 'NAMA');
        $sheet->setCellValue('G6', 'NO KTP');
        $sheet->setCellValue('H6', 'NO KK');
        $sheet->setCellValue('I6', 'EMAIL');
        $sheet->setCellValue('J6', 'NO HANDPHONE');
        $sheet->setCellValue('K6', 'NO DARURAT');
        $sheet->setCellValue('L6', 'TINGGI BADAN');
        $sheet->setCellValue('M6', 'BERAT BADAN');
        $sheet->setCellValue('N6', 'NILAI IMT');
        $sheet->setCellValue('O6', 'KETERANG IMT');
        $sheet->setCellValue('P6', 'ALAMAT KTP');
        $sheet->setCellValue('W6', 'ALAMAT DOMISILI');
        $sheet->setCellValue('P7', 'ALAMAT');
        $sheet->setCellValue('Q7', 'RT');
        $sheet->setCellValue('R7', 'RW');
        $sheet->setCellValue('S7', 'KELURAHAN');
        $sheet->setCellValue('T7', 'KECAMATAN');
        $sheet->setCellValue('U7', 'KOTA/KABUPATEN');
        $sheet->setCellValue('V7', 'PROVINSI');
        $sheet->setCellValue('W7', 'ALAMAT');
        $sheet->setCellValue('X7', 'RT');
        $sheet->setCellValue('Y7', 'RW');
        $sheet->setCellValue('Z7', 'KELURAHAN');
        $sheet->setCellValue('AA7', 'KECAMATAN');
        $sheet->setCellValue('AB7', 'KOTA/KABUPATEN');
        $sheet->setCellValue('AC7', 'PROVINSI');
        $sheet->setCellValue('AD6', 'NO REG KTA');
        $sheet->setCellValue('AE6', 'EXPIRED KTA');
        $sheet->setCellValue('AF6', 'STATUS KTA');


        $export = $this->Admin->ExportExcel($area,$wilayah);
		// echo '<pre>';
        // print_r($export);
        // die();
        
        	$no = 1;
			$x = 8;
			foreach($export as $row)
			{
				$sheet->setCellValue('A'.$x, $no++);
				$sheet->setCellValue('B'.$x, $row->area_kerja);
				$sheet->setCellValue('C'.$x, $row->wilayah);
				$sheet->setCellValue('D'.$x, $row->gol_darah);
				$sheet->setCellValue('E'.$x, $row->npk);
				$sheet->setCellValue('F'.$x, $row->nama);
				$sheet->setCellValue('G'.$x, $row->ktp);
				$sheet->setCellValue('H'.$x, $row->kk);
				$sheet->setCellValue('I'.$x, $row->email);
				$sheet->setCellValue('J'.$x, $row->no_hp);
				$sheet->setCellValue('K'.$x, $row->no_emergency);
				$sheet->setCellValue('L'.$x, $row->tinggi_badan);
				$sheet->setCellValue('M'.$x, $row->berat_badan);
				$sheet->setCellValue('N'.$x, $row->imt);
				$sheet->setCellValue('O'.$x, $row->keterangan);
				$sheet->setCellValue('P'.$x, $row->jl_ktp);
				$sheet->setCellValue('Q'.$x, $row->rt_ktp);
				$sheet->setCellValue('R'.$x, $row->rw_ktp);
				$sheet->setCellValue('S'.$x, $row->kel_ktp);
				$sheet->setCellValue('T'.$x, $row->kec_ktp);
				$sheet->setCellValue('U'.$x, $row->kota_ktp);
				$sheet->setCellValue('V'.$x, $row->provinsi_ktp);
				$sheet->setCellValue('W'.$x, $row->jl_dom);
				$sheet->setCellValue('X'.$x, $row->rt_dom);
				$sheet->setCellValue('Y'.$x, $row->rw_dom);
				$sheet->setCellValue('Z'.$x, $row->kel_dom);
				$sheet->setCellValue('AA'.$x, $row->kec_dom);
				$sheet->setCellValue('AB'.$x, $row->kota_dom);
				$sheet->setCellValue('AC'.$x, $row->provinsi_dom);
				$sheet->setCellValue('AD'.$x, $row->no_kta);
				$sheet->setCellValue('AE'.$x, $row->expired_kta);
				$sheet->setCellValue('AF'.$x, $row->status_kta);
				$x++;
			}

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}


?>