<?php

class Dashboard_2 extends CI_Controller
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

        $this->load->library('form_validation');

        $this->load->model(['srs/M_dashboard']);

    }

    // public function index()
    // {
    //     $data_area = $this->M_dashboard->area()->result();

    //     $opt_are_fil = array('' => '-- Choose --');
    //     foreach ($data_area as $key => $are) {
    //         $opt_are_fil[$are->id] = $are->title;
    //     }

    //     $opt_mon= array('' => '-- Choose --');
    //     for($i = 1; $i <= 12; $i++) {
    //         $opt_mon[$i] = date("F", mktime(0, 0, 0, $i, 10));
    //     }

    //     $firstYear = (int)date('Y'); // - 84
    //     $lastYear = $firstYear + 1; // + 2
    //     $opt_yea = array('' => '-- Choose --');
    //     for($i=$firstYear;$i<=$lastYear;$i++)
    //     {
    //         $opt_yea[$i] = $i;
    //     }

    //     $data = [
    //         'link' => $this->uri->segment(3),
    //         'sub_link' => $this->uri->segment(4),
    //         'select_area_filter' => form_dropdown('area_fil', $opt_are_fil,'','id="areaFilter" class="form-control" required'),
    //         'select_year_filter' => form_dropdown('year_filter', $opt_yea,'','id="yearFilter" class="form-control" required'),
    //         'select_month_filter' => form_dropdown('month_filter', $opt_mon,'','id="monthFilter" class="form-control" required'),
    //     ];

    //     $this->template->load("template/analityc/template_srs", "srs/dashboard_v", $data);
    // }

    // public function grap_srs()
    // {
    //     $this->form_validation->set_rules('area_fil', 'ID Filter', 'trim|required');

    //     if ($this->form_validation->run() == FALSE)
    //     {
    //         echo null;
    //     }
    //     else
    //     {
    //         $res_sub = $this->M_dashboard->grap_srs()->result();

    //         echo json_encode($res_sub, true);
    //     }
    // }



    public function index()
    {
        $data_area = $this->M_dashboard->area()->result();
        $risk_source = $this->M_dashboard->risk_source()->result_array();
        $risk = $this->M_dashboard->risk()->result_array();
        $grap_risk = $this->M_dashboard->grap_risk()->result_array();

        // var_dump($grap_risk);die();

        $opt_are_fil = array('' => '-- Choose --');
        foreach ($data_area as $key => $are) {
            $opt_are_fil[$are->id] = $are->title;
        }

        $opt_mon= array('' => '-- Choose --');
        for($i = 1; $i <= 12; $i++) {
            $opt_mon[$i] = date("F", mktime(0, 0, 0, $i, 10));
        }

        $firstYear = (int)date('Y'); // - 84
        $lastYear = $firstYear + 1; // + 2
        $opt_yea = array('' => '-- Choose --');
        for($i=$firstYear;$i<=$lastYear;$i++)
        {
            $opt_yea[$i] = $i;
        }

        $rsoArr = array();
        foreach ($risk_source as $key => $rso) {
            $rsoArr[] = $rso['title'];
        }

        $risArr = array();
        foreach ($risk as $key => $ris) {
            $risArr[] = $ris['title'];
        }

        // var_dump($risk_source);die();

        $data = [
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'select_area_filter' => form_dropdown('area_fil', $opt_are_fil,'','id="areaFilter" class="form-control" required'),
            'select_year_filter' => form_dropdown('year_filter', $opt_yea,'','id="yearFilter" class="form-control" required'),
            'select_month_filter' => form_dropdown('month_filter', $opt_mon,'','id="monthFilter" class="form-control" required'),
            'data_risk_source' => json_encode($rsoArr, true),
            'data_risk' => json_encode($risArr, true),
            'grap_risk' => json_encode($risArr, true),
        ];
        
        $this->template->load("template/analityc/template_srs", "srs/dashboard_dev", $data);
    }

    public function filterGrafik()
    {
        $bulan = $this->input->post("bulan");
        $tahun = $this->input->post("tahun");
        $plant = $this->input->post("plant");
        $data = array($bulan, $tahun, $plant);
        echo json_encode($data);
    }

    public function grap_srs()
    {
        // $this->form_validation->set_rules('area_fil', 'ID Filter', 'trim|required');

        // if ($this->form_validation->run() == FALSE)
        // {
        //     echo null;
        // }
        // else
        // {
            $res_srs = $this->M_dashboard->grap_srs()->result_array();
            $res_risk_source = $this->M_dashboard->grap_risk_source()->result_array();
            $res_risk = $this->M_dashboard->grap_risk()->result_array();

            $rsoArr = array();
            foreach ($res_risk_source as $key => $rso) {
                $rsoArr[] = $rso['total'];
            }

            $risTitleArr = array();
            foreach ($res_risk as $key => $risTitle) {
                $risTitleArr[] = $risTitle['title'];
            }

            $risArr = array();
            foreach ($res_risk as $key => $ris) {
                $risArr[] = $ris['total'];
            }

            $arr = array(
                'data_index' => $res_srs,
                'data_risk_source' => $rsoArr,
                'data_risk' => $risArr
                // 'data_risk' => array(
                //     $risTitleArr, $risArr
                // )
            );

            echo json_encode($arr, true);
        // }
    }

    public function grap_test()
    {
        $data = $this->M_dashboard->grap_trans_month()->result();
        $area = $this->M_dashboard->grap_trans_area()->result();
        $risk_avg_month = $this->M_dashboard->grap_risk_month_avg()->result_array();
        $risk_avg = $this->M_dashboard->grap_risk_avg()->result_array();
        $grap_risk = $this->M_dashboard->grap_risk()->result_array();

        $gtm_arr = array();
        foreach ($data as $key => $gtm) {
            $gtm_arr[] = $gtm->month_num.'-'.$gtm->total;
        }

        $are_arr = array();
        foreach ($area as $key => $are) {
            $are_arr[] = $are->total;
        }

        $risk_avg_arr = array();
        foreach ($risk_avg as $key => $ria) {
            $risk_avg_arr[] = $ria['avg_impact'];
        }

        echo '<pre>';
        print_r($grap_risk);die();
    }

}
