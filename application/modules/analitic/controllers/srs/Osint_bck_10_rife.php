<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Osint extends CI_Controller
{
    public $access_module = array();
    public $module_code = 'SRSOSI';

    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->helper(['auth_apps']);
        $this->osidb = $this->load->database('srs_bi', TRUE);
        // CEK AKSES MODUL
        if (!is_module($this->module_code)) {
            redirect('analitic/srs/dashboard');
        }
        $this->access_module = is_module($this->module_code);

        $this->load->model('srs/M_osi');
        $this->load->model('srs/M_osint', 'models');
        $this->load->library('form_validation');
    }

    public function getData($table, $where)
    {
        return $this->osidb->get_where($table, $where);
    }

    public function dashboard()
    {
        $opt_mon = array('' => '-- Month --');
        for ($i = 1; $i <= 12; $i++) {
            $opt_mon[$i] = date("F", mktime(0, 0, 0, $i, 10));
        }

        $firstYear = (int)date('Y') - 4; // - 84
        $lastYear = $firstYear + 4; // + 2
        $opt_yea = array('' => '-- Year --');
        for ($i = $firstYear; $i <= $lastYear; $i++) {
            $opt_yea[$i] = $i;
        }

        $data = [
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'select_month_filter' => form_dropdown('month_filter', $opt_mon, '', 'id="monthFilter" class="form-control" required'),
            'select_years' => form_dropdown('year', $opt_yea, '', 'id="years" class="form-control" required'),
            'select_year_filter' => form_dropdown('year_filter', $opt_yea, '', 'id="yearFilter" class="form-control" required'),
        ];
        $this->template->load("template/analityc/template_srs", "srs/dashboard_osint", $data);
    }

    public function index()
    {
        $regional = $this->models->getCategory(10)->result_array();
        $legalitas = $this->models->getCategory(11)->result_array();
        $format = $this->models->getCategory(12)->result_array();
        $hatespeech = $this->models->getCategory(5)->result_array();

        $opt_regional = array('' => '-- Select --');
        foreach ($regional as $key => $reg) {
            $opt_regional[$reg['sub_id'].':'.$reg['level_id'].':'.$reg['level']] = ucwords($reg['name']);
        }

        $opt_legalitas = array('' => '-- Select --');
        foreach ($legalitas as $key => $leg) {
            $opt_legalitas[$leg['sub_id']] = ucwords($leg['name']);
        }

        $opt_format = array('' => '-- Select --');
        foreach ($format as $key => $for) {
            $opt_format[$for['sub_id'].':'.$for['level_id'].':'.$for['level']] = ucwords($for['name']);
        }

        $opt_hatespeech = array('' => '-- Select --');
        foreach ($hatespeech as $key => $hat) {
            $opt_hatespeech[$hat['sub_id'].':'.$hat['level_id'].':'.$hat['level']] = ucwords($hat['name']);
        }

        $data = [
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'plant'     => $this->models->getPlant(),
            'area'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 1]),
            'targetIssue'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 2]),
            'riskSource'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 3]),
            'riskTarget'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 5]),
            'vulne'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 6]),
            'sdm'      => $this->models->levelVurne(7),
            'reput'      => $this->models->levelVurne(8),
            'media'      => $this->models->getCategory(4),
            'hatespeech' => form_dropdown('hatespeech', $opt_hatespeech, '','id="hatespeech" class="form-control" required'),
            'regional' => form_dropdown('regional', $opt_regional,'','id="regional" class="form-control" required'),
            'legalitas' => form_dropdown('legalitas', $opt_legalitas,'','id="legalitas" class="form-control" required'),
            'format' => form_dropdown('format', $opt_format,'','id="format" class="form-control" required'),
        ];

        $this->template->load("template/analityc/template_srs", "srs/form_osint", $data);
    }

    public function list_table()
    {
        $role = $this->session->userdata('role');
        $npk = $this->session->userdata('npk');

        $access_modul = $this->Roles_m->access_modul($npk, $this->module_code)->row();

        $list = $this->models->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->act;
            $row[] = $field->plant;
            $row[] = $field->media;
            // if ($field->jenis_media == "News Portal") {
            //     $row[] = $field->jenis_media;
            // } else {
            //     $row[] = $field->sub_media;
            // }
            $row[] = $field->jenis_media;
            $row[] = $field->sentiment;
            $row[] = date('d F Y ', strtotime($field->event_date));
            $row[] = $field->total_level;
            $edt_btn = is_super_admin() ? '<a class="btn btn-sm btn-info" href="' . site_url('analitic/srs/osint/edit?id=' . $field->id) . '">
                        <i class="fa fa-edit"></i>
                    </a> ' : '';
            $del_btn = is_super_admin() || (isset($access_modul->dlt) && $access_modul->dlt == 1) ? '<button data-id="' . $field->id . '" data-title="' . $field->media . '" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#deleteModal">
                        <i class="fa fa-trash"></i>
                    </button> ' : '';
            $appr_btn = is_super_admin() || (isset($access_modul->apr) && $access_modul->apr == 1) ? $field->status == 1 ? '<button class="btn btn-sm btn-success" title="Approved">
                        <i class="fa fa-check"></i>
                    </button> ' : '<button data-id="' . $field->id . '" data-title="' . $field->risk . '" class="btn btn-sm btn-success" data-toggle="modal" data-target="#approveModal">
                        Approve
                    </button> ' : '';
            $row[] = $edt_btn . '<button data-id="' . $field->id . '" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal">
                        Detail
                    </button> ' . $del_btn;
            $data[] = $row;
        }

        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->models->count_all(),
            "recordsFiltered" => $this->models->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }


    public function get_subArea()
    {

        $id = $this->input->post("id");
        $res = $this->models->getDataWhere("admisecosint_sub1_header_data", ['sub_header_data' => $id]);
        echo json_encode($res->result());
    }

    public function get_subArea1()
    {
        $id = $this->input->post("id");
        $plant_id = $this->input->post("plant");
        $res = $this->models->getDataWhere("admisecosint_sub2_header_data", ['sub1_header_id' => $id, 'plant_id' => $plant_id]);
        if ($res->num_rows() > 0) {
            echo json_encode($res->result());
        } else {
            echo 0;
        }
    }


    public function get_Issue()
    {
        $id = $this->input->post("id");
        $res = $this->models->getDataWhere("admisecosint_sub1_header_data", ['sub_header_data' => $id]);
        if ($res->num_rows() > 0) {
            echo json_encode($res->result());
        } else {
            echo 0;
        }
    }

    public function get_SubIssue()
    {
        $id = $this->input->post("id");
        $res = $this->models->getDataWhere("admisecosint_sub2_header_data", ['sub1_header_id' => $id]);
        if ($res->num_rows() > 0) {
            echo json_encode($res->result());
        } else {
            echo 0;
        }
    }

    public function get_SubIssue1()
    {
        $id = $this->input->post("id");
        $res = $this->models->getDataWhere("admisecosint_sub3_header_data", ['sub2_header_id' => $id]);
        if ($res->num_rows() > 0) {
            echo json_encode($res->result());
        } else {
            echo 0;
        }
    }

    public function get_riskSource()
    {
        $id = $this->input->post("id");
        $res = $this->models->getDataWhere("admisecosint_sub1_header_data", ['sub_header_data' => $id]);
        if ($res->num_rows() > 0) {
            echo json_encode($res->result());
        } else {
            echo 0;
        }
    }

    public function get_riskSource1()
    {
        $id = $this->input->post("id");
        $res = $this->models->getDataWhere("admisecosint_sub2_header_data", ['sub1_header_id' => $id]);
        if ($res->num_rows() > 0) {
            echo json_encode($res->result());
        } else {
            echo 0;
        }
    }

    public function get_issuMedia()
    {
        $id = $this->input->post("id");
        $res = $this->models->getDataWhere("admisecosint_sub1_header_data", ['sub_header_data' => $id]);
        if ($res->num_rows() > 0) {
            echo json_encode($res->result());
        } else {
            echo 0;
        }
    }

    public function get_SubissuMedia()
    {
        $id  = $this->input->post("id");
        $res = $this->models->getDataWhere("admisecosint_sub2_header_data", ['sub1_header_id' => $id]);
        if ($res->num_rows() > 0) {
            echo json_encode($res->result());
        } else {
            echo 0;
        }
    }

    public function get_SubissuMedia1()
    {
        $id  = $this->input->post("id");
        $res = $this->models->getDataWhere("admisecosint_sub3_header_data", ['sub2_header_id' => $id]);
        if ($res->num_rows() > 0) {
            echo json_encode($res->result());
        } else {
            echo 0;
        }
    }

    public function get_LevelRisk()
    {
        $id  = $this->input->post("id");
        $res = $this->models->getDataWhere("admisecosint_sub_header_data", ['sub_id' => $id]);
        if ($res->num_rows() > 0) {
            $result = $res->row();
            $data = $this->models->getDataWhere("admisecosint_risk_level", ['id' => $result->level_id]);
            if ($data->num_rows() > 0) {
                echo json_encode($data->result());
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }

    public function get_LevelVulne()
    {
        $id  = $this->input->post("id");
        $res = $this->models->getDataWhere("admisecosint_sub_header_data", ['sub_id' => $id]);
        if ($res->num_rows() > 0) {
            $result = $res->row();
            $data = $this->models->getDataWhere("admisecosint_risk_level", ['type_level' => $result->type_level]);
            if ($data->num_rows() > 0) {
                echo json_encode($data->result());
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }

    public function getCategorySub1()
    {
        $res = $this->models->getCategorySub1()->result();

        $opt = '<div class="form-group col-3">
                <label for="legalitasSub1"></label>
                <select id="legalitasSub1" class="form-control" name="legalitas_sub1" required>';
            $opt .= '<option value="">-- Select --</option>';
                foreach ($res as $key => $sub) {
                     $opt .= '<option value="'.$sub->id.':'.$sub->level_id.':'.$sub->level.'">'.$sub->name.'</option>';
                }
        $opt .=  '</select>
                <span id="load12" style="display: none;" class="font-italic text-white">loading data</span>
            </div>';

        echo $opt;
    }

    public function save()
    {
        $res = $this->models->save();
        if ($res == "00") {
            $this->session->set_tempdata('success', '<i class="icon fas fa-check"></i> Berhasil menyimpan data', 5);
        } else {
            $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menyimpan data', 5);
        }
        redirect('analitic/srs/osint');
    }

    public function delete()
    {
        $res = $this->models->delete();
        if ($res == "00") {
            $this->session->set_tempdata('success', '<i class="icon fas fa-check"></i> Berhasil menghapus data', 5);
        } else {
            $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menghapus data', 5);
        }

        redirect('analitic/srs/osint');
    }


    public function edit()
    {
        $id = $this->input->get("id");

        $data_edit = $this->models->get_edit()->result();

        $hatespeech = $this->models->getCategory(5)->result_array();
        $regional = $this->models->getCategory(10)->result_array();
        $legalitas = $this->models->getCategory(11)->result_array();
        $format = $this->models->getCategory(12)->result_array();
        $media = $this->models->getCategory(4)->result_array();
        $mediaSub1 = $this->models->getCategorySub1($data_edit[0]->media_id)->result_array();
        $legalitasSub1 = $this->models->getCategorySub1($data_edit[0]->legalitas_id)->result_array();

        // echo '<pre>';print_r($data);
        // var_dump($mediaSub1);
        // die;

        $opt_regional = array('' => '-- Select --');
        foreach ($regional as $key => $reg) {
            $opt_regional[$reg['sub_id']] = ucwords($reg['name']);
        }

        $opt_legalitas = array('' => '-- Select --');
        foreach ($legalitas as $key => $leg) {
            $opt_legalitas[$leg['sub_id']] = ucwords($leg['name']);
        }

        $opt_format = array('' => '-- Select --');
        foreach ($format as $key => $for) {
            $opt_format[$for['sub_id']] = ucwords($for['name']);
        }

        $opt_media = array('' => '-- Select --');
        foreach ($media as $key => $med) {
            $opt_media[$med['sub_id'].':'.$med['level_id'].':'.$med['level']] = ucwords($med['name']);
        }

        $opt_mediaSub1 = array('' => '-- Select --');
        foreach ($mediaSub1 as $key => $mes1) {
            $opt_mediaSub1[$mes1['id']] = ucwords($mes1['name']);
        }

        $opt_legalitasSub1 = array('' => '-- Select --');
        foreach ($legalitasSub1 as $key => $les1) {
            $opt_legalitasSub1[$les1['id']] = ucwords($les1['name']);
        }

        $opt_hatespeech = array('' => '-- Select --');
        foreach ($hatespeech as $key => $hat) {
            $opt_hatespeech[$hat['sub_id'].':'.$hat['level_id'].':'.$hat['level']] = ucwords($hat['name']);
        }

        $data = [
            'data'  => $data_edit[0],
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'plant'     => $this->models->getPlant(),
            'area'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 1, 'status'=>1]),
            'targetIssue'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 2]),
            'riskSource'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 3]),
            'media' => form_dropdown('mediaIssue', $opt_media, $data_edit[0]->media_id.':'.$data_edit[0]->media_level_id.':'.$data_edit[0]->media_level ,'id="mediaIssue" class="form-control" required'),
            'mediaSub1' => form_dropdown('SubmediaIssue', $opt_mediaSub1, $data_edit[0]->sub_media_id,'id="SubmediaIssue" class="form-control" required'),
            'riskTarget'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 5]),
            'vulne'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 6]),
            'sdm'      => $this->models->levelVurne(7),
            'reput'      => $this->models->levelVurne(8),
            'file_edit'  => $this->models->getDataWhere("admisecosint_transaction_file", ['trans_id' => $id, 'status' => 1]),
            'regional' => form_dropdown('regional', $opt_regional, $data_edit[0]->regional_id, 'id="regional" class="form-control" required'),
            'legalitas' => form_dropdown('legalitas', $opt_legalitas, $data_edit[0]->legalitas_id,'id="legalitas" class="form-control" required'),
            'legalitasSub1' => form_dropdown('legalitas_sub1', $opt_legalitasSub1, $data_edit[0]->legalitas_sub1_id, 'id="legalitasSub1" class="form-control" required'),
            'format' => form_dropdown('format', $opt_format, $data_edit[0]->format_id,'id="format" class="form-control" required'),
            'hatespeech' => form_dropdown('hatespeech', $opt_hatespeech, $data_edit[0]->hatespeech_type_id.':'.$data_edit[0]->risk_level_id.':'.$data_edit[0]->risk_level,'id="hatespeech" class="form-control" required'),

        ];

        $this->template->load("template/analityc/template_srs", "srs/form_osint_edit", $data);
    }

    public function update()
    {
        $res = $this->models->update();
        if ($res == "00") {
            $this->session->set_tempdata('success', '<i class="icon fas fa-check"></i> Berhasil memperbarui data', 5);
        } else {
            $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal memperbarui data', 5);
        }
        redirect('analitic/srs/osint');
    }

    public function detail()
    {
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo $this->input->post("id");
        } else {
            $result = $this->models->get_detail();
            if ($result->num_rows() > 0) {
                $data = $result->row();
                $name = $this->db->get_where("admisecsgp_mstusr", ['npk' => $data->created_by])->row();
                $lampiran = $this->osidb->get_where("admisecosint_transaction_file", ['trans_id' => $data->id])->result();
                $opt = ' <table class="table table-borderless mb-3">
                                <tr>
                                    <th width="10">Author:</th>
                                    <td>' . $name->name . '</td>
                                </tr>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Activities</th>
                                        <td colspan="4">' . $data->activity_name . '</td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td colspan="4">' . date('d F Y ', strtotime($data->date)) . '</td>
                                    </tr>
                                    <tr>
                                        <th>Area</th>
                                        <td colspan="4">' . $data->plant . '</td>
                                    </tr>
                                    <tr>
                                        <th>Target Issue</th>
                                        <td colspan="4">' . $data->target_issue . '</td>
                                    </tr>
                                    <tr>
                                        <th>Risk Source</th>
                                        <td colspan="4">' . $data->risk_source_sub . '</td>
                                    </tr>
                                    <tr>
                                        <th>Media</th>
                                        <td>' . $data->media . '</td>
                                    </tr>
                                    <tr>
                                        <th>Regional</th>
                                        <td>' . $data->regional_name . '</td>
                                    </tr>
                                    <tr>
                                        <th>Legalitas</th>
                                        <td>' . $data->legalitas_name . ': '.$data->legalitas_sub1_name.'</td>
                                    </tr>
                                    <tr>
                                        <th>Format</th>
                                        <td>' . $data->format_name . '</td>
                                    </tr>
                                    <tr>
                                        <th>Negative Sentiment</th>
                                        <td colspan="4">' . $data->negative_sentiment . '</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table class="table table-borderless mb-0 text-center">
                                                <td>
                                                    <table class="table table-bordered mb-0 text-center">
                                                        <tr>
                                                            <th>Risk Level :</th>
                                                            <td>' . $data->risk_level . '</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table class="table table-bordered mb-0 text-center">
                                                        <tr>
                                                            <th>Impact Level :</th>
                                                            <td>' . $data->impact_level . '</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </table>
                                        </td>
                                    </tr>
                        <tr>
                            <th>Attachment</th>
                            <td colspan="4">
                                <table class="table table-bordered text-center">
                                    <tbody>';

                foreach ($lampiran as $fla) {
                    if (!empty($fla->file_name)) {
                        $opt .= '<tr><th>' . $fla->file_name . '</th>
                <td><a href="' . site_url('uploads/srs_bi/osint/' . $fla->file_name) . '" target="_blank">View</a></td></tr>';
                    }
                }
                $opt .= '
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th>URL 1</th>
                    <td colspan="4"><a href="'.$data->url1.'" target="_blank">' . $data->url1 . '</a></td>
                </tr>
                <tr>
                    <th>URL 2</th>
                    <td colspan="4"><a href="'.$data->url2.'" target="_blank">' . $data->url2 . '</a></td>
                </tr>
                    </tbody>
                </table>';
                echo $opt;
            } else {
                echo $this->input->post("id");
            }
        }
    }

    public function delete_attached()
    {
        $remove = $this->models->delete_file();
        echo $remove;
    }
}
