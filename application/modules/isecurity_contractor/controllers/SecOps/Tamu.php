<?php
require_once 'vendor/autoload.php';
class Tamu extends CI_Controller{
 
    function __construct()
    {
      parent::__construct();
      $this->iremake = $this->load->database('iremake', TRUE);
      $this->load->model('Login_model');
      $this->load->model('Admin_model');
      $this->load->model('SecOps_model');
      $id = "ADM-220927";
      $cek = $this->Login_model->cek_msrole($id)->row();
      if ($id == null || $id == "") {
           $this->session->set_flashdata('info', 'sessi berakhir silahkan login kembali');
              redirect('Login');
          } 
     
    }

    function index(){
      
      $id = $this->Login_model->cek_msrole("ADM-220927")->row();
      
      $where = $id->wilayah;
      $data = array(
          'link'   => $this->uri->segment(3),
          'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),
          'group' => $this->Admin_model->group($where),
          'wilayah' => $this->iremake->get_where('admviewtrans_sgpprofile', array('wilayah' => $where))->num_rows(),
        );
        
      $this->load->view("template/sidebarIsec",$data);
      $this->load->view('SecOps/HomeVms');
      $this->load->view('template/SecOpsJS');
      $this->load->view("template/footer");
    }

    function TamuSecops(){
      
      $id = $this->Login_model->cek_msrole("ADM-220927")->row();
      
      $where = $id->wilayah;
      $data = array(
          'link'   => $this->uri->segment(3),
          'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),
          'group' => $this->Admin_model->group($where),
          'wilayah' => $this->iremake->get_where('admviewtrans_sgpprofile', array('wilayah' => $where))->num_rows(),
        );
        
      $this->load->view("template/sidebarIsec",$data);
      $this->load->view('SecOps/Tamu');
      $this->load->view('template/SecOpsJS');
      $this->load->view("template/footer");
    }


    function inputPerusahaan(){
      $id = $this->Login->cek_msrole($this->session->userdata('id_akun'))->row();
      $where = $id->area_kerja;
      $data = array(
          'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
          'perusahaan'  => $this->iremake->get('admisecmstr_perusahaan')->result(),
        );
      $this->load->view('template/header',$data);
      $this->load->view('SecOps/InputPerusahaan',$data);
      $this->load->view('Template/SecOpsJS');
      $this->load->view('template/footer');
    }

    function Inputcompany(){
        $nama = strtoupper($this->input->post('perusahaan'));
        $part = explode(" ",$nama);
        $id = substr($part[1],0,3) . rand(15,50) . substr($part[2],0,3) . rand(10,100)  ;
        $data = array(
          'id_perusahaan'       => $id,
          'perusahaan'          => strtoupper($nama),
          'status_perusahaan'   => $this->input->post('status'),
        );
        $input = $this->iremake->insert('admisecmstr_perusahaan', $data);
        if($input){
          echo 'Sukses';
        }else{
          echo 'Gagal';
        }
    }

    function InputDepartment(){
      $nama = strtoupper($this->input->post('department'));
      $part = explode(" ",$nama);
      $id = substr($part[0],0,3) . rand(15,50) . substr($part[1],0,3) . rand(10,100)  ;
      $data = array(
        'id_department'       => $id,
        'department'          => strtoupper($nama),
      );
      $input = $this->iremake->insert('admisecmstr_depart', $data);
      if($input){
        echo 'Sukses';
      }else{
        echo 'Gagal';
      }
  }

    function DataTamu(){
      $id = $this->Login_model->cek_msrole("ADM-220927")->row();
      $where = $id->area_kerja;
      $data = array(
          'link'   => $this->uri->segment(3),
          'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),
          'tamu' => $this->iremake->get('admsecmstr_tamu')->result(),
        );

        $this->load->view("template/sidebarIsec",$data);
        $this->load->view('SecOps/InputTamu');
        $this->load->view('template/SecOpsJS');
        $this->load->view("template/footer");

      // $this->load->view('template/header',$data);
      // $this->load->view('SecOps/InputTamu',$data);
      // $this->load->view('Template/SecOpsJS');
      // $this->load->view('template/footer');
    }

