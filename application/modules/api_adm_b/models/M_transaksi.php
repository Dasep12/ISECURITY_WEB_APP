<?php

class M_transaksi extends CI_Model
{
    public function checkpoint_insert()
    {
        $npk = $this->input->post('npk', true);
        $checkpoint_id = $this->input->post('checkpoint_id', true);
        $zone_id = $this->input->post('zone_id', true);
        $shift_id = $this->input->post('shift_id', true);
        $date_patroli = $this->input->post('date_patroli', true);
        $datetime_ckp_post = $this->input->post('time_checkpoint', true);
        $time_checkpoint = substr($datetime_ckp_post, 11, 2) == '24' ? date('Y-m-d H:i:s', strtotime('-1 day', strtotime($datetime_ckp_post))) : date('Y-m-d H:i:s', strtotime($datetime_ckp_post));
        $type_patrol = $this->input->post('type_patrol', true); // Patroli sesuai jadwal
        $sync_token = $this->generateToken($npk);
        // $sync_token = strtolower($zone_id.'-'.$checkpoint_id.'-'.$shift_id.'-'.date('Ymd',strtotime($date_patroli)));

        // $this->db->trans_begin();
        // var_dump($sync_token);die();
            
        $q_cek_ckp = $this->db->query("
            SELECT count(1) count_duplikat_ckp FROM admisecsgp_trans_headers 
            WHERE date_patroli='$date_patroli' AND admisecsgp_mstusr_npk='$npk' AND admisecsgp_mstshift_shift_id='$shift_id' AND admisecsgp_mstzone_zone_id='$zone_id' AND admisecsgp_mstckp_checkpoint_id='$checkpoint_id' and type_patrol='$type_patrol'
        ");

        $cek_ckp = $q_cek_ckp->row();

        if($cek_ckp->count_duplikat_ckp > 0)
        {
            return '01';
        }
        else
        {
            $this->db->query("
                INSERT INTO admisecsgp_trans_headers(checkin_checkpoint, date_patroli, admisecsgp_mstusr_npk, admisecsgp_mstshift_shift_id, admisecsgp_mstzone_zone_id, admisecsgp_mstckp_checkpoint_id, status, created_at, created_by, type_patrol, sync_token) 
                VALUES('$time_checkpoint', '$date_patroli', '$npk', '$shift_id', '$zone_id', '$checkpoint_id', 1, getdate(), '$npk', $type_patrol, '$sync_token')
            ");

            // $header_id = $this->db->insert_id();

            if($this->db->affected_rows() > 0)
            {
                return '00';

                // $this->db->query("
                //     INSERT INTO admisecsgp_trs_details(status, created_at, created_by) 
                //     VALUES(1, 1, $created_at)
                // ");

                // if($this->db->affected_rows() > 0)
                // {
                //     $this->db->trans_commit();
                //     return '00';
                // }
                // else
                // {
                //     $this->db->trans_rollback();
                //     return '02';
                // }
            }
            else
            {
                return '02';
            }

        }
    }

    public function insert_normal()
    {
        $tgl_patroli = $this->input->post('tgl_patroli', true);
        $npk = $this->input->post('npk', true);
        $shift_id = $this->input->post('shift_id', true);
        $object_id = $this->input->post('object_id', true);
        $checkpoint_id = $this->input->post('checkpoint_id', true);
        $type_patrol = $this->input->post('type_patrol', true);
        $sync_token = $this->generateToken($npk);
        
        $q = $this->db->query("
            SELECT TOP 1 trans_header_id header_id, (SELECT count(1) FROM admisecsgp_trans_details WHERE admisecsgp_trans_headers_trans_headers_id=trans_header_id AND admisecsgp_mstobj_objek_id='$object_id' AND conditions=1) count_duplikat_obj 
            FROM admisecsgp_trans_headers 
            WHERE admisecsgp_mstusr_npk='$npk' AND admisecsgp_mstshift_shift_id='$shift_id' AND admisecsgp_mstckp_checkpoint_id='$checkpoint_id' AND date_patroli='$tgl_patroli' AND type_patrol='$type_patrol'
        ");

        // echo '<pre>';
        // var_dump($q->row());die();
        // print_r($_POST);die();

        if($q->num_rows() > 0)
        {
            $data_header = $q->row();

            if($data_header->count_duplikat_obj > 0)
            {
                return '02'; // Exist Data  
            }
            else
            {
                $data_header = $q->result();

                $field_detail = array(
                    'admisecsgp_trans_headers_trans_headers_id' => $data_header[0]->header_id,
                    'admisecsgp_mstobj_objek_id' => $object_id,
                    'conditions' => 0,
                    // 'ms_event_id' => $event_id,
                    // 'description' => $deskripsi,
                    'laporkan_pic' => 0,
                    'is_tindakan_cepat' => 0,
                    'is_laporan_kejadian' => 0,
                    'status_temuan' => 1, // normal
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => $npk,
                    'sync_token' => $sync_token,
                );

                $db_debug = $this->db->db_debug; //save setting
                $this->db->db_debug = FALSE; //disable debugging for queries

                $q2 = $this->db->insert('admisecsgp_trans_details', $field_detail);
                
                $error = $this->db->error();
                // var_dump($error['code']);die();

                if(isset($error['code']) && $error['code'] == '23000/2627')
                {
                    return '03';
                }
                else
                {
                    if($this->db->affected_rows() > 0)
                    {
                        // $this->db->trans_commit();
                        return '00';
                    }
                    else
                    {
                        // $this->db->trans_rollback();
                        return '04';
                    }
                }
            }
        }
        else
        {
            return '01';
        }
    }

    public function insert_abnormal()
    {
        $npk = $this->input->post('npk', true);
        $tgl_patroli = $this->input->post('tgl_patroli', true);
        // $zone_id = $this->input->post('zone_id', true);
        $shift_id = $this->input->post('shift_id', true);
        $event_id = $this->input->post('event_id', true);
        $object_id = $this->input->post('object_id', true);
        $checkpoint_id = $this->input->post('checkpoint_id', true);
        $deskripsi = $this->input->post('deskripsi', true);
        $deskripsi_tindakan = $this->input->post('deskripsi_tindakan', true);
        // $lap_kejadian = $this->input->post('lap_kejadian', true);
        $lap_pic = $this->input->post('lap_pic', true);
        $tindakan = $this->input->post('tindakan', true);
        $status_temuan = $tindakan == 1 ? 1 : 0;
        $created_at = $this->input->post('created_at', true);
        $sync_token = $this->generateToken($npk);
        $type_patrol = $this->input->post('type_patrol', true);

        // $this->db->trans_begin();

        // $header_id = $this->db->insert_id();

        $q = $this->db->query("
            SELECT TOP 1 trans_header_id header_id,
            (SELECT trans_detail_id FROM admisecsgp_trans_details WHERE admisecsgp_trans_headers_trans_headers_id=trans_header_id AND admisecsgp_mstobj_objek_id='$object_id' AND conditions=0) count_duplikat_obj, 
            (select TOP 1 admisecsgp_mstplant_plant_id from admisecsgp_mstusr where npk='$npk') plant_id 
            FROM admisecsgp_trans_headers WHERE admisecsgp_mstusr_npk='$npk' AND admisecsgp_mstshift_shift_id='$shift_id' AND admisecsgp_mstckp_checkpoint_id='$checkpoint_id' AND date_patroli='$tgl_patroli' AND type_patrol='$type_patrol'
        ");
        
        // var_dump($q->row());die();

        if($q->num_rows() > 0)
        {
            $data_header = $q->row();

            // var_dump($data_header);die();

            if($data_header->count_duplikat_obj > 0)
            {
                return '02'; // Exist Data  
            }
            else
            {
                $upload = $this->upload_multiple($_FILES['images'], $event_id);
                // print_r(array('img'=> $_FILES['images'], 'error' => $upload));die();

                if($upload == '01')
                {
                    return '03';
                }

                $field_img = [];
                $imgs_link = array();
                foreach ($upload as $key => $item_file) {
                    // $field_detail = array(
                    //     'image_'.($key+1) => $item_file['file_name'],
                    // );

                    $field_img['image_'.($key+1)] = 'assets/temuan/'.$item_file['file_name'];

                    $imgs_link[] = base_url('assets/temuan/'.$item_file['file_name']);
                }

                $field_detail = array(
                    'admisecsgp_trans_headers_trans_headers_id' => $data_header->header_id,
                    'admisecsgp_mstobj_objek_id' => $object_id,
                    'admisecsgp_mstevent_event_id' => $event_id,
                    'conditions' => 0,
                    'description' => strtoupper($deskripsi),
                    'deskripsi_tindakan' => $tindakan == 1 ? strtoupper($deskripsi_tindakan) : NULL,
                    'is_laporan_kejadian' => 0,
                    'laporkan_pic' => $lap_pic,
                    'is_tindakan_cepat' => $tindakan,
                    'status_temuan' => $status_temuan, // belum diclose
                    'status' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => $npk,
                    'sync_token' => $sync_token,
                );

                $res_field = array_merge($field_detail, $field_img);

                $db_debug = $this->db->db_debug; //save setting
                $this->db->db_debug = FALSE; //disable debugging for queries

                $this->db->insert('admisecsgp_trans_details', $res_field);

                $error = $this->db->error();
                // var_dump($error['code']);die();

                if(isset($error['code']) && $error['code'] == '23000/2627')
                {
                    return '04';
                }
                else
                {
                    if($this->db->affected_rows() > 0)
                    {
                        // Kirim email PIC
                        // if($lap_pic == '1')
                        // {
                        //     $param['plant_id'] = $data_header->plant_id;
                        //     $param['event_id'] = $event_id;
                        //     $param['chekpoint_id'] = $checkpoint_id;

                        //     $query =  $this->sendEmail($param);
                        //     $res = $query->result_array();
                            
                        //     $config = json_decode($res[0]['nilai_setting'], true);
                        //     $data['plant_name'] = $res[0]['plant_name'];
                        //     $data['event_name'] = $res[0]['event_name'];
                        //     $data['kategori_name'] = $res[0]['kategori_name'];
                        //     $data['zone_name'] = $res[0]['zone_name'];
                        //     $data['chekpoint_name'] = $res[0]['check_name'];
                        //     $data['object_name'] = $res[0]['kategori_name'];
                        //     $data['event_name'] = $res[0]['event_name'];
                        //     $data['imgs'] = $imgs_link;
                        //     $data['desc'] = strtoupper($deskripsi);
                            
                        //     $emails = array(
                        //         array(
                        //         'email' => 'ridho.sistem.adm@gmail.com',
                        //         ),
                        //         array( 
                        //         'email' => 'rife.develop@gmail.com',
                        //         )
                        //     );
                        //     $to = array();
                        //     foreach ($emails as $key => $ie) {
                        //         $to[] = $ie['email'];
                        //     }
                        //     $to = implode(", ", $to);

                        //     $res_email = $this->send_email($config, $to, $data);
                        // }

                        // $this->db->trans_commit();
                        return '00';
                    }
                    else
                    {
                        // $this->db->trans_rollback();
                        return '05';
                    }
                }
            }
        }
        else
        {
            return '01';
        }
    }

    public function selesai_checkpoint_insert()
    {
        $tgl_patroli = $this->input->post('date_patrol', true);
        // $time_finish = date("Y-m-d H:i:s", strtotime($this->input->post('time_finish', true)));
        $datetime_finish_post = $this->input->post('time_finish', true);
        $time_finish = substr($datetime_finish_post, 11, 2) == '24' ? date('Y-m-d H:i:s', strtotime('-1 day', strtotime($datetime_finish_post))) : date('Y-m-d H:i:s', strtotime($datetime_finish_post));

        $npk = $this->input->post('npk', true);
        $shift_id = $this->input->post('shift_id', true);
        $checkpoint_id = $this->input->post('checkpoint_id', true);
        $type_patrol = $this->input->post('type_patrol', true);

        $q = $this->db->query("
            SELECT TOP 1 trans_header_id FROM admisecsgp_trans_headers WHERE admisecsgp_mstusr_npk='$npk' AND admisecsgp_mstshift_shift_id='$shift_id' AND admisecsgp_mstckp_checkpoint_id='$checkpoint_id' AND date_patroli='$tgl_patroli' AND type_patrol='$type_patrol'
        ");

        // print_r($q->row());die();

        if($q->num_rows() > 0)
        {
            $data_header = $q->result();

            $header_id = $data_header[0]->trans_header_id;
            $update_on = date('Y-m-d H:i:s');

            // var_dump($header_id); die();

            $this->db->query("
                UPDATE admisecsgp_trans_headers SET checkout_checkpoint='$time_finish', updated_at='$update_on' WHERE trans_header_id='$header_id'
            ");

            if($this->db->affected_rows() > 0)
            {
                // $this->db->trans_commit();
                return '00';
            }
            else
            {
                // $this->db->trans_rollback();

                return '02';

            }
        }
        else
        {
            return '01';
        }
    }

    public function kirim_temuan()
    {
        $p_npk = $this->input->post('npk', true);
        $p_plant_id = $this->input->post('plant_id', true);
        $p_tgl_patroli = $this->input->post('tgl_patroli', true);
        $p_shift_id = $this->input->post('shift_id', true);
        $p_type_patrol = $this->input->post('type_patrol', true);

        // (SELECT trans_detail_id FROM admisecsgp_trans_details WHERE admisecsgp_trans_headers_trans_headers_id=trans_header_id AND admisecsgp_mstobj_objek_id='$object_id' AND conditions=0) count_duplikat_obj, , st.nilai_setting, st.type, st.unit
        $q = $this->db->query("
            SELECT st.nilai_setting, pl.plant_name, eo.nama_objek, eok.event_name, cz.check_name, cz.zone_name, td.description, td.image_1, td.image_2, td.image_3
            FROM admisecsgp_trans_headers th
            INNER JOIN admisecsgp_trans_details td ON td.admisecsgp_trans_headers_trans_headers_id=th.trans_header_id AND td.laporkan_pic=1
            INNER JOIN admisecsgp_mstplant pl ON pl.plant_id='$p_plant_id'
                JOIN (
                    select sst.nama_setting, sst.nilai_setting, sst.type, sst.unit
                    from admisecsgp_setting sst
                    group by sst.nama_setting, sst.nilai_setting, sst.type, sst.unit
                ) st ON st.nama_setting='email_config'
                JOIN (
                    select sob.objek_id, sob.nama_objek
                        from admisecsgp_mstobj sob
                    group by sob.objek_id, sob.nama_objek
                ) eo ON eo.objek_id=td.admisecsgp_mstobj_objek_id
                JOIN (
                    select sev.event_id, sev.event_name, sob.kategori_name
                        from admisecsgp_mstevent sev
                        inner join admisecsgp_mstkobj sob on sob.kategori_id=sev.admisecsgp_mstkobj_kategori_id
                    group by sev.event_id, sev.event_name, sob.kategori_name
                ) eok ON eok.event_id=td.admisecsgp_mstevent_event_id
                JOIN (
                    select sck.checkpoint_id, sck.check_name, szo.zone_name
                        from admisecsgp_mstckp sck
                        inner join admisecsgp_mstzone szo on szo.zone_id=sck.admisecsgp_mstzone_zone_id
                    group by sck.checkpoint_id, sck.check_name, szo.zone_name
                ) cz ON cz.checkpoint_id=th.admisecsgp_mstckp_checkpoint_id
            WHERE th.admisecsgp_mstusr_npk='$p_npk' AND th.admisecsgp_mstshift_shift_id='$p_shift_id' AND th.date_patroli='$p_tgl_patroli' AND th.type_patrol='$p_type_patrol'
        ");
        
        // echo '<pre>';
        // print_r($q->result());die();

        if($q->num_rows() > 0)
        {
            return $q->result_array();
        }
        else
        {
            return '01';
        }
    }

    public function get_user_ga($plant_id)
    {
        $q = $this->db->query("
            SELECT ug.email, ug.type
                FROM admisecsgp_mstusr_ga ug
            WHERE ug.admisecsgp_mstplant_plant_id='$plant_id'
        ");

        if($q->num_rows() > 0)
        {
            return $q->result_array();
        }
        else
        {
            return '01';
        }
    }

    private function upload_multiple($files, $title)
    {
        $config = array(
            'upload_path'   => "./assets/temuan",
            'allowed_types' => 'jpg|png|jpeg',
            'overwrite'     => false,
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
            $rand_number = rand ( 10000 , 99999 );
            // $fileName = $title.'_'.$rand_number;
            $config['file_name'] = $title.'_'.date('YmdHis').'_'.$rand_number;

            // $dok[] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('img[]')) 
            {
                $file = $this->upload->data();

                $res[] = $file;
            } else {
                // $res = '01';
                $res = array('error' => $this->upload->display_errors());
            }
        }

        return $res;
    }

    public function generateToken($npk){
        $static_str='AL';
        $currenttimeseconds = date("mdY_His");
        $token_id=$static_str.$npk.$currenttimeseconds;
        // $data = array(
        //         'tktToken' => md5($token_id),
        //         'tktReason' => $tktReason,
        //         'userId' => $userId,
        //     );
        // $this->db->insert('tickets', $data);
        return  join('-', str_split(md5($token_id), 7));
    }

    public function sendEmail($data)
    {
        // st.nilai_setting, st.type, st.unit, 
        $query = $this->db->query("
            SELECT pl.plant_name, mg.email, st.nilai_setting, st.type, st.unit, eo.event_name, eo.kategori_name, cz.zone_name, cz.check_name
            FROM admisecsgp_mstplant pl
                INNER JOIN admisecsgp_mstusr_ga mg ON mg.admisecsgp_mstplant_plant_id=pl.plant_id
                JOIN (
                    select sst.nama_setting, sst.nilai_setting, sst.type, sst.unit
                    from admisecsgp_setting sst
                    group by sst.nama_setting, sst.nilai_setting, sst.type, sst.unit
                ) st ON st.nama_setting='email_config'
                JOIN (
                    select sev.event_id, sev.event_name, sob.kategori_name
                        from admisecsgp_mstevent sev
                        inner join admisecsgp_mstkobj sob on sob.kategori_id=sev.admisecsgp_mstkobj_kategori_id
                    group by sev.event_id, sev.event_name, sob.kategori_name
                ) eo ON eo.event_id='".$data['event_id']."'
                JOIN (
                    select sck.checkpoint_id, sck.check_name, szo.zone_name
                        from admisecsgp_mstckp sck
                        inner join admisecsgp_mstzone szo on szo.zone_id=sck.admisecsgp_mstzone_zone_id
                    group by sck.checkpoint_id, sck.check_name, szo.zone_name
                ) cz ON cz.checkpoint_id='".$data['chekpoint_id']."'
            WHERE pl.plant_id='".$data['plant_id']."'
        ");

        return $query;
    }

    public function send_email($config, $to, $data)
    {
        $this->load->library('email', $config);

        $this->email->from('dataanalytic.adm@gmail.com', 'GUARD TOUR SYSTEM');
        $this->email->to($to);
        $this->email->subject('Laporan Temuan');
        $message = $this->load->view('api_adm_b/template/email_lapor_pic_2_v', $data, true);
        $this->email->message($message);

        if ($this->email->send()) 
        {
            $result = array(
                'code' => '00',
                'msg' => 'Email terkirim',
            );
        } 
        else 
        {
            $result = array(
                'code' => '01',
                'msg' => show_error($this->email->print_debugger()),
            );
        }

        // var_dump($result); die();
        // echo json_encode($result);
        
        return $result;
    }

}