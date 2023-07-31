<?php


class Menu extends CI_Controller
{

	public function __construct(Type $var = null)
	{
		parent::__construct();
        $this->load->model(['analitic/srs/M_dashboard','Roles_m']);
		$id = $this->session->userdata('id_token');
		if ($id == null || $id == "") {
			$this->session->set_flashdata('info_login', 'anda harus login dulu');
			redirect('Login');
		}
        $this->load->helper(['auth_apps']);
	}

	public function index()
	{
		$data = [
			'link'		=> $this->uri->segment(1),
		];
		$this->template->load("template/template_first", "default", $data);
	}

	public function srsMonth()
	{
        $res_trans_month = $this->M_dashboard->grap_trans_month()->result();

        $gtm_arr = array();
        foreach ($res_trans_month as $key => $gtm) {
            $gtm_arr[] = $gtm->total;
        }

        echo json_encode($gtm_arr, true);
	}

	public function srsPerPlant()
	{
        $res = $this->M_dashboard->grap_trans_area()->result_array();

        $plantArr = array();
        $totalArr = array();
        foreach ($res as $key => $tar) {
            $plantArr[] = $tar['title'];
            $totalArr[] = $tar['total'];
        }

        $arr = array(
    		'plant' => $plantArr,
    		'total' => $totalArr,
    	);

        echo json_encode($arr, true);
	}

	public function srsRiskSource()
	{
        $res = $this->M_dashboard->grap_risk_source()->result_array();

        $rsouArr = array();
        foreach ($res as $key => $rsou) {
            $rsouArr[] = array(
                'id' => $rsou['id'],
                'label' => $rsou['title'],
                'total' => $rsou['total']
            );
        }

        echo json_encode($rsouArr, true);
	}

	public function srsTargetAssets()
	{
        $res = $this->M_dashboard->grap_target_assets()->result_array();

        $assArr = array();
        foreach ($res as $key => $ass) {
            $assArr[] = array(
                'id' => $ass['id'],
                'label' => $ass['title'],
                'total' => $ass['total']
            );
        }

        echo json_encode($assArr, true);
	}

	public function srsRisk()
	{
        $res = $this->M_dashboard->grap_risk()->result_array();

        $risArr = array();
        foreach ($res as $key => $ris) {
            $risArr[] = array(
                'id' => $ris['id'],
                'label' => $ris['title'],
                'total' => $ris['total']
            );
        }

        echo json_encode($risArr, true);
	}

	public function srsSoi()
	{
        $res_iso = $this->M_dashboard->grap_srs()->result_array();
        $res_soi = $this->M_dashboard->grap_soi()->result_array();

        $arr = array(
            'data_index' => $res_iso[0]['max_iso'],
            'data_soi' => $res_soi[0]['avg_soi']
        );

        echo json_encode($arr, true);
	}
}
