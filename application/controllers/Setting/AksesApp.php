<?php


class AksesApp extends CI_Controller
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

    public function list_app_user(Type $var = null)
    {
        $data = [
            'link'          => $this->uri->segment(1),
        ];
        $this->template->load("template/template_first", "settings/role_akses_app", $data);
    }
}
