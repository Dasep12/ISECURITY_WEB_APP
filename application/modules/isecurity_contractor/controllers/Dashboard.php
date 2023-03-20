<?php

class Dashboard extends CI_Controller
{
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
    
    function index()
    {
        $id = $this->Login->cek_msrole($this->session->userdata('id_akun'))->row();
        $where = $id->wilayah;
        $data = array(
            'user' => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),
            'group' => $this->Admin->group($where),
            'wilayah' => $this->db->get_where('admviewtrans_sgpprofile', array('wilayah' => $where))->num_rows(),
          );
          // echo '<pre>';
          // var_dump($data);
          // die();
        $this->load->view('template/header',$data);
        $this->load->view('dashboard',$data);
        $this->load->view('template/fotter');
    }
}