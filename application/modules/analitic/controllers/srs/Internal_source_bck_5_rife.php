<?php
date_default_timezone_set('Asia/Jakarta');

class Internal_source extends CI_Controller
{
    public $access_module = array();
    private $module_code = 'SRSISO';

    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->helper(['convert','auth_apps']);

        // CEK AKSES MODUL
        if (!is_module($this->module_code)) {
            redirect('analitic/srs/dashboard');
        }

        $this->access_module = is_module($this->module_code);

        $this->load->library('form_validation');

        $this->load->model(['srs/M_internal_source']);
    }

    public function index()
    {
        $data_area = $this->M_internal_source->area()->result(); // area('admisec_area', ['status' => 1])
        $data_subarea = $this->M_internal_source->sub_area()->result();
        $data_subarea2 = $this->M_internal_source->sub_area2()->result();
        $data_rso = $this->M_internal_source->risk_source()->result();
        $data_ris = $this->M_internal_source->risk()->result();
        $data_rle = $this->M_internal_source->risk_level()->result();
        $data_vle = $this->M_internal_source->vurnability_level()->result();
        $data_ass = $this->M_internal_source->assest()->result();
        $no = $this->M_internal_source->no_urut()->result();
        // $data_subass = $this->M_internal_source->sub_assets()->result();

        $opt_are = array();
        foreach ($data_area as $key => $are) {
            $opt_are[$are->id] = $are->title;
        }

        $opt_are_fil = array('' => '-- All --');
        foreach ($data_area as $key => $are) {
            $opt_are_fil[$are->id] = $are->title;
        }

        $opt_subarea = array('' => '-- Choose --');
        foreach ($data_subarea as $key => $sare) {
            $opt_subarea[$sare->id] = $sare->title;
        }

        $opt_subarea2 = array('' => '-- Choose --');
        foreach ($data_subarea2 as $key => $sap) {
            $opt_subarea2[$sap->id] = $sap->title;
        }

        $opt_ass = array('' => '-- Choose --');
        foreach ($data_ass as $key => $asc) {
            $opt_ass[$asc->id] = $asc->title;
        }

        // $opt_sas = array('' => '-- Choose --');
        // foreach ($data_subass as $key => $sas) {
        //     $opt_sas[$sas->id] = $sas->title;
        // }

        $opt_rso = array('' => '-- Choose --');
        foreach ($data_rso as $key => $rso) {
            $opt_rso[$rso->id] = $rso->title;
        }

        $opt_ris = array('' => '-- Choose --');
        foreach ($data_ris as $key => $ris) {
            $opt_ris[$ris->id.':'.$ris->level] = $ris->title;
        }

        $opt_rle = array();
        foreach ($data_rle as $key => $rle) {
            $opt_rle[$rle->id] = $rle->level;
        }

        $opt_vle = array('' => '-- Choose --');
        foreach ($data_vle as $key => $vle) {
            $opt_vle[$vle->level.':'.$vle->id] = $vle->level.'. '.$vle->title;
        }

        $opt_fin = array('' => '-- Choose --');
        foreach ($data_vle as $key => $fin) {
            $opt_fin[$fin->level.':'.$fin->id] = htmlentities($fin->level.'. '.$fin->financial_desc);
        }

        $opt_sdm = array('' => '-- Choose --');
        foreach ($data_vle as $key => $sdm) {
            $opt_sdm[$sdm->level.':'.$sdm->id] = $sdm->level.'. '.$sdm->sdm_desc;
        }

        $opt_ope = array('' => '-- Choose --');
        foreach ($data_vle as $key => $ope) {
            $opt_ope[$ope->level.':'.$ope->id] = $ope->level.'. '.$ope->operational_desc;
        }

        $opt_rep = array('' => '-- Choose --');
        foreach ($data_vle as $key => $rep) {
            $opt_rep[$rep->level.':'.$rep->id] = $rep->level.'. '.$rep->reputation_desc;
        }

        $data = [
            'link' => $this->uri->segment(2),
            'sub_link' => $this->uri->segment(3),
            'no_ref' => $no[0]->no_urut.'/LK/EA/'.conv_romawi(date('m')).'/'.date('Y'),
            'no_urut' => $no[0]->no_urut,
            'select_area' => form_dropdown('area[]', $opt_are,'','id="area" class="form-control area js-select2" multiple required'),
            'select_area_filter' => form_dropdown('area_fil', $opt_are_fil,'','id="areaFilter" class="form-control" required'),
            'select_subarea1' => form_dropdown('sub_area1', $opt_subarea,'','id="subArea1" class="form-control subArea1" disabled required'),
            // 'select_subarea2' => form_dropdown('sub_area2', $opt_subarea2,'','id="subArea2" class="form-control" required'),

            'select_ass' => form_dropdown('assets', $opt_ass,'','id="assets" class="form-control assets" required'),
            // 'select_subass' => form_dropdown('sub_assets', $opt_sas,'','id="subAssets" class="form-control" required'),

            'select_ris' => form_dropdown('risk', $opt_ris,'','id="risk" class="form-control" required'),
            'select_rso' => form_dropdown('risk_source', $opt_rso,'','id="riskSource" class="form-control" required'),
            'select_rle' => form_dropdown('risk_level', $opt_rle, '','id="riskLevel" class="form-control" required readonly'),
            'select_fin' => form_dropdown('financial', $opt_fin,'','id="financial" class="form-control" required'),
            'select_sdm' => form_dropdown('sdm', $opt_sdm,'','id="sdm" class="form-control" required'),
            'select_ope' => form_dropdown('operational', $opt_ope,'','id="operational" class="form-control" required'),
            'select_rep' => form_dropdown('reputation', $opt_rep,'','id="reputation" class="form-control" required'),
            'access_module' => $this->access_module
        ];

        $this->template->load("template/analityc/template_srs", "srs/form_iso_v", $data);
    }

    public function test()
    {
        $sess = $this->session->userdata();
        $access = $this->access_module;
        
        $no = $this->M_internal_source->no_urut()->result();
        var_dump($no);die();
    }

    public function get_sub_area()
    {
        $this->form_validation->set_rules('idcateg', 'ID Category', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo null;
        }
        else
        {
            $res_sub = $this->M_internal_source->sub_area()->result();

            $opt = array();
            foreach ($res_sub as $key => $sub) {
                // $opt[] = array(
                //     'id' => $sub->id,
                //     'title' => $sub->title,
                // );
                echo '<option value="'.$sub->id.'">'.$sub->title.'</option>';
            }
        }
    }

    public function get_sub_area2()
    {
        $this->form_validation->set_rules('idcateg', 'ID Category', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo null;
        }
        else
        {
            $res_sub = $this->M_internal_source->sub_area2()->result();

            $opt = array();
            foreach ($res_sub as $key => $sub) {
                echo '<option value="'.$sub->id.'">'.$sub->title.'</option>';
            }
        }
    }

    public function get_sub_area3()
    {
        $this->form_validation->set_rules('idcateg', 'ID Category', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo null;
        }
        else
        {
            $res_sub = $this->M_internal_source->sub_area2()->result();

            if($res_sub)
            {
                echo '<div class="form-group col-3">
                        <label for="subArea3">'.$res_sub[0]->title_cat.'</label>
                        <select id="subArea3" class="form-control subArea3" name="sub_area3" required>';
                    $opt = array();
                    foreach ($res_sub as $key => $sub) {
                        echo '<option value="'.$sub->id.'">'.$sub->title.'</option>';
                    }
                echo '</select>
                        </div>';
                }
            else
            {
                echo null;
            }
            // $opt = array();
            // foreach ($res_sub as $key => $sub) {
            //     echo '<option value="'.$sub->id.'">'.$sub->title.'</option>';
            // }
        }
    }

    public function get_sub_assets()
    {
        $this->form_validation->set_rules('idcateg', 'ID Category', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo null;
        }
        else
        {
            $res_sub = $this->M_internal_source->sub_assets()->result();

            if($res_sub)
            {
                echo '<div class="form-group col-3">
                        <label for="subAssets">'.$res_sub[0]->title_cat.'</label>
                        <select id="subAssets" class="form-control" name="sub_assets1" required>';
                $opt = array();
                foreach ($res_sub as $key => $sub) {
                    echo '<option value="'.$sub->id.'">'.$sub->title.'</option>';
                }
                echo '</select>
                        </div>';
                }
            else
            {
                echo null;
            }
        }
    }

    public function get_sub_assets2()
    {
        $this->form_validation->set_rules('idcateg', 'ID Category', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo null;
        }
        else
        {
            $res_sub = $this->M_internal_source->sub_assets()->result();

            if($res_sub)
            {
                echo '<div class="form-group col-3">
                        <label for="subAssets2">'.$res_sub[0]->title_cat.'</label>
                        <select id="subAssets2" class="form-control" name="sub_assets2" required>';
                $opt = array();
                foreach ($res_sub as $key => $sub) {
                    echo '<option value="'.$sub->id.'">'.$sub->title.'</option>';
                }
                echo '</select>
                    </div>';
                }
            else
            {
                echo null;
            }
        }
    }

    public function get_sub_risksource()
    {
        $this->form_validation->set_rules('idcateg', 'ID Category', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo null;
        }
        else
        {
            $res_sub = $this->M_internal_source->sub_risksource()->result();

            if($res_sub)
            {
                $opt = '<div class="form-group col-3">
                            <label for="subRiskSource">'.$res_sub[0]->title_cat.'</label>
                            <select id="subRiskSource" class="form-control" name="sub_risksource1" required>';
                $opt .= '<option value="">-- Choose --</option>';
                foreach ($res_sub as $key => $sub) {
                    $opt .=  '<option value="'.$sub->id.'">'.$sub->title.'</option>';
                }
                $opt .=  '</select>
                    </div>';

                echo $opt;
            }
            else
            {
                echo null;
            }
        }
    }

    public function get_sub_risksource2()
    {
        $this->form_validation->set_rules('idcateg', 'ID Category', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo null;
        }
        else
        {
            $res_sub = $this->M_internal_source->sub_risksource()->result();

            if($res_sub)
            {
                // <label for="subRiskSource2">'.$res_sub[0]->title_cat.'</label>
                echo '<div class="form-group col-3">
                            <label for="subRiskSource2">-</label>
                            <select id="subRiskSource2" class="form-control" name="sub_risksource2">';
                $opt = array();
                foreach ($res_sub as $key => $sub) {
                    echo '<option value="'.$sub->id.'">'.$sub->title.'</option>';
                }
                echo '</select>
                    </div>';
                }
            else
            {
                echo null;
            }
        }
    }

    public function get_sub_risk()
    {
        $this->form_validation->set_rules('idcateg', 'ID Category', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo null;
        }
        else
        {
            $res_sub = $this->M_internal_source->sub_risk()->result();

            if($res_sub)
            {
                $opt = '<div class="form-group col-3">
                            <label for="subRisk">'.$res_sub[0]->title_cat.'</label>
                            <select id="subRisk" class="form-control" name="sub_risk1" required>';
                $opt .= '<option value="">-- Choose --</option>';
                foreach ($res_sub as $key => $sub) {
                    $opt .=  '<option value="'.$sub->id.'">'.$sub->title.'</option>';
                }
                $opt .=  '</select>
                    </div>';

                echo $opt;
            }
            else
            {
                echo null;
            }
        }
    }

    public function get_sub_risk2()
    {
        $this->form_validation->set_rules('idcateg', 'ID Category', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo null;
        }
        else
        {
            $res_sub = $this->M_internal_source->sub_risk()->result();

            if($res_sub)
            {
                // <label for="subRisk">.'$res_sub[0]->title_cat'.</label>
                $opt = '<div class="form-group col-3">
                            <label for="subRisk2"> - </label>
                            <select id="subRisk2" class="form-control" name="sub_risk2" required>';
                $opt .= '<option value="">-- Choose --</option>';
                foreach ($res_sub as $key => $sub) {
                    $opt .=  '<option value="'.$sub->id.'">'.$sub->title.'</option>';
                }
                $opt .=  '</select>
                    </div>';

                echo $opt;
            }
            else
            {
                echo null;
            }
        }
    }

    public function list_table()
    {
        $role = $this->session->userdata('role');
        $npk = $this->session->userdata('npk');

        $access_modul = $this->Roles_m->access_modul($npk, 'SRSISO')->row();

        $list = $this->M_internal_source->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->event_name;
            $row[] = date('d F Y H:i', strtotime($field->event_date));
            $row[] = $field->area;
            $row[] = $field->assets;
            $row[] = $field->risk_source;
            $row[] = $field->risk;
            $row[] = $field->impact_level;
            $edt_btn = is_super_admin() ? '<a class="btn btn-sm btn-info" href="'.site_url('analitic/srs/internal_source/edit/'.$field->id).'">
                        <i class="fa fa-edit"></i>
                    </a> ' : '';
            $del_btn = is_super_admin() || (isset($access_modul->dlt) && $access_modul->dlt == 1) ? '<button data-id="'.$field->id.'" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#deleteModal">
                        <i class="fa fa-trash"></i>
                    </button> ' : '';
            $appr_btn = is_super_admin() || (isset($access_modul->apr) && $access_modul->apr == 1) ? $field->status == 1 ? '<button class="btn btn-sm btn-success" title="Approved">
                        <i class="fa fa-check"></i>
                    </button> ' : '<button data-id="'.$field->id.'" data-title="'.$field->event_name.'" class="btn btn-sm btn-success" data-toggle="modal" data-target="#approveModal">
                        Approve
                    </button> ' : '';
            $row[] = $appr_btn.$edt_btn.'<button data-id="'.$field->id.'" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal">
                        Detail
                    </button> '.$del_btn;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_internal_source->count_all(),
            "recordsFiltered" => $this->M_internal_source->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function detail()
    {
        $this->form_validation->set_rules('id', 'ID', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo null;
        }
        else
        {
            $res_sub = $this->M_internal_source->detail()->result();

            if($res_sub)
            {
                $opt = '
                        <table class="table table-borderless mb-3">
                            <tr>
                                <th width="10">Author:</th>
                                <td>'.$res_sub[0]->author.'</td>
                            </tr>
                        </table>
                        <a class="btn btn-primary mb-2" target="_blank" href="'.site_url('analitic/srs/internal_source/report_pdf/'.$res_sub[0]->id).'">Export Report</a>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td colspan="4">'.$res_sub[0]->event_name.'</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td colspan="4">'.date('d F Y h:i', strtotime($res_sub[0]->event_date)).'</td>
                                </tr>
                                <tr>
                                    <th>Area</th>
                                    <td>'.$res_sub[0]->area.'</td>
                                    <td>'.$res_sub[0]->area_sub1.'</td>
                                    <td>'.$res_sub[0]->area_sub2.'</td>
                                    <td>'.$res_sub[0]->area_sub3.'</td>
                                </tr>
                                <tr>
                                    <th>Target Assets</th>
                                    <td>'.$res_sub[0]->assets.'</td>
                                    <td>'.$res_sub[0]->assets_sub1.'</td>
                                    <td>'.$res_sub[0]->assets_sub2.'</td>
                                </tr>
                                <tr>
                                    <th>Risk Source</th>
                                    <td>'.$res_sub[0]->risksource.'</td>
                                    <td>'.$res_sub[0]->risksource1.'</td>
                                    <td colspan="4">'.$res_sub[0]->risksource2.'</td>
                                </tr>
                                <tr>
                                    <th>Risk</th>
                                    <td>'.$res_sub[0]->risk.'</td>
                                    <td>'.$res_sub[0]->risk1.'</td>
                                    <td colspan="4">'.$res_sub[0]->risk2.'</td>
                                </tr>
                                <tr>
                                    <th>Risk Level</th>
                                    <td colspan="4" class="font-weight-bold">'.$res_sub[0]->risk_level.'</td>
                                </tr>
                                <tr>
                                    <th>Vulnerability Lost</th>
                                    <td colspan="4">
                                        <table class="table table-bordered text-center">
                                            <tr>
                                                <th>Financial</th>
                                                <th>SDM</th>
                                                <th>Operational</th>
                                                <th>Reputation</th>
                                                <!--<th>Impact Level</th>-->
                                            </tr>
                                            <tr>
                                                <td>'.$res_sub[0]->financial_level.'</td>
                                                <td>'.$res_sub[0]->sdm_level.'</td>
                                                <td>'.$res_sub[0]->operational_level.'</td>
                                                <td>'.$res_sub[0]->reputation_level.'</td>
                                                <!-- <td class="font-weight-bold">'.$res_sub[0]->impact_level.'</td> -->
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Attachment</th>
                                    <td colspan="4">
                                        <table class="table table-bordered text-center">
                                            <tbody>';

                                                foreach ($res_sub as $key => $fla) {
                                                    if(!empty($fla->file_name))
                                                    {
                                                        $opt .= '<tr><th>'.$fla->file_name.'</th>
                                                        <td><a href="'.site_url('uploads/srs_bi/internal_source/'.$fla->file_name).'" target="_blank">View</a></td></tr>';
                                                    }
                                                }
                                                
                                                // $opt .=
                                                // (!empty($res_sub[0]->attach_file_1) ? '<th>File 1</th><td><a href="'.site_url('uploads/srs_bi/internal_source/'.$res_sub[0]->attach_file_1).'" target="_blank">View</a></td>' : '')
                                                // .'</tr><tr>'
                                                // .(!empty($res_sub[0]->attach_file_2) ? '<th>File 2</th><td><a href="'.site_url('uploads/srs_bi/internal_source/'.$res_sub[0]->attach_file_2).'" target="_blank">View</a></td>' : '')
                                                // .'</tr><tr>'
                                                // .(!empty($res_sub[0]->attach_file_3) ? '<th>File 3</th><td><a href="'.site_url('uploads/srs_bi/internal_source/'.$res_sub[0]->attach_file_3).'" target="_blank">View</a></td>' : '')
                                                // .'</tr><tr>'
                                                // .(!empty($res_sub[0]->attach_file_4) ? '<th>File 4</th><td><a href="'.site_url('uploads/srs_bi/internal_source/'.$res_sub[0]->attach_file_4).'" target="_blank">View</a></td>' : '')
                                                // .'</tr><tr>'
                                                // .(!empty($res_sub[0]->attach_file_5) ? '<th>File 5</th><td><a href="'.site_url('uploads/srs_bi/internal_source/'.$res_sub[0]->attach_file_5).'" target="_blank">View</a></td>' : '')
                                                // .'</tr>

                                            $opt .= '
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>';

                echo $opt;
            }
            else
            {
                echo null;
            }
        }
    }

    public function detail_search()
    {
        $this->form_validation->set_rules('id', 'ID', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo null;
        }
        else
        {
            $res_sub = $this->M_internal_source->detail()->result();

            if($res_sub)
            {
                $opt = '
                        <table class="table table-borderless mb-3">
                            <tr>
                                <th width="10">Author:</th>
                                <td>'.$res_sub[0]->author.'</td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td colspan="4">'.$res_sub[0]->event_name.'</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td colspan="4">'.date('d F Y h:i', strtotime($res_sub[0]->event_date)).'</td>
                                </tr>
                                <tr>
                                    <th>Area</th>
                                    <td>'.$res_sub[0]->area.'</td>
                                    <td>'.$res_sub[0]->area_sub1.'</td>
                                    <td>'.$res_sub[0]->area_sub2.'</td>
                                    <td>'.$res_sub[0]->area_sub3.'</td>
                                </tr>
                                <tr>
                                    <th>Target Assets</th>
                                    <td>'.$res_sub[0]->assets.'</td>
                                    <td>'.$res_sub[0]->assets_sub1.'</td>
                                    <td>'.$res_sub[0]->assets_sub2.'</td>
                                </tr>
                                <tr>
                                    <th>Risk Source</th>
                                    <td>'.$res_sub[0]->risksource.'</td>
                                    <td>'.$res_sub[0]->risksource1.'</td>
                                    <td colspan="4">'.$res_sub[0]->risksource2.'</td>
                                </tr>
                                <tr>
                                    <th>Risk</th>
                                    <td>'.$res_sub[0]->risk.'</td>
                                    <td>'.$res_sub[0]->risk1.'</td>
                                    <td colspan="4">'.$res_sub[0]->risk2.'</td>
                                </tr>
                                <tr>
                                    <th>Risk Level</th>
                                    <td colspan="4" class="font-weight-bold">'.$res_sub[0]->impact_level.'</td>
                                </tr>
                                <tr>
                                    <th>Vulnerability Lost</th>
                                    <td colspan="4">
                                        <table class="table table-bordered text-center">
                                            <tr>
                                                <th>Financial</th>
                                                <th>SDM</th>
                                                <th>Operational</th>
                                                <th>Reputation</th>
                                                <!--<th>Impact Level</th>-->
                                            </tr>
                                            <tr>
                                                <td>'.$res_sub[0]->financial_level.'</td>
                                                <td>'.$res_sub[0]->sdm_level.'</td>
                                                <td>'.$res_sub[0]->operational_level.'</td>
                                                <td>'.$res_sub[0]->reputation_level.'</td>
                                                <!-- <td class="font-weight-bold">'.$res_sub[0]->impact_level.'</td> -->
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Attachment</th>
                                    <td colspan="4">
                                        <table class="table table-bordered text-center">
                                            <tbody>';

                                                foreach ($res_sub as $key => $fla) {
                                                    if(!empty($fla->file_name))
                                                    {
                                                        $opt .= '<tr><th>'.$fla->file_name.'</th>
                                                        <td><a href="'.site_url('uploads/srs_bi/internal_source/'.$fla->file_name).'" target="_blank">View</a></td></tr>';
                                                    }
                                                }

                                            $opt .= '
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Chronology</th>
                                    <td colspan="4" class="font-weight-bold">'.html_entity_decode($res_sub[0]->chronology).'</td>
                                </tr>
                            </tbody>
                        </table>';

                echo $opt;
            }
            else
            {
                echo null;
            }
        }
    }

    public function save()
    {
        $this->form_validation->set_rules('risk_level', 'Risk Level', 'trim|required');
        // $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
            redirect('analitic/srs/internal_source');
        }
        else
        {
            $res = $this->M_internal_source->save();

            if($res == '00')
            {
                $this->session->set_tempdata('success', '<i class="icon fas fa-check"></i> Berhasil menyimpan data', 5);
            }
            else
            {
                $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menyimpan data', 5);
            }

        }
        redirect('analitic/srs/internal_source');
    }

    public function update()
    {
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        // $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
            redirect('analitic/srs/internal_source');
        }
        else
        {
            $res = $this->M_internal_source->update();

            if($res == '00')
            {
                $this->session->set_tempdata('success', '<i class="icon fas fa-check"></i> Berhasil menyimpan data', 5);
            }
            else
            {
                $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menyimpan data', 5);
            }

        }
        redirect('analitic/srs/internal_source');
    }

    public function approve()
    {
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> ID tidak ditemukan', 5);
        }
        else
        {
            $res = $this->M_internal_source->approve();

            if($res == '00')
            {
                $this->session->set_tempdata('success', '<i class="icon fas fa-check"></i> Berhasil menghapus data', 5);
            }
            else
            {
                $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menghapus data', 5);
            }
        }
        
        redirect('analitic/srs/internal_source');
    }

    public function edit()
    {
        $id = $this->uri->segment(5);

        if ($id == '')
        {
            $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> ID tidak ditemukan', 5);
            redirect('analitic/srs/internal_source');
        }
        else
        {
            $get_edit = $this->M_internal_source->edit($id)->result();

            if($get_edit !== NULL)
            {
                $data_edit = $get_edit[0];
                // echo '<pre>';
                // print_r($data_edit);die();
                $data_area = $this->M_internal_source->area()->result();
                // AREA
                $data_subarea = $this->M_internal_source->sub_area()->result();
                $data_subarea2 = $this->M_internal_source->sub_area2($data_edit->area_sub1_id)->result();
                $data_subarea3 = $this->M_internal_source->sub_area2($data_edit->area_sub2_id)->result();

                // RISK SOURCE
                $data_rso = $this->M_internal_source->risk_source()->result();
                $data_rso1 = $this->M_internal_source->sub_risksource($data_edit->risk_source_id)->result();
                $data_rso2 = $this->M_internal_source->sub_risksource($data_edit->risksource_sub1_id)->result();

                // RISK
                $data_ris = $this->M_internal_source->risk()->result();
                $data_ris1 = $this->M_internal_source->sub_risk($data_edit->risk_id)->result();
                $data_ris2 = $this->M_internal_source->sub_risk($data_edit->risk_sub1_id)->result();

                $data_rle = $this->M_internal_source->risk_level()->result();
                $data_vle = $this->M_internal_source->vurnability_level()->result();
                $data_ass = $this->M_internal_source->assest()->result();
                $no = $this->M_internal_source->no_urut()->result();
                $data_subass = $this->M_internal_source->sub_assets($data_edit->assets_id)->result();
                $data_subass2 = $this->M_internal_source->sub_assets($data_edit->assets_sub1_id)->result();

                // AREA & SUBAREA //
                $opt_are = array();
                foreach ($data_area as $key => $are) {
                    $opt_are[$are->id] = $are->title;
                }

                $opt_subarea = array('' => '-- Choose --');
                foreach ($data_subarea as $key => $sare) {
                    $opt_subarea[$sare->id] = $sare->title;
                }

                $opt_subarea2 = array('' => '-- Choose --');
                foreach ($data_subarea2 as $key => $sa2) {
                    $opt_subarea2[$sa2->id] = $sa2->title;
                }

                $opt_subarea3 = array('' => '-- Choose --');
                foreach ($data_subarea3 as $key => $sa3) {
                    $opt_subarea3[$sa3->id] = $sa3->title;
                }

                $opt_are_fil = array('' => '-- All --');
                foreach ($data_area as $key => $are) {
                    $opt_are_fil[$are->id] = $are->title;
                }
                // AREA & SUBAREA //

                // TARGET ASSETS //
                $opt_ass = array('' => '-- Choose --');
                foreach ($data_ass as $key => $asc) {
                    $opt_ass[$asc->id] = $asc->title;
                }
                $opt_sas1 = array('' => '-- Choose --');
                foreach ($data_subass as $key => $sas1) {
                    $opt_sas1[$sas1->id] = $sas1->title;
                }
                $opt_sas2 = array('' => '-- Choose --');
                foreach ($data_subass2 as $key => $sas2) {
                    $opt_sas2[$sas2->id] = $sas2->title;
                }
                // TARGET ASSETS //

                // RISK SOURCE //
                $opt_rso = array('' => '-- Choose --');
                foreach ($data_rso as $key => $rso) {
                    $opt_rso[$rso->id] = $rso->title;
                }

                $opt_rso1 = array('' => '-- Choose --');
                foreach ($data_rso1 as $key => $rso1) {
                    $opt_rso1[$rso1->id] = $rso1->title;
                }

                $opt_rso2 = array('' => '-- Choose --');
                foreach ($data_rso2 as $key => $rso2) {
                    $opt_rso2[$rso2->id] = $rso2->title;
                }
                // RISK SOURCE //

                // RISK //
                $opt_ris = array();
                foreach ($data_ris as $key => $ris) {
                    $opt_ris[$ris->id.':'.$ris->level] = $ris->title;
                    if($data_edit->risk_id == $ris->id)
                    {
                        $curr_ris = $ris->id.':'.$ris->level; 
                    }
                }

                $opt_ris1 = array();
                foreach ($data_ris1 as $key => $ris1) {
                    $opt_ris1[$ris1->id] = $ris1->title;
                }

                $opt_ris2 = array();
                foreach ($data_ris2 as $key => $ris2) {
                    $opt_ris2[$ris2->id] = $ris2->title;
                }
                // RISK //

                $opt_rle = array();
                foreach ($data_rle as $key => $rle) {
                    $opt_rle[$rle->id] = $rle->level;
                    if($data_edit->risk_level_id == $rle->id)
                    {
                        $curr_rle = $rle->id.':'.$rle->level; 
                    }
                }

                $opt_vle = array('' => '-- Choose --');
                foreach ($data_vle as $key => $vle) {
                    $opt_vle[$vle->level.':'.$vle->id] = $vle->level.'. '.$vle->title;
                }

                $opt_fin = array('' => '-- Choose --');
                foreach ($data_vle as $key => $fin) {
                    $opt_fin[$fin->level.':'.$fin->id] = htmlentities($fin->level.'. '.$fin->financial_desc);
                    if($data_edit->financial_level == $fin->id)
                    {
                        $curr_fin = $fin->level.':'.$fin->id; 
                    }
                }

                $opt_sdm = array('' => '-- Choose --');
                foreach ($data_vle as $key => $sdm) {
                    $opt_sdm[$sdm->level.':'.$sdm->id] = $sdm->level.'. '.$sdm->sdm_desc;
                    if($data_edit->sdm_level == $sdm->id)
                    {
                        $curr_sdm = $sdm->level.':'.$sdm->id; 
                    }
                }

                $opt_ope = array('' => '-- Choose --');
                foreach ($data_vle as $key => $ope) {
                    $opt_ope[$ope->level.':'.$ope->id] = $ope->level.'. '.$ope->operational_desc;
                    if($data_edit->operational_level == $ope->id)
                    {
                        $curr_ope = $ope->level.':'.$ope->id; 
                    }
                }

                $opt_rep = array('' => '-- Choose --');
                foreach ($data_vle as $key => $rep) {
                    $opt_rep[$rep->level.':'.$rep->id] = $rep->level.'. '.$rep->reputation_desc;
                    if($data_edit->reputation_level == $rep->id)
                    {
                        $curr_rep = $rep->level.':'.$rep->id; 
                    }
                }

                $data = [
                    'link' => $this->uri->segment(3),
                    'sub_link' => $this->uri->segment(4),
                    'no_ref' => $no[0]->no_urut.'/LK/EA/'.conv_romawi(date('m')).'/'.date('Y'),
                    'no_urut' => $no[0]->no_urut,
                    'select_area' => form_dropdown('area[]', $opt_are, $data_edit->area_id,'id="area" class="form-control area js-select2" multiple required'),
                    'select_area_filter' => form_dropdown('area_fil', $opt_are_fil,'','id="areaFilter" class="form-control" required'),
                    'select_subarea1' => form_dropdown('sub_area1', $opt_subarea, $data_edit->area_sub1_id,'id="subArea1" class="form-control subArea1" required'),
                    'select_subarea2' => form_dropdown('sub_area2', $opt_subarea2, $data_edit->area_sub2_id,'id="subArea2" class="form-control" required'),
                    'select_subarea3' => count($opt_subarea3) <= 1 ? '' : form_dropdown('sub_area3', $opt_subarea3, $data_edit->area_sub3_id,'id="subArea3" class="form-control" required'),

                    'select_ass' => form_dropdown('assets', $opt_ass, $data_edit->assets_id,'id="assets" class="form-control assets" required'),
                    'select_subass1' => count($opt_sas1) <= 1 ? '' : form_dropdown('sub_assets1', $opt_sas1, $data_edit->assets_sub1_id,'id="subAssets" class="form-control" required'),
                    'select_subass2' => count($opt_sas2) <= 1 ? '' : form_dropdown('sub_assets2', $opt_sas2, $data_edit->assets_sub2_id,'id="subAssets2" class="form-control" required'),

                    'select_rso' => form_dropdown('risk_source', $opt_rso, $data_edit->risk_source_id,'id="riskSource" class="form-control" required'),
                    'select_rso1' => count($opt_rso1) <= 1 ? '' : form_dropdown('sub_risksource1', $opt_rso1, $data_edit->risksource_sub1_id,'id="subRiskSource" class="form-control" required'),
                    'select_rso2' => count($opt_rso2) <= 1 ? '' : form_dropdown('sub_risksource2', $opt_rso2, $data_edit->risksource_sub2_id,'id="subRiskSource2" class="form-control" required'),

                    'select_ris' => form_dropdown('risk', $opt_ris, $curr_ris,'id="risk" class="form-control" required'),
                    'select_ris1' => count($opt_ris1) <= 1 ? '' : form_dropdown('sub_risk1', $opt_ris1, $data_edit->risk_sub1_id,'id="subRisk" class="form-control" required'),
                    'select_ris2' => count($opt_ris2) <= 1 ? '' : form_dropdown('sub_risk2', $opt_ris2, $data_edit->risk_sub2_id,'id="subRisk2" class="form-control" required'),

                    'select_rle' => form_dropdown('risk_level', $opt_rle, $curr_rle,'id="riskLevel" class="form-control" required readonly'),
                    'select_fin' => form_dropdown('financial', $opt_fin, $curr_fin,'id="financial" class="form-control" required'),
                    'select_sdm' => form_dropdown('sdm', $opt_sdm, $curr_sdm,'id="sdm" class="form-control" required'),
                    'select_ope' => form_dropdown('operational', $opt_ope, $curr_ope,'id="operational" class="form-control" required'),
                    'select_rep' => form_dropdown('reputation', $opt_rep, $curr_rep,'id="reputation" class="form-control" required'),

                    'access_module' => $this->access_module,
                    'data_edit' => $data_edit,
                    'data_edit_all' => $get_edit,
                ];

                $this->template->load("template/analityc/template_srs", "srs/form_iso_edit_v", $data);
            }
            else
            {
                $this->session->set_tempdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> Data tidak ditemukan', 5);
                redirect('analitic/srs/internal_source');
            }
        }
    }

    public function delete()
    {
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> ID tidak ditemukan', 5);
        }
        else
        {
            $res = $this->M_internal_source->delete();

            if($res == '00')
            {
                $this->session->set_tempdata('info', '<i class="icon fas fa-check"></i> Berhasil menghapus data', 5);
            }
            else
            {
                $this->session->set_tempdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menghapus data', 5);
            }

        }
        
        redirect('analitic/srs/internal_source');
    }

    public function delete_attached()
    {
        $this->form_validation->set_rules('fileId', 'ID File', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
            $res = array(
                'code' => '01',
                'msg' => $_POST
            );
        }
        else
        {
            $res = $this->M_internal_source->delete_attached();

            if($res == '00')
            {
                $res = array(
                    'code' => '00',
                    'msg' => 'success'
                );
            }
            else
            {
                $res = array(
                    'code' => '02',
                    'msg' => 'failed'
                );
            }

        }
        
        header('Content-Type: application/json');
        echo json_encode($res);
    }

    public function report_pdf()
    {
        $res = $this->M_internal_source->detail()->result();
        // print_r($res);die();

        if(!empty($res))
        {   
            $data = $res[0];
            $this->export_pdf($data);
        }
        else
        {
            redirect('analitic/srs/internal_source');   
        }
    }

    public function search()
    {
        $res = $this->M_internal_source->search()->result();

        $data = '<div id="searchResult" class="col-12 mt-5"><div class="row">';
        foreach ($res as $key => $val) {
            $data .= '<div class="col-12 p-3">
                        <a href="#" target="_blank" data-id="'.$val->id.'" data-toggle="modal" data-target="#detailSearchModal" class="text-white">
                        <h5>'.$val->event_name.'</h5>
                        <small>'.date('Y-m-d H:i',strtotime($val->event_date)).'</small>
                        <p>'.html_entity_decode($val->chronology).'...</p></a>
                    </div>';
        }
        $data .= '</div><div>';

        echo $data;
    }

    private function export_pdf($data)
    {
        require_once('./vendor/tcpdf/tcpdf.php');
        date_default_timezone_set("Asia/Jakarta");

        // $data_akre = $this->penetapan_m->sertifikat($id_akre)->result();
        
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            $pdf->AddPage();

            // $pageX = $pdf->GetPageWidth(); // Width of Current Page
            // $pageY = $pdf->GetPageHeight(); 
            // $gap = 3;
            // $pdf->SetDrawColor(0, 0, 0); // Set size line
            // $pdf->SetLineWidth(0.3); // Set size line
            // $pdf->Line($gap, $gap, $pageX-$gap, $gap); // Horizontal line at top
            // $pdf->Line($gap, $pageY-$gap,$pageX-$gap,$pageY-$gap); // Horizontal line at bottom
            // $pdf->Line($gap, $gap,$gap,$pageY-$gap); // Vetical line at left 
            // $pdf->Line($pageX-$gap, $gap,$pageX-$gap,$pageY-$gap);

            // set font
            $pdf->SetFont('helvetica', '', 10);
            $txt = '';

            $title = strtoupper('LAPORAN KEJADIAN');
            $event_date = date('d F Y H:i', strtotime($data->event_date));
            $curr_date = date('d F Y');
            $user_name = $this->session->userdata('name');

            $ttd_head_img = './assets/images/ttd/'.$data->section_head_npk.'.png';
            $ttd_pic_img = './assets/images/ttd/'.$data->author_npk.'.png';

            $tbl_head = <<<EOD
                <table cellspacing="0" cellpadding="8" border="1">
                    <tr>
                        <td rowspan="2" width="100" align="center">
                            <div style="vertical-align: middle">
                                <img height="65" src="./assets/dist/img/logo.jpeg">
                            </div>
                        </td>
                        <td width="438" align="center"><h2>{$title}</h2></td>
                        <td rowspan="2" width="100" align="center">
                            <div style="vertical-align: middle">
                                <img height="65" src="./assets/dist/img/logo-satpam.png">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="438" align="center">
                            <div style="vertical-align: middle">
                                <span>EXTERNAL AFFAIRS DEPT.<br>No. {$data->no_reference}</span>
                            </div>
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="3"></td>
                    </tr>

                    <tr>
                        <td width="40%"><span>1. Macam / Bentuk Kejadian.</span></td>
                        <td colspan="2" width="60%">{$data->event_name}</td>
                    </tr>
                    <tr>
                        <td width="40%">
                            2. Nama Alamat, Pekerjaan yang Mengetahui ( Saksi Pelapor ).
                        </td>
                        <td colspan="2" width="60%">{$data->reporter}</td>
                    </tr>
                    <tr>
                        <td width="40%">
                            3. Hari, Tanggal, Jam Kejadian.
                        </td>
                        <td colspan="2" width="60%">{$event_date}</td>
                    </tr>
                    <tr>
                        <td width="40%">
                            4. Tempat Kejadian.
                        </td>
                        <td colspan="2" width="60%">{$data->area}</td>
                    </tr>
                    <tr>
                        <td width="40%">
                            5. Akibat Kejadian / Kerugian / Korban Dll.
                        </td>
                        <td colspan="2" width="60%">{$data->risk}</td>
                    </tr>
                    <tr>
                        <td width="40%">
                            6. Sumber terjadi Kejadian.
                        </td>
                        <td colspan="2" width="60%">{$data->risksource}</td>
                    </tr>
                    <tr>
                        <td width="100%">
                            <table cellspacing="0" cellpadding="8" border="0">
                                <tr>
                                    <td width="100%" height="300" align="center">
                                        <h3>ISI - LAPORAN :</h3>
                                        <p style="text-align:left">{$data->chronology}</p>
                                    </td>
                                </tr>
                            </table>

                            <table cellspacing="0" cellpadding="8" border="0" align="center">
                                <tr>
                                    <td colspan="3" align="right">
                                        Jakarta, {$curr_date}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Menyetujui,
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        Yang Membuat Laporan,
                                    </td>
                                </tr>
                                <tr>
                                    <td><img height="100" src="{$ttd_head_img}"></td>
                                    <td></td>
                                    <td><img height="100" src="{$ttd_pic_img}"></td>
                                </tr>
                                <tr>
                                    <td>({$data->section_head})</td>
                                    <td></td>
                                    <td>({$data->author})</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                EOD;

            // $pdf->writeHTML($tbl_head, true, false, false, false, '');
            $pdf->writeHTML($tbl_head, true, false, false, false, '');
            
            ob_end_clean();

            //Close and output PDF document
            // I: View D: Download
            $pdf->Output('Laporan_Kejadian_'.date('d_m_Y_H_i', strtotime($data->event_date)).'.pdf', 'I');

            // Save file
            // $file_name = $data_akre[0]->id.'_'.$no_ref.'.pdf';
            // $path_lin = './uploads/penetapan/'.$file_name;
            // $path_win = realpath("./").'/uploads/penetapan/'.$file_name;
            // $pdf->Output($path_win, 'F');
    }

    public function export_excel()
    {
        $data_iso = $this->M_internal_source->transaction_iso()->result();
        // echo '<pre>';print_r($data_iso);die();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=internal_source_".date('d_m_Y_H_i_s').".xls");
        
        // echo "<h2>Daftar</h2>";

            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>No</th>";
            echo "<th>Event Name</th>";
            echo "<th>Event Date</th>";
            echo "<th>No Urut</th>";
            echo "<th>Area</th>";
            echo "<th>Target Assets</th>";
            echo "<th>Risk Source</th>";
            echo "<th>Risk</th>";
            echo "<th>Impact Level</th>";
            echo "</tr>";
            $no = 1;
            foreach ($data_iso as $key => $row) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $row->event_name . "</td>";
                echo "<td>" . date('d F Y h:i', strtotime($row->event_date)) . "</td>";
                echo "<td>" . $row->no_urut . "</td>";
                echo "<td>" . $row->area . "</td>";
                echo "<td>" . $row->assets . "</td>";
                echo "<td>" . $row->risksource . "</td>";
                echo "<td>" . $row->risk . "</td>";
                echo "<td>" . $row->impact_level . "</td>";
                echo "</tr>";
                $no++;
            }
            echo '
            </table>';
                
        echo "</body>
        </html>";
    }
}
