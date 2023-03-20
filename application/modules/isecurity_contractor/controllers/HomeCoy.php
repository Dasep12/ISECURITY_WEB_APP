<?php

class HomeCoy extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$id = $this->session->userdata('id_token');
        $this->iremake = $this->load->database('iremake', TRUE);
        $this->load->model('Main_model');

		if ($id == null || $id == "") {
			$this->session->set_flashdata('info_login', 'anda harus login dulu');
			redirect('Login');
		}
    }
    function index()
    {
        $data = array(
            'link'   => $this->uri->segment(2),
            // 'user' => $this->db->get_where('admviewakun_admin', array('id_karyawan' => $this->session->userdata('id_akun')))->row(),            
            'user'  => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),
        );
       
              // load model 
        
        $this->load->view("template/sidebarIsec",$data);
		// $this->load->view("dashboard", $data);
        $this->load->view('template/HomeJS');
		$this->load->view("template/footer");
      
    }
}

?>