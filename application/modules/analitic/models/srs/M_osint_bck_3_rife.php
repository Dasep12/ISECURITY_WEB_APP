<?php


class M_osint extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->osidb = $this->load->database('srs_bi', TRUE);
    }

    public function getData($table)
    {
        return $this->osidb->get($table);
    }

    public function getDataWhere($table, $where)
    {
        return $this->osidb->get_where($table, $where);
    }

    public function getCategory($headerId)
    {
        $this->osidb->select('shd.sub_id, shd.name, shd.level_id, arl.level');
        $this->osidb->from('admisecosint_sub_header_data shd');
        $this->osidb->join('admisecosint_risk_level arl','arl.id=shd.level_id','left');
        $this->osidb->where(['shd.header_data_id' => $headerId, "shd.status" => 1]);
        $query = $this->osidb->get();

        return $query;
    }

    public function getCategorySub1()
    {
        $subId  = $this->input->post("id");

        $this->osidb->select('shd1.id, shd1.name, shd1.level_id, arl.level');
        $this->osidb->from('admisecosint_sub1_header_data shd1');
        $this->osidb->join('admisecosint_risk_level arl','arl.id=shd1.level_id','left');
        $this->osidb->where(['shd1.sub_header_data' => $subId, "shd1.status" => 1]);
        $query = $this->osidb->get();

        return $query;
    }

    public function getPlant()
    {
        return $this->osidb->query("SELECT ars.id , ars.title as plant FROM admiseciso_area_sub ars WHERE area_categ_id = 1 ");
    }

    // 
    public function subArea()
    {
        return $this->osidb->query("SELECT  FROM admisecosint_sub_header_data sd left join  admisecosint_header_data ");
    }


    // 
    public function levelVurne($id)
    {
        return $this->osidb->query("SELECT ashd.sub_id  , arl.[level] , arl.description  , ashd.name  FROM admisecosint_sub_header_data ashd 
        left join admisecosint_risk_level arl  on arl.id  = ashd.level_id 
        where ashd.header_data_id  = $id ");
    }

    public function save()
    {
        $event_date = $this->input->post('event_date', true);
        $plant = $this->input->post('plant', true);
        $subArea = $this->input->post('area', true);
        $subArea1 = $this->input->post('subArea1', true);
        $subArea2 = $this->input->post('subArea2', true);
        $issueTarget = $this->input->post('issueTarget', true);
        $subIssueTarget = $this->input->post('subIssueTarget', true);
        $subIssueTarget1 = $this->input->post('subIssueTarget1', true);
        $subIssueTarget2 = $this->input->post('subIssueTarget2', true);
        $riskSource = $this->input->post('riskSource', true);
        $subriskSource = $this->input->post('subriskSource', true);
        $subriskSource1 = $this->input->post('subriskSource1', true);
        $riskTreat = $this->input->post('riskTreat', true);
        $LevelriskTreat = $this->input->post('LevelriskTreat', true);
        $activity_name = $this->input->post('activity_name', true);
        $vulne = $this->input->post('vulne', true);
        $vulneLevel = $this->input->post('vulneLevel', true);
        $sdmSector = $this->input->post('sdm', true);
        $reput = $this->input->post('reput', true);
        $impact = $this->input->post('impact', true);
        $plant_employee = $this->input->post('employe_plant', true);
        $url1 = $this->input->post('url1', true);
        $url2 = $this->input->post('url2', true);

        $hatespeech = $this->input->post('hatespeech', true);

        // $mediaIssue = $this->input->post('mediaIssue', true);
        // $SubmediaIssue = $this->input->post('SubmediaIssue', true);
        $mediaIssue = $this->input->post('mediaIssue', true);
        $mediaIssueLevel = explode(":", $mediaIssue)[1];
        $mediaIssue = explode(":", $mediaIssue)[0];
        $SubmediaIssue = $this->input->post('SubmediaIssue', true);
        // $SubmediaIssue1 = $this->input->post('SubmediaIssue1', true);
        // $SubmediaIssue2 = $this->input->post('SubmediaIssue2', true);

        $regional = $this->input->post('regional', true);
        $regionalLevel = explode(":", $regional)[1];
        $regional = explode(":", $regional)[0];

        $legalitas = $this->input->post('legalitas', true);
        $legalitasSub1 = $this->input->post('legalitas_sub1', true);
        $legalitasLevel = explode(":", $legalitasSub1)[1];
        $legalitasSub1 = explode(":", $legalitasSub1)[0];

        $format = $this->input->post('format', true);
        $formatLevel = explode(":", $format)[1];
        $format = explode(":", $format)[0];

        // echo '<pre>';
        // print_r($_POST);
        // var_dump($mediaIssue);
        // die();

        $desc = addslashes($this->input->post('description', true));
        $desc = preg_replace("/'/", "\&#39;", $desc);

        $sess_npk = $this->session->userdata('npk');
        $curr_date = date('Y-m-d H:i:s');

        $q1 = "INSERT INTO admisecosint_transaction(
            plant_id ,
            area_id ,
            sub_area1_id ,
            sub_area2_id ,
            target_issue_id, 
            sub_target_issue1_id, 
            sub_target_issue2_id , 
            sub_target_issue3_id ,
            risk_source,
            sub_risk_source,
            sub_risk1_source ,
            media_id,
            sub_media_id ,
            risk_id, 
            risk_level_id,
            created_at ,
            status,
            created_by,
            date,
            sdm_sector_level_id,
            reputasi_level_id ,
            description ,
            activity_name ,
            impact_level ,
            employe_plant,
            url1,
            url2,
            regional_id,
            regional_level_id,
            hatespeech_type_id,
            legalitas_id,
            legalitas_sub1_id,
            legalitas_level_id,
            format_id,
            format_level_id
            ) 
            VALUES (
                NULLIF('$plant', '') ,
                NULLIF('$subArea', ''),
                NULLIF('$subArea1', '') ,
                NULLIF('$subArea2', '') ,
                NULLIF('$issueTarget', ''), 
                NULLIF('$subIssueTarget', '') ,
                NULLIF('$subIssueTarget1', '') ,
                NULLIF('$subIssueTarget2', '') ,
                NULLIF('$riskSource', '') ,
                NULLIF('$subriskSource', '') ,
                NULLIF('$subriskSource1', '') ,
                NULLIF('$mediaIssue', '') ,
                NULLIF('$SubmediaIssue', '') ,
                NULLIF('$riskTreat', '') ,
                NULLIF('$LevelriskTreat', '') ,
                '$curr_date' ,
                1 ,
                '$sess_npk' ,
                '$event_date' ,
                '$sdmSector',
                '$reput' ,
                '$desc' ,
                '$activity_name' ,
                '$impact' ,
                NULLIF('$plant_employee', ''),
                NULLIF('$url1', ''),
                NULLIF('$url2', ''),
                '$regional',
                '$regionalLevel',
                '$hatespeech',
                '$legalitas',
                '$legalitasSub1',
                '$legalitasLevel',
                '$format',
                '$formatLevel'
            )";

        // var_dump($q1);
        // die();

        $this->osidb->trans_begin();

        $q_trans = $this->osidb->query($q1);
        $trans_id = $this->osidb->insert_id();

        if ($q_trans) {
            if (isset($_FILES['attach']) && $_FILES['attach']['name'][0] !== '') {
                $upload = $this->upload_multiple($_FILES['attach'], $curr_date);
                // $upload = $this->upload_file($curr_date);
                // print_r(array('img'=> $_FILES['attach'], 'error' => $upload));die();
                if (empty($upload) || $upload == '01') {
                    return '01';
                }

                $attach_file = $upload;

                $field_file = 1;
                $column_file_arr = array();
                $field_file_arr = array();
                $field_file_column = array();
                foreach ($upload as $key => $ifl) {
                    $column_file_arr[] = 'attach_file_' . $field_file;
                    $field_file_arr[] = "'" . $ifl['file_name'] . "'";
                    $field_file_column[] = "( {$trans_id}, '" . $ifl['file_name'] . "', '{$curr_date}', '1')";
                    $field_file++;
                }

                $column_file_implode = implode(", ", $column_file_arr);
                $field_file_implode = implode(", ", $field_file_column);
            } else {
                $attach_file = '';
            }

            if ($attach_file !== '' && count($attach_file) > 0) {
                // $this->srsdb->query("UPDATE admiseciso_trans_attach SET status=2 WHERE id={$id}");

                $q_file = "INSERT INTO admisecosint_transaction_file(trans_id, file_name, created_at,status) VALUES " . $field_file_implode;

                $this->osidb->query($q_file);

                if ($this->osidb->affected_rows() > 0) {
                    $this->osidb->trans_commit();
                    return '00';
                } else {
                    $this->osidb->trans_rollback();
                    return '03';
                }
            } else {
                $this->osidb->trans_commit();
                return '00';
            }
        } else {
            return '02';
        }
    }

    public function update()
    {
        $sess_npk = $this->session->userdata('npk');
        $curr_date = date('Y-m-d H:i:s');
        $id = $this->input->post('id', true);
        $event_date = $this->input->post('event_date', true);
        $plant = $this->input->post('plant', true);
        $subArea = $this->input->post('area', true);
        $subArea1 = $this->input->post('subArea1', true);
        $subArea2 = $this->input->post('subArea2', true);
        $issueTarget = $this->input->post('issueTarget', true);
        $subIssueTarget = $this->input->post('subIssueTarget', true);
        $subIssueTarget1 = $this->input->post('subIssueTarget1', true);
        $subIssueTarget2 = $this->input->post('subIssueTarget2', true);
        $riskSource = $this->input->post('riskSource', true);
        $subriskSource = $this->input->post('subriskSource', true);
        $subriskSource1 = $this->input->post('subriskSource1', true);
        $mediaIssue = $this->input->post('mediaIssue', true);
        $SubmediaIssue = $this->input->post('SubmediaIssue', true);
        $SubmediaIssue1 = $this->input->post('SubmediaIssue1', true);
        $SubmediaIssue2 = $this->input->post('SubmediaIssue2', true);
        $riskTreat = $this->input->post('riskTreat', true);
        $LevelriskTreat = $this->input->post('LevelriskTreat', true);
        $activity_name = $this->input->post('activity_name', true);
        $vulne = $this->input->post('vulne', true);
        $vulneLevel = $this->input->post('vulneLevel', true);
        $sdmSector = $this->input->post('sdm', true);
        $reput = $this->input->post('reput', true);
        $impact = $this->input->post('impact', true);
        $plant_employee = $this->input->post('employe_plant', true);
        $desc = addslashes($this->input->post('description', true));
        $desc = preg_replace("/'/", "\&#39;", $desc);
        $url1 = $this->input->post('url1', true);
        $url2 = $this->input->post('url2', true);

        // echo "<pre>";
        $data = [
            'plant_id' => empty($plant) ? NULL : $plant,
            'area_id' => empty($subArea) ? NULL : $subArea,
            'sub_area1_id' => empty($subArea1) ? NULL : $subArea1,
            'sub_area2_id' => empty($subArea2) ? NULL : $subArea2,
            'target_issue_id' => empty($issueTarget) ? NULL : $issueTarget,
            'sub_target_issue1_id' =>  empty($subIssueTarget) ? NULL :  $subIssueTarget,
            'sub_target_issue2_id' => empty($subIssueTarget1) ? NULL : $subIssueTarget1,
            'sub_target_issue3_id' =>  empty($subIssueTarget2) ? NULL : $subIssueTarget2,
            'risk_source' => empty($riskSource) ? NULL : $riskSource,
            'sub_risk_source' => empty($subriskSource) ? NULL : $subriskSource,
            'sub_risk1_source' => empty($subriskSource1) ? NULL : $subriskSource1,
            'media_id' => empty($mediaIssue) ? NULL : $mediaIssue,
            'sub_media_id' => empty($SubmediaIssue) ? NULL : $SubmediaIssue,
            'sub1_media_id' => empty($SubmediaIssue1) ? NULL : $SubmediaIssue1,
            'sub2_media_id' => empty($SubmediaIssue2) ? NULL : $SubmediaIssue2,
            'risk_id' => empty($riskTreat) ? NULL : $riskTreat,
            'risk_level_id' => empty($LevelriskTreat) ? NULL : $LevelriskTreat,
            'created_at' => $curr_date,
            'status' => 1,
            'created_by' => $sess_npk,
            'date' => $event_date,
            'sdm_sector_level_id' => empty($sdmSector) ? NULL :  $sdmSector,
            'reputasi_level_id' => empty($reput) ? NULL : $reput,
            'description' => empty($desc) ? NULL : $desc,
            'activity_name' => empty($activity_name) ? NULL  : $activity_name,
            'impact_level' => empty($impact) ? NULL : $impact,
            'employe_plant' => empty($plant_employee) ? NULL  : $plant_employee,
            'url1' => empty($url1) ? NULL  : $url1,
            'url2' => empty($url2) ? NULL  : $url2
        ];

        // update data transaksi
        $where = ['id' => $id];
        $this->osidb->trans_begin();
        $this->osidb->where($where);
        $updateData =  $this->osidb->update("admisecosint_transaction", $data);
        if ($updateData) {
            if (isset($_FILES['attach']) && $_FILES['attach']['name'][0] !== '') {
                $upload = $this->upload_multiple($_FILES['attach'], $curr_date);
                // $upload = $this->upload_file($curr_date);
                // print_r(array('img'=> $_FILES['attach'], 'error' => $upload));die();
                if (empty($upload) || $upload == '01') {
                    return '01';
                }

                $attach_file = $upload;

                $field_file = 1;
                $column_file_arr = array();
                $field_file_arr = array();
                $field_file_column = array();
                foreach ($upload as $key => $ifl) {
                    $column_file_arr[] = 'attach_file_' . $field_file;
                    $field_file_arr[] = "'" . $ifl['file_name'] . "'";
                    $field_file_column[] = "( {$id}, '" . $ifl['file_name'] . "', '{$curr_date}', '1')";
                    $field_file++;
                }

                $column_file_implode = implode(", ", $column_file_arr);
                $field_file_implode = implode(", ", $field_file_column);
            } else {
                $attach_file = '';
            }

            if ($attach_file !== '' && count($attach_file) > 0) {
                $q_file = "INSERT INTO admisecosint_transaction_file(trans_id, file_name, created_at,status) VALUES " . $field_file_implode;

                $this->osidb->query($q_file);

                if ($this->osidb->affected_rows() > 0) {
                    $this->osidb->trans_commit();
                    return '00';
                } else {
                    $this->osidb->trans_rollback();
                    return '03';
                }
            } else {
                $this->osidb->trans_commit();
                return '00';
            }
        } else {
            return '02';
        }
    }

    public function delete_file()
    {
        $idFile = $this->input->post("fileId");
        $idTrans = $this->input->post("id");
        $where = ['id' => $idFile];
        $data = ['status' => 0];
        $this->osidb->trans_begin();
        $this->osidb->where($where);
        $this->osidb->update("admisecosint_transaction_file", $data);
        if ($this->osidb->affected_rows()) {
            $this->osidb->trans_commit();
            return "00";
        } else {
            $this->osidb->trans_rollback();
            return '03';
        }
    }

    public function delete()
    {
        $id = $this->input->post("id");

        $search = $this->osidb->query("SELECT * FROM admisecosint_transaction_file WHERE trans_id = $id ")->num_rows();

        if ($search > 0) {
            $this->osidb->trans_begin();
            $this->osidb->query("DELETE FROM admisecosint_transaction_file WHERE trans_id = $id ");
            if ($this->osidb->affected_rows() > 0) {
                $this->osidb->query("DELETE FROM admisecosint_transaction WHERE id = $id ");
                $this->osidb->trans_commit();
                return '00';
            } else {
                $this->osidb->trans_rollback();
                return '03';
            }
        } else {
            $this->osidb->trans_begin();
            $this->osidb->query("DELETE FROM admisecosint_transaction WHERE id = $id ");
            if ($this->osidb->affected_rows() > 0) {
                $this->osidb->trans_commit();
                return '00';
            } else {
                $this->osidb->trans_rollback();
                return '03';
            }
        }
    }

    public function upload_multiple($files, $date)
    {
        $config = array(
            'upload_path' => "./uploads/srs_bi/osint",
            'allowed_types' => '*',
            // 'max_size' => 20480, // 20MB
            'overwrite' => false,
        );

        $this->load->library('upload', $config);

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        $img = array();
        foreach ($files['name'] as $key => $image) {
            $_FILES['img[]']['name'] = $files['name'][$key];
            $_FILES['img[]']['type'] = $files['type'][$key];
            $_FILES['img[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['img[]']['error'] = $files['error'][$key];
            $_FILES['img[]']['size'] = $files['size'][$key];

            // $fileName = $title .'_'. $image;
            // $fileName = $title.'_'.$rand_number;
            $rand_number = rand(10000, 99999);
            $config['file_name'] = 'srs_osint_' . preg_replace('/[^A-Za-z0-9]/', "", strtolower($date)) . '_' . $rand_number;

            // $dok[] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('img[]')) {
                $file = $this->upload->data();
                $res[] = $file;
            } else {
                $res = '01';
                // return $this->upload->display_errors();
            }
        }

        return $res;
    }


    // 
    //set nama tabel yang akan kita tampilkan datanya
    var $table = 'admisecosint_transaction';
    //set kolom order, kolom pertama saya null untuk kolom edit dan hapus
    var $column_order = array(null, 't.id, t.activity_name as act , asu.title as plant,ashd.name as media,ashd1.name as sub_media, ashd2.name as jenis_media, ashd3.name as risk,CAST(t.date as DATE) as event_date,t.impact_level , t.status');
    var $column_search = array('t.activity_name');
    // default order 
    var $order = array('id' => 'asc');
    private function _get_datatables_query()
    {
        $this->osidb->select('t.id, t.activity_name as act , asu.title as plant,ashd.name as media,ashd1.name as sub_media, ashd2.name as jenis_media, ashd3.name as risk,CAST(t.date as DATE) as event_date,t.impact_level , t.status');
        $this->osidb->from($this->table . ' t');
        $this->osidb->join('admiseciso_area_sub asu', 'asu.id=t.plant_id', 'inner');
        $this->osidb->join('admisecosint_sub_header_data ashd', 'ashd.sub_id = t.media_id', 'inner');
        $this->osidb->join('admisecosint_sub2_header_data ashd1', 'ashd1.id = t.sub1_media_id', 'left');
        $this->osidb->join('admisecosint_sub1_header_data ashd2', 'ashd2.id = t.sub_media_id', 'left');
        $this->osidb->join('admisecosint_sub_header_data ashd3', 'ashd3.sub_id = t.risk_id', 'left');
        if ($date_filter = str_replace(' - ', ';', $this->input->post('datefilter'))) {
            $start_date = date('Y-m-d', strtotime(explode(';', $date_filter)[0]));
            $end_date = date('Y-m-d', strtotime(explode(';', $date_filter)[1]));
            $this->osidb->where("t.date BETWEEN '" . $start_date . "' AND '" . $end_date . "'");
        }

        $this->osidb->order_by("t.date", 'asc');
        $i = 0;
        foreach ($this->column_search as $item) // loop kolom 
        {
            if ($this->input->post('search')['value']) // jika datatable mengirim POST untuk search
            {
                if ($i === 0) // looping pertama
                {
                    $this->osidb->group_start();
                    $this->osidb->like($item, $this->input->post('search')['value']);
                } else {
                    $this->osidb->or_like($item, $this->input->post('search')['value']);
                }
                if (count($this->column_search) - 1 == $i) //looping terakhir
                    $this->osidb->group_end();
            }
            $i++;
        }

        if ($this->input->post('order')) {
            $this->osidb->order_by($this->column_order[$this->input->post('order')['0']['column']], $this->input->post('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->osidb->order_by(key($order), $order[key($order)]);
        }
    }


    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->input->post('length') != -1)
            $this->osidb->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->osidb->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->osidb->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->osidb->from($this->table);
        return $this->osidb->count_all_results();
    }

    public function get_detail()
    {
        $id = $this->input->post("id");
        // $id = 69;
        $this->osidb->select('tr.id,tr.activity_name , tr.date , asu.title as plant , lev.level as sdm_level , lev2.level as reputasi_level , tr.created_by , ashd.name as media , ashd1.name as jenis_media ,url1 ,url2');
        $this->osidb->from('admisecosint_transaction as tr');
        $this->osidb->join('admiseciso_area_sub as asu', 'tr.plant_id=asu.id', 'left');
        $this->osidb->join('admisecosint_sub_header_data as suh', 'tr.sdm_sector_level_id=suh.sub_id', 'left');
        $this->osidb->join('admisecosint_risk_level as lev', 'suh.level_id=lev.id', 'left');
        $this->osidb->join('admisecosint_sub_header_data as suh2', 'tr.reputasi_level_id=suh2.sub_id', 'left');
        $this->osidb->join('admisecosint_risk_level as lev2', 'suh2.level_id=lev2.id', 'left');
        $this->osidb->join('admisecosint_sub_header_data ashd', 'ashd.sub_id = tr.media_id', 'left');
        $this->osidb->join('admisecosint_sub2_header_data ashd1', 'ashd1.id = tr.sub1_media_id', 'left');
        $this->osidb->where('tr.id', $id);
        return $this->osidb->get();
    }
}
