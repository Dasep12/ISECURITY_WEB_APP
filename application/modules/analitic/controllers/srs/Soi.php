<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Soi extends CI_Controller
{
    public $access_module = array();
    public $module_code = 'SRSSOI';

    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->helper(['auth_apps']);

        // CEK AKSES MODUL
        if (!is_module($this->module_code)) {
            redirect('analitic/srs/dashboard');
        }
        $this->access_module = is_module($this->module_code);

        $this->load->model(['srs/M_soi']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        // var_dump($this->access_module->crt);die();
        $data_area = $this->M_soi->area()->result();

        $opt_are = array('' => '-- Area --');
        foreach ($data_area as $key => $are) {
            $opt_are[$are->id] = $are->title;
        }

        $opt_lev = array('' => '-- Level --');
        for($i = 1; $i <= 5; $i++) {
            $opt_lev[$i] = $i;
        }

        $opt_lev_com = array('' => '-- Level --');
        for($i = 1; $i <= 10; $i++) {
            $opt_lev_com[$i] = $i;
        }

        $opt_mon= array('' => '-- Month --');
        for($i = 1; $i <= 12; $i++) {
            $opt_mon[$i] = date("F", mktime(0, 0, 0, $i, 10));
        }

        $firstYear = (int)date('Y') - 4; // - 84
        $lastYear = $firstYear + 4; // + 2
        $opt_yea = array('' => '-- Year --');
        for($i=$firstYear;$i<=$lastYear;$i++)
        {
            $opt_yea[$i] = $i;
        }

        $data = [
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'select_area' => form_dropdown('area', $opt_are,'','id="area" class="form-control" required'),
            'select_area_filter' => form_dropdown('area_filter', $opt_are,'','id="areaFilter" class="form-control" required'),
            'select_years' => form_dropdown('year', $opt_yea,'','id="years" class="form-control" required'),
            'select_years_filter' => form_dropdown('year_filter', $opt_yea,'','id="yearFilter" class="form-control" required'),
            'select_month' => form_dropdown('month', $opt_mon,'','id="month" class="form-control" required'),
            'select_month_filter' => form_dropdown('month_filter', $opt_mon,'','id="monthFilter" class="form-control" required'),
            'select_people' => form_dropdown('people', $opt_lev,'','id="people" class="form-control" required'),
            'select_people_comma' => form_dropdown('people_comma', $opt_lev_com,'','id="peopleComma" class="form-control" required'),
            'select_dev' => form_dropdown('device', $opt_lev,'','id="device" class="form-control" required'),
            'select_dev_comma' => form_dropdown('device_comma', $opt_lev,'','id="deviceComma" class="form-control" required'),
            'select_sys' => form_dropdown('system', $opt_lev,'','id="system" class="form-control" required'),
            'select_sys_comma' => form_dropdown('system_comma', $opt_lev_com,'','id="systemComma" class="form-control" required'),
            'select_net' => form_dropdown('network', $opt_lev,'','id="network" class="form-control" required'),
            'select_net_comma' => form_dropdown('network_comma', $opt_lev_com,'','id="networkComma" class="form-control" required'),
        ];

        // var_dump($data['link']);die();

        $this->template->load("template/analityc/template_srs", "srs/form_soi_v", $data);
    }

    public function list_table()
    {
        $role = $this->session->userdata('role');
        $npk = $this->session->userdata('npk');
        $access_modul = $this->Roles_m->access_modul($npk, 'SRSISO')->row();

        $list = $this->M_soi->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $month = date("F", mktime(0, 0, 0, $field->month, 10));
            $row[] = $no;
            $row[] = $field->area;
            $row[] = $field->year;
            $row[] = $month;
            $row[] = $field->people;
            $row[] = $field->system;
            $row[] = $field->device;
            $row[] = $field->network;
            $edt_btn = (is_super_admin()) || (isset($this->access_module->edt) && $this->access_module->edt == '1') ? '<a class="btn btn-sm btn-info" href="'.site_url('analitic/srs/soi/edit/'.$field->id).'">
                        <i class="fa fa-edit"></i>
                    </a> ' : '';
            $del_btn = (is_super_admin()) || (isset($this->access_module->dlt) && $this->access_module->dlt == '1') ? '<button data-id="'.$field->id.'" data-title="'.$field->area." - ".$month.' '.$field->year.'" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">
                        <i class="fa fa-trash"></i>
                    </button> ' : '';
            $appr_btn = (is_super_admin()) || (isset($this->access_module->apr) && $this->access_module->apr == '1') ? $field->status == 1 ? '<button class="btn btn-sm btn-success" >
                        <i class="fa fa-check"></i>
                    </button> ' : '<button data-id="'.$field->id.'" data-title="'.$field->area." - ".$month.' '.$field->year.'" class="btn btn-sm btn-success" data-toggle="modal" data-target="#approveModal">
                        Approve
                    </button> ' : '';
            $row[] = $appr_btn.$edt_btn.'<button data-id="'.$field->id.'" class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#detailModal">
                        Detail
                    </button>'.$del_btn;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_soi->count_all(),
            "recordsFiltered" => $this->M_soi->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function get_performance_gt()
    {
        $area = $this->input->post('area', true);
        $year = $this->input->post('year', true);
        $month = $this->input->post('month', true);

        $perform_gt = $this->M_soi->get_performance_gt()->result();

        $sum_persen = 0;
        foreach ($perform_gt as $key => $pgt) {
            $sum_persen += $pgt->persentase;
        }

        $jumlahPatroli = 3; // Jumlah patroli dalam sehari
        $totalHari = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $totalArea = 1;
        $total = round($sum_persen / ($jumlahPatroli * $totalHari) / $totalArea, 0);

        $data = array(
            'performance_gt' => $total,
        );

        echo json_encode($data, true);
    }

    public function get_performance_gt_test()
    {
        $area = 'ADMP5LP';
        $year = 2022;
        $month = 12;

        $perform_gt = $this->M_soi->get_performance_gt_test()->result();

        $sum_persen = 0;
        foreach ($perform_gt as $key => $pgt) {
            $sum_persen += $pgt->persentase;
        }

        $jumlahPatroli = 3; // Jumlah patroli dalam sehari
        $totalHari = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $totalArea = 1;
        $total = round($sum_persen / ($jumlahPatroli * $totalHari) / $totalArea, 0);

        $data = array(
            'performance_gt' => $total,
        );

        echo json_encode($data, true);
    }

    public function edit()
    {
        $id = $this->uri->segment(5);

        if ($id == '')
        {
            $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> ID tidak ditemukan', 5);
            redirect('analitic/srs/soi');
        }
        else
        {
            $get_edit = $this->M_soi->edit($id)->result();
            $data_area = $this->M_soi->area()->result();

            if($get_edit !== NULL)
            {
                $data_edit = $get_edit[0];

                $opt_are = array('' => '-- Area --');
                foreach ($data_area as $key => $are) {
                    $opt_are[$are->id] = $are->title;
                }

                $opt_lev = array('' => '-- Level --');
                for($i = 1; $i <= 5; $i++) {
                    $opt_lev[$i] = $i;
                }

                $opt_lev_com = array('' => '-- Level --');
                for($i = 1; $i <= 10; $i++) {
                    $opt_lev_com[$i] = $i;
                }

                $opt_mon= array('' => '-- Month --');
                for($i = 1; $i <= 12; $i++) {
                    $opt_mon[$i] = date("F", mktime(0, 0, 0, $i, 10));
                }

                $firstYear = (int)date('Y') - 4; // - 84
                $lastYear = $firstYear + 4; // + 2
                $opt_yea = array('' => '-- Year --');
                for($i=$firstYear;$i<=$lastYear;$i++)
                {
                    $opt_yea[$i] = $i;
                }

                // var_dump($data_edit);die();

                $data = [
                    'link' => $this->uri->segment(3),
                    'sub_link' => $this->uri->segment(4),
                    'select_area' => form_dropdown('area', $opt_are, $data_edit->area_id,'id="area" class="form-control" required'),
                    'select_years' => form_dropdown('year', $opt_yea, $data_edit->year,'id="years" class="form-control" required'),
                    'select_month' => form_dropdown('month', $opt_mon, $data_edit->month,'id="month" class="form-control" required'),
                    'data_edit' => $data_edit
                ];
                
                $this->template->load("template/analityc/template_srs", "srs/form_soi_edit_v", $data);
            }
            else
            {
                $this->session->set_tempdata('fail', '<i class="icon fas fa-exclamation-triangle"></i> Data tidak ditemukan', 5);
                redirect('analitic/srs/soi');
            }
        }
    }

    public function update()
    {
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        // $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> ID tidak ditemukan', 5);
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
            $res = $this->M_soi->update();

            if($res == '00')
            {
                $this->session->set_tempdata('success', '<i class="icon fas fa-check"></i> Berhasil menyimpan data', 5);
            }
            else
            {
                $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menyimpan data', 5);
            }
            
            redirect('analitic/srs/soi');
        }
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
            $res_sub = $this->M_soi->detail()->result();

            if($res_sub)
            {
                $opt = '<table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Area</th>
                                    <td>'.$res_sub[0]->area.'</td>
                                </tr>
                                <tr>
                                    <th>Year</th>
                                    <td>'.$res_sub[0]->year.'</td>
                                </tr>
                                <tr>
                                    <th>Month</th>
                                    <td>'.date("F", mktime(0, 0, 0, $res_sub[0]->month, 10)).'</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table class="table table-bordered">
                                            <tr class="text-center">
                                                <th colspan="2">People</th>
                                                <th colspan="2">System</th>
                                                <th>Device</th>
                                                <th>Network</th>
                                            </tr>
                                            <tr>
                                                <th>Knowlage</th>
                                                <th class="text-center font-weight-normal">'.$res_sub[0]->knowlage.'</th>
                                                <th>ASMS Value</th>
                                                <th class="text-center font-weight-normal">'.$res_sub[0]->asms_value.'</th>
                                                <th rowspan="3"></th>
                                                <th rowspan="3"></th>
                                            </tr>
                                            <tr>
                                                <th>Attitude</th>
                                                <th class="text-center font-weight-normal">'.$res_sub[0]->attitude.'</th>
                                                <th>Perform Guard Tour</th>
                                                <th class="text-center font-weight-normal">'.$res_sub[0]->perform_gt.'</th>
                                            </tr>
                                            <tr>
                                                <th>Skill</th>
                                                <th class="text-center font-weight-normal">'.$res_sub[0]->skill.'</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            <tr class="text-center">
                                                <th colspan="2" >'.$res_sub[0]->people.'</th>
                                                <th colspan="2">'.$res_sub[0]->system.'</th>
                                                <th>'.$res_sub[0]->device.'</th>
                                                <th>'.$res_sub[0]->network.'</th>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Note</th>
                                    <td>
                                        <textarea class="form-control" disabled>'.$res_sub[0]->note.'</textarea>
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

    public function save()
    {
        $this->form_validation->set_rules('area', 'Area', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
            redirect('analitic/srs/soi');
        }
        else
        {
            $res = $this->M_soi->save();

            if($res == '00')
            {
                $this->session->set_tempdata('success', '<i class="icon fas fa-check"></i> Berhasil menyimpan data', 5);
            }
            else
            {
                $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menyimpan data', 5);
            }

            redirect('analitic/srs/soi');
        }
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
            $res = $this->M_soi->approve();

            if($res == '00')
            {
                $this->session->set_flashdata('success', '<i class="icon fas fa-check"></i> Berhasil menghapus data');
            }
            else
            {
                $this->session->set_flashdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menghapus data');
            }
        }
        
        redirect('analitic/srs/soi');
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
            $res = $this->M_soi->delete();

            if($res == '00')
            {
                $this->session->set_tempdata('success', '<i class="icon fas fa-check"></i> Berhasil menghapus data', 5);
            }
            else
            {
                $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menghapus data', 5);
            }

        }
        
        redirect('analitic/srs/soi');
    }

}