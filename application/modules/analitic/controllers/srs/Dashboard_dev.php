<?php

class Dashboard_dev extends CI_Controller
{
    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->model(['srs/M_dashboard','Roles_m']);
        $this->load->helper(['auth_apps']);

        checksession();

        $role = user_role();
        $npk = user_npk();
        // $access_app = $this->Roles_m->access_app($npk, 'SRS')->row();

        if (!is_app('SRS')) 
        {
            redirect('menu');
        }

        $this->load->library('form_validation');

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
        $target_assets = $this->M_dashboard->target_assets()->result_array();
        $grap_risk = $this->M_dashboard->grap_risk()->result_array();
        $res_risk_level_max = $this->M_dashboard->grap_risk_level_max()->result_array();
        $grap_risk_source = $this->M_dashboard->grap_risk_source()->result_array();
        $grap_trans_month = $this->M_dashboard->grap_trans_month()->result();
        $grap_trans_area = $this->M_dashboard->grap_trans_area()->result();
        $grap_trans = $this->M_dashboard->grap_trans()->result();
        $grap_target_assets = $this->M_dashboard->grap_target_assets()->result();
        $res_iso = $this->M_dashboard->grap_srs()->result_array();
        $res_soi = $this->M_dashboard->grap_soi()->result_array();
        $res_soi_avg_month = $this->M_dashboard->grap_soi_avg_month()->result_array();
        $res_soi_avgpilar = $this->M_dashboard->grap_soi_avgpilar()->result();
        $res_soi_montharea = $this->M_dashboard->grap_soi_avg_montharea()->result_array();

        // print_r($res_iso);
        // print_r($res_soi);die();

        $opt_are_fil = array('' => '-- Choose --');
        foreach ($data_area as $key => $are) {
            $opt_are_fil[$are->id] = $are->title;
        }

        $opt_mon= array('' => '-- Choose --');
        for($i = 1; $i <= 12; $i++) {
            $opt_mon[$i] = date("F", mktime(0, 0, 0, $i, 10));
        }

        // $firstYear = (int)date('Y') - 3; // - 84
        $firstYear = 2022;
        $lastYear = $firstYear + 5; // + 2
        $opt_yea = array('' => '-- Choose --');
        for($i=$firstYear;$i<=$lastYear;$i++)
        {
            $opt_yea[$i] = $i;
        }

        // RISK SOURCE LEGEND
        $rsoArr = array();
        foreach ($risk_source as $key => $rso) {
            $rsoArr[] = $rso['title'];
        }

        // RISK SOURCE DATA
        $rsouArr = array();
        foreach ($grap_risk_source as $key => $rsou) {
            $rsouArr[] = $rsou['total'];
        }

        // RISK LEGEND
        $risArr = array();
        foreach ($grap_risk as $key => $ris) {
            $risArr[] = $ris['title'];
        }

        // RISK DATA
        $risTotalArr = array();
        foreach ($grap_risk as $key => $rit) {
            $risTotalArr[] = $rit['total'];
        }

        // RISK DATA LEVEL MAX
        $risLevelArr = array();
        $risLevelLabArr = array();
        foreach ($res_risk_level_max as $key => $ris) {
            $risLevelLabArr[] = $ris['title'];
            $risLevelArr[] = $ris['total'];
        }

        // TARGET ASSETS LEGEND
        $assArr = array();
        foreach ($target_assets as $key => $ass) {
            $assArr[] = $ass['title'];
        }

        // TARGET ASSETS DATA
        $tarArr = array();
        foreach ($grap_target_assets as $key => $tar) {
            $tarArr[] = $tar->total;
        }

        // TRANS MONTH DATA
        $gtm_arr = array();
        foreach ($grap_trans_month as $key => $gtm) {
            $gtm_arr[] = $gtm->total;
        }

        // AREA LEGEND
        $legend_area = array();
        foreach ($data_area as $key => $lar) {
            $legend_area[] = $lar->title;
        }

        // AREA DATA GRAP
        $tar_arr = array();
        foreach ($grap_trans_area as $key => $tar) {
            $tar_arr[] = $tar->total;
        }

