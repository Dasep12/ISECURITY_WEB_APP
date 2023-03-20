<?php
class MasterRoleApp extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->srsdb = $this->load->database('srs_bi', TRUE);
        $this->load->helper(['auth_apps']);
        $this->load->model("M_patrol", 'model');
    }

    public function list_role_app()
    {
        $data = [
            'link'          => $this->uri->segment(1),
            'role'          => $this->M_patrol->ambilData("admisecsgp_mstroleusr"),
            'aplikasi'       => $this->model->ambilData("admisec_apps")->result(),
            'role_level'    => $this->db->query("SELECT amr.id , am.name , aa.name as aps_name , amr.crt  , amr.red , amr.edt  , amr.dlt  , am2.level
            FROM admisec_modules_roles amr 
            inner join admisec_modules am on am.id  = amr.modules_id 
            inner join admisecsgp_mstroleusr am2 on am2.role_id  = amr.roles_id 
            inner join admisec_apps aa on aa.id  = am.apps_id order by am2.level desc ")->result()
        ];
        $this->template->load("template/template_first", "settings/list_role_app", $data);
    }

    public function getNameModule()
    {
        $id = $this->input->post("id");
        $module    = $this->M_patrol->ambilData("admisec_modules", ['apps_id' => $id]);
        if ($module->num_rows() > 0) {
            echo json_encode($module->result_array());
        } else {
            echo "0";
        }
    }

    public function input()
    {
        $level_id = $this->input->post("level_name");
        $module_id = $this->input->post("module_name");
        $create = $this->input->post("create");
        $read = $this->input->post("read");
        $edit = $this->input->post("edit");
        $delete = $this->input->post("delete");

        $cek2 = $this->db->get_where("admisec_modules_roles", ['modules_id' => $module_id, 'roles_id' => $level_id])->num_rows();
        if ($cek2 >= 1) {
            $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> level ' . $level_id . ' sudah digunakan ');
            redirect('Setting/MasterRoleApp/list_role_app');
        } else {
            $data = [
                'modules_id'    => $module_id,
                'roles_id'      => $level_id,
                'crt'           => $create,
                'red'           => $read,
                'edt'           => $edit,
                'apr'           => 0,
                'rjc'           => 0,
            ];
            $this->M_patrol->inputData($data, "admisec_modules_roles");
            $this->session->set_flashdata('info', '<i class="icon fas fa-check"></i> Berhasil input data');
            redirect('Setting/MasterRoleApp/list_role_app');
        }
    }


    public function hapus($id)
    {
        $where = ['role_id' => $id];
        $del = $this->M_patrol->delete("admisecsgp_mstroleusr", $where);
        if ($del) {
            $this->session->set_flashdata('info', '<i class="icon fas fa-check"></i> Berhasil hapus data');
            redirect('MasterRoleApp/list_role_app');
        } else {
            $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> Gagal hapus data');
            redirect('MasterRoleApp/list_role_app');
        }
    }


    public function updateRole()
    {
        $id           = $this->input->post("id");
        $col          = $this->input->post("colom");
        $status       = $this->input->post("stat");
        $where = ["id" => $id];
        $data = [
            $col  => $status
        ];
        $update = $this->M_patrol->update("admisec_modules_roles", $data, $where);
        if ($update > 0) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
