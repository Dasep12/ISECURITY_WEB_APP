<?php defined('BASEPATH') or exit('No direct script access allowed');

class Daily_report extends CI_Controller
{
    public $access_module = array();
    public $module_code = 'SOADRE';

    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->helper(['auth_apps']);

        // CEK AKSES MODUL
        if (!is_module($this->module_code)) {
            redirect('analitic/soa/dashboard');
        }
        $this->access_module = is_module($this->module_code);
        $this->soadb = $this->load->database('soa_bi', TRUE);

        $this->load->model(['soa/M_soa', 'srs/M_soi']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        // var_dump($this->access_module->crt);die();
        $data_area = $this->M_soa->area()->result();

        $opt_are = array('' => '-- Area --');
        foreach ($data_area as $key => $are) {
            $opt_are[$are->id] = $are->title;
        }

        $opt_shift = array('' => '-- Shift --');
        for ($i = 1; $i <= 3; $i++) {
            $opt_shift[$i] = $i;
        }

        $opt_vehicletype = array('' => '-- Vehicle Type --');
        for ($i = 1; $i <= 3; $i++) {
            $opt_vehicletype[$i] = $i;
        }

        $data = [
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'select_area' => form_dropdown('area', $opt_are, '', 'id="area" class="form-control" required'),
            'select_area_filter' => form_dropdown('area_filter', $opt_are, '', 'id="areaFilter" class="form-control"'),
            'select_shift' => form_dropdown('shift', $opt_shift, '', 'id="shift" class="form-control" required'),
            'select_vehicle_type' => form_dropdown('vehicle_type', '', '', 'id="vehicleType" class="form-control" required'),
        ];

        $this->template->load("template/analityc/template_soa", "soa/form_daily_report_release", $data);
    }

    public function list_table()
    {
        $list = $this->M_soa->get_datatables();
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $data = [];

        $no = 1;
        foreach ($list->result() as $r) {
            $data[] = array(
                $no++,
                $r->area,
                $r->tanggal,
                $r->total_vehicle,
                $r->total_people,
                $r->total_document,
                $r->area_id
            );
        }
        $result = array(
            "draw" => $draw,
            "recordsTotal" => $list->num_rows(),
            "recordsFiltered" => $list->num_rows(),
            "data" => $data
        );


        // echo json_encode($result);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($result));
    }

    public function edit()
    {
        $id = $this->uri->segment(5);

        if ($id == '') {
            $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> ID tidak ditemukan', 5);
            redirect('analitic/srs/soi');
        } else {
            $get_edit = $this->M_soi->edit($id)->result();
            $data_area = $this->M_soi->area()->result();

            if ($get_edit !== NULL) {
                $data_edit = $get_edit[0];

                $opt_are = array('' => '-- Area --');
                foreach ($data_area as $key => $are) {
                    $opt_are[$are->id] = $are->title;
                }

                $opt_lev = array('' => '-- Level --');
                for ($i = 1; $i <= 5; $i++) {
                    $opt_lev[$i] = $i;
                }

                $opt_lev_com = array('' => '-- Level --');
                for ($i = 1; $i <= 10; $i++) {
                    $opt_lev_com[$i] = $i;
                }

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

                // var_dump($data_edit);die();

                $data = [
                    'link' => $this->uri->segment(3),
                    'sub_link' => $this->uri->segment(4),
                    'select_area' => form_dropdown('area', $opt_are, $data_edit->area_id, 'id="area" class="form-control" required'),
                    'select_years' => form_dropdown('year', $opt_yea, $data_edit->year, 'id="years" class="form-control" required'),
                    'select_month' => form_dropdown('month', $opt_mon, $data_edit->month, 'id="month" class="form-control" required'),
                    'data_edit' => $data_edit
                ];

                $this->template->load("template/analityc/template_srs", "srs/form_soi_edit_v", $data);
            } else {
                $this->session->set_tempdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> Data tidak ditemukan', 5);
                redirect('analitic/srs/soi');
            }
        }
    }

    public function update()
    {
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        // $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> ID tidak ditemukan', 5);
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $res = $this->M_soi->update();

            if ($res == '00') {
                $this->session->set_tempdata('success', '<i class="icon fas fa-check"></i> Berhasil menyimpan data', 5);
            } else {
                $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menyimpan data', 5);
            }

            redirect('analitic/srs/soi');
        }
    }

    public function detail()
    {

        $data = [
            'area' => $this->M_soa->get_detail(),
            'date'  => $this->input->post("tanggal")
        ];
        $this->load->view("soa/detail_soa", $data);
    }

    public function save()
    {
        $save = $this->M_soa->save();
        if ($save == "01") {
            $this->session->set_tempdata('success', '<i class="icon fas fa-check"></i> Berhasil menyimpan data', 5);
        } else {
            $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menyimpan data', 5);
        }
        redirect('analitic/soa/daily_report');
    }

    public function approve()
    {
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> ID tidak ditemukan', 5);
        } else {
            $res = $this->M_soi->approve();

            if ($res == '00') {
                $this->session->set_flashdata('success', '<i class="icon fas fa-check"></i> Berhasil menghapus data');
            } else {
                $this->session->set_flashdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menghapus data');
            }
        }

        redirect('analitic/srs/soi');
    }

    public function delete()
    {
        $res = $this->M_soa->delete();
        echo $res;
    }
}
