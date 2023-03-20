<?php

class Upload_anggota extends CI_Controller
{
    private $filename = "Format_Status_Kerja";
    function __construct()
    {
      parent::__construct();
      $this->load->library('encrypt');
      $id = $this->session->userdata('id_akun');
     
      if ($id == null || $id == "") {
           $this->session->set_flashdata('info', 'sessi berakhir silahkan login kembali');
              redirect('Login');
      }
          
    }
    

    function index(){

        if(isset($_POST['submit'])){
			$upload = $this->Sipd_model->uploadfile4($this->filename);
			if($upload['result'] =="success") {
            
        
                    // $excelreader = new PHPExcel_Reader_Excel2007();
                    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                    $loadexcel = $spreadsheet->load('assets/upload/status_karyawan/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel               
                    $sheet = $loadexcel->getActiveSheet()->toArray(null,true,true,true);

                    // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                    // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                     $data['sheet'] = $sheet ;
                    // echo '<pre>';
                    // print_r($sheet);
				 }else{
                     $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
                     echo $upload['error'];
                 }

		}


           $where = $this->session->userdata('wilayah');
           $data = array(
                'user' => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
                'group' => $this->Admin->group($where),
                'wilayah' => $this->db->get_where('admviewtrans_sgpprofile', array('wilayah' => $this->session->userdata('wilayah')))->num_rows(),
            );
        $this->load->view('template/header',$data);
        $this->load->view('upload_anggota');
        $this->load->view('template/fotter');
    }

    function upload(){
        $config['upload_path']="./assets/upload"; //path folder file upload
        $config['allowed_types']='xlsx'; //type file yang boleh di upload
        $config['encrypt_name'] = false; //enkripsi file name upload
        $this->load->library('upload',$config); //call library upload
        if($this->upload->do_upload("fileAnggota")){ //upload file
            $file = array('upload_data' => $this->upload->data());
            $fileName= $file['upload_data']['file_name']; //set file name ke variable image
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
            $spreadsheet = $reader->load('assets/upload/'.$fileName.''); 
            $sheetdata = $spreadsheet->getActiveSheet()->toArray();
            $sheetcount = count($sheetdata);
            $data1 = array();
            $data2 = array();
            
            if($sheetcount > 1){
                for ($i = 1; $i < $sheetcount; $i++){
                        $IdAnggota      = "AGT-".$sheetdata[$i][4];
                        $Nama           = $sheetdata[$i][5];
                        $Ktp            = $sheetdata[$i][7];  
                        $Kk             = $sheetdata[$i][8];
                        $TanggalLahir   = $sheetdata[$i][6];
                        $GolDarah       = $sheetdata[$i][3];
                        $Email          = $sheetdata[$i][9];
                        $NoHp           = $sheetdata[$i][10];
                        $NoEmergency    = $sheetdata[$i][11];
                        $TinggiBadan    = $sheetdata[$i][12];
                        $BeratBadan     = $sheetdata[$i][13];
                        $Imt            = $sheetdata[$i][14];
                        $Keterangan     = $sheetdata[$i][15];
                        $JlKtp          = $sheetdata[$i][16];
                        $RtKtp          = $sheetdata[$i][19];
                        $RwKtp          = $sheetdata[$i][20];
                        $KelKtp         = $sheetdata[$i][21];
                        $KecKtp         = $sheetdata[$i][22];
                        $KotaKtp        = $sheetdata[$i][23];
                        $ProvinsiKtp    = $sheetdata[$i][24];
                        $JlDom          = $sheetdata[$i][17];
                        $RtDom          = $sheetdata[$i][26];
                        $RwDom          = $sheetdata[$i][27];
                        $KelDom         = $sheetdata[$i][28];
                        $KecDom         = $sheetdata[$i][29];
                        $KotaDom        = $sheetdata[$i][30];
                        $ProvinsiDom    = $sheetdata[$i][31];

                        $Npk            = $sheetdata[$i][4];
                        $NoKta          = $sheetdata[$i][32];
                        $ExpiredKta     = $sheetdata[$i][33];
                        $Jabatan        = $sheetdata[$i][34];
                        $StatusAnggota  = "AKTIF";
                        $AreaKerja      = $sheetdata[$i][1];
                        $Wilayah        = $sheetdata[$i][2];
                        

                        $data1[]= array(
                          'id_biodata'              => $IdAnggota,
                          'nama'                    => $Nama,
                          'ktp'                     => $Ktp,
                          'kk'                      => $Kk,
                          'tanggal_lahir'           => $TanggalLahir,
                          'gol_darah'               => $GolDarah,
                          'email'                   => $Email,
                          'no_hp'                   => $NoHp,
                          'no_emergency'            => $NoEmergency,
                          'tinggi_badan'            => $TinggiBadan,
                          'berat_badan'             => $BeratBadan,
                          'imt'                     => $Imt,
                          'keterangan'              => $Keterangan,
                          'jl_ktp'                  => $JlKtp,
                          'rt_ktp'                  => $RtKtp,
                          'rw_ktp'                  => $RwKtp,
                          'kel_ktp'                 => $KelKtp,
                          'kec_ktp'                 => $KecKtp,
                          'kota_ktp'                => $KotaKtp,
                          'provinsi_ktp'            => $ProvinsiKtp,
                          'jl_dom'                  => $JlDom,
                          'rt_dom'                  => $RtDom,
                          'rw_dom'                  => $RwDom,
                          'kel_dom'                 => $KelDom,
                          'kec_dom'                 => $KecDom,
                          'kota_dom'                => $KotaDom,
                          'provinsi_dom'            => $ProvinsiDom,
                        );

                        $data2[]=array(
                         'id_employee'              => $IdAnggota,
                         'npk'                      => $Npk,
                         'no_kta'                   => $NoKta, 
                         'expired_kta'              => $ExpiredKta,
                         'jabatan'                  => $Jabatan,
                         'status_anggota'           => $StatusAnggota,
                         'area_kerja'               => $AreaKerja,
                         'wilayah'                  => $Wilayah,
                        );
                }
                
            }
            $input = $this->db->insert_batch('admisecsgp_msbiodata', $data1);
            $input = $this->db->insert_batch('admisecsgp_msemployee', $data2);
            if($input){
                echo 'Sukses';
            }else{
                echo 'Gagal';
            }
        }else{
            echo 'Gagal';
        }

    }

}

?>