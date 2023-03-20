<?php


class MasterModule extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->srsdb = $this->load->database('srs_bi', TRUE);
        $this->load->helper(['auth_apps']);
        $this->load->model("M_patrol", 'model');
    }

    public function list_module()
    {
        $data = [
            'link'           => $this->uri->segment(1),
            'apps'           => $this->model->ambilData("admisec_apps")->result(),
            'aplikasi'       => $this->db->query("SELECT am.id , am.name as nama_module , am.code , aa.name as nama_apps  FROM admisec_modules am left join admisec_apps aa on aa.id = am.apps_id")->result()
        ];
        $this->template->load("template/template_first", "settings/list_master_module", $data);
    }

    public function input()
    {
        $apps = $this->input->post("name_apps");
        $code = $this->input->post("code_module");
        $name = $this->input->post("module_name");
        $cek = $this->db->get_where("admisec_modules", ['code' => $code])->num_rows();
        if ($cek >= 1) {
            $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> code ' . $code . ' sudah digunakan ');
            redirect('Setting/MasterModule/list_module');
        } else {
            $data = [
                'name'      => $name,
                'code'      => $code,
                'apps_id'   => $apps
            ];
            $this->M_patrol->inputData($data, "admisec_modules");
            $this->session->set_flashdata('info', '<i class="icon fas fa-check"></i> Berhasil input data');
            redirect('Setting/MasterModule/list_module');
        }
    }
}
