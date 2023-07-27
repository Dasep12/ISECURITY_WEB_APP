<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_osi extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->srsdb = $this->load->database('srs_bi', TRUE);
    }

    protected $t_trans = 'admisecosi_transaction';
    var $column_order = array(null, 'ssu.title', 'asu.title', null);
    var $column_search = array('ssu.title');
    var $order = array('a.event_date' => 'asc');

    private function _get_datatables_query()
    {
        $this->srsdb->select("a.id, event_date, ssu.title secinfo_name, ssu1.title secinfo_name1, ISNULL(ssu2.title,'-') secinfo_name2, ISNULL(ssu3.title,'-') secinfo_name3, ISNULL(asu.title,'-') area_name, a.status");
        $this->srsdb->from($this->t_trans.' a');
        $this->srsdb->join('admisecosi_secinfo_sub ssu', 'ssu.id=a.secinfo_id', 'inner');
        $this->srsdb->join('admisecosi_secinfo_sub ssu1', 'ssu1.id=a.secinfo_sub1_id', 'left');
        $this->srsdb->join('admisecosi_secinfo_sub ssu2', 'ssu2.id=a.secinfo_sub2_id', 'left');
        $this->srsdb->join('admisecosi_secinfo_sub ssu3', 'ssu3.id=a.secinfo_sub3_id', 'left');
        $this->srsdb->join('admisecosi_area_sub asu', 'asu.id=a.area_id', 'left');
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
        $this->srsdb->from($this->t_trans);
        return $this->srsdb->count_all_results();
    }

    public function detail()
    {
        $id = $this->input->post('id', true);

        $q = $this->srsdb->query("
                SELECT a.id, a.event_date, a.description, ISNULL(ars.title,'-') area, ISNULL(ars1.title,'-') area_sub1, sei.title secinfo, sei1.title secinfo_sub1, sei2.title secinfo_sub2, sei3.title secinfo_sub3, musr.name author, tat.file_name
                    FROM srs_bi.dbo.admisecosi_transaction a
                    LEFT JOIN srs_bi.dbo.admisecosi_area_sub ars ON ars.id=a.area_id
                    LEFT JOIN srs_bi.dbo.admisecosi_area_sub ars1 ON ars1.id=a.area_sub1_id
                    INNER JOIN srs_bi.dbo.admisecosi_secinfo_sub sei ON sei.id=a.secinfo_id
                    LEFT JOIN srs_bi.dbo.admisecosi_secinfo_sub sei1 ON sei1.id=a.secinfo_sub1_id
                    LEFT JOIN srs_bi.dbo.admisecosi_secinfo_sub sei2 ON sei2.id=a.secinfo_sub2_id
                    LEFT JOIN srs_bi.dbo.admisecosi_secinfo_sub sei3 ON sei3.id=a.secinfo_sub3_id
                    INNER JOIN isecurity.dbo.admisecsgp_mstusr musr ON musr.npk=a.created_by
                    LEFT JOIN srs_bi.dbo.admisecosi_trans_attach tat ON tat.trans_id=a.id AND tat.status=1
                WHERE a.id='$id'
            ");

        return $q;
    }

    public function security_info()
    {
        $q = $this->srsdb->query("
                SELECT id, title 
                    FROM admisecosi_secinfo_sub
                WHERE categ_id=1 AND status=1 ORDER BY title ASC
            ");
        
        return $q;
    }

    public function get_securityinfo_sub($categ_id=null)
    {
        if($_POST)
        {
            $category_id = $this->input->post('categ_id', true);
        }
        else
        {
            $category_id = $categ_id;
        }

        $q = $this->srsdb->query("
                SELECT a.id, a.title, b.title title_cat
                    FROM admisecosi_secinfo_sub a
                    INNER JOIN admisecosi_secinfo_categ b ON b.id=a.categ_id
                WHERE a.categ_id=(select categtarget_id from admisecosi_secinfo_sub where id='$category_id') AND a.status=1 ORDER BY a.title ASC
            ");

        return $q;
    }

    public function area()
    {
        $q = $this->srsdb->query("
                SELECT id, title 
                    FROM admisecosi_area_sub
                WHERE categ_id=1 AND status=1 ORDER BY title ASC
            ");
        
        return $q;
    }

    public function get_area_sub($categ_id=null)
    {
        if($_POST)
        {
            $category_id = $this->input->post('categ_id', true);
        }
        else
        {
            $category_id = $categ_id;
        }

        $q = $this->srsdb->query("
                SELECT a.id, a.title, b.title title_cat
                    FROM admisecosi_area_sub a
                    INNER JOIN admisecosi_area_categ b ON b.id=a.categ_id
                WHERE a.categ_id=(select categtarget_id from admisecosi_area_sub where id='$category_id') AND a.status=1 ORDER BY a.title ASC
            ");

        return $q;
    }

    public function save()
    {
        $event_date = $this->input->post('event_date', true);
        $area = $this->input->post('area', true);
        $areaSub1 = $this->input->post('areaSub1', true);
        $secInfo = $this->input->post('secinfo', true);
        $secInfoSub1 = $this->input->post('secInfoSub1', true);
        $secInfoSub2 = $this->input->post('secInfoSub2', true);
        $secInfoSub3 = $this->input->post('secInfoSub3', true);

        $desc = addslashes($this->input->post('description', true));
        $desc = preg_replace("/'/", "\&#39;", $desc);

        $sess_npk = $this->session->userdata('npk');
        $curr_date = date('Y-m-d H:i:s');

        $q1 = "INSERT INTO admisecosi_transaction (event_date, area_id, area_sub1_id, secinfo_id, secinfo_sub1_id, secinfo_sub2_id, secinfo_sub3_id, description, status, created_by) VALUES ('$event_date', NULLIF('$area', ''), NULLIF('$areaSub1', ''), $secInfo, NULLIF('$secInfoSub1', ''), NULLIF('$secInfoSub2', ''), NULLIF('$secInfoSub3', ''), '$desc', 1, '$sess_npk')";

        // var_dump($q1);die();

        $this->srsdb->trans_begin();

        $q_trans = $this->srsdb->query($q1);

        $trans_id = $this->srsdb->insert_id();
        
        if($q_trans)
        {
            if(isset($_FILES['attach']) && $_FILES['attach']['name'][0] !== '')
            {
                $upload = $this->upload_multiple($_FILES['attach'], $curr_date);
                // $upload = $this->upload_file($curr_date);
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
                
                $q_file = "INSERT INTO admisecosi_trans_attach(trans_id, file_name, created_on) VALUES ".$field_file_implode;
                    
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

    private function upload_multiple($files, $date)
    {
        $config = array(
            'upload_path' => "./uploads/srs_bi/osint",
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