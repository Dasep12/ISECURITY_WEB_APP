<?php

class Karyawan extends CI_Controller{
    function __construct()
    {
      parent::__construct();
      $this->iremake = $this->load->database('iremake', TRUE);
      $this->load->model('Login_model');
      $this->load->model('Admin_model');
      $this->load->model('Cd_model');
      $id = "ADM-220927";
      $cek = $this->Login_model->cek_msrole($id)->row();
      if ($id == null || $id == "") {
           $this->session->set_flashdata('info', 'sessi berakhir silahkan login kembali');
              redirect('Login');
          } 
          
    }

    function index()
    {
      $data = array(
        'link'   => $this->uri->segment(3),
        'sublink'   => $this->uri->segment(2),
        'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),
      );

      $this->load->view('template/template_first',$data);
		  $this->load->view('Cd/ListKaryawan');
		  $this->load->view('template/CdJS');
      $this->load->view('template/fotter_first'); 
    }

    function getKarData()
    {
        header('Content-Type: application/json');
        $list = $this->Cd_model->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        // looping data Admin
        foreach ($list as $Akses_admin) {
            $no++;
            $row = array();
            $row[] = $Akses_admin->id_karyawan;
            $row[] = $Akses_admin->npk;
            $row[] = $Akses_admin->nama;
            $row[] = $Akses_admin->divisi;
            $row[] = $Akses_admin->department;
            $row[] = $Akses_admin->jabatan;
            $row[] = $Akses_admin->lokasi_tugas;
            $row[] = '<div class="btn-group">
            <a style="text-decoration:none;" href="'.site_url('admin').'/'.$Akses_admin->id_karyawan.'" class="btn-icon"> <i class="ti-user"></i> Profile</a>
            </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
			"recordsTotal" => $this->Cd_model->count_all(),
			"recordsFiltered" => $this->Cd_model->count_filtered(),
            "data" => $data,
        );
    //   output to json format
        echo json_encode($output);
    }
}

?>