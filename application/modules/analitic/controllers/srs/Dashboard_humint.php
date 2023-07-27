<?php

class Dashboard_humint extends CI_Controller
{
    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->model(['srs/M_dashboard_humint','Roles_m']);
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

    public function index()
    {
        $data_area = $this->M_dashboard_humint->area()->result();
        $risk = $this->M_dashboard_humint->risk()->result_array();
        $target_assets = $this->M_dashboard_humint->target_assets()->result_array();
        $grap_risk = $this->M_dashboard_humint->grap_risk()->result_array();
        // $res_risk_level_max = $this->M_dashboard_humint->grap_risk_level_max()->result_array();
        $grap_risk_source = $this->M_dashboard_humint->grap_risk_source()->result_array();
        $grap_trans_month = $this->M_dashboard_humint->grap_trans_month()->result();
        $grap_trans_area = $this->M_dashboard_humint->grap_trans_area()->result();
        $grap_trans = $this->M_dashboard_humint->grap_trans()->result();
        $grap_target_assets = $this->M_dashboard_humint->grap_target_assets()->result_array();
        $res_iso = $this->M_dashboard_humint->grap_srs()->result_array();
        $res_soi = $this->M_dashboard_humint->grap_soi()->result_array();
        $res_soi_avg_month = $this->M_dashboard_humint->grap_soi_avg_month()->result_array();
        $res_soi_avgpilar = $this->M_dashboard_humint->grap_soi_avgpilar()->result();
        $res_soi_montharea = $this->M_dashboard_humint->grap_soi_avg_montharea()->result_array();
        $current_year = date('Y');

        // FILTER AREA
        $opt_are_fil = array('' => '-- Choose --');
        foreach ($data_area as $key => $are) {
            $opt_are_fil[$are->id] = $are->title;
        }

        // FILTER BULAN
        $opt_mon= array('' => '-- Choose --');
        for($i = 1; $i <= 12; $i++) {
            $opt_mon[$i] = date("F", mktime(0, 0, 0, $i, 10));
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

        // RISK SOURCE DATA
        $rsouArr = array();
        foreach ($grap_risk_source as $key => $rsou) {
            // $rsouArr[] = $rsou['total'];
            $rsouArr[] = array(
                'id' => $rsou['id'],
                'label' => $rsou['title'],
                'data' => $rsou['total']
            );
        }

        // RISK LEGEND
        // $risArr = array();
        // foreach ($grap_risk as $key => $ris) {
        //     $risArr[] = $ris['title'];
        // }

        // RISK
        $risTotalArr = array();
        foreach ($grap_risk as $key => $rit) {
            // $risTotalArr[] = $rit['total'];
            $risTotalArr[] = array(
                'id' => $rit['id'],
                'label' => $rit['title'],
                'data' => $rit['total']
            );
        }

        // TARGET ASSETS DATA
        $tarArr = array();
        foreach ($grap_target_assets as $key => $tar) {
            // $tarArr[] = $tar->total;
            $tarArr[] = array(
                'id' => $tar['id'],
                'label' => $tar['title'],
                'data' => $tar['total']
            );
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

        $data = [
            'link' => $this->uri->segment(2),
            'sub_link' => $this->uri->segment(3),
            'select_area_filter' => form_dropdown('area_fil', $opt_are_fil, '','id="areaFilter" class="form-control" required'),
            'select_year_filter' => form_dropdown('year_filter', $opt_yea, $current_year,'id="yearFilter" class="form-control" required'),
            'select_month_filter' => form_dropdown('month_filter', $opt_mon,'','id="monthFilter" class="form-control" required'),
            // 'data_risk' => json_encode($risArr, true),
            'legend_area' => json_encode($legend_area, true),
            'grap_risk' => json_encode($risTotalArr, true),
            'grap_risk_source' => json_encode($rsouArr, true),
            'grap_trans_month' => json_encode($gtm_arr, true),
            'grap_trans_area' => json_encode($tar_arr, true),
            'grap_trans' => json_encode($tra_arr, true),
            'grap_target_assets' => json_encode($tarArr, true),
            'data_index' => $res_iso[0]['max_iso'],
            'data_soi' => $res_soi[0]['avg_soi'],
            'grap_soi_average_month' => $grap_soi_average_month,
            'grap_soi_avgpilar' => $res_soi_avgpilar,
            'grap_soi_avg_areamonth' => $sorAvgArea
        ];
        
        $this->template->load("template/analityc/template_srs", "srs/dashboard_humint_v", $data);
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
            $res_iso = $this->M_dashboard_humint->grap_srs()->result_array();
            $res_soi = $this->M_dashboard_humint->grap_soi()->result_array();
            $res_risk_source = $this->M_dashboard_humint->grap_risk_source()->result_array();
            $res_risk = $this->M_dashboard_humint->grap_risk()->result_array();
            // $res_risk_level_max = $this->M_dashboard_humint->grap_risk_level_max()->result_array();
            $res_target_assets = $this->M_dashboard_humint->grap_target_assets()->result_array();
            $res_trans_month = $this->M_dashboard_humint->grap_trans_month()->result_array();
            $res_trans_area = $this->M_dashboard_humint->grap_trans_area()->result_array();
            $res_trans = $this->M_dashboard_humint->grap_trans()->result_array();
            $res_soi_avg_month = $this->M_dashboard_humint->grap_soi_avg_month()->result_array();
            $res_soi_avgpilar = $this->M_dashboard_humint->grap_soi_avgpilar()->result();
            $res_soi_montharea = $this->M_dashboard_humint->grap_soi_avg_montharea()->result_array();

            // RISK SOURCE
            $rsoArr = array();
            foreach ($res_risk_source as $key => $rso) {
                // $rsoArr[] = $rso['total'];
                $rsoArr[] = array(
                    'id' => $rso['id'],
                    'label' => $rso['title'],
                    'data' => $rso['total']
                );
            }

            // RISK
            $risArr = array();
            foreach ($res_risk as $key => $ris) {
                $risArr[] = array(
                    'id' => $ris['id'],
                    'label' => $ris['title'],
                    'data' => $ris['total']
                );
            }

            // RISK DATA LEVEL MAX
            // $risLevelArr = array();
            // $risLevelLabArr = array();
            // foreach ($res_risk_level_max as $key => $ris) {
            //     $risLevelLabArr[] = $ris['title'];
            //     $risLevelArr[] = $ris['total'];
            // }

            // TRAGET ASSETS
            $assArr = array();
            foreach ($res_target_assets as $key => $ass) {
                // $assArr[] = $ass['total'];
                $assArr[] = array(
                    'id' => $ass['id'],
                    'label' => $ass['title'],
                    'data' => $ass['total']
                );
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
                'data_risk' => $risArr,
                'data_target_assets' => $assArr,
                'data_trans_month' => $tmoArr,
                'data_trans' => $traArr,
                'data_trans_area' => $tarArr,
                'grap_soi_average_month' => $grap_soi_average_month,
                'grap_soi_avgpilar' => $res_soi_avgpilar,
                'grap_soi_avg_areamonth' => $sorAvgArea,
            );

            echo json_encode($arr, true);
        // }
    }

    public function grap_detail_risk_source()
    {
        // GRAP RISK SOURCE - TOTAL //
        $res_riSo_detail = $this->M_dashboard_humint->grap_detail_risksource('risk_source_id')->result_array();
        // GRAP RISK SOURCE - MONTH //
        $res_riSo_month_sub1 = $this->M_dashboard_humint->grap_detail_risksource('risksource_sub1_id')->result_array();
        // GRAP RISK SOURCE SUB 1 - TOTAL //
        $res_riSosub1_detail = $this->M_dashboard_humint->grap_detail_risksource_sub('risksource_sub1_id')->result_array();
        // GRAP RISK SOURCE SUB 2 - TOTAL //
        $res_risksub2_detail = $this->M_dashboard_humint->grap_detail_risksource_sub('risksource_sub2_id')->result_array();
        // RISK SOURCE SUB 2 MONTH //
        $res_riSo_month_sub2 = $this->M_dashboard_humint->grap_detail_risksource('risksource_sub2_id')->result_array();

        // RISK SOURCE
        $rSoArr = array();
        foreach ($res_riSo_detail as $key => $rSo) {
            $rSoArr[] = $rSo['total'];
        }

        // RISK SOURCE MONTH
        $rSoMArr = array();
        foreach ($res_riSo_month_sub1 as $key => $rSoM) {
            $rSoMArr[] = $rSoM['total'];
        }

        // RISK SOURCE SUB 1
        $rSoSubDataArr = array();
        foreach ($res_riSosub1_detail as $key => $riSoSub) {
            $rSoSubDataArr[] = array(
                'id' => $riSoSub['id'],
                'data' => $riSoSub['total'],
                'label' => $riSoSub['title'],
            );
        }

        // RISK SOURCE SUB 2
        $risSub2Arr = array();
        foreach ($res_risksub2_detail as $key => $risSub2) {
            $risSub2Arr[] = array(
                'id' => $risSub2['id'],
                'label' => $risSub2['title'],
                'data' => $risSub2['total'],
            );
        }

        // RISK SOURCE SUB 2 MONTH
        $rSoSub2MArr = array();
        foreach ($res_riSo_month_sub2 as $key => $rSoSub2M) {
            $rSoSub2MArr[] = $rSoSub2M['total'];
        }

        $arr = array(
            'data_riso' => $rSoArr,
            // 'data_detail_rSosub_label' => $rSoSubLabelArr,
            'data_riso_sub1' => $rSoSubDataArr,
            'data_riso_sub1_month' => $rSoMArr,
            'data_riso_sub2' => $risSub2Arr,
            'data_riso_sub2_month' => $rSoSub2MArr,
        );

        echo json_encode($arr, true);
    }
    
    public function grap_detail_assets()
    {
        // Main assets data
        $res_assets_detail = $this->M_dashboard_humint->grap_detail_assets('assets_id')->result_array();
        // TARGET ASSETS SUB 1 MONTH
        $res_assets_sub1_month = $this->M_dashboard_humint->grap_detail_assets('assets_sub1_id')->result_array();
        // TARGET ASSETS SUB 1
        $res_assetssub1_detail = $this->M_dashboard_humint->grap_detail_assets_sub('assets_sub1_id')->result_array();
        // TARGET ASSETS SUB 2
        $res_assetssub2_detail = $this->M_dashboard_humint->grap_detail_assets_sub('assets_sub2_id')->result_array();
        // TARGET ASSETS SUB 2 MONTH
        $res_assets_sub2_month = $this->M_dashboard_humint->grap_detail_assets('assets_sub2_id')->result_array();

        // MAIN ASSETS
        $assetsArr = array();
        foreach ($res_assets_detail as $key => $ass) {
            $assetsArr[] = $ass['total'];
        }

        // ASSETS SUB 1 MONTH
        $assetsMSub1Arr = array();
        foreach ($res_assets_sub1_month as $key => $assM) {
            $assetsMSub1Arr[] = $assM['total'];
        }

        // ASSETS SUB 1
        $assSubLabelArr = array();
        $assSubArr = array();
        $assSubJoinArr = array();
        foreach ($res_assetssub1_detail as $key => $assSub) {
            $assSubLabelArr[] = $assSub['title'];
            $assSubArr[] = $assSub['total'];
            $assSubJoinArr[] = array(
                'id' => $assSub['id'],
                'label' => $assSub['title'],
                'data' => $assSub['total'],
            );
        }

        // ASSETS SUB 2
        $assSub2Arr = array();
        foreach ($res_assetssub2_detail as $key => $assSub2) {
            $assSub2Arr[] = array(
                'id' => $assSub2['id'],
                'label' => $assSub2['title'],
                'data' => $assSub2['total'],
            );
        }

        // ASSETS SUB 2 MONTH
        $assetsMSub2Arr = array();
        foreach ($res_assets_sub2_month as $key => $assM2) {
            $assetsMSub2Arr[] = $assM2['total'];
        }

        $arr = array(
            'data_detail_assets' => $assetsArr,
            'data_assets_month_sub1' => $assetsMSub1Arr,
            'data_detail_assetssub_label' => $assSubLabelArr,
            'data_detail_assetssub' => $assSubJoinArr,
            'data_detail_assetssub2' => $assSub2Arr,
            'data_assets_month_sub2' => $assetsMSub2Arr,
        );

        echo json_encode($arr, true);
    }

    public function grap_detail_risk()
    {
        $res_risk_detail = $this->M_dashboard_humint->grap_detail_risk('risk_id')->result_array();
        $res_risk_sub1 = $this->M_dashboard_humint->grap_detail_risk_sub('risk_sub1_id')->result_array();
        $res_risk_sub1_month = $this->M_dashboard_humint->grap_detail_risk('risk_sub1_id')->result_array();
        $res_risk_sub2 = $this->M_dashboard_humint->grap_detail_risk_sub('risk_sub2_id')->result_array();
        $res_risk_sub2_month = $this->M_dashboard_humint->grap_detail_risk('risk_sub2_id')->result_array();

        // RISK
        $risArr = array();
        foreach ($res_risk_detail as $key => $ris) {
            $risArr[] = $ris['total'];
        }

        // RISK SUB 1
        $risSub1Arr = array();
        foreach ($res_risk_sub1 as $key => $risSub1) {
            $risSub1Arr[] = array(
                'id' => $risSub1['id'],
                'label' => $risSub1['title'],
                'data' => $risSub1['total'],
            );
        }

        // RISK SUB 1 MONTH
        $risSub1MArr = array();
        foreach ($res_risk_sub1_month as $key => $risMo) {
            $risSub1MArr[] = $risMo['total'];
        }

        // RISK SUB 2
        $risSub2Arr = array();
        foreach ($res_risk_sub2 as $key => $risSub2) {
            $risSub2Arr[] = array(
                'id' => $risSub2['id'],
                'label' => $risSub2['title'],
                'data' => $risSub2['total'],
            );
        }

        // RISK MONTH
        $risSub2MArr = array();
        foreach ($res_risk_sub2_month as $key => $risSub2M) {
            $risSub2MArr[] = $risSub2M['total'];
        }

        $arr = array(
            'data_risk_month' => $risArr,
            'data_risk_sub1' => $risSub1Arr,
            'data_risk_sub1_month' => $risSub1MArr,
            'data_risk_sub2' => $risSub2Arr,
            'data_risk_sub2_month' => $risSub2MArr,
        );

        echo json_encode($arr, true);
    }

    public function grap_trend_soi()
    {
        // TREND YEAR MODEL
        $res_trend_year = $this->M_dashboard_humint->grap_trend_soi_index()->result_array();

        // TREND YEAR SORT
        $trendYearLabelArr = array();
        $trendYearTotalArr = array();
        $trendSoiArr = array();
        $trendIndexArr = array();
        foreach ($res_trend_year as $key => $tya) {
            $trendYearLabelArr[] = $tya['month_num'];
            // $trendYearTotalArr[] = $tya['total'];
            $trendSoiArr[] = (float) $tya['avgsoi'];
            $trendIndexArr[] = (float) $tya['maxiso'];
        }

        // echo '<pre>';
        // print_r($res_trend_year);die();

        $data = array(
            'data_trendyear_label' => $trendYearLabelArr,
            'data_soi' => $trendSoiArr,
            'data_index' => $trendIndexArr,
        );

        echo json_encode($data, true);
    }

    public function grap_top_index()
    {
        $grap_risk_source = $this->M_dashboard_humint->grap_top_index()->result_array();

        $rsoIArr = array();
        $rsoEArr = array();
        $rsoElArr = array();
        $rsoEcArr = array();
        foreach ($grap_risk_source as $rse) {
            if($rse['type_source'] == 1)
            {
                $rsoIArr[] = array(
                    'id' => $rse['id'],
                    'label' => $rse['title'],
                    'data' => $rse['total']
                );   
            }
            if($rse['id'] == 7)
            {
                $rsoElArr[] = array(
                    'label' => $rse['title'],
                    'data' => $rse['total']
                );
            }
            if($rse['id'] == 4)
            {
                $rsoEcArr[] = array(
                    'label' => $rse['title'],
                    'data' => $rse['total']
                );
            }
            if($rse['type_source'] == 2 && $rse['id'] !== 4 && $rse['id'] !== 7)
            {
                $rsoEArr[] = array(
                    'label' => $rse['title'],
                    'data' => $rse['total']
                );
            }
        }
        $joinExt = array(
            'label' => $rsoElArr[0]['label'].', '.$rsoEcArr[0]['label'],
            'data' => ($rsoElArr[0]['data']+$rsoEcArr[0]['data'])
        );
        $grap_internal = $rsoIArr;
        $grap_external = array_merge($rsoEArr, array($joinExt));
        rsort($grap_external);
        $gaExt = array();
        foreach ($grap_external as $key => $ge) {
            $gaExt[] = array(
                'label' => $ge['label'],
                'data' => $ge['data']
            );
        }

        // $res = array(
        //     'data_internal' => $grap_internal,
        //     'data_external' => $gaExt
        // );

        $html = '<div class="row px-2 mb-4">
                    <div class="col-md-6 px-3">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h5>Internal Source</h5>
                            </div>

                            <div class="col-md-12">
                                <div class="row">';
        foreach ($grap_internal as $keyInt => $int) {
            $html .= '
                <div class="col-md-12 border-bottom text-center py-2">
                    <div class="d-flex flex-row justify-content-between">
                        <span>'.$int['label'].'</span>
                        <span>'.$int['data'].'</span>
                    </div>
                </div>
            ';
            if ($keyInt == 2) break;
        }
        $html .= "
                    </div>
                </div>
            </div>
        </div>";


        $html .= '
                <div class="col-md-6 px-3">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h5>External Source</h5>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="row">';
        foreach ($gaExt as $keyExt => $ext) {
            $html .= '
                <div class="col-md-12 border-bottom text-center py-2">
                    <div class="d-flex flex-row justify-content-between">
                        <span>'.$ext['label'].'</span>
                        <span>'.$ext['data'].'</span>
                    </div>
                </div>
            ';
            if ($keyExt == 2) break;
        }
        $html .= "
                        </div>
                    </div>
                </div>
            </div>
        </div>";

        echo $html;
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
