<?php

class User extends CI_Controller{
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
            'akun'  => $this->iremake->get('admviewakun_admin')->result(),
          );

          
        $this->load->view("template/template_first",$data);
        $this->load->view('Cd/ControlUser');
        $this->load->view('template/CdJS');
        $this->load->view('template/fotter_first');

    }

    function ProfileAdmin($id_karyawan)
    {

      $data = array(
        'link'   => $this->uri->segment(3),
        'sublink'   => $this->uri->segment(2),
        'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),             
        'profile'   => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => $id_karyawan))->row(),
        'data' => $this->iremake->get_where('admmsadmin_profile', array('id_karyawan' => $id_karyawan))->row(),
      );

      $this->load->view('template/template_first',$data);
      $this->load->view('Cd/ProfileAdmin');
      $this->load->view('template/CdJS');
      $this->load->view('template/fotter_first');
    }

    function EditPaswword($id_karyawan){
      $data = array(
        'link'   => $this->uri->segment(3),
        'sublink'   => $this->uri->segment(2),
        'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),             
        'profile'   => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => $id_karyawan))->row(),
        'data' => $this->iremake->get_where('admmsadmin_profile', array('id_karyawan' => $id_karyawan))->row(),
      );

      $this->load->view('template/template_first',$data);
      $this->load->view('Cd/EditPassword');
      $this->load->view('template/CdJS');
      $this->load->view('template/fotter_first');
    }

    function UpdatePassword(){
      $id_karyawan = $this->input->post('id_karyawan');
      $data = array(
        'password'    => $this->input->post('pass'),
      );
      $input = $this->iremake->update('admisecsgp_msakun', $data , array('id_karyawan' => $id_karyawan));
      if($input){
        echo 'Sukses';
      }else{
        echo 'Gagal'; 
      }
    }

    function Updateakun(){

      $id_karyawan = $this->input->post('id_karyawan');
      $data = array(
        'wilayah' => $this->input->post('wil'),
        'area_kerja'  => $this->input->post('area_kerja'),
        'role'      => $this->input->post('level'),
        'status'    => $this->input->post('status'),
      );

      $input = $this->iremake->update('admisec_msrole', $data , array('id_karyawan' => $id_karyawan));
      if($input){
        echo 'Sukses';
      }else{
        echo 'Gagal'; 
      }

    }

    function PendafataranAKun()
    {
      $data = array(
        'link'   => $this->uri->segment(3),
        'sublink'   => $this->uri->segment(2),
        'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),            
      );
      $this->load->view("template/template_first",$data);
      $this->load->view('Cd/PendaftaranAkun');
      $this->load->view('template/CdJS');
      $this->load->view('template/fotter_first');
    }

    function getAreakerja(){
      $where = $this->input->post('id_wilayah');
      $searchTerm = $this->input->post('searchTerm'); 
      $response = $this->Cd->getAreakerja($where,$searchTerm);
      echo json_encode($response);
    }

    function AreaWilayah(){
      $searchTerm = $this->input->post('searchTerm'); 
      $response = $this->Cd_model->getAreakerja($searchTerm);
      echo json_encode($response);
    }

    function getWilayahKar(){
      $id_bp = $this->input->post('area');
      $list = $this->iremake->get_where("admisecmstr_wilayah",array("area" => $id_bp))->result();
      echo json_encode($list);
    }

    function AksesRoles(){
      $searchTerm = $this->input->post('searchTerm'); 
      $response = $this->Cd_model->getRoles($searchTerm);
      echo json_encode($response);
    }


    // MUBAJIR
    // function getApps(){
    //   $idApps = $this->input->post('id');
    //   $list = $this->iremake->get_where("admisecmstr_appsrole",array('apps' => $idApps))->result();
    //   echo json_encode($list);
    // }
}

?>