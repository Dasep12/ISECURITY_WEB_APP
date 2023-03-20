<?php


class Pengguna extends CI_Controller
{
    public function __construct(Type $var = null)
    {
        parent::__construct();
        $id = $this->session->userdata('id_token');
        if ($id == null || $id == "") {
            $this->session->set_flashdata('info_login', 'anda harus login dulu');
            redirect('Login');
        }
        $this->load->helper(['auth_apps']);
        $this->load->helper('db_settings');
        $this->load->model("M_patrol", 'model');
    }

    public function list_user(Type $var = null)
    {
        $data = [
            'link'          => $this->uri->segment(1),
            'user'          => $this->M_patrol->showUser(),
            'role'          => $this->M_patrol->ambilData("admisecsgp_mstroleusr"),
            'company'       => $this->M_patrol->ambilData("admisecsgp_mstcmp")
        ];
        $this->template->load("template/template_first", "settings/list_user", $data);
    }

    public function register()
    {
        $patrol_groups = get_setting('patrol_group')->nilai_setting;
        $data = [
            'link'       => $this->uri->segment(1),
            "wilayah"    => $this->model->ambilData("admisecsgp_mstsite", ['status' => 1]),
            'role'       => $this->model->ambilData("admisecsgp_mstroleusr", ['status' => 1]),
            'groups'      => explode(',', $patrol_groups)
        ];
        $this->template->load("template/template_first", "settings/form_register_user", $data);
    }

    public function input()
    {
        $npk            = $this->input->post("npk");
        $name           = strtoupper($this->input->post("nama"));
        $email          = $this->input->post("email");
        $group          = $this->input->post("group");
        $id_role        = $this->input->post("level");
        $id_site        = $this->input->post("site_id");
        $id_plant       = $this->input->post("plant_id");
        $status         = $this->input->post("status");
        $password       = md5($this->input->post("password"));
        $user_name      = $this->input->post("user_name");

        $cek = $this->db->get_where("admisecsgp_mstusr", ['npk' => $npk])->num_rows();
        if ($cek >= 1) {
            $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> npk ' . $npk . ' sudah terdaftar ');
            redirect('Setting/Pengguna/register');
        } else {
            $cari_company   = $this->db->query("select site_id , admisecsgp_mstcmp_company_id from admisecsgp_mstsite where site_id='" . $id_site  . "'")->row();
            $id_comp = $cari_company->admisecsgp_mstcmp_company_id;



            $data = [
                'npk'                             => $npk,
                'name'                            => $name,
                'email'                           => $email,
                'patrol_group'                    => $group,
                'admisecsgp_mstroleusr_role_id'   => $id_role,
                'admisecsgp_mstsite_site_id'      => $id_site,
                'admisecsgp_mstplant_plant_id'    => $id_plant,
                'admisecsgp_mstcmp_company_id'    => $id_comp,
                'password'                        => $password,
                'created_at'                      => date('Y-m-d H:i:s'),
                'created_by'                      => $this->session->userdata('id_token'),
                'status'                          => $status,
                'user_name'                       => $user_name
            ];
            $this->M_patrol->inputData($data, "admisecsgp_mstusr");
            $this->M_patrol->inputData(['npk'   => $npk, 'roles_id' => $id_role], "admisec_roles_users");
            $this->session->set_flashdata('info', '<i class="icon fas fa-check"></i> Berhasil input data');
            redirect('Setting/Pengguna/register');
        }
    }

    public function showPlant()
    {
        $id = $this->input->post("site_id");
        $res = $this->model->ambilData("admisecsgp_mstplant", ['admisecsgp_mstsite_site_id' => $id]);
        echo json_encode($res->result());
    }

    public function hapus($id)
    {
        $where = ['npk' => $id];
        $del = $this->M_patrol->delete("admisecsgp_mstusr", $where);
        if ($del) {
            $this->session->set_flashdata('info', '<i class="icon fas fa-check"></i> Berhasil hapus data');
            redirect('Setting/Pengguna/list_user');
        } else {
            $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> Gagal hapus data');
            redirect('Setting/Pengguna/list_user');
        }
    }

    public function edit()
    {
        $patrol_groups = get_setting('patrol_group')->nilai_setting;
        $id =  $this->input->get('user_id');
        $data = [
            'link'       => $this->uri->segment(1),
            'data'       => $this->M_patrol->detailUser($id)->row(),
            "plant"      => $this->M_patrol->ambilData("admisecsgp_mstplant"),
            "wilayah"    => $this->M_patrol->ambilData("admisecsgp_mstsite"),
            'role'       => $this->M_patrol->ambilData("admisecsgp_mstroleusr"),
            'groups'      => explode(',', $patrol_groups)
        ];
        $this->template->load("template/template_first", "settings/edit_mst_user", $data);
    }


    public function update()
    {
        $id             = $this->input->post("id");
        $npk            = $this->input->post("npk");
        $name           = strtoupper($this->input->post("nama"));
        $uname           = strtoupper($this->input->post("user_name"));
        $email          = $this->input->post("email");
        $id_role        = $this->input->post("level");
        $id_site        = $this->input->post("site_id");
        $id_plant       = $this->input->post("plant_id");
        $group            = $this->input->post("group");
        $status         = $this->input->post("status");

        $cari_company   = $this->db->query("select site_id , admisecsgp_mstcmp_company_id from admisecsgp_mstsite where site_id='" .  $id_site . "'")->row();
        $id_comp = $cari_company->admisecsgp_mstcmp_company_id;
        $data = [
            'name'                              => $name,
            'user_name'                         => $uname,
            'email'                             => $email,
            'patrol_group'                      => $group,
            'admisecsgp_mstroleusr_role_id'     => $id_role,
            'admisecsgp_mstsite_site_id'        => $id_site,
            'admisecsgp_mstplant_plant_id'      => $id_plant,
            'admisecsgp_mstcmp_company_id'      => $id_comp,
            'updated_at'                        => date('Y-m-d H:i:s'),
            'updated_by'                        => $this->session->userdata('id_token'),
            'status'                            => $status
        ];

        $where = ['npk' => $id];
        $update = $this->M_patrol->update("admisecsgp_mstusr", $data, $where);
        if ($update) {
            $this->session->set_flashdata('info', '<i class="icon fas fa-check"></i> Berhasil update data');
            redirect('Setting/Pengguna/list_user');
        } else {
            $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> Gagal update data');
            redirect('Setting/Pengguna/list_user');
        }
    }


    public function edit_pwd()
    {
        $id =  $this->input->get('user_id');
        $data = [
            'link'       => $this->uri->segment(2),
            'data'       => $this->M_patrol->detailUser($id)->row(),
        ];
        $this->template->load("template/template_first", "settings/edit_pwd_user", $data);
        // $this->load->view("edit_pwd_user", $data);
    }

    public function resetPasword()
    {
        $password   = md5($this->input->post("password"));
        $id         = $this->input->post("id");
        $data = [
            'password'    => $password,
        ];

        $where = ['npk' => $id];
        $update = $this->M_patrol->update("admisecsgp_mstusr", $data, $where);
        if ($update) {
            $this->session->set_flashdata('info', '<i class="icon fas fa-check"></i> Berhasil update password');
            redirect('Setting/Pengguna/list_user');
        } else {
            $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> Gagal update password');
            redirect('Setting/Pengguna/list_user');
        }
    }
}
