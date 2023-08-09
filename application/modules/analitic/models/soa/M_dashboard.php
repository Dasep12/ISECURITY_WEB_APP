<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    private $wilayah;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['auth_apps']);
        $this->soadb = $this->load->database('soa_bi', TRUE);
        $this->wilayah = user_wilayah();
    }

    public function area()
    {

        $npk = user_npk();
        $q = "SELECT id, title 
                    FROM soa_bi.dbo.admisecdrep_sub 
                WHERE categ_id='9' AND disable=0";

        if (is_author('ALLAREA')) {
            $q .= " AND wil_id='$this->wilayah'";
        }

        $q .= " ORDER BY title ASC";

        $res_q = $this->soadb->query($q);

        return $res_q;
    }

    public function peopleTotal()
    {
        $area = $this->input->post('area_fil', true);
        $areas = $this->input->post('area_fills', true);
        $month = $this->input->post('month_fil', true);
        $year = $this->input->post('year_fil', true);

        if ($areas != null || $areas != "") {
            $idArea  = $this->soadb->get_where("admisecdrep_sub", ['code_sub' => $areas])->row();
            $area = $idArea->id;
        } else {
            $area = $area;
        }

        $whereWil = "";
        if (is_author('ALLAREA')) {
            $whereWil .= " AND wil_id='$this->wilayah'";
        }

        $q = "SELECT FORMAT(COALESCE(SUM(b.attendance),0), 'N0') AS total_people
        FROM soa_bi.dbo.admisecdrep_transaction as a
        INNER JOIN soa_bi.dbo.admisecdrep_transaction_people b ON b.trans_id=a.id and 
        b.people_id in (7,8,9)
        INNER JOIN admisecdrep_sub as2 on as2.id  = a.area_id 
        WHERE a.disable=0  and a.status = 1 $whereWil ";

        if (!empty($area)) $q .= " AND a.area_id='$area'";
        if (!empty($month)) $q .= " AND MONTH(a.report_date)='$month'";
        if (!empty($year)) $q .= " AND YEAR(a.report_date)='$year'";

        $res_q = $this->soadb->query($q);

        return $res_q;
    }

    public function vehicleTotal()
    {
        $area = $this->input->post('area_fil', true);
        $areas = $this->input->post('area_fills', true);
        $month = $this->input->post('month_fil', true);
        $year = $this->input->post('year_fil', true);

        if ($areas != null || $areas != "") {
            $idArea  = $this->soadb->get_where("admisecdrep_sub", ['code_sub' => $areas])->row();
            $area = $idArea->id;
        } else {
            $area = $area;
        }

        $whereWil = "";
        if (is_author('ALLAREA')) {
            $whereWil .= " AND wil_id='$this->wilayah'";
        }

        $q = "SELECT FORMAT(COALESCE(SUM(atv.amount),0), 'N0') AS total
                FROM soa_bi.dbo.admisecdrep_transaction as a
                INNER JOIN soa_bi.dbo.admisecdrep_transaction_vehicle atv ON atv.trans_id=a.id
                INNER JOIN admisecdrep_sub as2 on as2.id  = a.area_id  
            WHERE a.disable=0 and atv.type_id in (1,2,3,1037) and a.status = 1  $whereWil ";

        if (!empty($area)) $q .= " AND a.area_id='$area'";
        if (!empty($month)) $q .= " AND MONTH(a.report_date)='$month'";
        if (!empty($year)) $q .= " AND YEAR(a.report_date)='$year'";

        $res_q = $this->soadb->query($q);
        return $res_q;
    }

    public function materialTotal()
    {
        $area = $this->input->post('area_fil', true);
        $areas = $this->input->post('area_fills', true);
        $month = $this->input->post('month_fil', true);
        $year = $this->input->post('year_fil', true);

        if ($areas != null || $areas != "") {
            $idArea  = $this->soadb->get_where("admisecdrep_sub", ['code_sub' => $areas])->row();
            $area = $idArea->id;
        } else {
            $area = $area;
        }

        $whereWil = "";
        if (is_author('ALLAREA')) {
            $whereWil .= " AND wil_id='$this->wilayah'";
        }

        $q = "SELECT FORMAT(COALESCE(SUM(atm.document_in),0), 'N0') AS total
                FROM soa_bi.dbo.admisecdrep_transaction atr
                INNER JOIN soa_bi.dbo.admisecdrep_transaction_material atm ON atm.trans_id=atr.id
                INNER JOIN admisecdrep_sub as2 on as2.id  = atr.area_id 
            WHERE atr.disable=0 and atm.category_id in (12,1035,1036) and atr.status = 1 $whereWil ";

        if (!empty($year)) $q .= " AND YEAR(atr.report_date)='$year'";
        if (!empty($month)) $q .= " AND MONTH(atr.report_date)='$month'";
        if (!empty($area)) $q .= " AND atr.area_id='$area'";

        $res_q = $this->soadb->query($q);

        return $res_q;
    }

    public function peopleCategoryTotal()
    {
        $area = $this->input->post('area_fil', true);
        $month = $this->input->post('month_fil', true);
        $year = $this->input->post('year_fil', true);
        $whereWil = "";
        if (is_author('ALLAREA')) {
            $whereWil .= " AND tas.wil_id='$this->wilayah'";
        }
        $q = "SELECT tas.id, tas.title
                ,FORMAT(COALESCE(trx.total, 0), 'N0') AS total_kehadiran
                FROM soa_bi.dbo.admisecdrep_sub tas
                LEFT JOIN (
                    SELECT atp.people_id, atr.disable, SUM(atp.attendance) AS total
                        FROM soa_bi.dbo.admisecdrep_transaction atr
                        INNER JOIN soa_bi.dbo.admisecdrep_transaction_people atp ON atp.trans_id=atr.id WHERE atr.disable=0 and atr.status=1";

        if (!empty($area)) $q .= " AND atr.area_id='$area'";
        if (!empty($month)) $q .= " AND MONTH(atr.report_date)='$month'";
        if (!empty($year)) $q .= " AND YEAR(atr.report_date)='$year'";

        $q .= " GROUP BY atp.people_id, atr.disable
                ) AS trx ON trx.people_id=tas.id 
            WHERE tas.categ_id=2 AND tas.disable=0 $whereWil ORDER BY tas.id ASC ";

        $res_q = $this->soadb->query($q);

        return $res_q;
    }

    public function peopleCategoryDayTotal()
    {
        $month = $this->input->post('month_fil', true);
        $month = empty($month) ? date('m') : $month;
        $year = $this->input->post('year_fil', true);
        $year = empty($year) ? date('Y') : $year;
        $area = $this->input->post('area_fil', true);
        $whereArea = "";
        if ($area) {
            $whereArea .= 'AND trx.area_id  = ' . $area;
        }

        $whereWil = "";
        if (is_author('ALLAREA')) {
            $whereWil .= " AND trx.wil='$this->wilayah' ";
        }

        $kalendar = CAL_GREGORIAN;
        $days = cal_days_in_month($kalendar, $month, $year);
        $res_q = $this->soadb->query(";WITH days(DayNum) AS
        (
            SELECT 1
            UNION ALL
            SELECT DayNum+1 
                FROM days
            WHERE DayNum < '$days'
        )
        SELECT m.DayNum day_num ,tas.id AS people_categ ,tas.title  ,COALESCE(SUM(trx.total),0) total
            FROM days m
                INNER JOIN soa_bi.dbo.admisecdrep_sub tas ON tas.id in (7,8,9) 
                LEFT OUTER JOIN (
                    SELECT atp.people_id, atr.report_date, atr.disable, atr.area_id ,as2.wil_id as wil  , SUM(atp.attendance) AS total
                        FROM soa_bi.dbo.admisecdrep_transaction atr
                        INNER JOIN soa_bi.dbo.admisecdrep_transaction_people atp ON atp.trans_id=atr.id 
                        INNER JOIN soa_bi.dbo.admisecdrep_sub as2 ON as2.id  = atr.area_id 
                        WHERE atr.status = 1 
                    GROUP BY atp.people_id, atr.report_date, atr.disable , atr.area_id ,as2.wil_id 
                ) AS trx ON DAY(trx.report_date)=m.DayNum AND trx.people_id=tas.id AND YEAR(trx.report_date)='$year' 
                    AND MONTH(trx.report_date)='$month'
                    $whereArea
                    $whereWil 
            WHERE tas.disable=0  
            GROUP BY m.DayNum, tas.id ,tas.title
            ORDER BY tas.id ASC");

        return $res_q;
    }

    public function vehicleCategoryDayTotal()
    {
        $month = $this->input->post('month_fil', true);
        $month = empty($month) ? date('m') : $month;
        $year = $this->input->post('year_fil', true);
        $year = empty($year) ? date('Y') : $year;
        $area = $this->input->post('area_fil', true);
        $whereArea = "";
        if ($area) {
            $whereArea .= 'AND trx.area_id  = ' . $area;
        }

        $whereWil = "";
        if (is_author('ALLAREA')) {
            $whereWil .= " AND trx.wil='$this->wilayah' ";
        }

        $kalendar = CAL_GREGORIAN;
        $days = cal_days_in_month($kalendar, $month, $year);
        $q = "WITH days(DayNum) AS
        (
            SELECT 1
            UNION ALL
            SELECT DayNum+1 
                FROM days
            WHERE DayNum < '$days'
        )
        SELECT m.DayNum day_num ,tas.id AS vehicle_categ ,tas.title ,COALESCE(SUM(trx.total),0) total
        FROM days m
            INNER JOIN soa_bi.dbo.admisecdrep_sub tas ON tas.id in (1,2,3,1037) 
            LEFT OUTER JOIN (
                SELECT atp.type_id, atr.report_date, atr.disable, atr.area_id , as2.wil_id as wil ,  SUM(atp.amount) AS total
                    FROM soa_bi.dbo.admisecdrep_transaction atr
                    INNER JOIN soa_bi.dbo.admisecdrep_transaction_vehicle atp ON atp.trans_id=atr.id
                    INNER JOIN soa_bi.dbo.admisecdrep_sub as2 ON as2.id  = atr.area_id 
                    WHERE atr.status = 1 
                GROUP BY atp.type_id, atr.report_date, atr.disable , atr.area_id ,as2.wil_id 
            ) AS trx ON DAY(trx.report_date)=m.DayNum AND trx.type_id=tas.id AND YEAR(trx.report_date)='$year' 
                AND MONTH(trx.report_date)='$month'
                $whereArea
                $whereWil 
        WHERE tas.disable=0 
        GROUP BY m.DayNum, tas.id ,tas.title
        ORDER BY tas.id ASC";

        $res_q = $this->soadb->query($q);

        return $res_q;
    }


    public function documentCategoryDayTotal()
    {
        $month = $this->input->post('month_fil', true);
        $month = empty($month) ? date('m') : $month;
        $year = $this->input->post('year_fil', true);
        $year = empty($year) ? date('Y') : $year;
        $area = $this->input->post('area_fil', true);
        $whereArea = "";
        if ($area) {
            $whereArea .= 'AND trx.area_id  = ' . $area;
        }
        $whereWil = "";
        if (is_author('ALLAREA')) {
            $whereWil .= " AND trx.wil='$this->wilayah' ";
        }

        $kalendar = CAL_GREGORIAN;
        $days = cal_days_in_month($kalendar, $month, $year);
        $q = "WITH days(DayNum) AS
        (
            SELECT 1
            UNION ALL
            SELECT DayNum+1 
                FROM days
            WHERE DayNum < '$days'
        )
        SELECT m.DayNum day_num ,tas.id AS document_categ ,tas.title  ,COALESCE(SUM(trx.total),0) total
        FROM days m
            INNER JOIN soa_bi.dbo.admisecdrep_sub tas ON tas.id in (12,1036,1035) 
            LEFT OUTER JOIN (
                SELECT atp.category_id, atr.report_date, atr.disable,  atr.area_id, as2.wil_id as wil  , SUM(atp.document_in) AS total
                    FROM soa_bi.dbo.admisecdrep_transaction atr
                    INNER JOIN soa_bi.dbo.admisecdrep_transaction_material atp ON atp.trans_id=atr.id
                    INNER JOIN soa_bi.dbo.admisecdrep_sub as2 ON as2.id  = atr.area_id 
                    WHERE atr.status = 1 
                GROUP BY atp.category_id, atr.report_date, atr.disable , atr.area_id,as2.wil_id 
            ) AS trx ON DAY(trx.report_date)=m.DayNum AND trx.category_id=tas.id AND YEAR(trx.report_date)='$year' 
                AND MONTH(trx.report_date)='$month'
                $whereArea
                $whereWil
        WHERE tas.disable=0 
        GROUP BY m.DayNum, tas.id ,tas.title
        ORDER BY tas.id ASC";

        $res_q = $this->soadb->query($q);

        return $res_q;
    }



    public function pieVehicle($id)
    {
        $area = $this->input->post('area_fil', true);
        $month = $this->input->post('month_fil', true);
        $year = $this->input->post('year_fil', true);

        $whereWil = "";
        if (is_author('ALLAREA')) {
            $whereWil .= " AND as2.wil_id='$this->wilayah' ";
        }

        $q = "SELECT COALESCE(SUM(atv.amount),0) AS total
                FROM admisecdrep_transaction as a
                INNER JOIN admisecdrep_transaction_vehicle atv ON atv.trans_id=a.id 
                INNER JOIN admisecdrep_sub as2 ON as2.id  = a.area_id 
            WHERE a.disable=0 and atv.type_id = '$id' AND a.status = 1 $whereWil ";

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
        $whereWil = "";
        if (is_author('ALLAREA')) {
            $whereWil .= " AND as2.wil_id='$this->wilayah' ";
        }
        $q = "SELECT tas.id, tas.title
                ,COALESCE(trx.total, 0) AS total_kehadiran
                FROM soa_bi.dbo.admisecdrep_sub tas
                LEFT JOIN (
                    SELECT atp.people_id, atr.disable, SUM(atp.attendance) AS total
                        FROM soa_bi.dbo.admisecdrep_transaction atr
                        INNER JOIN soa_bi.dbo.admisecdrep_transaction_people atp ON atp.trans_id=atr.id 
                        INNER JOIN admisecdrep_sub as2 ON as2.id  = atr.area_id 
                        WHERE atr.disable=0  and atr.status = 1 $whereWil ";

        if (!empty($area)) $q .= " AND atr.area_id='$area'";
        if (!empty($month)) $q .= " AND MONTH(atr.report_date)='$month'";
        if (!empty($year)) $q .= " AND YEAR(atr.report_date)='$year'";

        $q .= " GROUP BY atp.people_id, atr.disable
                ) AS trx ON trx.people_id=tas.id 
            WHERE tas.id in(7,8,9) AND tas.disable=0 ORDER BY tas.id ASC";

        $res_q = $this->soadb->query($q);

        return $res_q;
    }

    public function pieMaterial()
    {
        $area = $this->input->post('area_fil', true);
        $month = $this->input->post('month_fil', true);
        $year = $this->input->post('year_fil', true);
        $whereWil = "";
        if (is_author('ALLAREA')) {
            $whereWil .= " AND as2.wil_id='$this->wilayah' ";
        }

        $q = "SELECT tas.id, tas.title
                ,COALESCE(trx.total, 0) AS total
                FROM soa_bi.dbo.admisecdrep_sub tas
                LEFT JOIN (
                    SELECT atp.category_id, atr.disable, SUM(atp.document_in) AS total
                        FROM soa_bi.dbo.admisecdrep_transaction atr
                        INNER JOIN soa_bi.dbo.admisecdrep_transaction_material atp ON atp.trans_id=atr.id 
                        INNER JOIN admisecdrep_sub as2 ON as2.id  = atr.area_id 
                        WHERE atr.disable=0 and atr.status = 1 $whereWil";

        if (!empty($area)) $q .= " AND atr.area_id='$area'";
        if (!empty($month)) $q .= " AND MONTH(atr.report_date)='$month'";
        if (!empty($year)) $q .= " AND YEAR(atr.report_date)='$year'";

        $q .= " GROUP BY atp.category_id, atr.disable
                ) AS trx ON trx.category_id=tas.id 
            WHERE tas.id in(1035,1036,12) AND tas.disable=0 ORDER BY tas.id ASC";

        $res_q = $this->soadb->query($q);

        return $res_q;
    }


    // data setahun
    public function peopleSetahun()
    {
        $year = $this->input->post("year") == null ? date('Y') : $this->input->post("year");
        $area = $this->input->post("plant");
        $area_kode = $this->input->post("area_fill");
        $wherePlant = "";
        if ($area != "" || $area != null) {
            $wherePlant .= " AND a.area_id='$area'";
        } else if ($area_kode != "" || $area_kode != null) {
            $idArea  = $this->soadb->get_where("admisecdrep_sub", ['code_sub' => $area_kode])->row();
            $wherePlant .= " AND a.area_id='$idArea->id'";
        }

        $whereWil = "";
        if (is_author('ALLAREA')) {
            $whereWil .= " AND as2.wil_id='$this->wilayah' ";
        }

        $res = $this->soadb->query(";WITH months(MonthNumber) AS
        (
            SELECT 1
            UNION ALL
            SELECT MonthNumber+1 
            FROM months
            WHERE MonthNumber < 12
        )
        select
        (
          SELECT COALESCE(SUM(b.attendance),0) AS total_people
                FROM soa_bi.dbo.admisecdrep_transaction as a
                INNER JOIN soa_bi.dbo.admisecdrep_transaction_people b ON b.trans_id=a.id and 
                b.people_id in (7,8,9)
                INNER JOIN soa_bi.dbo.admisecdrep_sub as2 ON as2.id  = a.area_id 
                WHERE a.disable=0
                AND MONTH(a.report_date)= MonthNumber
                AND YEAR(a.report_date)='$year'
                AND a.status = 1
                $wherePlant
                $whereWil
        )as total 
        from months;");
        $data = array();

        foreach ($res->result() as $r) {
            $data[] = $r->total;
        }
        return $data;
    }


    public function materialSetahun()
    {
        $year = $this->input->post("year") == null ? date('Y') : $this->input->post("year");
        $area = $this->input->post("plant");
        $area_kode = $this->input->post("area_fill");
        $wherePlant = "";
        if ($area) {
            $wherePlant .= " AND atr.area_id='$area'";
        } else if ($area_kode) {
            $idArea  = $this->soadb->query("SELECT id , code_sub FROM admisecdrep_sub WHERE code_sub = '" . $area_kode . "' ")->row();
            $wherePlant .= "AND atr.area_id='$idArea->id'";
        }

        $whereWil = "";
        if (is_author('ALLAREA')) {
            $whereWil .= " AND as2.wil_id='$this->wilayah' ";
        }

        $res = $this->soadb->query(";WITH months(MonthNumber) AS
        (
            SELECT 1
            UNION ALL
            SELECT MonthNumber+1 
            FROM months
            WHERE MonthNumber < 12
        )
        select MonthNumber  as bulan  ,
        (
          SELECT COALESCE(SUM(atm.document_in),0) AS total
                    FROM soa_bi.dbo.admisecdrep_transaction atr
                    LEFT JOIN soa_bi.dbo.admisecdrep_transaction_material atm ON atm.trans_id=atr.id
                    INNER JOIN soa_bi.dbo.admisecdrep_sub as2 ON as2.id  = atr.area_id 
                WHERE atr.disable=0 and atm.category_id in (12,1035,1036)
                AND MONTH(atr.report_date)= MonthNumber
                AND atr.status = 1
                AND YEAR(atr.report_date)='$year'
                $wherePlant 
                $whereWil
        )as total 
        from months; ");
        $data = array();

        foreach ($res->result() as $r) {
            $data[] = $r->total;
        }
        return $data;
    }

    public function vehicleSetahun()
    {
        $year = $this->input->post("year") == null ? date('Y') : $this->input->post("year");
        $area = $this->input->post("plant");
        $area_kode = $this->input->post("area_fill");
        $wherePlant = "";
        if ($area) {
            $wherePlant .= " AND a.area_id='$area'";
        } else if ($area_kode) {
            $idArea  = $this->soadb->get_where("admisecdrep_sub", ['code_sub' => $area_kode])->row();
            $wherePlant .= " AND a.area_id='$idArea->id'";
        }
        $whereWil = "";
        if (is_author('ALLAREA')) {
            $whereWil .= " AND as2.wil_id='$this->wilayah' ";
        }

        $res = $this->soadb->query(";WITH months(MonthNumber) AS
        (
            SELECT 1
            UNION ALL
            SELECT MonthNumber+1 
            FROM months
            WHERE MonthNumber < 12
        )
        select MonthNumber  as bulan  ,
        (
          SELECT COALESCE(SUM(atv.amount),0) AS total
                        FROM soa_bi.dbo.admisecdrep_transaction as a
                        INNER JOIN soa_bi.dbo.admisecdrep_transaction_vehicle atv ON atv.trans_id=a.id 
                        INNER JOIN soa_bi.dbo.admisecdrep_sub as2 ON as2.id  = a.area_id 
                    WHERE a.disable=0 and atv.type_id in (1,2,3,1037)
                AND MONTH(a.report_date)= MonthNumber
                AND a.status = 1
                AND YEAR(a.report_date)='$year'
                $wherePlant
                $whereWil
        )as total 
        from months; ");
        $data = array();

        foreach ($res->result() as $r) {
            $data[] = $r->total;
        }
        return $data;
    }
}
