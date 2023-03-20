<?php


class Info extends CI_Controller
{

    public function __construct(Type $var = null)
    {
        parent::__construct();
        $id = $this->session->userdata('id_token');
        if ($id == null || $id == "") {
            $this->session->set_flashdata('info_login', 'anda harus login dulu');
            redirect('Login');
        }
    }

    public function index()
    {
        $data = [
            'link'        => $this->uri->segment(1)
        ];
        $this->template->load("template/template_first", "info_role_aplikasi", $data);
    }
}
