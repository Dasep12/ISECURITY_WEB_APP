<?php

class Kontraktor extends CI_Controller{
    function __construct()
    {
      parent::__construct();
      $id = $this->session->userdata('id_akun');
      $cek = $this->Login->cek_msrole($id)->row();
      $validation = $cek->security_operation;
      if ($id == null || $id == "") {
           $this->session->set_flashdata('info', 'sessi berakhir silahkan login kembali');
              redirect('Login');
          } 
      if ($validation != 1){
         redirect('NotFound');
      }
    }
    
    function index()
    {
      $data = array(
        'user' => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
      );
      $this->load->view('template/header',$data);
      $this->load->view('SecOps/Kontraktor');
      $this->load->view('template/SecOpsJS');
      $this->load->view('template/fotter');
    }
}

?>