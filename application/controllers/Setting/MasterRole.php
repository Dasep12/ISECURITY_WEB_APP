<?php
class MasterRole extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->srsdb = $this->load->database('srs_bi', TRUE);
        $this->load->helper(['auth_apps']);
        $this->load->model("M_patrol", 'model');
    }

    public function list_role()
    {
        $data = [
            'link'          => $this->uri->segment(1),
            'role'          => $this->M_patrol->ambilData("admisecsgp_mstroleusr"),
        ];
        $this->template->load("template/template_first", "settings/mst_role", $data);
        // $this->load->view("template/sidebar", $data);
        // $this->load->view("MasterRole", $data);
        // $this->load->view("template/footer");
    }


    public function form_add()
    {
        $data = [
            'link'           => $this->uri->segment(1),
        ];
        $this->template->load("template/template_first", "settings/add_mst_role", $data);
        // $this->load->view("template/sidebar", $data);
        // $this->load->view("add_MasterRole", $data);
        // $this->load->view("template/footer");
    }

    public function input()
    {
        $id_role        = 'ADMRL' . substr(uniqid(rand(), true), 4, 4);
        $level          = strtoupper($this->input->post("level"));
        $status         = $this->input->post("status");

        $cek2 = $this->db->get_where("admisecsgp_mstroleusr", ['level' => $level])->num_rows();
        if ($cek2 >= 1) {
            $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> level ' . $level . ' sudah digunakan ');
            redirect('Setting/MasterRole/list_role');
        } else {
            $data = [
                'role_id'            => $id_role,
                'level'              => $level,
                'status'             => $status,
                'created_at'         => date('Y-m-d H:i:s'),
                'created_by'         => $this->session->userdata('id_token'),
            ];
            $this->M_patrol->inputData($data, "admisecsgp_mstroleusr");
            $this->session->set_flashdata('info', '<i class="icon fas fa-check"></i> Berhasil input data');
            redirect('Setting/MasterRole/list_role');
        }
    }


    public function hapus($id)
    {
        $where = ['role_id' => $id];
        $del = $this->M_patrol->delete("admisecsgp_mstroleusr", $where);
        if ($del) {
            $this->session->set_flashdata('info', '<i class="icon fas fa-check"></i> Berhasil hapus data');
            redirect('Setting/MasterRole/list_role');
        } else {
            $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> Gagal hapus data');
            redirect('Setting/MasterRole/list_role');
        }
    }
    public function edit()
    {
        $id =  $this->input->get('role_id');
        $data = [
            'link'       => $this->uri->segment(1),
            'data'       => $this->M_patrol->ambilData("admisecsgp_mstroleusr", ['role_id' => $id])->row(),
        ];
        $this->template->load("template/template_first", "edit_MasterRole", $data);
        // $this->load->view("template/sidebar", $data);
        // $this->load->view("edit_MasterRole", $data);
        // $this->load->view("template/footer");
    }

    public function update()
    {
        $id             = $this->input->post("id");
        $level          = strtoupper($this->input->post("level"));
        $status         = $this->input->post("status");
        $data = [
            'status'             => $status,
            'level'              => $level
        ];

        $where = ['role_id' => $id];
        $update = $this->M_patrol->update("admisecsgp_mstroleusr", $data, $where);
        if ($update) {
            $this->session->set_flashdata('info', '<i class="icon fas fa-check"></i> Berhasil update data');
            redirect('Setting/MasterRole/list_role');
        } else {
            $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> Gagal update data');
            redirect('Setting/MasterRole/list_role');
        }
    }
}
