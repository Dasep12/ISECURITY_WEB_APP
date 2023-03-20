<?php


class Dashboard extends CI_Controller
{

    public function __construct(Type $var = null)
    {
        parent::__construct();
        $id = $this->session->userdata('id_token');
        if ($id == null || $id == "") {
            $this->session->set_flashdata('info_login', 'anda harus login dulu');
            redirect('Login');
        }
        $role = $this->session->userdata('role');
        if ($role != "ADMIN") {
            redirect('Login');
        }

        $role = $this->session->userdata('role');
        $this->load->model(['M_LaporanTemuan', 'M_LaporanPatroli', 'M_patrol']);
        $this->load->model('M_Dashboard_ADM', 'model');
        $this->dateNow = new DateTimeImmutable('now', new DateTimeZone('Asia/Jakarta'));
        $this->load->helper(['convertbulanina', 'db_settings']);

        $this->load->library('form_validation');
    }

    public function index()
    {
        $site = $this->session->userdata("site_id");
        $month = array(["1", "JANUARI"], ["2", "FEBRUARI"], ["3", "MARET"], ["4", "APRIL"], ["5", "MEI"], ["6", "JUNI"], ["7", "JULI"], ["8", "AGUSTUS"], ["9", "SEPTEMBER"], ["10", "OKTOBER"], ["11", "NOVEMBER"], ["12", "DESEMBER"]);
        $totalHari = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        $ttlHari = array();
        for ($h = 1; $h <= $totalHari; $h++) {
            $ttlHari[] = $h;
        }
        $dataTemuan = $this->M_LaporanTemuan->getTotalTemuan();

        $sidebarData = [
            'link' => $this->uri->segment(1),
        ];

        $pl = $this->M_patrol->ambilData("admisecsgp_mstplant")->result();
        $tar_arr = array();
        foreach ($pl as $key => $tar) {
            $tar_arr[] = $tar->plant_name;
        }

        $opt_mon = array();
        for ($i = 1; $i <= 12; $i++) {
            $opt_mon[$i] = date("F", mktime(0, 0, 0, $i, 10));
        }

        $data = [
            'data_temuan' => $dataTemuan,
            'plants'      => json_encode($tar_arr, true),
            'plant'       =>  $this->model->getPlant($site),
            'bulan'       => $month,
            'jmlHari'     => json_encode($ttlHari, true),
            'ttlHari'     => $totalHari,
            'select_month_filter' =>  $opt_mon,
        ];

        $this->load->view("template/admin/sidebar", $sidebarData);
        $this->load->view("admin/dashboard", $data);
        $this->load->view("template/admin/footer");
    }

    // trend patroli
    public function trendPatrolAllPlant()
    {
        // $year = date('Y');
        $year = $this->input->post("tahun");
        $par = array();
        $site = $this->session->userdata("site_id");
        $plant = $this->model->getPlant($site);
        foreach ($plant as $pl) {
            $data =
                array(
                    'plant' => $pl->plant_name,
                    'data'  => $this->model->trenPatroliBulanan($year,  $pl->plant_name)
                );
            array_push($par, $data);
        }
        echo json_encode($par, true);
    }

    public function trendPatrolBulananPerPlant()
    {
        // $plant = $this->input->post("plant_id");
        $site = $this->session->userdata("site_id");
        $year = $this->input->post("tahun");
        $data = array([
            'name'      => 'Total',
            'data'      => $this->model->trenPatroliBulanan($year,  "0")
        ]);
        echo json_encode($data, true);
    }

    public function trendPatrolHarian()
    {
        $year = $this->input->post("tahun");
        $month = $this->input->post("bulan");
        $site = $this->session->userdata("site_id");
        $par = array();

        $plant = $this->model->getPlant($site);
        foreach ($plant as $pl) {
            $data = array(
                'name'      => $pl->plant_name,
                'data'      => $this->model->getTrendPatroliHarian($year, $month, $pl->plant_name)
            );
            array_push($par, $data);
        }

        echo json_encode($par, true);
    }
    // 


    // performance
    public function perforamancePatrolAllPlant()
    {
        $year = $this->input->post("tahun");
        $par = array();
        $site = $this->session->userdata("site_id");
        $plant = $this->model->getPlant($site);
        foreach ($plant as $pl) {
            $data =
                array(
                    'plant' => $pl->plant_name,
                    'data'  => $this->model->performancePatroliPerPlant($year,  $pl->plant_name)
                );
            array_push($par, $data);
        }
        echo json_encode($par, true);
    }

    public function perforamancePatrolBulananPerPlant()
    {

        $plant = $this->input->post("plant_id");
        $year = $this->input->post("tahun");
        $site = $this->session->userdata("site_id");
        if ($plant == "") {
            $data = array([
                'name'      => 'Performance',
                'data'      => $this->model->performancePatroliAllPlant($year, "0", $site)
            ]);
        } else {
            $data = array([
                'name'      => 'Performance',
                'data'      => $this->model->performancePatroliPerPlant($year, $plant)
            ]);
        }
        echo json_encode($data, true);
    }

    public function perFormancePatrolHarian()
    {
        $year = $this->input->post("tahun");
        $month = $this->input->post("bulan");
        $par = array();
        $site = $this->session->userdata("site_id");
        $plant = $this->model->getPlant($site);
        foreach ($plant as $pl) {
            $data = array(
                'name'      => $pl->plant_name,
                'data'      => $this->model->getPerformancePatroliHarianAllPlant($year, $month, $pl->plant_name)
            );
            array_push($par, $data);
        }

        echo json_encode($par, true);
    }
    // 

    // temuan
    public function temuanPatrolAllPlant()
    {
        $year = $this->input->post("tahun");
        $site = $this->session->userdata("site_id");
        $res = $this->model->getTemuanPatroliAll($year, $site);
        echo json_encode($res, true);
    }
    // 

    // temuan per tindakan
    public function temuanPerReguPlant()
    {
        $year = $this->input->post("tahun");
        $month = $this->input->post("bulan");
        $res = $this->model->queryTemuanRegu($year, $month, "REGU_A")->result();
        $plant = array();
        foreach ($res as $q) {
            $plant[] = $q->plant_name;
        }
        $data = array(
            array(
                $this->model->getTemuanPerRegu($year, $month, 'REGU_A'),
                $this->model->getTemuanPerRegu($year, $month, 'REGU_B'),
                $this->model->getTemuanPerRegu($year, $month, 'REGU_C'),
                $this->model->getTemuanPerRegu($year, $month, 'REGU_D'),
            ),
            array(
                $plant
            )
        );
        echo json_encode($data, true);
        // echo "<pre>";
        // var_dump($query);
    }

    // 

    public function tester()
    {
        $year = "2023";
        $plant = "PLANT 4 LINE 2";
        $month = 2;
        $totalHari = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $data = array();
        $result = array();
        $d = $this->model->perFormaPatroliHarian($year, $month, $plant, 7, 0)  / 3;
        echo "<pre>";
    }
}
