<?php


class Control extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      $id = $this->session->userdata('id_akun');
     
      if ($id == null || $id == "") {
           $this->session->set_flashdata('info', 'sessi berakhir silahkan login kembali');
              redirect('Login');
          } 
    }

    function index()
    {
        $data = array(
            'user' => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),            
          );
        $this->load->view('template/header',$data);
        $this->load->view('Superadmin/control');
        $this->load->view('template/fotter');
    }

    function ProfileAdmin($id_karyawan)
    {

      $data = array(
        'user' => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),            
        'profile'   => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $id_karyawan))->row(),
        'data' => $this->db->get_where('admmsadmin_profile', array('id_karyawan' => $id_karyawan))->row(),
      );

      // echo '<pre>';
      // print_r($data);
      // die();
      $this->load->view('template/header',$data);
      $this->load->view('Superadmin/profile_admin',$data);
      $this->load->view('template/fotter',$data);
    }

    function Updateakun(){

      $id_karyawan = $this->input->post('id_karyawan');
      $data = array(
        'security_operation' => $this->input->post('SecOps'),
        'security_admin' => $this->input->post('SecAdm'),
        'layanan_security' => $this->input->post('LaySec'),
        'security_information' => $this->input->post('SecInfo'),
        'training' => $this->input->post('Training'),
        'asms' => $this->input->post('ASMS'),
        'atsg' => $this->input->post('ATSG'),           
        'smp' => $this->input->post('SMP'),           
        'control_database' => $this->input->post('ControlDatabase'),           
        'review' => $this->input->post('Review'),           
        'syncronize' => $this->input->post('Syncronize'),           
        'lo_g' => $this->input->post('Log'),           
      );
      
      $input = $this->db->update('admisec_msrole', $data , array('id_karyawan' => $id_karyawan));
      if($input){
        echo 'Sukses';
      }else{
        echo 'Gagal'; 
      }

    }
}

?>