    function InputTamu(){

        $test = strtoupper($this->input->post('namaTamu'));
        $part = explode(" ",$test);
        $perusahaan = $this->input->post('perusahaan');
        $id = substr($part[0],0,4) . rand(15,50) . substr($part[1],0,4) . $perusahaan;

        $data = array(
        'id_tamu'             =>   $id,
        'namaTamu'            =>   strtoupper($this->input->post('namaTamu')),
        'noKtpTamu'           =>   $this->input->post('noKtp'),
        'alamat'              =>   $this->input->post('alamatTempatTinggal'),
        'noTelp'              =>   $this->input->post('no_hp'),
        'noPolice'            =>   strtoupper($this->input->post('nomorPolisiKendaraan')),
        'wargaNegara'         =>   $this->input->post('wargaNegara'),
        'id_perusahaan'       =>   $perusahaan,
        'tglPendaftaran'      =>   date("Y-m-d"),
        );
        $input = $this->iremake->insert('admsecmstr_tamu',$data);
        if($input){
           //   insert admmsadmin_profile
           $config['upload_path']="./assets/ImgSec/tamu"; //path folder file upload
           $config['allowed_types']='jpeg|jpg|png|JPG'; //type file yang boleh di upload
           $config['encrypt_name'] = TRUE; //enkripsi file name upload
           
           $this->load->library('upload',$config); //call library upload 
           if($this->upload->do_upload("file")){ //upload file
               $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
               
               $idtamu = $id;//id_karyawan
               $image= $data['upload_data']['file_name']; //set file name ke variable image
               
               $result= $this->SecOps_model->UploadFotoTamu($idtamu,$image); //kirim value ke model m_upload
               echo 'Sukses';
           }
        }else{
          echo 'Gagal';
        }
    }

    function compresimg(){
        
        $filename   = "dded32831aab313c85b7847de30dbf05.jpg";
        $destination_url = "./assets/img/tamu/";
        $location = "./assets/img/tamu/".$filename;
        $info = getimagesize($location);

        if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($location);
        elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($location);
        elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($location);
        imagejpeg($image, $location, 10);
        echo "Image uploaded successfully.";

        echo '<pre>';
        var_dump($info);
        die();
        $tmp_name = "murry";
        $valid_ext = array('png','jpeg','jpg');
        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        
        if(in_array($file_extension,$valid_ext)){
         // Compress Image
         compressImage($tmp_name,$location,10);

        }else{
          echo "Invalid file type.";
        }
     
        
    }

    function ocr(){
      $filename   = "8f9579176a9eab49d743ed690d8abe8a.jpg";
      $location = "./assets/img/tamu/".$filename;
      $fileData =   fopen($location, 'r');
      $client = new \GuzzleHttp\Client();
      
      $r = $client->request('POST', 'https://api.ocr.space/parse/image',[
          'headers' => ['apiKey' => 'K86347217888957'],
          'multipart' => [
              [
                'name' => 'language',
                'contents' => 'eng'
              ],
              [
                  'name' => 'file',
                  'contents' => $fileData
              ],
              [
                'name' => 'isOverlayRequired',
                'contents' => 'false'
              ]
          ]
      ], ['file' => $fileData]);

      echo '<pre>';
      $response =  json_decode($r->getBody(),true);
      print_r($response);
      die();
      $newarray = array('BodyText'=>array());
      foreach($response['ParsedResults'] as $pareValue) {
        $newarray['BodyText'][]=array(
            'Body'    => $pareValue['ParsedText'],
        );
      }
      echo '<pre>';
      $part = explode(" ",$pareValue['ParsedText']);
      echo json_encode($newarray);
      // print_r($part);
    }
    
    function uploadKTP(){
      
      $config['upload_path']="./assets/img/tamu"; //path folder file upload
      $config['allowed_types']='jpeg|jpg|png|JPG'; //type file yang boleh di upload
      $config['encrypt_name'] = true; //enkripsi file name upload
      
      $this->load->library('upload',$config); //call library upload 
     
      if($this->upload->do_upload("file")){ //upload file
          $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload    
          $image = $data['upload_data']['file_name']; //set file name ke variable image
          $destination_url = $data['upload_data']['file_path'];
          $location = $destination_url.$image;
          $info = getimagesize($location);
          echo '<pre>';
          var_dump($info);
          die();
          if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($location); 
          elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($location);
          elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($location);
          imagejpeg($image, $location, 60);
  
          echo "Sukses";
        }else{
          $error = array('error' => $this->upload->display_errors());
          var_dump($error);
        }
    }

    function getCompany(){

        $searchTerm = $this->input->post('searchTerm'); 
        $response = $this->SecOps_model->getUsers($searchTerm);

        echo json_encode($response);
    }

    function getTamu(){
        $searchTerm = $this->input->post('searchTerm');
        $response = $this->SecOps_model->getTamu($searchTerm);

        echo json_encode($response);
    }

    function getBertemuBp(){
      $searchTerm = $this->input->post('searchTerm');
      $response = $this->SecOps_model->getBertemuBp($searchTerm);

      echo json_encode($response);
    }

    function getProfileBP(){
      $id_bp = $this->input->post('id_businesspartner');
      $list = $this->iremake->get_where("admisecmstr_bp",array("id_businesspartner" => $id_bp))->result();
      echo json_encode($list);
    }  

