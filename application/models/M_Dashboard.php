<?php


class M_Dashboard extends CI_Model
{

    public function getPlant()
    {
        $res = $this->db->query("SELECT plant_id , plant_name FROM admisecsgp_mstplant
         order by plant_name ASC ")->result();
        return $res;
    }

    public function getPerPlant($id)
    {
        $res = $this->db->query("SELECT plant_id , plant_name FROM admisecsgp_mstplant
        WHERE plant_id='" . $id . "'
         order by plant_name ASC ")->result();
        return $res;
    }

    public function trenPatroliBulanan($year, $plant)
    {
        $res = array();
        for ($i = 1; $i <= 12; $i++) {
            $query = $this->trendPatrolSetahun($year, $i, $plant);
            $data = array();
            foreach ($query as $key => $item) {
                $data[] = $item->counting_patrol;
            }
            $res[] = array_sum($data);
        }
        // echo json_encode($res, true);
        return $res;
    }

    // performance patroli
    public function performancePatroliPerPlant($year, $plant)
    {
        $result = array();
        for ($i = 1; $i <= 12; $i++) {
            $hariPembagi = cal_days_in_month(CAL_GREGORIAN, $i, $year);
            $pembagi = 3 * $hariPembagi;
            $res = $this->trendPatrolSetahun($year, $i, $plant);
            $data = array();
            foreach ($res as $r) {
                $data[] =  round($r->terpatroli / $r->plant_patroli, 1) * 100;
            };
            $result[] = round(array_sum($data)  / $pembagi);
        }
        return $result;
    }

    public function performancePatroliAllPlant($year, $plant)
    {
        $all = count($this->getPlant());
        $result = array();
        for ($i = 1; $i <= 12; $i++) {
            $hariPembagi = cal_days_in_month(CAL_GREGORIAN, $i, $year);
            $pembagi = 3 * $hariPembagi;
            $res = $this->trendPatrolSetahun($year, $i, $plant);
            $data = array();
            foreach ($res as $r) {
                $data[] =  round($r->terpatroli / $r->plant_patroli, 1) * 100;
            };
            $result[] = round(array_sum($data)  / $pembagi / $all);
        }
        return $result;
    }

    public function getPerformancePatroliHarianAllPlant($year, $month, $plant)
    {
        $totalHari = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $data = array();
        for ($i = 1; $i <= $totalHari; $i++) {
            $res = $this->perFormaPatroliHarian($year, $month, $plant, $i, 0);
            array_push($data, $res);
        }

        $result = array();
        for ($i = 0; $i < count($data); $i++) {
            $result[] = round($data[$i] / 3, 0);
        }
        return $result;
    }


    public function trendPatrolSetahun($year, $month, $plant)
    {
        $where = "";
        if ($plant == "") {
            $where .= "month(ath.date_patroli)='" . $month . "'
                and year(ath.date_patroli )='" . $year . "' ";
        } else {
            $where .=  "a.plant_name = '" . $plant . "' and  month(ath.date_patroli)='" . $month . "'
                and year(ath.date_patroli )='" . $year . "' ";
        }

        $result =  $this->db->query("SELECT ath.date_patroli , count(1) as terpatroli   ,
        (SELECT  COUNT(1)
            from admisecsgp_trans_zona_patroli zp
            inner join admisecsgp_mstckp ckp on ckp.admisecsgp_mstzone_zone_id  = zp.admisecsgp_mstzone_zone_id 
            where 
            zp.status_zona  = 1 
            and zp.date_patroli  = ath.date_patroli 
            and zp.admisecsgp_mstshift_shift_id = ath.admisecsgp_mstshift_shift_id 
            and zp.admisecsgp_mstplant_plant_id = a.plant_id 
            )as plant_patroli ,
        IIF( (SELECT  COUNT(1)
        from admisecsgp_trans_zona_patroli zp
        inner join admisecsgp_mstckp ckp on ckp.admisecsgp_mstzone_zone_id  = zp.admisecsgp_mstzone_zone_id 
        where 
        zp.status_zona  = 1 
        and zp.date_patroli  = ath.date_patroli 
        and zp.admisecsgp_mstshift_shift_id = ath.admisecsgp_mstshift_shift_id 
        and zp.admisecsgp_mstplant_plant_id = a.plant_id 
        )  != count(1)  ,0,1) as counting_patrol
            from admisecsgp_trans_headers ath
            join admisecsgp_mstzone am on ath.admisecsgp_mstzone_zone_id = am.zone_id
            join admisecsgp_mstplant a on am.admisecsgp_mstplant_plant_id = a.plant_id
        where $where and ath.type_patrol=0
        group by ath.admisecsgp_mstshift_shift_id  ,ath.date_patroli , a.plant_id, a.plant_name 
        order by ath.date_patroli  asc")->result();
        return $result;
    }

    public function getTrendPatroliHarian($year, $month, $plant)
    {
        $totalHari = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $data = array();

        for ($i = 1; $i <= $totalHari; $i++) {
            $res = $this->trendPatroliHarian($year, $month, $plant, $i, 0);
            array_push($data, $res);
        }
        return $data;
    }

    public function trendPatroliHarian($year, $month, $plant, $day, $type)
    {
        $query = $this->db->query("SELECT ath.date_patroli  , a.plant_name  , count(1) as terpatroli   ,
        (SELECT  COUNT(1)
        from admisecsgp_trans_zona_patroli zp
        inner join admisecsgp_mstckp ckp on ckp.admisecsgp_mstzone_zone_id  = zp.admisecsgp_mstzone_zone_id 
        where 
        zp.status_zona  = 1 
        and zp.date_patroli  = ath.date_patroli 
        and zp.admisecsgp_mstshift_shift_id = ath.admisecsgp_mstshift_shift_id 
        and zp.admisecsgp_mstplant_plant_id = a.plant_id 
        )as plant_patroli ,
        IIF( (SELECT  COUNT(1)
        from admisecsgp_trans_zona_patroli zp
        inner join admisecsgp_mstckp ckp on ckp.admisecsgp_mstzone_zone_id  = zp.admisecsgp_mstzone_zone_id 
        where 
        zp.status_zona  = 1 
        and zp.date_patroli  = ath.date_patroli 
        and zp.admisecsgp_mstshift_shift_id = ath.admisecsgp_mstshift_shift_id 
        and zp.admisecsgp_mstplant_plant_id = a.plant_id 
        )  != count(1)  ,0,1) as counting_patrol
            from admisecsgp_trans_headers ath
            join admisecsgp_mstzone am on ath.admisecsgp_mstzone_zone_id = am.zone_id
            join admisecsgp_mstplant a on am.admisecsgp_mstplant_plant_id = a.plant_id
        where ath.type_patrol=$type and a.plant_name = '" . $plant . "' and DAY(ath.date_patroli)= '" . $day . "'  and  month(ath.date_patroli)='" . $month . "'
            and year(ath.date_patroli )='" . $year . "' 
        group by ath.admisecsgp_mstshift_shift_id  ,ath.date_patroli , a.plant_id, a.plant_name 
        order by ath.date_patroli  asc  ");

        $data = array();
        foreach ($query->result() as $d) {
            $data[] = $d->counting_patrol;
        }

        return array_sum($data);
    }

    public function perFormaPatroliHarian($year, $month, $plant, $day, $type)
    {
        $query = $this->db->query("SELECT ath.date_patroli  , a.plant_name  , count(1) as terpatroli   ,
        (SELECT  COUNT(1)
        from admisecsgp_trans_zona_patroli zp
        inner join admisecsgp_mstckp ckp on ckp.admisecsgp_mstzone_zone_id  = zp.admisecsgp_mstzone_zone_id 
        where 
        zp.status_zona  = 1 
        and zp.date_patroli  = ath.date_patroli 
        and zp.admisecsgp_mstshift_shift_id = ath.admisecsgp_mstshift_shift_id 
        and zp.admisecsgp_mstplant_plant_id = a.plant_id 
        )as plant_patroli ,
        IIF( (SELECT  COUNT(1)
        from admisecsgp_trans_zona_patroli zp
        inner join admisecsgp_mstckp ckp on ckp.admisecsgp_mstzone_zone_id  = zp.admisecsgp_mstzone_zone_id 
        where 
        zp.status_zona  = 1 
        and zp.date_patroli  = ath.date_patroli 
        and zp.admisecsgp_mstshift_shift_id = ath.admisecsgp_mstshift_shift_id 
        and zp.admisecsgp_mstplant_plant_id = a.plant_id 
        )  != count(1)  ,0,1) as counting_patrol
            from admisecsgp_trans_headers ath
            join admisecsgp_mstzone am on ath.admisecsgp_mstzone_zone_id = am.zone_id
            join admisecsgp_mstplant a on am.admisecsgp_mstplant_plant_id = a.plant_id
        where ath.type_patrol=$type and a.plant_name = '" . $plant . "' and DAY(ath.date_patroli)= '" . $day . "'  and  month(ath.date_patroli)='" . $month . "'
            and year(ath.date_patroli )='" . $year . "' 
        group by ath.admisecsgp_mstshift_shift_id  ,ath.date_patroli , a.plant_id, a.plant_name 
        order by ath.date_patroli  asc  ");

        $data = array();
        foreach ($query->result() as $d) {
            $data[] = ($d->terpatroli / $d->plant_patroli) * 100;
        }
        return array_sum($data);
        // return $data;
    }


    public function getTemuanPatroliAll($year)
    {
        $data = array();
        for ($i = 1; $i <= 12; $i++) {
            $query = $this->queryTemuanAll($year, $i);
            $data[] = $query->num_rows();
        }
        return $data;
    }

    private function queryTemuanAll($year, $month)
    {
        $query =   $this->db->query("SELECT  ath.date_patroli , pl.plant_name , atd.status_temuan  , atd.description 
        from admisecsgp_trans_details atd 
        inner join admisecsgp_trans_headers ath on ath.trans_header_id  = atd.admisecsgp_trans_headers_trans_headers_id 
        inner join admisecsgp_mstzone zn on ath.admisecsgp_mstzone_zone_id = zn.zone_id 
        inner join admisecsgp_mstplant pl on pl.plant_id  = zn.admisecsgp_mstplant_plant_id 
        where  
        MONTH(ath.date_patroli) = $month and YEAR (ath.date_patroli)= $year and atd.status_temuan  = 0 
        group by ath.date_patroli , pl.plant_name  ,  atd.status_temuan , atd.description 
        order by ath.date_patroli");
        return $query;
    }


    public function getTemuanPerRegu($year, $month, $rg)
    {
        $res = $this->queryTemuanRegu($year, $month, $rg)->result();
        $result = array();
        foreach ($res as $q) {
            $result[] = $q->total;
        }
        return $result;
    }

    public function queryTemuanRegu($year, $month, $regu)
    {
        $query = $this->db->query("SELECT usr.patrol_group , pl.plant_name ,
        (select count(1) FROM admisecsgp_trans_details atd
        inner join admisecsgp_trans_headers ath ON ath.trans_header_id = atd.admisecsgp_trans_headers_trans_headers_id
        WHERE MONTH(ath.date_patroli) = $month and YEAR(ath.date_patroli) = $year
        and atd.created_by  = usr.npk and atd.status_temuan  = 0 
        )as total
        FROM 
        admisecsgp_mstusr usr 
        inner join admisecsgp_mstplant pl ON pl.plant_id  = usr.admisecsgp_mstplant_plant_id 
        inner join admisecsgp_mstroleusr rl ON rl.role_id  = usr.admisecsgp_mstroleusr_role_id 
        where rl.[level]  = 'Security'   and usr.status  = 1 and usr.patrol_group = '" . $regu . "'
        group by usr.npk , usr.patrol_group  , pl.plant_name
        order by pl.plant_name 
        ");
        return $query;
    }
}
