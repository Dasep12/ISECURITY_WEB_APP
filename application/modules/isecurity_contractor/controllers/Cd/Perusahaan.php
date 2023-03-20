<?php
require 'vendor/autoload.php';
class Perusahaan extends CI_Controller{
    function __construct()
    {
      parent::__construct();
      $this->iremake = $this->load->database('iremake', TRUE);
      $this->load->model('Login_model');
      $this->load->model('Admin_model');
      $this->load->model('Cd_model');
      $id = "ADM-220927";
      $cek = $this->Login_model->cek_msrole($id)->row();
      if ($id == null || $id == "") {
           $this->session->set_flashdata('info', 'sessi berakhir silahkan login kembali');
              redirect('Login');
          } 
     
    }

    function index()
    {
      $data = array(
        'link'   => $this->uri->segment(3),
        'sublink'   => $this->uri->segment(2),
        'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),
      );
      $this->load->view('template/template_first',$data);
		  $this->load->view('Cd/Home');
		  $this->load->view('template/CdJS');
      $this->load->view('template/fotter_first');
    }

    function UserControl(){
      $data = array(
        'link'   => $this->uri->segment(3),
        'sublink'   => $this->uri->segment(2),
        'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),
      );
      $this->load->view('template/template_first',$data);
		  $this->load->view('Cd/ControlUser');
		  $this->load->view('template/CdJS');
      $this->load->view('template/fotter_first');
    }

    function DepartDivisi(){
      $data = array(
        'link'   => $this->uri->segment(3),
        'sublink'   => $this->uri->segment(2),
        'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),
        'Depart'  => $this->iremake->get('admviewtrans_depart')->result(),
        'Divisi'  => $this->iremake->get('admisecmstr_divisi')->result(),
      );
      $this->load->view('template/template_first',$data);
		  $this->load->view('Cd/DepartiDivisi');
		  $this->load->view('template/CdJS');
      $this->load->view('template/fotter_first'); 
    }

    function getDivisi(){

      $searchTerm = $this->input->post('searchTerm'); 
      $response = $this->Cd_model->getDivisi($searchTerm);
      echo json_encode($response);
    }

    function addDivisi(){
      $data = array(
        'id_divisi'   => $this->input->post('id_divisi'),
        'divisi'      => $this->input->post('divisi'),
      );

      $input = $this->iremake->insert('admisecmstr_divisi', $data);
      if($input){
        echo 'Sukses';
      }else{
        echo 'Gagal';
      }
    }

    function addDepartment(){
      $data = array(
        'id_divisi'       => $this->input->post('id_divisi'),
        'id_department'   => $this->input->post('idDepartment'),
        'department'      => $this->input->post('Department'),
      );

      $input = $this->iremake->insert('admisecmstr_depart',$data);
      if($input){
        echo 'Sukses';
      }else{
        echo 'Gagal';
      } 
    }

    function testspreadsheet(){
      date_default_timezone_set('Asia/Jakarta');
      // Load plugin PHPExcel nya
          $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');

          $spreadsheet = $reader->load('assets/DIVISI.xlsx'); // Load file yang tadi diupload ke folder excel               
          $sheetdata = $spreadsheet->getActiveSheet()->toArray();
          $sheetcount = count($sheetdata);
          $data1 = array();
          $data2 = array();
          
          echo '<pre>';
          echo print_r($sheetdata);
          die();
          if($sheetcount > 1){
                  for ($i = 1; $i < $sheetcount; $i++){
                          $apps                      = $sheetdata[$i][1];
                          $roleAkses                 = $sheetdata[$i][2];
                          // $jabatan                = $sheetdata[$i][3];
                          // $divisi                 = $sheetdata[$i][4];
                          // $department             = $sheetdata[$i][5];
                          // $lokasi_tugas           = $sheetdata[$i][6];
                          // $status                 = $sheetdata[$i][7];
                          // $nama                   = $sheetdata[$i][8];
                        

                          $data1[]= array(
                          'apps'			          => $apps,
                          'role_akses'          => $roleAkses,
                          );

                          // $data2[]= array(
                          //   'id_akun'			      => $id_karyawan,
                          //   'npk'					          => $npk,
                          //   'password'              => md5("Astra123"),
                          //   );

                          // $data3[]= array(
                          //   'id_karyawan'			      => $id_karyawan,
                          //   'nama'					        => $nama,
                          //   );
                  }
              }
              
              $input =  $this->iremake->insert_batch('admisecmstr_appsrole',$data1);
              if($input){                  
                  echo 'Sukses';
              }else{
                  echo "Gagal";
              }

    }
}

?>