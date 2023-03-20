<?php

class Kendaraan extends CI_Controller{
    function __construct()
    {
      parent::__construct();
      $id = $this->session->userdata('id_akun');
      $cek = $this->Login->cek_msrole($id)->row();
      $validation = $cek->control_database;      
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
        'link'   => $this->uri->segment(2),
        'sublink'   => $this->uri->segment(3),
        'user' => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
      );
      $this->load->view('template/template_first',$data);
      // $this->load->view('Cd/Kendaraan');
		  $this->load->view('template/CdJS');
      $this->load->view('template/fotter_first');
     
      

    }

    function InputKendaraan()
    {
      $data = array(
        'user' => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
      );
      $this->load->view('template/header',$data);
      $this->load->view('Cd/InputKendaraan');
      $this->load->view('template/CdJS');
      $this->load->view('template/fotter');
    }

    function UpdateKendaraan()
    {
      $data = array(
        'user' => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
      );
      $this->load->view('template/header',$data);
      $this->load->view('Cd/InputKendaraan');
      $this->load->view('template/CdJS');
      $this->load->view('template/fotter');
    }

    function DataBaseKendaraan()
    {
      
    }
}

?>