        // TRANS DATA GRAP //
        $tra_arr = array();
        foreach ($grap_trans as $key => $tra) {
            $tra_arr[] = $tra->total;
        }
        $tra_arr[] = 5;
        // TRANS DATA GRAP //

        // SOI AVERAGE MONTH //
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
            'people' => json_encode($peopleAvg,true),
            'system' => json_encode($systemAvg,true),
            'device' => json_encode($deviceAvg,true),
            'network' => json_encode($networkAvg,true),
        );
        // SOI AVERAGE MONTH //

        // SOI AREA MONTH //
        $soiAreaGroup = array();
        $soiArea = array();
        foreach ($res_soi_montharea as $key => $soig) {
            $soiAreaGroup[$soig['label']][] = $soig;
        }
        foreach ($soiAreaGroup as $key => $soia) {
            $soiArea[] = $soia;
        }
        $sorAvgArea = array(
            'plant_1' => json_encode($this->get_data($soiArea[0]),true),
            'plant_2' => json_encode($this->get_data($soiArea[1]),true),
            'plant_3' => json_encode($this->get_data($soiArea[2]),true),
            'plant_4' => json_encode($this->get_data($soiArea[3]),true),
            'plant_5' => json_encode($this->get_data($soiArea[4]),true),
            'vlc' => json_encode($this->get_data($soiArea[5]),true),
            'head_office' => json_encode($this->get_data($soiArea[6]),true),
            'part_center' => json_encode($this->get_data($soiArea[7]),true),
        );
        // SOI AREA MONTH //

        // echo json_encode($soiArea, true);
        // echo'<pre>';print_r($sorAvgArea);
        // die();

        $data = [
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'select_area_filter' => form_dropdown('area_fil', $opt_are_fil,'','id="areaFilter" class="form-control" required'),
            'select_year_filter' => form_dropdown('year_filter', $opt_yea,'','id="yearFilter" class="form-control" required'),
            'select_month_filter' => form_dropdown('month_filter', $opt_mon,'','id="monthFilter" class="form-control" required'),
            'data_risk_source' => json_encode($rsoArr, true),
            'data_risk' => json_encode($risArr, true),
            'target_assets' => json_encode($assArr, true),
            'legend_area' => json_encode($legend_area, true),
            'grap_risk' => json_encode($risTotalArr, true),
            'grap_risk_source' => json_encode($rsouArr, true),
            'grap_trans_month' => json_encode($gtm_arr, true),
            'grap_trans_area' => json_encode($tar_arr, true),
            'grap_trans' => json_encode($tra_arr, true),
            'grap_target_assets' => json_encode($tarArr, true),
            'label_risk_level' => json_encode($risLevelLabArr, true),
            'grap_risk_level' => json_encode($risLevelArr, true),
            'data_index' => $res_iso[0]['max_iso'],
            'data_soi' => $res_soi[0]['avg_soi'],
            'grap_soi_average_month' => $grap_soi_average_month,
            'grap_soi_avgpilar' => $res_soi_avgpilar,
            'grap_soi_avg_areamonth' => $sorAvgArea
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
            $res_iso = $this->M_dashboard->grap_srs()->result_array();
            $res_soi = $this->M_dashboard->grap_soi()->result_array();
            $res_risk_source = $this->M_dashboard->grap_risk_source()->result_array();
            $res_risk = $this->M_dashboard->grap_risk()->result_array();
            $res_risk_level_max = $this->M_dashboard->grap_risk_level_max()->result_array();
            $res_target_assets = $this->M_dashboard->grap_target_assets()->result_array();
            $res_trans_month = $this->M_dashboard->grap_trans_month()->result_array();
            $res_trans_area = $this->M_dashboard->grap_trans_area()->result_array();
            $res_trans = $this->M_dashboard->grap_trans()->result_array();
            $res_soi_avg_month = $this->M_dashboard->grap_soi_avg_month()->result_array();
            $res_soi_avgpilar = $this->M_dashboard->grap_soi_avgpilar()->result();
            $res_soi_montharea = $this->M_dashboard->grap_soi_avg_montharea()->result_array();

            // RISK SOURCE
            $rsoArr = array();
            foreach ($res_risk_source as $key => $rso) {
                $rsoArr[] = $rso['total'];
            }

            // $risTitleArr = array();
            // foreach ($res_risk as $key => $risTitle) {
            //     $risTitleArr[] = $risTitle['title'];
            // }

            // RISK LABEL
            $risLabArr = array();
            foreach ($res_risk as $key => $risLab) {
                $risLabArr[] = $risLab['title'];
            }

            // RISK
            $risArr = array();
            foreach ($res_risk as $key => $ris) {
                $risArr[] = $ris['total'];
            }

            // RISK DATA LEVEL MAX
            $risLevelArr = array();
            $risLevelLabArr = array();
            foreach ($res_risk_level_max as $key => $ris) {
                $risLevelLabArr[] = $ris['title'];
                $risLevelArr[] = $ris['total'];
            }

            // TRAGET ASSETS
            $assArr = array();
            foreach ($res_target_assets as $key => $ass) {
                $assArr[] = $ass['total'];
            }

            // TRANS MOUNTH
            $tmoArr = array();
            foreach ($res_trans_month as $key => $tmo) {
                $tmoArr[] = $tmo['total'];
            }

            // TRANS
            $traArr = array();
            foreach ($res_trans as $key => $tra) {
                $traArr[] = $tra['total'];
            }
            $traArr[] = 5;
            // TRANS //

            // TRANS AREA
            $tarArr = array();
            foreach ($res_trans_area as $key => $tar) {
                $tarArr[] = $tar['total'];
            }
            // TRANS AREA //

            // SOI AVERAGE MONTH //
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
            // SOI AVERAGE MONTH //

            // SOI AREA //
            $soiAreaGroup = array();
            $soiArea = array();
            foreach ($res_soi_montharea as $key => $soig) {
                $soiAreaGroup[$soig['label']][] = $soig;
            }
            foreach ($soiAreaGroup as $key => $soia) {
                $soiArea[] = $soia;
            }
            $sorAvgArea = array(
                array(
                    'label' => 'PLANT 1',
                    'data' => $this->get_data($soiArea[0]),
                ),
                array(
                    'label' => 'PLANT 2',
                    'data' => $this->get_data($soiArea[1]),
                ),
                array(
                    'label' => 'PLANT 3',
                    'data' => $this->get_data($soiArea[2]),
                ),
                array(
                    'label' => 'PLANT 4',
                    'data' => $this->get_data($soiArea[3]),
                ),
                array(
                    'label' => 'PLANT 5',
                    'data' => $this->get_data($soiArea[4]),
                ),
                array(
                    'label' => 'VLC',
                    'data' => $this->get_data($soiArea[5]),
                ),
                array(
                    'label' => 'HEAD OFFICE',
                    'data' => $this->get_data($soiArea[6]),
                ),
                array(
                    'label' => 'PART CENTER',
                    'data' => $this->get_data($soiArea[7]),
                ),
            );
            // SOI AREA //

            $arr = array(
                'data_index' => $res_iso,
                'data_soi' => $res_soi,
                'data_risk_source' => $rsoArr,
                'data_risk_label' => $risLabArr,
                'data_risk' => $risArr,
                'data_risk_lbl_lvl' => $risLevelLabArr,
                'data_risk_level' => $risLevelArr,
                'data_target_assets' => $assArr,
                'data_trans_month' => $tmoArr,
                'data_trans' => $traArr,
                'data_trans_area' => $tarArr,
                'grap_soi_average_month' => $grap_soi_average_month,
                'grap_soi_avgpilar' => $res_soi_avgpilar,
                'grap_soi_avg_areamonth' => $sorAvgArea,
                // 'grap_soi_area' => array(
                //     'title' => $soiAreaLabel,
                //     'total' => $soiAreaData,
                // ),
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

    private function get_data($data)
    {
        $soiArea = array();
        foreach ($data as $key => $soia) {
            $soiArea[] = $soia['data'];
        }

        return $soiArea;
    }

}
