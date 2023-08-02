<?php


class Dashboard extends CI_Controller
{


    public function index()
    {
        $data = [
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4)
        ];
        $this->template->load("template/analityc/template_klinik", "information/dashboard", $data);
    }
}
