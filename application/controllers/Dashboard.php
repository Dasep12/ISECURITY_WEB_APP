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
        if ($role != "SUPERADMIN") {
            redirect('Login');
        }

        $role = $this->session->userdata('role');
        $this->load->model(['M_LaporanTemuan', 'M_LaporanPatroli', 'M_patrol', 'M_Dashboard']);
        $this->dateNow = new DateTimeImmutable('now', new DateTimeZone('Asia/Jakarta'));
        $this->load->helper(['convertbulanina', 'db_settings']);

        $this->load->library('form_validation');
    }

    public function index()
    {
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
            'plant'       =>  $this->M_Dashboard->getPlant(),
            'bulan'       => $month,
            'jmlHari'     => json_encode($ttlHari, true),
            'ttlHari'     => $totalHari,
            'select_month_filter' =>  $opt_mon,
        ];

        $this->load->view("template/sidebar", $sidebarData);
        $this->load->view("dashboard", $data);
        $this->load->view("template/footer");
    }

    // trend patroli
    public function trendPatrolAllPlant()
    {
        // $year = date('Y');
        $year = $this->input->post("tahun");
        $pl   = $this->input->post("plant_id");
        $par = array();

        if ($pl == 0) {
            $plant = $this->M_Dashboard->getPlant();
        } else {
            $plant = $this->M_Dashboard->getPerPlant($pl);
        }
        foreach ($plant as $pl) {
            $data =
                array(
                    'plant' => $pl->plant_name,
                    'data'  => $this->M_Dashboard->trenPatroliBulanan($year,  $pl->plant_name)
                );
            array_push($par, $data);
        }
        echo json_encode($par, true);
    }

    public function trendPatrolBulananPerPlant()
    {
        $plant = $this->input->post("plant_id");
        $year = $this->input->post("tahun");
        $data = array([
            'name'      => 'Total',
            'data'      => $this->M_Dashboard->trenPatroliBulanan($year,  $plant)
        ]);
        echo json_encode($data, true);
    }

    public function trendPatrolHarian()
    {
        $year = $this->input->post("tahun");
        $month = $this->input->post("bulan");
        $pl   = $this->input->post("plant_id");
        if ($pl == 0) {
            $plant = $this->M_Dashboard->getPlant();
        } else {
            $plant = $this->M_Dashboard->getPerPlant($pl);
        }
        $par = array();
        foreach ($plant as $pl) {
            $data = array(
                'name'      => $pl->plant_name,
                'data'      => $this->M_Dashboard->getTrendPatroliHarian($year, $month, $pl->plant_name)
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
        $pl   = $this->input->post("plant_id");
        if ($pl == 0) {
            $plant = $this->M_Dashboard->getPlant();
        } else {
            $plant = $this->M_Dashboard->getPerPlant($pl);
        }
        foreach ($plant as $pl) {
            $data =
                array(
                    'plant' => $pl->plant_name,
                    'data'  => $this->M_Dashboard->performancePatroliPerPlant($year,  $pl->plant_name)
                );
            array_push($par, $data);
        }
        echo json_encode($par, true);
    }

    public function perforamancePatrolBulananPerPlant()
    {

        $plant = $this->input->post("plant_id");
        $year = $this->input->post("tahun");
        if ($plant == "") {
            $data = array([
                'name'      => 'Performance',
                'data'      => $this->M_Dashboard->performancePatroliAllPlant($year, $plant)
            ]);
        } else {
            $data = array([
                'name'      => 'Performance',
                'data'      => $this->M_Dashboard->performancePatroliPerPlant($year, $plant)
            ]);
        }
        echo json_encode($data, true);
    }

    public function perFormancePatrolHarian()
    {
        $year = $this->input->post("tahun");
        $month = $this->input->post("bulan");
        $pl   = $this->input->post("plant_id");
        $par = array();

        if ($pl == 0) {
            $plant = $this->M_Dashboard->getPlant();
        } else {
            $plant = $this->M_Dashboard->getPerPlant($pl);
        }
        foreach ($plant as $pl) {
            $data = array(
                'name'      => $pl->plant_name,
                'data'      => $this->M_Dashboard->getPerformancePatroliHarianAllPlant($year, $month, $pl->plant_name)
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
        $res = $this->M_Dashboard->getTemuanPatroliAll($year);
        echo json_encode($res, true);
    }
    // 

    // temuan per tindakan
    public function temuanPerReguPlant()
    {
        $year = $this->input->post("tahun");
        $month = $this->input->post("bulan");
        $res = $this->M_Dashboard->queryTemuanRegu($year, $month, "REGU_A")->result();
        $plant = array();
        foreach ($res as $q) {
            $plant[] = $q->plant_name;
        }
        $data = array(
            array(
                $this->M_Dashboard->getTemuanPerRegu($year, $month, 'REGU_A'),
                $this->M_Dashboard->getTemuanPerRegu($year, $month, 'REGU_B'),
                $this->M_Dashboard->getTemuanPerRegu($year, $month, 'REGU_C'),
                $this->M_Dashboard->getTemuanPerRegu($year, $month, 'REGU_D'),
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
        $d = $this->M_Dashboard->perFormaPatroliHarian($year, $month, $plant, 7, 0)  / 3;
        echo "<pre>";
    }
}
