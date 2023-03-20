<?php

class DashboardVms extends CI_Controller{

    function __construct()
    {
      parent::__construct();
      $this->iremake = $this->load->database('iremake', TRUE);
      $this->dateNow = new DateTimeImmutable('now', new DateTimeZone('Asia/Jakarta'));
      $this->load->model('Login_model');
      $this->load->model('Admin_model');
      $this->load->model('SecOps_model');
      $id = "ADM-220927";
      $cek = $this->Login_model->cek_msrole($id)->row();
      if ($id == null || $id == "") {
           $this->session->set_flashdata('info', 'sessi berakhir silahkan login kembali');
              redirect('Login');
          } 
     
    }

    function index(){
      $tanggal = date('Y-m-d');
      $bulan = date('Y-m');
     
      $id = $this->Login_model->cek_msrole("ADM-220927")->row();
    
      $where = $id->wilayah;
      $area = $id->area_kerja;
      $monthYear = $this->dateNow->format('F Y');
      $year = $this->dateNow->format('Y');
      // $dataTemuan = $this->M_LaporanTemuan->getTotalTemuan();
      
      
      $head = array(
          'link'   => $this->uri->segment(3),
          'user' => $this->iremake->get_where('admviewakun_admin', array('id_karyawan' => "ADM-220927"))->row(),
          'group' => $this->Admin_model->group($where),
          'wilayah' => $this->iremake->get_where('admviewtrans_sgpprofile', array('wilayah' => $where))->num_rows(),
        );
      
     if($id->role == "ADMIN-ANGGOTA"){
            $data = array(
              'TamuHariIni'  => $this->iremake->query("SELECT count(area) AS TamuArea FROM admviewtrans_visitor WHERE area = '$area' AND tanggal = '$tanggal' ")->row(),
              'TamuBulanIni'  => $this->iremake->query("SELECT count(area) AS TamuArea FROM admviewtrans_visitor WHERE area = '$area' AND tanggal LIKE   '%$bulan%'")->row(),
            );
        }else if($id->role == "PIC"){
            $data = array(
              'TamuHariIni'  => $this->iremake->query("SELECT count(area) AS TamuArea FROM admviewtrans_visitor WHERE area = '$area' AND tanggal = '$tanggal' ")->row(),
              'TamuBulanIni'  => $this->iremake->query("SELECT count(area) AS TamuArea FROM admviewtrans_visitor WHERE area = '$area' AND tanggal LIKE   '%$bulan%'")->row(),
            );
        }else if($id->role == "SPV"){
            $data = array(
              'TamuHariIni'  => $this->iremake->query("SELECT count(area) AS TamuArea FROM admviewtrans_visitor WHERE area = '$area' AND tanggal = '$tanggal' ")->row(),
              'TamuBulanIni'  => $this->iremake->query("SELECT count(area) AS TamuArea FROM admviewtrans_visitor WHERE area = '$area' AND tanggal LIKE   '%$bulan%'")->row(),
            );
        }
      $this->load->view("template/sidebarIsec",$head);
      $this->load->view('SecOps/HomeVms',$data);
      $this->load->view('template/SecOpsJS');
      $this->load->view("template/footer");
    }

    function CountTamuHariINi(){
        $id = $this->Login_model->cek_msrole("ADM-220927")->row();
        $where = $id->area_kerja;
        
    }


    function listTamuUser(){
        $month = $this->input->get('month');
        $year = $this->input->get('year');
        $dataPatroli = $this->M_LaporanPatroli->getPatroliPlantByUser($year, $month);
        $plants = $this->M_LaporanTemuan->list_plants();
        $patrol_groups = explode(',', get_setting('patrol_group')->nilai_setting);
        $datasets = [];
        foreach ($patrol_groups as $i => $group) {
          foreach ($dataPatroli as $k => $patroli) {
            if (!array_key_exists($i, $datasets)) {
              $datasets[$i] = [
                'label' => $group,
                'type' => "bar",
                'data' => array(),
                'barPercentage' => 0.2,
                'minBarLength' => 2
              ];
            }

            foreach ($plants as $key => $plant) {
              if ($plant == $patroli->plant_name and $group == $patroli->patrol_group) {
                $datasets[$i]['data'][$key] = $patroli->total_patroli == null ? 0 : $patroli->total_patroli;
              } else {
                if (!array_key_exists($key, $datasets[$i]['data'])) {
                  $datasets[$i]['data'][$key] = 0;
                }
              }
            }
          }
        }

        $data = [
          'labels' => $plants,
          'datasets' => $datasets,
        ];

        return $this->output
          ->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode($data));
      }
}

?>