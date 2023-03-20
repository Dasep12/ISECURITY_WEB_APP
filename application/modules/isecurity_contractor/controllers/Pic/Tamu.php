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
        $this->load->view('Pic/Tamu');
        $this->load->view('template/SecOpsJS');
        $this->load->view("template/footer");
    }

    function Request(){
        
    }
    
}


?>