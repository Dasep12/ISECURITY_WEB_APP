<?php

class M_soa extends CI_Model
{
    private $wil;
    public function __construct()
    {
        parent::__construct();
        $this->soadb = $this->load->database('soa_bi', TRUE);
        $this->wil =  user_wilayah();
    }

    public function area()
    {
        $npk = user_npk();

        $q = "SELECT id, title FROM admisecdrep_sub WHERE categ_id='9' AND disable=0";

        if (is_author('ALLAREA')) {
            $q .= " AND wil_id='$this->wil'";
        }
        $resq = $this->soadb->query($q);

        return $resq;
    }


    public function save()
    {
        $reportDate = $this->input->post("report_date");
        $shift = $this->input->post("shift");
        $area = $this->input->post("area");
        $chronology = $this->input->post("chronology");

        // people
        $employee = $this->input->post("employee");
        $contractor = $this->input->post("contractor");
        $visitor = $this->input->post("visitor");
        $business_partner = $this->input->post("business_partner");

        // document
        $pkb = $this->input->post("pkb");
        $pko = $this->input->post("pko");
        $surat_jalan = $this->input->post("surat_jalan");

        // vehicle employee
        $car_employee = $this->input->post("car_employee");
        $motorcycle_employee = $this->input->post("motorcycle_employee");
        $bicycle_employee = $this->input->post("bicycle_employee");
        // vehicle visitor
        $car_visitor = $this->input->post("car_visitor");
        $motorcycle_visitor = $this->input->post("motorcycle_visitor");
        $bicycle_visitor = $this->input->post("bicycle_visitor");
        $truck_visitor = $this->input->post("truck_visitor");
        // vehicle business partener
        $car_bp = $this->input->post("car_bp");
        $motorcycle_bp = $this->input->post("motorcycle_bp");
        $bicycle_bp = $this->input->post("bicycle_bp");
        $truck_bp = $this->input->post("truck_bp");
        // vehicle contractor
        $car_contractor = $this->input->post("car_contractor");
        $motorcycle_contractor = $this->input->post("motorcycle_contractor");
        $bicycle_contractor = $this->input->post("bicycle_contractor");
        $truck_contractor = $this->input->post("truck_contractor");


        $header_transaksi = array(
            'created_on' => date("Y-m-d H:i:s"),
            'created_by' => $this->session->userdata("npk"),
            'status'     => 1,
            'disable'    => 0,
            'report_date' => $reportDate,
            'shift'        => $shift,
            'chronology'    => '',
            'area_id'       => $area,
            'chronology'    => $chronology
        );


        $this->soadb->trans_begin();
        $this->soadb->insert("admisecdrep_transaction", $header_transaksi);
        if ($this->soadb->affected_rows() > 0) {
            $last_id = $this->soadb->insert_id();
            $data_people = array(
                array(
                    'people_id' => 6, 'attendance' => $employee, 'trans_id' => $last_id, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'people_id' => 7, 'attendance' => $visitor, 'trans_id' => $last_id,
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'people_id' => 8, 'attendance' => $business_partner, 'trans_id' => $last_id, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'people_id' => 9, 'attendance' => $contractor, 'trans_id' => $last_id, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
            );

            $data_document = array(
                array(
                    'category_id' =>  12, 'document_in' => $pkb, 'trans_id' => $last_id, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'category_id' =>  1035, 'document_in' => $pko, 'trans_id' => $last_id, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'category_id' =>  1036, 'document_in' => $surat_jalan, 'trans_id' => $last_id, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
            );

            $data_vehicle  = array(
                // employeee
                array(
                    'trans_id' => $last_id, 'type_id' => 1, 'amount' => $car_employee, 'people_id' => 6, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'trans_id' => $last_id, 'type_id' => 2, 'amount' => $motorcycle_employee, 'people_id' => 6, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'trans_id' => $last_id, 'type_id' => 1037, 'amount' => $bicycle_employee, 'people_id' => 6, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),

                // visitor 
                array(
                    'trans_id' => $last_id, 'type_id' => 1, 'amount' => $car_visitor, 'people_id' => 7, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'trans_id' => $last_id, 'type_id' => 2, 'amount' => $motorcycle_visitor, 'people_id' => 7, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'trans_id' => $last_id, 'type_id' => 3, 'amount' => $truck_visitor, 'people_id' => 7, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'trans_id' => $last_id, 'type_id' => 1037, 'amount' => $bicycle_contractor, 'people_id' => 7, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),

                // bp 
                array(
                    'trans_id' => $last_id, 'type_id' => 1, 'amount' => $car_bp, 'people_id' => 8, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'trans_id' => $last_id, 'type_id' => 2, 'amount' => $motorcycle_bp, 'people_id' => 8, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'trans_id' => $last_id, 'type_id' => 3, 'amount' => $truck_bp, 'people_id' => 8, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'trans_id' => $last_id, 'type_id' => 1037, 'amount' => $bicycle_bp, 'people_id' => 8, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),

                // contractor
                array(
                    'trans_id' => $last_id, 'type_id' => 1, 'amount' => $car_contractor, 'people_id' => 9, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'trans_id' => $last_id, 'type_id' => 2, 'amount' => $motorcycle_contractor, 'people_id' => 9, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'trans_id' => $last_id, 'type_id' => 3, 'amount' => $truck_contractor, 'people_id' => 9, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
                array(
                    'trans_id' => $last_id, 'type_id' => 1037, 'amount' => $bicycle_contractor, 'people_id' => 9, 'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata("npk")
                ),
            );

            $this->soadb->insert_batch("admisecdrep_transaction_people", $data_people);
            if ($this->soadb->affected_rows() > 0) {
                $this->soadb->insert_batch("admisecdrep_transaction_material", $data_document);
                if ($this->soadb->affected_rows() > 0) {
                    $this->soadb->insert_batch("admisecdrep_transaction_vehicle", $data_vehicle);
                    if ($this->soadb->affected_rows() > 0) {
                        $this->soadb->trans_commit();
                        return "01";
                    } else {
                        $this->soadb->trans_rollback();
                        return "00";
                    }
                } else {
                    $this->soadb->trans_rollback();
                    return "00";
                }
            } else {
                $this->soadb->trans_rollback();
                return "00";
            }
        } else {
            $this->soadb->trans_rollback();
            return "00";
        }
    }


    public function delete()
    {
        $area  = $this->input->post("area");
        $date = $this->input->post("date");
        $data = ['status' => 0];
        $where = ['area_id' => $area, 'report_date' => $date];
        $this->soadb->update("admisecdrep_transaction", $data, $where);

        if ($this->soadb->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }


    public function get_datatables()
    {
        $area = $this->input->post("areafilter", true);
        $start = $this->input->post("start", true);
        $end = $this->input->post("end", true);
        $where = "";
        if ($area) {
            $where .= 'AND at2.area_id= ' . $area . ' ';
        }

        $dateRange = "";
        if ($start) {
            $dateRange .= "AND FORMAT(at2.report_date,'yyyy-MM-dd') between '" . $start . "' AND '" . $end . "'  ";
        }

        $whereArea = "";
        if (is_author('ALLAREA')) {
            $whereArea .= " AND wil_id='$this->wil'";
        }

        $res =    $this->soadb->query("SELECT at2.report_date as tanggal , as2.title as area , SUM(X.ttal) as total_people  , 
        SUM(Y.ttal) as total_vehicle , 
        SUM(Z.ttal) as total_document ,
        at2.area_id 
        from  admisecdrep_transaction at2 
        inner join admisecdrep_sub as2 on as2.id  = at2.area_id 
        left outer JOIN (
            select sum(atp2.attendance)  as ttal , atp2.trans_id from admisecdrep_transaction_people atp2
            where atp2.people_id in (7,8,9) 
            group by  atp2.trans_id
        ) X  on X.trans_id = at2.id  
        left outer join(
            select sum(atv.amount) as ttal , atv.trans_id from admisecdrep_transaction_vehicle atv
            where atv.type_id in (1,2,3,1037) 
            group by  atv.trans_id
        ) Y on Y.trans_id = at2.id 
        left outer join(
            select sum(atm.document_in)  as ttal , atm.trans_id from admisecdrep_transaction_material atm
            where atm.category_id in (12,1036,1035)
            group by  atm.trans_id
        ) Z on Z.trans_id = at2.id
        WHERE at2.status = 1 
        $where 
        $dateRange
        $whereArea
        group by at2.report_date , as2.title ,at2.area_id
        order by at2.report_date  asc");
        return $res;
    }

    public function get_detail()
    {
        $date = $this->input->post("tanggal");
        $area = $this->input->post("area");
        $res = $this->soadb->query("SELECT at2.id as id_trans , at2.report_date as tanggal ,   at2.shift  , as2.title as area , SUM(X.ttal) as total_people  , 
        SUM(Y.ttal) as total_vehicle , 
        SUM(Z.ttal) as total_document 
        from  admisecdrep_transaction at2 
        inner join admisecdrep_sub as2 on as2.id  = at2.area_id 
        left outer JOIN (
            select sum(atp2.attendance)  as ttal , atp2.trans_id from admisecdrep_transaction_people atp2
            where atp2.people_id in (7,8,9) 
            group by  atp2.trans_id
        ) X  on X.trans_id = at2.id  
        left outer join(
            select sum(atv.amount) as ttal , atv.trans_id from admisecdrep_transaction_vehicle atv
            where atv.type_id in (1,2,3,1037) 
            group by  atv.trans_id
        ) Y on Y.trans_id = at2.id 
        left outer join(
            select sum(atm.document_in)  as ttal , atm.trans_id from admisecdrep_transaction_material atm
            where atm.category_id in (12,1036,1035)
            group by  atm.trans_id
        ) Z on Z.trans_id = at2.id 
        WHERE at2.area_id  = '$area' and  at2.report_date  = '$date'
        group by at2.report_date , as2.title  , at2.id , at2.shift
        order by at2.shift  asc");
        return $res;
    }

    public function detail_people($id)
    {
        $res  = $this->soadb->query("SELECT as2.title , COALESCE (X.total,0) as totals , X.shift from admisecdrep_sub as2 
        LEFT OUTER JOIN (
            select sum(atv.attendance) as total , at2.id as tr_id , atv.people_id , at2.shift  from admisecdrep_transaction at2 
            inner join admisecdrep_transaction_people  atv on atv.trans_id  = at2.id
            where at2.id  = '$id' and at2.status = 1 
            group by   at2.id  , atv.people_id  , at2.shift
        )X on as2.id  = X.people_id
        where as2.id in (7,8,9)   ");
        return $res;
    }

    public function detail_vehicle($id)
    {
        $res = $this->soadb->query("SELECT as2.title , COALESCE (X.total,0) as totals , X.shift from admisecdrep_sub as2 
        LEFT OUTER JOIN (
            select sum(atv.amount) as total , at2.id as tr_id , atv.type_id , at2.shift  from admisecdrep_transaction at2 
            inner join admisecdrep_transaction_vehicle atv on atv.trans_id  = at2.id
            where at2.id  = '$id' and at2.status = 1 
            group by   at2.id  , atv.type_id  , at2.shift
        )X on as2.id  = X.type_id
        where as2.id  in  (1,2,3,1037) ");
        return $res;
    }

    public function detail_material($id)
    {
        $res = $this->soadb->query("SELECT as2.title , COALESCE (X.total,0) as totals  from admisecdrep_sub as2 
        LEFT OUTER JOIN (
            select sum(atv.document_in) as total , at2.id as tr_id , atv.category_id   from admisecdrep_transaction at2 
            inner join admisecdrep_transaction_material  atv on atv.trans_id  = at2.id 
            where at2.id  = '$id' and at2.status = 1 
            group by   at2.id  , atv.category_id 
        )X on as2.id  = X.category_id 
        where as2.id  in  (12,1036,1035) ");
        return $res;
    }
}
