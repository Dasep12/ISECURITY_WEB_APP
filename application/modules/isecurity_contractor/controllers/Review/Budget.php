<?php

class Budget extends CI_Controller{
    function __construct()
    {
      parent::__construct();
      $id = $this->session->userdata('id_akun');
      $validation = $this->session->userdata('review');
      if ($id == null || $id == "") {
           $this->session->set_flashdata('info', 'sessi berakhir silahkan login kembali');
              redirect('Login');
          } 
      if ($validation != 1){
         redirect('NotFound');
      }
    }
}

?>