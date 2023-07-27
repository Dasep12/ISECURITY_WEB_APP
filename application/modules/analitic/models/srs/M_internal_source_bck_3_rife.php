<?php

class M_internal_source extends CI_Model
{
    private $module_code = 'SRSISO';

    public function __construct()
    {
        parent::__construct();

        $this->srsdb = $this->load->database('srs_bi', TRUE);
    }

    public function no_urut()
    {
        $q = $this->srsdb->query("
            SELECT FORMAT(ISNULL(max(no_urut), 0) + 1, '000') no_urut
            FROM admiseciso_transaction
            WHERE month(event_date)=".date('m')." and year(event_date)=".date('Y')."
        ");
        
        // $q = $this->srsdb->query("
        //     SELECT CONCAT(FORMAT((count(1) + 1), '000'), '/LK/EA/', month(getdate()), year(getdate()) ) no_, FORMAT((count(1) + 1), '000') no_urut, month(getdate()) month, year(getdate()) year
        //     FROM admiseciso_transaction
        //     WHERE month(event_date)=month(event_date) and year(event_date)=year(getdate())
        // ");

        return $q;
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
        if(is_section_head())
        {
            $q .= " AND id IN (select aas.id from isecurity.dbo.admisec_area_users aau 
            INNER JOIN isecurity.dbo.admisecsgp_mstsite ams ON ams.site_id=aau.site_id 
            INNER JOIN srs_bi.dbo.admiseciso_area_sub aas ON aas.wil_id=ams.id_wilayah 
            WHERE aau.npk=$npk)";
        }
        $res_q = $this->srsdb->query($q);

        return $res_q;
    }

