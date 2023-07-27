<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->srsdb = $this->load->database('soa_bi', TRUE);
    }

    public function area()
    {
        $wil = user_wilayah();
        $npk = user_npk();
        $q = "SELECT id, title 
                    FROM soa_bi.dbo.admisecdrep_sub 
                WHERE categ_id='9' AND disable=0";

        // if(is_author('ALLAREA'))
        // {
        //     $q .= " AND wil_id='$wil'";
        // }
        // if(is_section_head())
        // {
        //     $q .= " AND id IN (select aas.id from isecurity.dbo.admisec_area_users aau 
        //     INNER JOIN isecurity.dbo.admisecsgp_mstsite ams ON ams.site_id=aau.site_id 
        //     INNER JOIN srs_bi.dbo.admiseciso_area_sub aas ON aas.wil_id=ams.id_wilayah 
        //     WHERE aau.npk=$npk)";
        // }

        $q .= " ORDER BY title ASC";

        $res_q = $this->srsdb->query($q);

        return $res_q;
    }

    public function peopleTotal()
    {
        $area = $this->input->post('area_fil', true);
        $month = $this->input->post('month_fil', true);
        $year = $this->input->post('year_fil', true);

        $q = "SELECT FORMAT(COALESCE(SUM(b.attendance),0), 'N0') AS total_people
                FROM soa_bi.dbo.admisecdrep_transaction as a
                INNER JOIN soa_bi.dbo.admisecdrep_transaction_people b ON b.trans_id=a.id 
                WHERE a.disable=0";

        if (!empty($area)) $q .= " AND a.area_id='$area'";
        if (!empty($month)) $q .= " AND MONTH(a.report_date)='$month'";
        if (!empty($year)) $q .= " AND YEAR(a.report_date)='$year'";

        $res_q = $this->srsdb->query($q);

        return $res_q;
    }

    public function vehicleTotal()
    {
        $area = $this->input->post('area_fil', true);
        $month = $this->input->post('month_fil', true);
        $year = $this->input->post('year_fil', true);

        $q = "SELECT FORMAT(COALESCE(SUM(atv.amount),0), 'N0') AS total
                FROM soa_bi.dbo.admisecdrep_transaction as a
                INNER JOIN soa_bi.dbo.admisecdrep_transaction_vehicle atv ON atv.trans_id=a.id 
            WHERE a.disable=0";

        if (!empty($area)) $q .= " AND a.area_id='$area'";
        if (!empty($month)) $q .= " AND MONTH(a.report_date)='$month'";
        if (!empty($year)) $q .= " AND YEAR(a.report_date)='$year'";

        $res_q = $this->srsdb->query($q);

        return $res_q;
    }

    public function peopleCategoryTotal()
    {
        $area = $this->input->post('area_fil', true);
        $month = $this->input->post('month_fil', true);
        $year = $this->input->post('year_fil', true);

        $q = "SELECT tas.id, tas.title
                ,FORMAT(COALESCE(trx.total, 0), 'N0') AS total_kehadiran
                FROM soa_bi.dbo.admisecdrep_sub tas
                LEFT JOIN (
                    SELECT atp.people_id, atr.disable, SUM(atp.attendance) AS total
                        FROM soa_bi.dbo.admisecdrep_transaction atr
                        INNER JOIN soa_bi.dbo.admisecdrep_transaction_people atp ON atp.trans_id=atr.id WHERE atr.disable=0";

        if (!empty($area)) $q .= " AND atr.area_id='$area'";
        if (!empty($month)) $q .= " AND MONTH(atr.report_date)='$month'";
        if (!empty($year)) $q .= " AND YEAR(atr.report_date)='$year'";

        $q .= " GROUP BY atp.people_id, atr.disable
                ) AS trx ON trx.people_id=tas.id 
            WHERE tas.categ_id=2 AND tas.disable=0 ORDER BY tas.id ASC";

        $res_q = $this->srsdb->query($q);

        return $res_q;
    }

    public function peopleCategoryDayTotal()
    {
        $month = $this->input->post('month_fil', true);
        $month = empty($month) ? date('m') : $month;
        $year = $this->input->post('year_fil', true);
        $year = empty($year) ? date('Y') : $year;

        $q = "WITH days(DayNum) AS
            (
                SELECT 1
                UNION ALL
                SELECT DayNum+1 
                    FROM days
                WHERE DayNum < 30
            )
            SELECT m.DayNum day_num ,tas.id AS people_categ ,tas.title ,COALESCE(SUM(trx.total),0) total
            FROM days m
                INNER JOIN soa_bi.dbo.admisecdrep_sub tas ON tas.categ_id=2 AND tas.id != 32
                LEFT OUTER JOIN (
                    SELECT atp.people_id, atr.report_date, atr.disable, SUM(atp.attendance) AS total
                        FROM soa_bi.dbo.admisecdrep_transaction atr
                        INNER JOIN soa_bi.dbo.admisecdrep_transaction_people atp ON atp.trans_id=atr.id
                        -- WHERE MONTH(atr.report_date)=4 AND atr.disable=0
                    GROUP BY atp.people_id, atr.report_date, atr.disable
                ) AS trx ON DAY(trx.report_date)=m.DayNum AND trx.people_id=tas.id AND YEAR(trx.report_date)='$year' 
                    AND MONTH(trx.report_date)='$month'
            WHERE tas.disable=0
            GROUP BY m.DayNum, tas.id ,tas.title
            ORDER BY tas.id ASC";

        $res_q = $this->srsdb->query($q);

        return $res_q;
    }

    public function materialTotal()
    {
        $area = $this->input->post('area_fil', true);
        $month = $this->input->post('month_fil', true);
        $year = $this->input->post('year_fil', true);

        $q = "SELECT FORMAT(COALESCE(SUM(atm.document_in),0), 'N0') AS total
                FROM soa_bi.dbo.admisecdrep_transaction atr
                LEFT JOIN soa_bi.dbo.admisecdrep_transaction_material atm ON atm.trans_id=atr.id
            WHERE atr.disable=0";

        if (!empty($year)) $q .= " AND YEAR(atr.report_date)='$year'";
        if (!empty($month)) $q .= " AND MONTH(atr.report_date)='$month'";
        if (!empty($area)) $q .= " AND atr.area_id='$area'";

        $res_q = $this->srsdb->query($q);

        return $res_q;
    }

    public function pieVehicle($id)
    {
        $area = $this->input->post('area_fil', true);
        $month = $this->input->post('month_fil', true);
        $year = $this->input->post('year_fil', true);

        $q = "SELECT FORMAT(COALESCE(SUM(atv.amount),0), 'N0') AS total
                FROM admisecdrep_transaction as a
                INNER JOIN admisecdrep_transaction_vehicle atv ON atv.trans_id=a.id 
            WHERE a.disable=0 and atv.type_id = '$id'  ";

        if (!empty($area)) $q .= " AND a.area_id='$area'";
        if (!empty($month)) $q .= " AND MONTH(a.report_date)='$month'";
        if (!empty($year)) $q .= " AND YEAR(a.report_date)='$year'";


        $res_q = $this->soadb->query($q)->row();
        if ($res_q) {
            return $res_q->total;
        } else {
            return 0;
        }
    }

    public function piePeople($id)
    {
        $area = $this->input->post('area_fil', true);
        $month = $this->input->post('month_fil', true);
        $year = $this->input->post('year_fil', true);

        $q = "SELECT tas.id, tas.title
                ,FORMAT(COALESCE(trx.total, 0), 'N0') AS total_kehadiran
                FROM soa_bi.dbo.admisecdrep_sub tas
                LEFT JOIN (
                    SELECT atp.people_id, atr.disable, SUM(atp.attendance) AS total
                        FROM soa_bi.dbo.admisecdrep_transaction atr
                        INNER JOIN soa_bi.dbo.admisecdrep_transaction_people atp ON atp.trans_id=atr.id WHERE atr.disable=0 ";

        if (!empty($area)) $q .= " AND atr.area_id='$area'";
        if (!empty($month)) $q .= " AND MONTH(atr.report_date)='$month'";
        if (!empty($year)) $q .= " AND YEAR(atr.report_date)='$year'";

        $q .= " GROUP BY atp.people_id, atr.disable
                ) AS trx ON trx.people_id=tas.id 
            WHERE tas.id in(7,8,9) AND tas.disable=0 ORDER BY tas.id ASC";

        $res_q = $this->srsdb->query($q);

        return $res_q;
    }

    public function pieMaterial()
    {
        $area = $this->input->post('area_fil', true);
        $month = $this->input->post('month_fil', true);
        $year = $this->input->post('year_fil', true);

        $q = "SELECT tas.id, tas.title
                ,FORMAT(COALESCE(trx.total, 0), 'N0') AS total
                FROM soa_bi.dbo.admisecdrep_sub tas
                LEFT JOIN (
                    SELECT atp.category_id, atr.disable, SUM(atp.document_in) AS total
                        FROM soa_bi.dbo.admisecdrep_transaction atr
                        INNER JOIN soa_bi.dbo.admisecdrep_transaction_material atp ON atp.trans_id=atr.id WHERE atr.disable=0 ";

        if (!empty($area)) $q .= " AND atr.area_id='$area'";
        if (!empty($month)) $q .= " AND MONTH(atr.report_date)='$month'";
        if (!empty($year)) $q .= " AND YEAR(atr.report_date)='$year'";

        $q .= " GROUP BY atp.category_id, atr.disable
                ) AS trx ON trx.category_id=tas.id 
            WHERE tas.id in(1035,1036,12) AND tas.disable=0 ORDER BY tas.id ASC";

        $res_q = $this->srsdb->query($q);

        return $res_q;
    }
}
