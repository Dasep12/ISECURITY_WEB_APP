<?php

class Dashboard_acm extends CI_Controller
{
    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->model(['soa/M_dashboard_acm','Roles_m']);
        $this->load->helper(['auth_apps']);

        checksession();

        $role = user_role();
        $npk = user_npk();
        // $access_app = $this->Roles_m->access_app($npk, 'SRS')->row();

        if (!is_app('SOA')) 
        {
            redirect('menu');
        }

        $this->load->library('form_validation');
    }

    public function index()
    {
        $data_area = $this->M_dashboard_acm->area()->result();
        $current_year = date('Y');
        $current_month = date('m');

        // AREA
        $opt_are = array('' => '-- Area --');
        foreach ($data_area as $key => $are) {
            $opt_are[$are->id] = $are->title;
        }

        // FILTER TAHUN
        // $firstYear = (int)date('Y') - 3; // - 84
        $firstYear = 2022;
        $lastYear = $firstYear + 5; // + 2
        $opt_yea = array('' => '-- Choose --');
        for($i=$firstYear;$i<=$lastYear;$i++)
        {
            $opt_yea[$i] = $i;
        }

        // FILTER BULAN
        $opt_mon= array('' => '-- Choose --');
        for($i = 1; $i <= 12; $i++) {
            $opt_mon[$i] = date("F", mktime(0, 0, 0, $i, 10));
        }

        $data = [
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'select_area_filter' => form_dropdown('area_fil', $opt_are, '','id="areaFilter" class="form-control" required'),
            'select_year_filter' => form_dropdown('year_filter', $opt_yea, $current_year,'id="yearFilter" class="form-control" required'),
            'select_month_filter' => form_dropdown('month_filter', $opt_mon, $current_month,'id="monthFilter" class="form-control" required'),
        ];

        $this->template->load("template/analityc/template_soa", "soa/dashboard_acm_v", $data);
    }

    public function employeeAcmTotal()
    {
        $employeeAcmTotal = $this->M_dashboard_acm->employeeAcmTotal()->result();

        echo json_encode($employeeAcmTotal, true);
    }

    public function vehicle()
    {
        $vehicleTotal = $this->M_dashboard_acm->vehicleTotal()->result();

        echo json_encode($vehicleTotal, true);
    }

    public function material()
    {
        $materialTotal = $this->M_dashboard_acm->materialTotal()->result();

        echo json_encode($materialTotal, true);
    }

    public function peopleCategory()
    {
        $peopleCategoryTotal = $this->M_dashboard_acm->peopleCategoryTotal()->result();

        echo json_encode($peopleCategoryTotal, true);
    }

    public function peopleCategoryDayTotal()
    {
        $peopleCategoryDayTotal = $this->M_dashboard_acm->peopleCategoryDayTotal()->result_array();

        $people = array();
        $employee = array();
        $visitor = array();
        $business_partner = array();
        $contractor = array();

        $categ = array(); 
        $key = 'title';
        foreach($peopleCategoryDayTotal as $val) {
            if(array_key_exists($key, $val)){
                $categ[$val[$key]][] = $val;
            }else{
                $categ[""][] = $val;
            }
        }

        $people_item = array();
        $num = 1;
        foreach ($categ as $key => $pcd) {
            $color = $this->getColor($num);

            foreach ($pcd as $i => $sva) {
                $people_item[$i] = $sva['total'];
            }
            $people[] = array(
                'label' => $key,
                'data' => $people_item,
                'borderColor' => $color,
                // 'borderColor' => "rgba(".rand(0, 255).", ".rand(0, 99).", ". rand(0, 255).", 1",
                'backgroundColor' => $color,
            );

            $num++;
        }

        // echo '<pre>';
        // print_r($people);die();

        echo json_encode($people, true);
    }

    private function getColor($num) {
        $hash = md5('color' . $num);

        return "rgb(".hexdec(substr($hash, 0, 2))." ,".hexdec(substr($hash, 2, 2)).", ".hexdec(substr($hash, 4, 2)).")";
    }

}