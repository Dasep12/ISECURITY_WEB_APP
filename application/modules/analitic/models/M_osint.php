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
            sub1_media_id,
            sub2_media_id ,
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
            impact_level
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
                NULLIF('$SubmediaIssue1', '') ,
                NULLIF('$SubmediaIssue2', '') ,
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
                '$impact'
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

    private function upload_multiple($files, $date)
    {
        $config = array(
            'upload_path' => "./uploads/srs_bi/osint",
            'allowed_types' => 'jpg|png|jpeg|pdf|xlsx|xls|doc|docx|mp4|avi',
            'max_size' => 20480, // 20MB
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
            $config['file_name'] = 'srs_iso_' . preg_replace('/[^A-Za-z0-9]/', "", strtolower($date)) . '_' . $rand_number;

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


    // 
    public function get_datatables()
    {
        $res = $this->osidb->query("SELECT ts.id , ts.status ,
        (select ashd.name from admisecosint_sub_header_data ashd where ashd.sub_id = ts.media_id  )as media ,
        (select ashd.name from admisecosint_sub_header_data ashd where ashd.sub_id = ts.risk_id  )as risk ,
        ts.date  as event_date,
        ts.impact_level
        FROM admisecosint_transaction ts  ");
        return $res->result();
    }
}
