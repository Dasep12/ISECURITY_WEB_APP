<?php

class LaporanHarian extends CI_Controller{
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
      $this->load->view('template/header');
      // $this->load->view('');
      $this->load->view('template/fotter');
    }
}

?>