    public function sub_area()
    {
        $q = $this->srsdb->query("
                SELECT id, title FROM admiseciso_area_sub WHERE area_categ_id='6' AND status=1
            ");

        return $q;
    }

    public function sub_area2($categ_id='')
    {
        if($_POST) 
        {
            $categ_id = $this->input->post('idcateg', true);
        }
        else
        {
            $categ_id = $categ_id;
        }

        // var_dump($categ_id);die();

        $q = $this->srsdb->query("
                SELECT a.id, a.title, b.title title_cat
                    FROM admiseciso_area_sub a
                    INNER JOIN admiseciso_area_categ b ON b.id=a.area_categ_id
                WHERE a.area_categ_id=(select area_categtarget_id from admiseciso_area_sub where id='$categ_id') AND a.status=1
            ");

        return $q;
    }

    // public function sub_area_production()
    // {
    //     $q = $this->srsdb->query("
    //             SELECT id, title FROM admisec_area_prod WHERE status=1
    //         ");

    //     return $q;
    // }

    public function vurnability_level()
    {
        $q = $this->srsdb->query("
                SELECT id, title, level, financial_desc, sdm_desc, operational_desc, reputation_desc
                FROM admiseciso_vurnability_level 
                WHERE status=1 ORDER BY level ASC
            ");
        
        return $q;
    }

    public function assest()
    {
        $q = $this->srsdb->query("
                SELECT id, title, assets_categ_id
                    FROM admiseciso_assets_sub
                WHERE assets_categ_id=1 AND status=1 ORDER BY title ASC
            ");
        
        return $q;
    }

    public function sub_assets($categ_id='')
    {
        if($_POST) 
        {
            $id = $this->input->post('idcateg', true);
        }
        else
        {
            $id = $categ_id;
        }

        $q = $this->srsdb->query("
                SELECT a.id, a.title, b.title title_cat
                    FROM admiseciso_assets_sub a
                    INNER JOIN admiseciso_assets_categ b ON b.id=a.assets_categ_id
                WHERE a.assets_categ_id=(select assets_categtarget_id from admiseciso_assets_sub where id='$id') AND a.status=1
            ");

        return $q;
    }

    public function risk_source()
    {
        $q = $this->srsdb->query("
                SELECT id, title 
                    FROM admiseciso_risksource_sub
                WHERE risksource_categ_id=1 AND status=1 ORDER BY title ASC
            ");
        
        return $q;
    }

    public function sub_risksource($categ_id=null)
    {
        if($_POST) 
        {
            $id = $this->input->post('idcateg', true);
        }
        else
        {
            $id = $categ_id;
        }

        $q = $this->srsdb->query("
                SELECT a.id, a.title, b.title title_cat
                    FROM admiseciso_risksource_sub a
                    INNER JOIN admiseciso_risksource_categ b ON b.id=a.risksource_categ_id
                WHERE a.risksource_categ_id=(select risksource_categtarget_id from admiseciso_risksource_sub where id='$id') AND a.status=1 ORDER BY a.title ASC
            ");

        return $q;
    }

    public function risk()
    {
        $q = $this->srsdb->query("
                SELECT a.id, a.title, c.id level_id, c.level
                    FROM admiseciso_risk_sub a
                    LEFT JOIN admiseciso_risk_level c ON c.id=a.level_id
                WHERE a.risk_categ_id=1 AND a.status=1 
                ORDER BY a.title ASC
            ");
        
        return $q;
    }

    public function sub_risk($categ_id='')
    {
        if($_POST) 
        {
            $id = $this->input->post('idcateg', true);
        }
        else
        {
            $id = $categ_id;
        }

        $q = $this->srsdb->query("
                SELECT a.id, a.title, b.title title_cat
                    FROM admiseciso_risk_sub a
                    INNER JOIN admiseciso_risk_categ b ON b.id=a.risk_categ_id
                WHERE a.risk_categ_id=(select risk_categtarget_id from admiseciso_risk_sub where id='$id') AND a.status=1 ORDER BY a.title ASC
            ");

        return $q;
    }

    public function risk_level()
    {
        $q = $this->srsdb->query("
                SELECT id, title, level FROM admiseciso_risk_level WHERE status=1 ORDER BY level ASC
            ");
        
        return $q;
    }

    protected $t_trans_iso = 'admiseciso_transaction';
    var $column_order = array(null, 'a.event_name', 'a.event_date', 'asu.title', 'ass.title', 'rss.title', 'ris.title', 'a.impact_level', null); //field yang ada di table user
    var $column_search = array('a.event_name', 'asu.title', 'ass.title', 'rss.title', 'ris.title'); //field yang diizin untuk pencarian 
    var $order = array('a.event_date' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        $npk = user_npk();
        $this->srsdb->select('a.id, a.event_name, a.event_date, a.impact_level, a.no_reference, a.status, asu.title area, ass.title assets, rss.title risk_source, ris.title risk');
        $this->srsdb->from($this->t_trans_iso.' a');
        $this->srsdb->join('admiseciso_area_sub asu', 'asu.id=a.area_id', 'inner');
        $this->srsdb->join('admiseciso_risksource_sub rss', 'rss.id=a.risk_source_id', 'inner');
        $this->srsdb->join('admiseciso_risk_sub ris', 'ris.id=a.risk_id', 'inner');
        $this->srsdb->join('admiseciso_assets_sub ass', 'ass.id=a.assets_id', 'inner');
        $this->srsdb->where('a.disable', 0);
        if(is_section_head())
        {
            $this->srsdb->where('a.area_id IN (SELECT aas.id
                FROM isecurity.dbo.admisec_area_users aau 
                INNER JOIN isecurity.dbo.admisecsgp_mstsite ams ON ams.site_id=aau.site_id 
                INNER JOIN srs_bi.dbo.admiseciso_area_sub aas ON aas.wil_id=ams.id_wilayah 
             WHERE aau.npk='.$npk.')', NULL, FALSE);
        }
        if(is_author())
        {
            $this->srsdb->where('a.created_by', user_npk());
        }
        $this->srsdb->where_in('a.status', [0,1]);
        // $this->srsdb->join('admiseciso_vurnability_level vle', 'vle.id=a.assets_id', 'inner');
        // $this->srsdb->where('date(a.created_on)=curdate()')

        if($this->input->post('areafilter')) $this->srsdb->where('a.area_id', $this->input->post('areafilter'));
        if($date_filter = str_replace(' - ', ';', $this->input->post('datefilter')))
        {
            $start_date = date('Y-m-d H:i', strtotime(explode(';', $date_filter)[0]));
            $end_date = date('Y-m-d H:i', strtotime(explode(';', $date_filter)[1]));
            $this->srsdb->where("a.event_date BETWEEN '".$start_date."' AND '".$end_date."'");
        }

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
        if($this->input->post())
        {
            $id = $this->input->post('id', true);
        }
        else
        {
            $id = $this->uri->segment(5);
        }

        // , rss.title risk_source, ris.title risk, a.impact_level
        $q = $this->srsdb->query("
                SELECT a.id, a.event_name, a.event_date, a.no_urut, a.no_reference, a.reporter, a.chronology, vfi.level financial_level, vop.level operational_level, vre.level reputation_level, sdm.level sdm_level, a.impact_level, a.attach_file_1, a.attach_file_2, a.attach_file_3, a.attach_file_4, a.attach_file_5, asu.title area, asu1.title area_sub1, asu2.title area_sub2, asu3.title area_sub3, ass.title assets, ass1.title assets_sub1, ass2.title assets_sub2, rss.title risksource, rss1.title risksource1, rss2.title risksource2, ris.title risk, ris1.title risk1, ris2.title risk2, tat.file_name
                    , musr.name author, a.created_by author_npk, husr.name section_head, husr.npk section_head_npk
                    FROM $this->t_trans_iso a
                    INNER JOIN admiseciso_area_sub asu ON asu.id=a.area_id
                    INNER JOIN admiseciso_risk_level rle ON rle.id=a.risk_level_id
                    INNER JOIN admiseciso_vurnability_level vfi ON vfi.id=a.financial_level
                    INNER JOIN admiseciso_vurnability_level vop ON vop.id=a.operational_level
                    INNER JOIN admiseciso_vurnability_level vre ON vre.id=a.reputation_level
                    INNER JOIN admiseciso_vurnability_level sdm ON sdm.id=a.sdm_level
                    INNER JOIN admiseciso_area_sub asu1 ON asu1.id=a.area_sub1_id
                    INNER JOIN admiseciso_area_sub asu2 ON asu2.id=a.area_sub2_id
                    LEFT JOIN admiseciso_area_sub asu3 ON asu3.id=a.area_sub3_id
                    INNER JOIN admiseciso_assets_sub ass ON ass.id=a.assets_id
                    LEFT JOIN admiseciso_assets_sub ass1 ON ass1.id=a.assets_sub1_id
                    LEFT JOIN admiseciso_assets_sub ass2 ON ass2.id=a.assets_sub2_id
                    INNER JOIN admiseciso_risksource_sub rss ON rss.id=a.risk_source_id
                    LEFT JOIN admiseciso_risksource_sub rss1 ON rss1.id=a.risksource_sub1_id
                    LEFT JOIN admiseciso_risksource_sub rss2 ON rss2.id=a.risksource_sub2_id
                    INNER JOIN admiseciso_risk_sub ris ON ris.id=a.risk_id
                    LEFT JOIN admiseciso_risk_sub ris1 ON ris1.id=a.risk_sub1_id
                    LEFT JOIN admiseciso_risk_sub ris2 ON ris2.id=a.risk_sub2_id
                    LEFT JOIN admiseciso_trans_attach tat ON tat.trans_id=a.id AND tat.status=1
                    INNER JOIN isecurity.dbo.admisecsgp_mstusr musr ON musr.npk=a.created_by
                    INNER JOIN (
                        select aas.id, amu.name, amu.npk 
                        from isecurity.dbo.admisec_area_users aau 
                        inner join isecurity.dbo.admisecsgp_mstusr amu ON amu.npk=aau.npk 
                        inner join isecurity.dbo.admisecsgp_mstsite ams ON ams.site_id=aau.site_id
                        inner join srs_bi.dbo.admiseciso_area_sub aas ON aas.wil_id=ams.id_wilayah
                        group by aas.id, amu.name, amu.npk
                    ) husr ON husr.id=a.area_id
                WHERE a.id='$id'
            ");
        
        return $q;
    }

    public function edit($id)
    {
        $q = $this->srsdb->query("
                SELECT a.*, tat.id file_id, tat.trans_id, tat.file_name, tat.status
                    FROM $this->t_trans_iso a
                    LEFT JOIN admiseciso_trans_attach tat ON tat.trans_id=a.id AND tat.status=1
                WHERE a.id={$id}
            ");

        return $q;
    }

    public function transaction_iso()
    {
        $q = "
            SELECT a.id, a.event_name, a.event_date, a.no_urut, a.reporter, a.chronology, vfi.level financial_level, vop.level operational_level, vre.level reputation_level, sdm.level sdm_level, a.impact_level, a.attach_file_1, asu.title area, asu1.title area_sub1, asu2.title area_sub2, asu3.title area_sub3, ass.title assets, ass1.title assets_sub1, ass2.title assets_sub2, rss.title risksource, rss1.title risksource1, rss2.title risksource2, ris.title risk, ris1.title risk1, ris2.title risk2
                    FROM $this->t_trans_iso a
                    INNER JOIN admiseciso_area_sub asu ON asu.id=a.area_id
                    INNER JOIN admiseciso_risk_level rle ON rle.id=a.risk_level_id
                    INNER JOIN admiseciso_vurnability_level vfi ON vfi.id=a.financial_level
                    INNER JOIN admiseciso_vurnability_level vop ON vop.id=a.operational_level
                    INNER JOIN admiseciso_vurnability_level vre ON vre.id=a.reputation_level
                    INNER JOIN admiseciso_vurnability_level sdm ON sdm.id=a.sdm_level
                    INNER JOIN admiseciso_area_sub asu1 ON asu1.id=a.area_sub1_id
                    INNER JOIN admiseciso_area_sub asu2 ON asu2.id=a.area_sub2_id
                    LEFT JOIN admiseciso_area_sub asu3 ON asu3.id=a.area_sub3_id
                    INNER JOIN admiseciso_assets_sub ass ON ass.id=a.assets_id
                    LEFT JOIN admiseciso_assets_sub ass1 ON ass1.id=a.assets_sub1_id
                    LEFT JOIN admiseciso_assets_sub ass2 ON ass2.id=a.assets_sub2_id
                    INNER JOIN admiseciso_risksource_sub rss ON rss.id=a.risk_source_id
                    LEFT JOIN admiseciso_risksource_sub rss1 ON rss1.id=a.risksource_sub1_id
                    LEFT JOIN admiseciso_risksource_sub rss2 ON rss2.id=a.risksource_sub2_id
                    INNER JOIN admiseciso_risk_sub ris ON ris.id=a.risk_id
                    LEFT JOIN admiseciso_risk_sub ris1 ON ris1.id=a.risk_sub1_id
                    LEFT JOIN admiseciso_risk_sub ris2 ON ris2.id=a.risk_sub2_id
        ";

        $q .= "WHERE a.disable=0 AND a.status=1";
        
        $area=$this->input->get('area');
        if(isset($area) && ($area !== 'undefined' || $area !== ''))  $q .= " AND a.area_id='$area'";
        if($date_filter = str_replace(' - ', ';', $this->input->get('daterange')))
        {
            // var_dump($this->input->get('daterange'));die();
            $start_date = date('Y-m-d H:i', strtotime(explode(';', $date_filter)[0]));
            $end_date = date('Y-m-d H:i', strtotime(explode(';', $date_filter)[1]));
            $q .= " AND a.event_date BETWEEN '".$start_date."' AND '".$end_date."'";
        }

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function save()
    {
        // $no_urut = $this->input->post('no_urut', true);
        // $no_ref = $this->input->post('no_ref', true);
        $tanggal = $this->input->post('tanggal', true);
        $event_name = $this->input->post('event_name', true);

        $area = $this->input->post('area', true);
        $sub_area1 = $this->input->post('sub_area1', true);
        $sub_area2 = $this->input->post('sub_area2', true);
        $sub_area3 = $this->input->post('sub_area3', true);

        $assets = $this->input->post('assets', true);
        $sub_assets1 = $this->input->post('sub_assets1', true);
        $sub_assets2 = $this->input->post('sub_assets2', true);

        $risk_source = $this->input->post('risk_source', true);
        $sub_risksource1 = $this->input->post('sub_risksource1', true);
        $sub_risksource2 = $this->input->post('sub_risksource2', true);

        $risk = explode(':', $this->input->post('risk', true))[0];
        $sub_risk1 = $this->input->post('sub_risk1', true);
        $sub_risk2 = $this->input->post('sub_risk2', true);
        $risk_level = $this->input->post('risk_level', true);

        $financial = $this->input->post('financial', true);
        $sdm = $this->input->post('sdm', true);
        $operational = $this->input->post('operational', true);
        $reputation = $this->input->post('reputation', true);
        $find_impact = array(explode(':', $financial)[0], explode(':', $sdm)[0], explode(':', $operational)[0], explode(':', $reputation)[0]);
        $impact = max($find_impact);
        $chronology = addslashes($this->input->post('chronology', true));
        $chronology = preg_replace("/'/", "\&#39;", $chronology); //str_replace("'", "", $chronology);
        $reporter = $this->input->post('reporter', true);
        $sess_npk = $this->session->userdata('npk');
        $curr_date = date('Y-m-d H:i:s');
        
        $q_no_urut = $this->srsdb->query("
            SELECT FORMAT(ISNULL(max(no_urut), 0) + 1, '000') no_urut
            FROM admiseciso_transaction
            WHERE month(event_date)=".date('m', strtotime($tanggal))." and year(event_date)=".date('Y', strtotime($tanggal))."
        ")->row();
        // var_dump($q_no_urut);die();

        $no_urut = $q_no_urut->no_urut;
        $no_ref = $no_urut.'/LK/EA/'.conv_romawi(date('m', strtotime($tanggal))).'/'.date('Y', strtotime($tanggal));

        $q = array();
        foreach ($area as $key => $are) {
            $q[$are] = "('$no_ref','$no_urut','$event_name', '$tanggal', '$are', NULLIF('$sub_area1', ''), NULLIF('$sub_area2', ''), NULLIF('$sub_area3', ''), '$assets', NULLIF('$sub_assets1', ''), NULLIF('$sub_assets2', ''), '$risk_source', NULLIF('$sub_risksource1', ''), NULLIF('$sub_risksource2', ''), '$risk', NULLIF('$sub_risk1', ''), NULLIF('$sub_risk2', ''), '$risk_level', '".explode(':', $financial)[1]."', '".explode(':', $sdm)[1]."', '".explode(':', $operational)[1]."', '".explode(':', $reputation)[1]."', '$impact', '$chronology', '$sess_npk', '$reporter'";
            if(isset($field_file_arr) && !empty($field_file_arr)) $q[$are] .= ",".$field_file_implode;
            $q[$are] .= ')'; 
        }

        $q_implode = implode (", ", $q);

        // header('Content-Type: application/json; charset=utf-8');
        // echo json_encode($_POST, true);
        // echo '<pre>';
        // print_r($q_implode);

        $column = "INSERT INTO admiseciso_transaction(no_reference, no_urut, event_name, event_date, area_id, area_sub1_id, area_sub2_id, area_sub3_id, assets_id, assets_sub1_id, assets_sub2_id, risk_source_id, risksource_sub1_id, risksource_sub2_id, risk_id, risk_sub1_id, risk_sub2_id, risk_level_id, financial_level, sdm_level, operational_level, reputation_level, impact_level, chronology, created_by, reporter";
        // if(isset($column_file_arr) && !empty($column_file_arr)) $column .= ", ".$column_file_implode;
        $column .= ") VALUES";

        $this->srsdb->trans_begin();

        $q_trans = $this->srsdb->query($column.$q_implode);

        $trans_id = $this->srsdb->insert_id();
        
        if($q_trans)
        {
            if($_FILES['attach']['name'][0] !== '')
            {
                $upload = $this->upload_multiple($_FILES['attach'], $tanggal);
                // $upload = $this->upload_file($tanggal);
                // print_r(array('img'=> $_FILES['attach'], 'error' => $upload));die();
                if(empty($upload) || $upload == '01')
                {
                    return '01';
                }

                $attach_file = $upload;

                $field_file = 1;
                $column_file_arr = array();
                $field_file_arr = array();
                $field_file_column = array();
                foreach ($upload as $key => $ifl) {
                    $column_file_arr[] = 'attach_file_'.$field_file;
                    $field_file_arr[] = "'".$ifl['file_name']."'";
                    $field_file_column[] = "( {$trans_id}, '".$ifl['file_name']."', '{$curr_date}')";
                    $field_file++;
                }
                
                $column_file_implode = implode (", ", $column_file_arr);
                $field_file_implode = implode (", ", $field_file_column);
            }
            else
            {
                $attach_file = '';
            }

            if($attach_file !== '' && count($attach_file) > 0)
            {
                // $this->srsdb->query("UPDATE admiseciso_trans_attach SET status=2 WHERE id={$id}");
                
                $q_file = "INSERT INTO admiseciso_trans_attach(trans_id, file_name, created_on) VALUES ".$field_file_implode;
                    
                $this->srsdb->query($q_file);

                if($this->srsdb->affected_rows() > 0)
                {
                    $this->srsdb->trans_commit();
                    return '00';
                }
                else
                {
                    $this->srsdb->trans_rollback();
                    return '03';
                }
            }
            else
            {
                $this->srsdb->trans_commit();
                return '00';
            }
        }
        else
        {
            return '02';
        }
    }

    public function update()
    {
        $id = $this->input->post('id', true);
        $tanggal = $this->input->post('tanggal', true);
        $tanggal_lama = $this->input->post('old_date', true);
        $no_urut = $this->input->post('no_urut', true);
        $event_name = $this->input->post('event_name', true);

        $area = $this->input->post('area', true);
        $sub_area1 = $this->input->post('sub_area1', true);
        $sub_area2 = $this->input->post('sub_area2', true);
        $sub_area3 = $this->input->post('sub_area3', true);

        $assets = $this->input->post('assets', true);
        $sub_assets1 = $this->input->post('sub_assets1', true);
        $sub_assets2 = $this->input->post('sub_assets2', true);

        $risk_source = $this->input->post('risk_source', true);
        $sub_risksource1 = $this->input->post('sub_risksource1', true);
        $sub_risksource2 = $this->input->post('sub_risksource2', true);

        $risk = explode(':', $this->input->post('risk', true))[0];
        $sub_risk1 = $this->input->post('sub_risk1', true);
        $sub_risk2 = $this->input->post('sub_risk2', true);
        $risk_level = $this->input->post('risk_level', true);

        $financial = $this->input->post('financial', true);
        $sdm = $this->input->post('sdm', true);
        $operational = $this->input->post('operational', true);
        $reputation = $this->input->post('reputation', true);
        $find_impact = array(explode(':', $financial)[0], explode(':', $sdm)[0], explode(':', $operational)[0], explode(':', $reputation)[0]);
        $impact = max($find_impact);
        $chronology = htmlentities(addslashes($this->input->post('chronology', true)));
        $chronology = preg_replace("/'/", "\&#39;", $chronology);
        $reporter = $this->input->post('reporter', true);
        $sess_npk = $this->session->userdata('npk');
        $attached = $this->input->post('attached');
        $curr_date = date('Y-m-d H:i:s');
        
        if(isset($_FILES['attach']) && $_FILES['attach']['name'][0] !== '')
        {
            $no_attached_file = array();
            foreach ($attached as $key => $atc) {
                $no_attached_file[] = $key;
            }

            $upload = $this->upload_multiple($_FILES['attach'], $tanggal);

            if(empty($upload) || $upload == '01')
            {
                return '01';
            }

            $attach_file = $upload;

            $no_attached_file = array_values($no_attached_file);
            // var_dump($no_attached_file);die();

            $field_file = 1; // No. column
            $column_file_arr = array(); // Nama column
            $field_file_name = array();
            $field_file_column = array();

            // foreach ($upload as $key => $ifl) {
            //     $column_file_arr[] = 'attach_file_'.$field_file;
            //     $field_file_arr[] = "'".$ifl['file_name']."'";
            //     $field_file++;
            // }

            foreach ($upload as $key => $ifl) {
                $column_file_arr[] = 'attach_file_'.$field_file;
                $field_file_name[] = "'".$ifl['file_name']."'";
                $field_file_column[] = "( {$id}, '".$ifl['file_name']."', '{$curr_date}')";
                $field_file++;
            }
            
            $column_file_implode = implode (", ", $column_file_arr);
            $field_file_implode = implode (", ", $field_file_column);
        }
        else
        {
            $attach_file = '';
        }

        // var_dump($id);
        // die();

        // Jika tanggal event diubah maka buat baru
        if(date('Ymd', strtotime($tanggal)) !== date('Ymd', strtotime($tanggal_lama)))
        {
            $q_no_urut = $this->srsdb->query("
                SELECT FORMAT(ISNULL(max(no_urut), 0) + 1, '000') no_urut_max
                FROM admiseciso_transaction
                WHERE month(event_date)=".date('m', strtotime($tanggal))." and year(event_date)=".date('Y', strtotime($tanggal))."
            ")->row();

            $no_urut = $q_no_urut->no_urut_max;
            $no_ref = $no_urut.'/LK/EA/'.conv_romawi(date('m', strtotime($tanggal))).'/'.date('Y', strtotime($tanggal));
        }
        else
        {
            $no_urut = $no_urut;
            // $no_ref = $tanggal_lama;
            $no_ref = $no_urut.'/LK/EA/'.conv_romawi(date('m', strtotime($tanggal))).'/'.date('Y', strtotime($tanggal));
        }

        $q = array();
        foreach ($area as $key => $are) {
            $q[$are] = "no_reference='$no_ref',no_urut='$no_urut',event_name='$event_name', event_date='$tanggal', area_id='$are', area_sub1_id=NULLIF('$sub_area1', ''), area_sub2_id=NULLIF('$sub_area2', ''), area_sub3_id=NULLIF('$sub_area3', ''), assets_id='$assets', assets_sub1_id=NULLIF('$sub_assets1', ''), assets_sub2_id=NULLIF('$sub_assets2', ''), risk_source_id='$risk_source', risksource_sub1_id=NULLIF('$sub_risksource1', ''), risksource_sub2_id=NULLIF('$sub_risksource2', ''), risk_id='$risk', risk_sub1_id=NULLIF('$sub_risk1', ''), risk_sub2_id=NULLIF('$sub_risk2', ''), risk_level_id='$risk_level', financial_level='".explode(':', $financial)[1]."', sdm_level='".explode(':', $sdm)[1]."', operational_level='".explode(':', $operational)[1]."', reputation_level='".explode(':', $reputation)[1]."', impact_level='$impact', chronology='$chronology', updated_by='$sess_npk', reporter='$reporter', updated_on='".date('Y-m-d H:i:s')."'";
            // if(isset($field_file_arr) && !empty($field_file_arr)) $q[$are] .= ",".$field_file_implode;
        }
        $q_upd_implode = implode (", ", $q);

        $this->srsdb->trans_begin();

        $column_update = "UPDATE admiseciso_transaction SET {$q_upd_implode} WHERE id={$id}";

        $this->srsdb->query($column_update);
        
        if($this->srsdb->affected_rows() > 0)
        {
            if($attach_file !== '' && count($attach_file) > 0)
            {
                // $this->srsdb->query("UPDATE admiseciso_trans_attach SET status=2 WHERE id={$id}");
                
                $q_file = "INSERT INTO admiseciso_trans_attach(trans_id, file_name, created_on) VALUES ".$field_file_implode;
                    
                $this->srsdb->query($q_file);

                if($this->srsdb->affected_rows() > 0)
                {
                    $this->srsdb->trans_commit();
                    return '00';
                }
                else
                {
                    $this->srsdb->trans_rollback();
                    return '03';
                }
            }
            else
            {
                $this->srsdb->trans_commit();
                return '00';
            }
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
                UPDATE admiseciso_transaction SET status=1, approved_on='$curr_date', approved_by='$sess_npk' WHERE id='$id'
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

            $this->srsdb->query("
                UPDATE admiseciso_transaction SET disable=1 WHERE id='$id'
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
        //         return '01';
        // }
    }

    public function delete_attached()
    {
        $role = $this->session->userdata('role');

        if(is_super_admin())
        {
            $id = $this->input->post('fileId', true);

            $this->srsdb->query("
                UPDATE admiseciso_trans_attach SET status=2 WHERE id='$id'
            ");

            // $this->srsdb->query("
            //     UPDATE admiseciso_transaction SET ".$column."=NULL WHERE id='$id'
            // ");

            if($this->srsdb->affected_rows() > 0)
            {
                return '00';
            }
            else
            {
                return '02';
            }
        }
        else
        {
                return '01';
        }
    }

    private function upload_file($title='')
    {
        $config = array(
            'upload_path' => "./uploads/srs_bi/internal_source",
            'allowed_types' => 'jpg|png|jpeg|pdf|xlsx|xls|doc|docx',
            'overwrite' => false,
            'max_size' => 4048, // 2MB
        );

        if(!is_dir($config['upload_path']))
        {
            mkdir($config['upload_path'], 0777, true);
        }

        $rand_number = rand ( 10000 , 99999 );
        // $config['file_name'] = preg_replace('/[^A-Za-z0-9]/', "", strtolower($files['name'])).'_'.date('YmdHis').'_';
        $config['file_name'] = 'srs_iso_'.preg_replace('/[^A-Za-z0-9]/', "", strtolower($title));
        // var_dump($config);die();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('attach'))
        {
            $error = $this->upload->display_errors();
            $res = array(
                'code' => '01',
                'msg' => $error
            );
        } 
        else 
        {
            $file = $this->upload->data();

            $res = array(
                'code' => '00',
                'file_name' => $file['file_name']
            );
        }
        
        return $res;
    }

    public function search()
    {
        $keyword = $this->input->post('keyword',true);
        $key_array = explode(" ", $keyword);

        // SUBSTRING(chronology, 1, 200) 
        $q = "SELECT top 10 id, event_name ,event_date ,SUBSTRING(chronology, 1, 300) chronology
                from admiseciso_transaction at2 
            where 
            ";
        foreach ($key_array as $key => $val) {
            if($key > 0) $q .= ' or ';
            $q .= "event_name like '%$val%' ";
            $q .= ' or ';
            $q .= " chronology like '%$val%'";
        }

        $get = $this->srsdb->query($q);

        return $get;
    }

    private function upload_multiple($files, $date)
    {
        $config = array(
            'upload_path' => "./uploads/srs_bi/internal_source",
            'allowed_types' => 'jpg|png|jpeg|pdf|xlsx|xls|doc|docx|mp4|avi',
            'max_size' => 20480, // 20MB
            'overwrite' => false,
        );

        $this->load->library('upload', $config);

        if(!is_dir($config['upload_path']))
        {
            mkdir($config['upload_path'], 0777, true);
        }

        $img = array();
        foreach ($files['name'] as $key => $image) {
            $_FILES['img[]']['name']= $files['name'][$key];
            $_FILES['img[]']['type']= $files['type'][$key];
            $_FILES['img[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['img[]']['error']= $files['error'][$key];
            $_FILES['img[]']['size']= $files['size'][$key];

            // $fileName = $title .'_'. $image;
            // $fileName = $title.'_'.$rand_number;
            $rand_number = rand ( 10000 , 99999 );
            $config['file_name'] = 'srs_iso_'.preg_replace('/[^A-Za-z0-9]/', "", strtolower($date)).'_'.$rand_number;

            // $dok[] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('img[]')) {
                $file = $this->upload->data();

                $res[] = $file;
            } else {
                $res = '01';
            }
        }

        return $res;
    }

}