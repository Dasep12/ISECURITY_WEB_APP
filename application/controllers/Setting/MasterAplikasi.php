<?php

class MasterAplikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->srsdb = $this->load->database('srs_bi', TRUE);
        $this->load->helper(['auth_apps']);
        $this->load->model("M_patrol", 'model');
    }

    public function list_app()
    {
        $data = [
            'link'           => $this->uri->segment(1),
            'aplikasi'       => $this->model->ambilData("admisec_apps")->result()
        ];
        $this->template->load("template/template_first", "settings/list_master_aplikasi", $data);
    }

    public function input(Type $var = null)
    {
        $name      = $this->input->post("name_apps");
        $code       = $this->input->post("code_apps");
        $data = [
            'name'                  => strtoupper($name),
            'code'                  => strtoupper($code),
            'created_by'                  => $this->session->userdata('id_token'),
            'status'                      => 1,
        ];
        $cekid = $this->db->get_where("admisec_apps", ['code' => $code]);
        if ($cekid->num_rows() > 0) {
            $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> Kode ' . $code . ' sudah di gunakan ');
        } else {
            $save =  $this->M_patrol->inputData($data, "admisec_apps");
            if ($save) {
                $this->session->set_flashdata('info', '<i class="icon fas fa-check"></i> Berhasil menambah data');
                redirect('Setting/MasterAplikasi/list_app');
            } else {
                $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menambah data');
                redirect('Setting/MasterAplikasi/list_app');
            }
        }
    }

    public function edit()
    {
        $name      = $this->input->post("name_apps1");
        $code       = $this->input->post("code_apps1");
        $data = [
            'name'                  => strtoupper($name),
            'code'                  => strtoupper($code),
            'status'                      => 1,
        ];
        $id                 = $this->input->post("id_apps");
        $where = ['id' => $id];
        $update = $this->M_patrol->update("admisec_apps", $data, $where);
        if ($update) {
            $this->session->set_flashdata('info', '<i class="icon fas fa-check"></i> Berhasil update data');
            redirect('Setting/MasterAplikasi/list_app');
        } else {
            $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> Gagal update data');
            redirect('Setting/MasterAplikasi/list_app');
        }
    }
}
