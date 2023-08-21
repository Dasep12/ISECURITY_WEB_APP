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
        $date = $this->input->get("date");
        $shift = $this->input->get("shift");
        $area = $this->input->get("area");
        $trans = $this->soadb->query("SELECT *  from admisecdrep_transaction at2  where at2.shift  = '$shift' and at2.report_date = '" . $date . "' and at2.area_id  = '$area' ")->row();

        $opt_shift = array('' => '-- Shift --');
        for ($i = 1; $i <= 3; $i++) {
            $opt_shift[$i] = $i;
        }
        $data_area = $this->M_soa->area()->result();

        $opt_are = array('' => '-- Area --');
        foreach ($data_area as $key => $are) {
            $opt_are[$are->id] = $are->title;
        }

        $data = [
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'headerTrans' => $trans,
            'select_area' => $data_area,
            'select_shift' => [1, 2, 3],
        ];

        $this->template->load("template/analityc/template_soa", "soa/form_edit_daily_report_release", $data);
    }

    public function update()
    {
        $transId = $this->input->post("id_trans");
        $datas = ['status' => 0];

        $updatePeople = $this->M_soa->update("admisecdrep_transaction_people", ['trans_id' => $transId], $datas);
        $updateVehicle = $this->M_soa->update("admisecdrep_transaction_vehicle", ['trans_id' => $transId], $datas);
        $updateDocument = $this->M_soa->update("admisecdrep_transaction_material", ['trans_id' => $transId], $datas);
        if ($updatePeople && $updateVehicle && $updateDocument) {
            $reportDate = $this->input->post("report_date");
            $shift = $this->input->post("shift");
            $area = $this->input->post("area_filter");
            $chronology = $this->input->post("chronology");


            $header_transaksi = array(
                'created_on'    => date("Y-m-d H:i:s"),
                'created_by'    => $this->session->userdata("npk"),
                'report_date'   => $reportDate,
                'shift'         => $shift,
                'area_id'       => $area,
                'chronology'    => $chronology
            );
            $updateDocument = $this->M_soa->update("admisecdrep_transaction", ['id' => $transId], $header_transaksi);
            $save = $this->M_soa->update2($transId);
            if ($save == "01") {
                $this->session->set_tempdata('success', '<i class="icon fas fa-check"></i> Berhasil update data', 5);
            } else {
                $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal update data', 5);
            }
            redirect('analitic/soa/daily_report');
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
        } else if ($save == "02") {
            $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menyimpan, karena sudah pernah input dengan data yang sama', 5);
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
