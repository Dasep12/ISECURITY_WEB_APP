<?php


class Menu extends CI_Controller
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
	}

	public function index()
	{
		$data = [
			'link'		=> $this->uri->segment(1),
		];
		$this->template->load("template/template_first", "default", $data);
	}
}
