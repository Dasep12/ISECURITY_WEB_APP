<?php

class NotFound extends CI_Controller
{
    function index()
    {
        $this->load->view('template/404');
    }
}

?>