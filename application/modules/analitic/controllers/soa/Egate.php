<?php

class Egate extends CI_Controller
{
    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->model(['soa/M_dashboard', 'Roles_m']);
        $this->load->helper(['auth_apps']);
        // $this->soadb = $this->load->database('soa_bi', TRUE);
        checksession();

        $role = user_role();
        $npk = user_npk();
        // $access_app = $this->Roles_m->access_app($npk, 'SRS')->row();

        if (!is_app('SOA')) {
            redirect('menu');
        }
        $this->soadb = $this->load->database('soa_bi', TRUE);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data_area = $this->M_dashboard->area()->result();
        $current_year = date('Y');
        $current_month = date('m');

        // AREA
        $opt_are = array('' => '-- Area --');
        foreach ($data_area as $key => $are) {
            $opt_are[$are->id] = $are->title;
        }

        // FILTER TAHUN
        $firstYear = 2022;
        $lastYear = $firstYear + 5; // + 2
        $opt_yea = array('' => '-- Choose --');
        for ($i = $firstYear; $i <= $lastYear; $i++) {
            $opt_yea[$i] = $i;
        }

        // FILTER BULAN
        $opt_mon = array('' => '-- Choose --');
        for ($i = 1; $i <= 12; $i++) {
            $opt_mon[$i] = date("F", mktime(0, 0, 0, $i, 10));
        }

        $data = [
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'select_area_filter' => form_dropdown('area_fil', $opt_are, '', 'id="areaFilter" class="form-control" required'),
            'select_year_filter' => form_dropdown('year_filter', $opt_yea, $current_year, 'id="yearFilter" class="form-control" required'),
            'select_month_filter' => form_dropdown('month_filter', $opt_mon, "", 'id="monthFilter" class="form-control" required'),
        ];

        $this->template->load("template/analityc/template_soa", "soa/egate_dashboard", $data);
    }
}
