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

        // $d = $this->models->get_detail();
        // echo "<pre>";
        // var_dump($d->result());

        $data = [
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'plant'     => $this->models->getPlant(),
            'area'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 1]),
            'targetIssue'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 2]),
            'riskSource'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 3]),
            'media'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 4]),
            'riskTarget'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 5]),
            'vulne'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 6]),
            'sdm'      => $this->models->levelVurne(7),
            'reput'      => $this->models->levelVurne(8),

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
            if ($field->jenis_media == "News Portal") {
                $row[] = $field->jenis_media;
            } else {
                $row[] = $field->sub_media;
            }
            $row[] = $field->risk;
            $row[] = date('d F Y ', strtotime($field->event_date));
            $row[] = $field->impact_level;
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
            $row[] = $appr_btn . $edt_btn . '<button data-id="' . $field->id . '" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal">
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
        $data = [
            'data'  => $this->models->getDataWhere("admisecosint_transaction", ['id' => $id])->row(),
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'plant'     => $this->models->getPlant(),
            'area'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 1]),
            'targetIssue'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 2]),
            'riskSource'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 3]),
            'media'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 4]),
            'riskTarget'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 5]),
            'vulne'      => $this->models->getDataWhere("admisecosint_sub_header_data", ['header_data_id' => 6]),
            'sdm'      => $this->models->levelVurne(7),
            'reput'      => $this->models->levelVurne(8),
            'file_edit'  => $this->models->getDataWhere("admisecosint_transaction_file", ['trans_id' => $id, 'status' => 1])

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
                                        <td>' . $data->plant . '</td>
                                    </tr>
                                    <tr>
                                        <th>Media</th>
                                        <td>' . $data->media . '</td>
                                    </tr>
                                    <tr>
                                    <th>Vulnerability Lost</th>
                                    <td colspan="4">
                                        <table class="table table-bordered text-center">
                                            <tr>
                                                <th>SDM Sector Effect</th>
                                                <th>Reputation</th>
                                            </tr>
                                            <tr>
                                                <td>' . $data->sdm_level . '</td>
                                                <td>' . $data->reputasi_level . '</td>
                                            </tr>
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
