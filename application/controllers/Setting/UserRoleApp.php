<?php
class UserRoleApp extends CI_Controller
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

    public function list_user_role_app()
    {
        $data = [
            'link'          => $this->uri->segment(1),
            'user'          => $this->M_patrol->showUser(),
            'role'          => $this->M_patrol->ambilData("admisecsgp_mstroleusr"),
            'aplikasi'       => $this->model->ambilData("admisec_apps")->result(),
            'role_level'    => $this->db->query("SELECT usrs.npk , am.name as nama_user , aa.name as name_app  , am2.name as name_m 
            from admisec_roles_users usrs
            inner join admisecsgp_mstusr am on am.npk  = usrs.npk 
            inner join admisec_modules_roles amr on amr.roles_id  = usrs.roles_id 
            inner join admisec_modules am2 on am2.id  = amr.modules_id 
            inner join admisec_apps aa  on aa.id  = am2.apps_id order by am.name asc ")->result()
        ];
        $this->template->load("template/template_first", "settings/list_user_role_app", $data);
    }


    public function input(Type $var = null)
    {
        $npk = $this->input->post("npk");
        $role_id = $this->input->post("level_id");

        $cek2 = $this->db->get_where("admisec_roles_users", ['npk' => $npk, 'roles_id' => $role_id])->num_rows();
        if ($cek2 >= 1) {
            $this->session->set_flashdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> menu sudah terdaftar di npk ' . $npk);
            redirect('Setting/UserRoleApp/list_user_role_app');
        } else {
            $data = [
                'npk'           => $npk,
                'roles_id'      => $role_id
            ];
            $this->M_patrol->inputData($data, "admisec_roles_users");
            $this->session->set_flashdata('info', '<i class="icon fas fa-check"></i> Berhasil input data');
            redirect('Setting/UserRoleApp/list_user_role_app');
        }
    }
}
