<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Dashboard_osint extends CI_Controller
{
    public $access_module = array();
    public $module_code = 'SRSOSI';

    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->helper(['auth_apps']);

        // CEK AKSES MODUL
        if (!is_module($this->module_code)) {
            redirect('analitic/srs/dashboard');
        }
        $this->access_module = is_module($this->module_code);
        $this->load->model('srs/M_dashboard_osint', 'models');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $opt_mon = array('' => '-- Month --');
        for ($i = 1; $i <= 12; $i++) {
            $opt_mon[$i] = date("F", mktime(0, 0, 0, $i, 10));
        }

        $firstYear = (int)date('Y') - 1; // v
        $lastYear = $firstYear + 4; // + 2
        $opt_yea = array('' => '-- Year --');
        for ($i = $firstYear; $i <= $lastYear; $i++) {
            $opt_yea[$i] = $i;
        }

        $data = [
            'link' => $this->uri->segment(2),
            'sub_link' => $this->uri->segment(3),
            'select_month_filter' => form_dropdown('month_filter', $opt_mon, '', 'id="monthFilter" class="form-control" required'),
            'select_years' => form_dropdown('year', $opt_yea, '', 'id="years" class="form-control" required'),
            'select_year_filter' => form_dropdown('year_filter', $opt_yea, '', 'id="yearFilter" class="form-control" required'),
        ];
        $this->template->load("template/analityc/template_srs", "srs/dashboard_osint", $data);
    }

    public function getAllDataPie()
    {
        $year = $this->input->post("year");
        $result = $this->models->getDataAllOsint($year);
        $data = array();
        foreach ($result as $r) {
            $data[] = $r->total;
        }
        echo json_encode($data);
    }

    public function getDetailPie()
    {
        $month = $this->input->post("month");
        $year = $this->input->post("year");
        $result = $this->models->getDetailOsint($year, $month);
        echo json_encode($result->result());
    }

    public function getAllDataDoughnut()
    {
        $year = "2023";
        $data = array(
            [
                'data' => $this->models->getPieOsintDefined($year, 29),
                'label' => 'ADM as Whole',
            ],
            [
                'data' => $this->models->getPieOsintDefined($year, 1),
                'label' => 'Detail Area',
            ],

        );
        echo json_encode($data);
    }

    public function detailPerPlant()
    {
        $year = $this->input->post("year");
        $month = $this->input->post("month");
        $data = $this->models->getDetailPie($year, $month)->result();
        echo json_encode($data);
    }

    public function getInternalSource()
    {
        $year = "2023";
        $data = $this->models->getInternalSource($year)->result();
        echo json_encode($data);
    }

    public function getExternalSource()
    {
        $year = "2023";
        $data = $this->models->getExternalSource($year)->result();
        echo json_encode($data);
    }
    public function getRisk()
    {
        $year = "2023";
        $data = $this->models->getRisk($year)->result();
        echo json_encode($data);
    }

    public function getTargetAssets()
    {
        $year = $this->input->post("year");
        $month = $this->input->post("month");
        $data = $this->models->getTargetAssets($year)->result();
        echo json_encode($data);
    }

    public function getMedia()
    {
        $year = $this->input->post("year");
        $month = $this->input->post("month");
        $data = $this->models->getMedia($year)->result();
        echo json_encode($data);
    }
}
