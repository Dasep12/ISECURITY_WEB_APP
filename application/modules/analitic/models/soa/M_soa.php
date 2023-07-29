<?php

class M_soa extends CI_Model
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

        if (is_author('ALLAREA')) {
            $q .= " AND wil_id='$wil'";
        }
        $resq = $this->srsdb->query($q);

        return $resq;
    }


    public function save()
    {
        $reportDate = $this->input->post("report_date");
        $shift = $this->input->post("shift");
        $area = $this->input->post("area");

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
            'area_id'       => $area
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
}
