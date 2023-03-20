<?php

class ServersideAdmin extends CI_Controller
{
    function index()
    {
        header('Content-Type: application/json');
        $list = $this->murry->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        // looping data Admin
        foreach ($list as $Akses_admin) {
            $no++;
            $row = array();
            $row[] = $Akses_admin->id_karyawan;
            $row[] = $Akses_admin->nama;
            $row[] = $Akses_admin->wilayah;
            $row[] = '<div class="btn-group">
            <a style="text-decoration:none;" href="'.site_url('admin').'/'.$Akses_admin->id_karyawan.'" class="btn-icon"> <i class="ti-user"></i> Profile</a>
            </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
			"recordsTotal" => $this->murry->count_all(),
			"recordsFiltered" => $this->murry->count_filtered(),
            "data" => $data,
        );
    //   output to json format
        echo json_encode($output);
    }
}



?>