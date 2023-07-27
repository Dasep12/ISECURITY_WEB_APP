<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_soi extends CI_Controller
{
    public $access_module = array();
    public $module_code = 'SRSSOI';

    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->helper(['auth_apps']);

        // CEK AKSES MODUL
        if (!is_module($this->module_code)) {
            redirect('analitic/srs/dashboard');
        }
        $this->access_module = is_module($this->module_code);

        $this->load->model(['srs/M_dashboard_soi']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data_area = $this->M_dashboard_soi->area()->result();

        $opt_are = array('' => '-- Area --');
        foreach ($data_area as $key => $are) {
            $opt_are[$are->id] = $are->title;
        }

        $opt_lev = array('' => '-- Level --');
        for($i = 1; $i <= 5; $i++) {
            $opt_lev[$i] = $i;
        }

        $opt_lev_com = array('' => '-- Level --');
        for($i = 1; $i <= 10; $i++) {
            $opt_lev_com[$i] = $i;
        }

        $opt_mon= array('' => '-- Month --');
        for($i = 1; $i <= 12; $i++) {
            $opt_mon[$i] = date("F", mktime(0, 0, 0, $i, 10));
        }

        $firstYear = 2022; // - 84
        $lastYear = $firstYear + 5; // + 2
        $opt_yea = array('' => '-- Year --');
        for($i=$firstYear;$i<=$lastYear;$i++)
        {
            $opt_yea[$i] = $i;
        }
        
        $data = [
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'select_areas_filter' => form_dropdown('area_filter', $opt_are,'','id="areaFilter" class="form-control" required'),
            'select_years_filter' => form_dropdown('year_filter', $opt_yea, date('Y'),'id="yearFilter" class="form-control" required'),
            'select_months_filter' => form_dropdown('month_filter', $opt_mon,'','id="monthFilter" class="form-control" required'),
        ];

        $this->template->load("template/analityc/template_srs", "srs/dashboard_soi_v", $data);
    }

    public function soi_avg_month()
    {
        $res_soi_avg_month = $this->M_dashboard_soi->soi_avg_month()->result_array();

        $peopleAvg = array();
        $systemAvg = array();
        $deviceAvg = array();
        $networkAvg = array();
        foreach ($res_soi_avg_month as $key => $savm) {
            $peopleAvg[] = $savm['avg_people'];
            $systemAvg[] = $savm['avg_system'];
            $deviceAvg[] = $savm['avg_device'];
            $networkAvg[] = $savm['avg_network'];
        }
        $grap_soi_average_month = array(
            array(
                'label' => 'PEOPLE',
                'data' => $peopleAvg,
                'borderColor' => "rgba(0, 176, 80, 1)",
                'backgroundColor' => "rgba(0, 176, 80, 1)",
            ),
            array(
                'label' => 'SYSTEM',
                'data' => $systemAvg,
                'borderColor' => "rgba(0, 176, 240, 1)",
                'backgroundColor' => "rgba(0, 176, 240, 1)",
            ),
            array(
                'label' => 'DEVICE',
                'data' => $deviceAvg,
                'borderColor' => "rgba(255, 0, 0, 1)",
                'backgroundColor' => "rgba(255, 0, 0, 1)",
            ),
            array(
                'label' => 'NETWORKING',
                'data' => $networkAvg,
                'borderColor' => "rgba(112, 48, 160, 1)",
                'backgroundColor' => "rgba(112, 48, 160, 1)",
            )
        );

        echo json_encode($grap_soi_average_month, true);
    }

    public function soi_avg_pilar()
    {
        $res_soi_avg_pilar = $this->M_dashboard_soi->soi_avg_pilar()->result();

        echo json_encode($res_soi_avg_pilar, true);
    }

    public function soi_threat_soi()
    {
        $res_threat_soi = $this->M_dashboard_soi->threat_soi()->result_array();
        // $res_soi = $this->M_dashboard_soi->grap_soi()->result_array();

        echo json_encode($res_threat_soi, true);
    }

    public function soi_avg_area_month()
    {
        $res_soi_avg_area_month = $this->M_dashboard_soi->soi_avg_area_month()->result_array();

        $area = array(); 
        $key = 'area';
        foreach($res_soi_avg_area_month as $val) {
            if(array_key_exists($key, $val)){
                $area[$val[$key]][] = $val;
            }else{
                $area[""][] = $val;
            }
        }
        // echo '<pre>';
        // print_r($area);die;

        $soi = array();
        $soi_item = array();
        $num = 1;
        foreach ($area as $key => $pcd) {
            $color = $this->getColor($num);

            foreach ($pcd as $i => $sva) {
                $soi_item[$i] = $sva['avgsoi'];
            }

            $soi[] = array(
                'label' => $key,
                'data' => $soi_item,
                'borderColor' => $color,
                // 'borderColor' => "rgba(".rand(0, 255).", ".rand(0, 99).", ". rand(0, 255).", 1",
                'backgroundColor' => $color,
            );

            $num++;
        }


        echo json_encode($soi, true);
    }

    private function getColor($num) {
        $hash = md5('color' . $num);

        return "rgb(".hexdec(substr($hash, 0, 2))." ,".hexdec(substr($hash, 2, 2)).", ".hexdec(substr($hash, 4, 2)).")";
    }

}