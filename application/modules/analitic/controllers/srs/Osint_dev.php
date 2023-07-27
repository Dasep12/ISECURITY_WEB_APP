<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Osint_dev extends CI_Controller
{
    public $access_module = array();
    public $module_code = 'SRSOSI';

    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->helper(['auth_apps']);

        // CEK AKSES MODUL
        if (!is_module($this->module_code)) {
            redirect('analitic/srs/dashboard');
        }
        $this->access_module = is_module($this->module_code);

        $this->load->model(['srs/M_osi']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data_security_info = $this->M_osi->security_info()->result_array();
        $data_area = $this->M_osi->area()->result_array();

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

        $opt_secinfo = array('' => '-- Choose --');
        foreach ($data_security_info as $key => $sub) {
            $opt_secinfo[$sub['id']] = ucwords($sub['title']);
        }

        $opt_area = array('' => '-- Choose --');
        foreach ($data_area as $key => $are) {
            $opt_area[$are['id']] = ucwords($are['title']);
        }

        $data = [
            'link' => $this->uri->segment(3),
            'sub_link' => $this->uri->segment(4),
            'select_years' => form_dropdown('year', $opt_yea,'','id="years" class="form-control" required'),
            'select_years_filter' => form_dropdown('year_filter', $opt_yea,'','id="yearFilter" class="form-control" required'),
            'select_month' => form_dropdown('month', $opt_mon,'','id="month" class="form-control" required'),
            'select_month_filter' => form_dropdown('month_filter', $opt_mon,'','id="monthFilter" class="form-control" required'),

            'select_security_information' => form_dropdown('secinfo', $opt_secinfo,'','id="secInfo" class="form-control" required'),
            'select_area' => form_dropdown('area', $opt_area,'','id="area" class="form-control" required'),
        ];

        $this->template->load("template/analityc/template_srs", "srs/form_osi_v", $data);
    }

    public function list_table()
    {
        $role = $this->session->userdata('role');
        $npk = $this->session->userdata('npk');

        $access_modul = $this->Roles_m->access_modul($npk, $this->module_code)->row();

        $list = $this->M_osi->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->area_name;
            $row[] = $field->secinfo_name;
            $row[] = date('d F Y H:i', strtotime($field->event_date));
            $edt_btn = is_super_admin() ? '<a class="btn btn-sm btn-info" href="'.site_url('analitic/srs/osint/edit/'.$field->id).'">
                        <i class="fa fa-edit"></i>
                    </a> ' : '';
            $del_btn = is_super_admin() || (isset($access_modul->dlt) && $access_modul->dlt == 1) ? '<button data-id="'.$field->id.'" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#deleteModal">
                        <i class="fa fa-trash"></i>
                    </button> ' : '';
            $appr_btn = is_super_admin() || (isset($access_modul->apr) && $access_modul->apr == 1) ? $field->status == 1 ? '<button class="btn btn-sm btn-success" title="Approved">
                        <i class="fa fa-check"></i>
                    </button> ' : '<button data-id="'.$field->id.'" data-title="'.$field->secinfo_name.'" class="btn btn-sm btn-success" data-toggle="modal" data-target="#approveModal">
                        Approve
                    </button> ' : '';
            $row[] = $appr_btn.$edt_btn.'<button data-id="'.$field->id.'" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal">
                        Detail
                    </button> '.$del_btn;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_osi->count_all(),
            "recordsFiltered" => $this->M_osi->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function get_securityinfo_sub()
    {
        $this->form_validation->set_rules('categ_id', 'ID Category', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo null;
        }
        else
        {
            $res_sub = $this->M_osi->get_securityinfo_sub()->result();

            if($res_sub)
            {
                $sub_name = $this->input->post('sub_name', true);

                $opt = '<div class="form-group col-3">
                            <label for="'.$sub_name.'">'.ucwords(strtolower($res_sub[0]->title_cat)).'</label>
                            <select id="'.$sub_name.'" class="form-control" name="'.$sub_name.'" required>';
                $opt .= '<option value="">-- Choose --</option>';
                foreach ($res_sub as $key => $sub) {
                    $opt .=  '<option value="'.$sub->id.'">'.ucwords($sub->title).'</option>';
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

    public function get_area_sub()
    {
        $this->form_validation->set_rules('categ_id', 'ID Category', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            echo null;
        }
        else
        {
            $res_sub = $this->M_osi->get_area_sub()->result();

            if($res_sub)
            {
                $sub_name = $this->input->post('sub_name', true);

                $opt = '<div class="form-group col-3">
                            <label for="'.$sub_name.'">'.ucwords(strtolower($res_sub[0]->title_cat)).'</label>
                            <select id="'.$sub_name.'" class="form-control" name="'.$sub_name.'" required>';
                $opt .= '<option value="">-- Choose --</option>';
                foreach ($res_sub as $key => $sub) {
                    $opt .=  '<option value="'.$sub->id.'">'.ucwords($sub->title).'</option>';
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

    public function save()
    {
        $this->form_validation->set_rules('event_date', 'Event date', 'trim|required');
        // $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
            redirect('analitic/srs/osint_dev');
        }
        else
        {
            $res = $this->M_osi->save();

            if($res == '00')
            {
                $this->session->set_tempdata('success', '<i class="icon fas fa-check"></i> Berhasil menyimpan data', 5);
            }
            else
            {
                $this->session->set_tempdata('error', '<i class="icon fas fa-exclamation-triangle"></i> Gagal menyimpan data', 5);
            }

        }
        redirect('analitic/srs/osint_dev');
    }

}