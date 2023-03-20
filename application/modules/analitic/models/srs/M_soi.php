<?php

class M_soi extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->srsdb = $this->load->database('srs_bi', TRUE);
    }

    public function area()
    {
        $wil = user_wilayah();
        $npk = user_npk();

        $q = "SELECT id, title FROM admiseciso_area_sub WHERE area_categ_id='1' AND status=1";
        
        if(is_author('ALLAREA'))
        {
            $q .= " AND wil_id='$wil'";
        } 
        $resq = $this->srsdb->query($q);

        return $resq;
    }

    protected $t_trans_iso = 'admisecsoi_transaction';
    var $column_order = array(null, 'asu.title', 'a.year', 'a.month', 'a.people', 'a.system', 'a.device', 'a.network', null); //field yang ada di table user
    var $column_search = array('a.title'); //field yang diizin untuk pencarian 
    var $order = array('a.month' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        $this->srsdb->select('a.id, asu.title area, a.year, a.month, a.people, a.system, a.device, a.network, a.status');
        $this->srsdb->from($this->t_trans_iso.' a');
        $this->srsdb->join('admiseciso_area_sub asu', 'asu.id=a.area_id', 'inner');
        $this->srsdb->where('a.disable', 0);
        $this->srsdb->where_in('a.status', [0,1]);
        if(is_author())
        {
            $this->srsdb->where('a.created_by', user_npk());
        }

        if($this->input->post('areafilter')) $this->srsdb->where('a.area_id', $this->input->post('areafilter'));
        if($this->input->post('yearfilter')) $this->srsdb->where('a.year', $this->input->post('yearfilter'));
        if($this->input->post('monthfilter')) $this->srsdb->where('a.month', $this->input->post('monthfilter'));

        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->srsdb->group_start(); 
                    $this->srsdb->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->srsdb->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->srsdb->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->srsdb->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->srsdb->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->srsdb->limit($_POST['length'], $_POST['start']);
        $query = $this->srsdb->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->srsdb->get();
        return $query->num_rows();
    }
 
    function count_all()
    {
        $this->srsdb->from($this->t_trans_iso);
        return $this->srsdb->count_all_results();
    }

    public function detail()
    {
        $id = $this->input->post('id', true);

        $q = $this->srsdb->query("
                SELECT a.id, a.year, a.month, a.knowlage, a.attitude, a.skill, a.people, a.asms_value, a.perform_gt, a.system, a.device, a.network, ars.title area, a.note
                    FROM admisecsoi_transaction a
                    INNER JOIN admiseciso_area_sub ars ON ars.id=a.area_id
                WHERE a.id='$id'
            ");

        return $q;
    }

    public function get_performance_gt()
    {
        $area = $this->input->post('area', true);
        $year = $this->input->post('year', true);
        $month = $this->input->post('month', true);

        $q = $this->srsdb->query("
            SELECT count(1) total_ckp_p ,count(tra.total_ckp_trans) total_tra 
                    ,(count(tra.total_ckp_trans) * 100 / count(1)) persentase 
                FROM isecurity.dbo.admisecsgp_trans_zona_patroli szn 
                INNER JOIN isecurity.dbo.admisecsgp_trans_jadwal_patroli atjp ON atjp.date_patroli=szn.date_patroli 
                    AND atjp.admisecsgp_mstplant_plant_id=szn.admisecsgp_mstplant_plant_id 
                    AND atjp.admisecsgp_mstshift_shift_id=szn.admisecsgp_mstshift_shift_id 
                INNER JOIN isecurity.dbo.admisecsgp_mstckp sckp on sckp.admisecsgp_mstzone_zone_id=szn.admisecsgp_mstzone_zone_id
                LEFT JOIN (
                    select count(ath.trans_header_id) total_ckp_trans, ath.date_patroli
                            ,ath.admisecsgp_mstshift_shift_id
                            ,ath.admisecsgp_mstckp_checkpoint_id
                        from isecurity.dbo.admisecsgp_trans_headers ath 
                        where ath.type_patrol=0 and ath.status=1 
                    group by ath.date_patroli, ath.admisecsgp_mstusr_npk
                        ,ath.admisecsgp_mstshift_shift_id
                        ,ath.admisecsgp_mstckp_checkpoint_id
                ) tra ON tra.date_patroli=szn.date_patroli and tra.admisecsgp_mstshift_shift_id=szn.admisecsgp_mstshift_shift_id
                    AND tra.admisecsgp_mstckp_checkpoint_id=sckp.checkpoint_id
            WHERE year(szn.date_patroli)='$year' AND month(szn.date_patroli)='$month' AND szn.admisecsgp_mstplant_plant_id in (select plant_id from srs_bi.dbo.admisec_area_join_plant where area_id='$area')
                AND szn.status=1 AND szn.status_zona=1 AND sckp.status=1 AND sckp.status=1
            GROUP BY szn.date_patroli ,szn.admisecsgp_mstshift_shift_id ,atjp.admisecsgp_mstusr_npk
            ORDER BY szn.date_patroli ASC
        ");

        return $q;
    }

    public function get_performance_gt_test()
    {
        $area = 'ADMP5LP';
        $year = 2022;
        $month = 12;

        $q = $this->srsdb->query("
            SELECT count(1) total_ckp_p ,count(tra.total_ckp_trans) total_tra 
                    ,(count(tra.total_ckp_trans) * 100 / count(1)) persentase 
                FROM isecurity.dbo.admisecsgp_trans_zona_patroli szn 
                INNER JOIN isecurity.dbo.admisecsgp_trans_jadwal_patroli atjp ON atjp.date_patroli=szn.date_patroli 
                    AND atjp.admisecsgp_mstplant_plant_id=szn.admisecsgp_mstplant_plant_id 
                    AND atjp.admisecsgp_mstshift_shift_id=szn.admisecsgp_mstshift_shift_id 
                INNER JOIN isecurity.dbo.admisecsgp_mstckp sckp on sckp.admisecsgp_mstzone_zone_id=szn.admisecsgp_mstzone_zone_id
                LEFT JOIN (
                    select count(ath.trans_header_id) total_ckp_trans, ath.date_patroli
                            ,ath.admisecsgp_mstshift_shift_id
                            ,ath.admisecsgp_mstckp_checkpoint_id
                        from isecurity.dbo.admisecsgp_trans_headers ath 
                        where ath.type_patrol=0 and ath.status=1 
                    group by ath.date_patroli, ath.admisecsgp_mstusr_npk
                        ,ath.admisecsgp_mstshift_shift_id
                        ,ath.admisecsgp_mstckp_checkpoint_id
                ) tra ON tra.date_patroli=szn.date_patroli and tra.admisecsgp_mstshift_shift_id=szn.admisecsgp_mstshift_shift_id
                    AND tra.admisecsgp_mstckp_checkpoint_id=sckp.checkpoint_id
            WHERE year(szn.date_patroli)='$year' AND month(szn.date_patroli)='$month' AND szn.admisecsgp_mstplant_plant_id in (select plant_id from srs_bi.dbo.admisec_area_join_plant where area_id='$area')
                AND szn.status=1 AND szn.status_zona=1 AND sckp.status=1 AND sckp.status=1
            GROUP BY szn.date_patroli ,szn.admisecsgp_mstshift_shift_id ,atjp.admisecsgp_mstusr_npk
            ORDER BY szn.date_patroli ASC
        ");

        return $q;
    }

    public function save()
    {
        $npk = user_npk();
        $area = $this->input->post('area', true);
        $year = $this->input->post('year', true);
        $month = $this->input->post('month', true);
        $knowlage = $this->input->post('knowlage', true);
        $attitude = $this->input->post('attitude', true);
        $skill = $this->input->post('skill', true);
        $people = $this->input->post('people', true);
        $asms = $this->input->post('asms', true);
        $guardtour = $this->input->post('guardtour', true);
        $system = $this->input->post('system', true);
        $device = $this->input->post('device', true);
        $network = $this->input->post('network', true);
        $note = htmlentities($this->input->post('note', true), ENT_QUOTES, 'UTF-8');
        // $people_com = $this->input->post('people_comma', true);
        // $device_com = $this->input->post('device_comma', true);
        // $system_com = $this->input->post('system_comma', true);
        // $network_com = $this->input->post('network_comma', true);
        // var_dump($_POST);die();

        $q = "INSERT INTO admisecsoi_transaction (area_id, year, month, knowlage, attitude, skill, people, asms_value, perform_gt, system, device, network, note, created_by, created_on) VALUES('$area', '$year', '$month', $knowlage, $attitude, $skill, $people, $asms, $guardtour, $system, $device, '$network', '$note', $npk, CURRENT_TIMESTAMP)";

        $this->srsdb->query($q);
        
        if($this->srsdb->affected_rows() > 0)
        {
            return '00';
        }
        else
        {
            return '02';
        }
    }

    public function edit($id)
    {
        $q = $this->srsdb->query("
                SELECT a.id, a.area_id, a.year, a.month, a.knowlage, a.attitude, a.skill, a.people, a.asms_value, a.perform_gt, a.system, a.device, a.network, ars.title area, a.note
                    FROM admisecsoi_transaction a
                    INNER JOIN admiseciso_area_sub ars ON ars.id=a.area_id
                WHERE a.id={$id} AND a.disable=0
            ");

        return $q;
    }

    public function update()
    {
        $npk = user_npk();
        $id = $this->input->post('id', true);
        $area = $this->input->post('area', true);
        $year = $this->input->post('year', true);
        $month = $this->input->post('month', true);
        $knowlage = $this->input->post('knowlage', true);
        $attitude = $this->input->post('attitude', true);
        $skill = $this->input->post('skill', true);
        $people = $this->input->post('people', true);
        $asms = $this->input->post('asms', true);
        $guardtour = $this->input->post('guardtour', true);
        $system = $this->input->post('system', true);
        $device = $this->input->post('device', true);
        $network = $this->input->post('network', true);
        $note = htmlentities($this->input->post('note', true), ENT_QUOTES, 'UTF-8');
        $curr_date = date('Y-m-d H:i:s');

        // var_dump($_POST);die();

        $q = $this->srsdb->query("
                UPDATE admisecsoi_transaction 
                SET area_id=$area, year='$year', month='$month', knowlage='$knowlage', attitude='$attitude', skill='$skill', people='$people', asms_value='$asms', perform_gt='$guardtour', system='$system', device='$device', network='$network', note='$note', updated_on='$curr_date', updated_by='$npk'
                WHERE id={$id}
            ");

        if($this->srsdb->affected_rows() > 0)
        {
            return '00';
        }
        else
        {
            return '02';
        }
    }

    public function approve()
    {
        $role = $this->session->userdata('role');

        // if($role == "SUPERADMIN")
        // {
            $id = $this->input->post('id', true);
            $sess_npk = $this->session->userdata('npk');
            $curr_date = date('Y-m-d H:i:s');

            $this->srsdb->query("
                UPDATE admisecsoi_transaction SET status=1, approved_by='$sess_npk', approved_on='$curr_date' WHERE id='$id'
            ");

            if($this->srsdb->affected_rows() > 0)
            {
                return '00';
            }
            else
            {
                return '02';
            }
        // }
        // else
        // {
        //     return '01';
        // }
    }

    public function delete()
    {
        $role = $this->session->userdata('role');

        // if($role == "SUPERADMIN")
        // {
            $id = $this->input->post('id', true);
            $sess_npk = $this->session->userdata('npk');
            $curr_date = date('Y-m-d H:i:s');

            $this->srsdb->query("
                UPDATE admisecsoi_transaction SET disable=1, updated_by='$sess_npk', updated_on='$curr_date' WHERE id='$id'
            ");

            if($this->srsdb->affected_rows() > 0)
            {
                return '00';
            }
            else
            {
                return '02';
            }
        // }
        // else
        // {
        //     return '01';
        // }
    }

}