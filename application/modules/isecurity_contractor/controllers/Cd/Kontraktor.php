<?php

class Kontraktor extends CI_Controller{
    function __construct()
    {
      parent::__construct();
      $this->iremake = $this->load->database('iremake', TRUE);
      $this->load->model('Login_model');
      $this->load->model('Admin_model');
      $this->load->model('Cd_model');
      $id = "ADM-220927";
      $cek = $this->Login_model->cek_msrole($id)->row();
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
        'link'   => $this->uri->segment(3),
        'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),
      );
      $this->load->view('template/template_first',$data);
      
		  $this->load->view('template/CdJS');
      $this->load->view('template/fotter_first');
    }
}

?>