    function getProfileTamu(){
      $id_tamu = $this->input->post("id_tamu");
      $list = $this->iremake->get_where("admviewprof_tamu", array("id_tamu" => $id_tamu))->result();
      echo json_encode($list);
    }

    function getKaryawan(){
      $searchTerm = $this->input->post('searchTerm'); 
      $response = $this->SecOps_model->getKar($searchTerm);
      echo json_encode($response);
    }

    function getProfileTKaryawan(){
      $Bertemu = $this->input->post("id_karyawan");
      $list = $this->iremake->get_where("admviewtrans_karprofile", array("id_karyawan" => $Bertemu))->result();
      echo json_encode($list);
    }

    function inputDivisi(){
      $nama = strtoupper($this->input->post('divisi'));
      $part = explode(" ",$nama);
      $id = substr($part[0],0,3) . rand(15,50) . substr($part[1],0,3) . rand(10,100)  ;
      $data = array(
        'id_divisi'           => $id,
        'id_department'       => $this->input->post('Getdepart'),
        'divisi'          => strtoupper($nama),
      );

     
      $input = $this->iremake->insert('admisecmstr_divisi', $data);
      if($input){
        echo 'Sukses';
      }else{
        echo 'Gagal';
      }
    }

    function Visitor(){
      $id = $this->Login_model->cek_msrole("ADM-220927")->row();
      $where = $id->area_kerja;
      $data = array(
          'link'   => $this->uri->segment(3),
          'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => 'ADM-220927'))->row(),
          'tamu' => $this->iremake->get('admsecmstr_tamu')->result(),
        );
      
        $this->load->view("template/sidebarIsec",$data);
        $this->load->view('SecOps/InputVisitor',$data);
        $this->load->view('template/SecOpsJS');
        $this->load->view("template/footer");
    }

    function InputVisitor()
    {
      $admin = $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => 'ADM-220927'))->row();
      $AdminArea = $admin->area_kerja;
      $id_visitor = strtoupper($this->input->post('namaTa')); 
      $part = explode(" ",$id_visitor);
      $month_num = date('m');
      $month_name = strtoupper(date("F", mktime(0, 0, 0, $month_num, 10)));
      $id = substr($part[0],0,3) ."/" . rand(10,1000) . '/' . $month_name .'/' . date('d').'/'. date('Y');
    
      $data = array(
        'id_transaksi'  =>  $id,
        'id_tamu'       => $id_visitor,
        'id_department' => $this->input->post('department'),
        'id_divisi'     => $this->input->post('divisi'),
        'id_karyawan'   => $this->input->post('Bertemu'),
        'kepentingan'   => strtoupper($this->input->post('kepentingan')),
        'tanggal'       => date('Y-m-d'),
        'area'          => $AdminArea,
      );
      $input = $this->iremake->insert('admisectrans_visitor',$data);
      if($input){
        echo 'Sukses';
      }else{
        echo 'Gagal';
      }
    }

    function ListVisitor()
    {
      $tanggal = date('Y-m-d');
      
      $id = $this->Login_model->cek_msrole("ADM-220927")->row();
      $where = $id->area_kerja;
      $data = array(
          'link'   => $this->uri->segment(3),
          'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),
          'tamu' => $this->iremake->query("SELECT * FROM admviewtrans_visitor WHERE tanggal =  '$tanggal' AND area = '$where' ")->result(),
        );

        // echo '<pre>';
        // var_dump($data);
        // die();
      
        $this->load->view("template/sidebarIsec",$data);
        $this->load->view('SecOps/ListVisitor');
        $this->load->view('template/SecOpsJS');
        $this->load->view("template/footer");
    }

    function DataBaseTamu()
    {
      $id = $this->Login_model->cek_msrole($this->session->userdata('id_akun'))->row();
      $where = $id->area_kerja;
      $data = array(
          'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
          'tamu' => $this->iremake->get('admviewprof_tamu')->result(),
        );

      $this->load->view('template/header',$data);
      $this->load->view('SecOps/DataBaseTamu');
      $this->load->view('Template/SecOpsJS');
      $this->load->view('template/fotter');
    }

    function ProfileTamu($id_tamu)
    {

      $id = $this->Login_model->cek_msrole($this->session->userdata('id_akun'))->row();
      $where = $id->area_kerja;
      $data = array(
          'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
          'ProfileTamu' => $this->iremake->get_where('admviewprof_tamu',array('id_tamu' => $id_tamu))->row(),
          'TransaksiTamu'  => $this->iremake->get_where('admviewtrans_visitor', array('id_tamu' => $id_tamu))->result(),
        );
        // echo '<pre>';
        // var_dump($data);
        // die();

      $this->load->view('template/header',$data);
      $this->load->view('SecOps/ProfileTamu');
      $this->load->view('Template/SecOpsJS');
      $this->load->view('template/fotter');
    }
}

?>