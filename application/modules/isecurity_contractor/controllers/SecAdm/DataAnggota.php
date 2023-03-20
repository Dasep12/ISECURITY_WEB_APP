<?php

class DataAnggota extends CI_Controller{
    function __construct()
    {
      parent::__construct();
      $id = $this->session->userdata('id_akun');
      $cek = $this->Login->cek_msrole($id)->row();
      $validation = $cek->security_admin;
      if ($id == null || $id == "") {
           $this->session->set_flashdata('info', 'sessi berakhir silahkan login kembali');
              redirect('Login');
          } 
      if ($validation != 1){
         redirect('NotFound');
      }
    }


    function index(){
      $id = substr($this->session->userdata('id_akun'),0,3);
      $data = array(
        'user' => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
      );
      
      $cek = $this->Login->cek_msrole($this->session->userdata('id_akun'))->row();
      $data1 = array(
          'area_kerja' => $this->session->userdata('areaKerja'),
          'anggota' => $this->SecAdm->GetWhere('admviewtrans_sgpprofile',array('area_kerja' => $cek->area_kerja))->result(),
          'jumlahAnggota' => $this->SecAdm->GetWhere('admviewtrans_sgpprofile',array('area_kerja' => $cek->area_kerja))->num_rows(),
        );

      $data2 = array(

      );
      $data3 = array(

      );
      $data4 = array(

      );
      
      $data5 = array(

      );
    
     
      $this->load->view('template/header',$data);
      switch ($id) {
          case 'ADM':
            $this->load->view('SecAdm/DataAnggotaAdm',$data1);
            break;
          case 'KRL':
            $this->load->view('SecAdm/DataAnggotaKrl',$data2);
            break;
          case 'PIC':
            $this->load->view('SecAdm/DataAnggotaPic',$data3);
            break;
          case 'SPV':
            $this->load->view('SecAdm/DataAnggotaSpv',$data4);
            break;
          case 'MGT':
            $this->load->view('SecAdm/DataAnggotaMgt',$data5);
            break;  
        default:
          redirect('NotFound');
          break;
      }
      $this->load->view('template/fotter');
    }

    function AdminDataAnggota($area_kerja){

        $vor = $this->murry->denkrip($area_kerja);
        $data = array(
          'user' => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
          'anggota' => $this->SecAdm->GetWhere('admviewtrans_sgpprofile',array('area_kerja' => $vor))->result(),
        );
        // echo '<pre>';
        // print_r($data);
        // die();

        $this->load->view('template/header',$data);
        $this->load->view('SecAdm/ListAnggota',$data);
        $this->load->view('template/fotter');
    }

    function ProfileAgt($id_biodata){
      $vor = $this->murry->denkrip($id_biodata);
      $data = array(
        'user'      => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
        'profile'   => $this->db->get_where('admviewtrans_sgpprofile', array('id_biodata' => $vor))->row(),
    );

    $this->load->view('template/header',$data);
    $this->load->view('SecAdm/ProfileAnggota');
    $this->load->view('template/fotter');
    }

    function Absensi(){
          $data = [
            'role_id'   => $this->input->post('id_biodata'),
            'bulan'     => $this->input->post('bulan'),
            'tahun'     => $this->input->post('tahun'),
            'tabel'     => 'admviewtrans_sgpabsensi',
        ];
        $this->load->view('security/absensi',$data);
    }

    function UpdateFoto(){

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
}
?>