<?php
##ini untuk mutasi 
## segala jenis mutasi, pengembalian, rotasi anggota akan di eleminasi fungsi fungsi di sini
class Mutasi Extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model("Admin");
        $this->load->library('encrypt');
        $this->load->helper('url');
        $id = $this->session->userdata('id_akun');
          if ($id == null || $id == "") {
             $this->session->set_flashdata('info', 'sessi berakhir silahkan login kembali');
                redirect('Login');
            } 
    }

    function index()
    {
        $data = array(
            'user' => $this->db->get_where('admviewakun_admin', array('id_akun' => $this->session->userdata('id_akun')))->row(),
        );
        $this->load->view('template/header',$data);
        $this->load->view('security/mutasi');
        $this->load->view('template/fotter');
    }
}
?>