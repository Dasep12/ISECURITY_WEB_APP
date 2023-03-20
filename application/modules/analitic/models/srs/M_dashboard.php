<?php

class M_dashboard extends CI_Model
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
        $q = "SELECT id, title 
                    FROM admiseciso_area_sub 
                WHERE area_categ_id='1' AND status=1";
        
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

        $q .= " ORDER BY title ASC";

        $res_q = $this->srsdb->query($q);

        return $res_q;
    }

    public function risk_source()
    {
        $q = "
            SELECT rso.title
                FROM dbo.admiseciso_risksource_sub rso
            WHERE rso.risksource_categ_id=1
            ORDER BY rso.title ASC
            ";

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function risk()
    {
        $q = "
            SELECT ris.title
                from dbo.admiseciso_risk_sub ris
                where ris.risk_categ_id=1
             ORDER BY ris.title ASC
            ";

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function target_assets()
    {
        $q = "
            SELECT aas.title
                FROM dbo.admiseciso_assets_sub aas
                WHERE aas.assets_categ_id=1
            ORDER BY aas.title ASC
            ";

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_srs()
    {
        $area = $this->input->post('area_fil', true);
        $year = $this->input->post('year_fil', true);
        $year = empty($year) ? date('Y') : $year;
        $month = $this->input->post('month_fil', true);
        
        // if(!empty($month))
        // {
            $q = "SELECT FORMAT((max(arl.[level]) * 0.2) + (max(iml.impact_level) * 0.8),'N2') max_iso
                    from dbo.admiseciso_transaction tio
                    inner join srs_bi.dbo.admiseciso_risk_level arl ON arl.id=tio.risk_level_id 
                    inner join (
                        select siml.area_id, siml.impact_level ,siml.status ,siml.disable ,siml.event_date
                            from dbo.admiseciso_transaction siml
                        group by siml.area_id, siml.impact_level ,siml.status ,siml.disable ,siml.event_date
                    ) iml on iml.area_id=tio.area_id and iml.status=tio.status AND iml.disable=tio.disable AND iml.event_date=tio.event_date 
                WHERE tio.disable=0 AND tio.status=1
                ";
        // }
        // else
        // {
        //     $q = "SELECT FORMAT((avg(tio.risk_level_id) * 0.2) + (avg(iml.impact_level) * 0.8),'N2') max_iso
        //             from dbo.admiseciso_transaction tio
        //             inner join (
        //                 select siml.area_id, siml.impact_level
        //                     from dbo.admiseciso_transaction siml
        //                     where siml.disable=0 and siml.status=1
        //                 group by siml.area_id, siml.impact_level
        //             ) iml on iml.area_id=tio.area_id
        //         WHERE tio.disable=0 AND tio.status=1
        //         ";
        // }

        if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
        if(!empty($area)) $q .= " tio.area_id=$area ";
        if(!empty($area) && !empty($year)) $q .= ' AND ';
        if(!empty($year)) $q .= " year(tio.event_date)=$year ";
        if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
        if(!empty($month)) $q .= " month(tio.event_date)=$month ";

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_soi()
    {
        $area = $this->input->post('area_fil', true);
        $year = $this->input->post('year_fil', true);
        $year = empty($year) ? date('Y') : $year;
        $month = $this->input->post('month_fil', true);

        $q = "SELECT FORMAT(ISNULL( ( AVG(soi.people) + AVG(soi.device) + AVG(soi.[system]) +
                + AVG(soi.network) ) / 4 , 0 ), 'N2') avg_soi
                FROM dbo.admisecsoi_transaction soi
            WHERE soi.disable=0 and soi.status=1
            ";
        if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
        if(!empty($area)) $q .= " soi.area_id=$area ";
        if(!empty($area) && !empty($year)) $q .= ' AND ';
        if(!empty($year)) $q .= " soi.year='$year' ";
        if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
        if(!empty($month)) $q .= " soi.month='$month' ";

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_soi_avg_month()
    {
        $area = $this->input->post('area_fil', true);
        $year = $this->input->post('year_fil', true);
        $year = empty($year) ? date('Y') : $year;
        $month = $this->input->post('month_fil', true);
        $label = $this->input->post('label_fil', true);

        $q = "
            WITH months(MonthNum) AS
            (
                SELECT 1
                UNION ALL
                SELECT MonthNum+1 
                    FROM months
                WHERE MonthNum < 12
            )
            SELECT m.MonthNum month_num, ISNULL(FORMAT(AVG(tra.avg_system),'N2'),0) avg_system 
                    ,ISNULL(FORMAT(AVG(tra.avg_people),'N2'),0) avg_people ,ISNULL(FORMAT(AVG(tra.avg_device),'N2'),0) avg_device 
                    ,ISNULL(FORMAT(AVG(tra.avg_network),'N2'),0) avg_network
                FROM months m
                LEFT OUTER JOIN (
                    select str.[month] ,str.[year] ,str.area_id ,AVG(str.system) avg_system ,AVG(str.people) avg_people
                            ,AVG(str.device) avg_device ,AVG(str.network) avg_network
                        FROM srs_bi.dbo.admisecsoi_transaction str
                        where str.disable=0 and str.status=1
                    group by str.[month] ,str.[year] ,str.area_id
                ) AS tra ON tra.[month]=m.MonthNum";
                if(!empty($area) || !empty($year)) $q .= ' AND ';
                if(!empty($area)) $q .= " tra.area_id=$area ";
                if(!empty($area) && !empty($year)) $q .= ' AND ';
                if(!empty($year)) $q .= " tra.year=$year ";
        $q .= " GROUP BY m.MonthNum ";

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_soi_avgpilar()
    {
        if($this->input->post())
        {
            $year = $this->input->post('year_fil', true);
            $month = $this->input->post('month_fil', true);

            $q = "
                SELECT FORMAT(ISNULL(AVG(stis.people), 0), 'N2') avg_people ,FORMAT(ISNULL(AVG(stis.[system]), 0), 'N2') avg_system
                    ,FORMAT(ISNULL(AVG(stis.[device]), 0), 'N2') avg_device, FORMAT(ISNULL(AVG(stis.[network]), 0), 'N2') avg_network
                    FROM srs_bi.dbo.admisecsoi_transaction stis 
                WHERE stis.disable=0 AND stis.status=1";
                if(!empty($year) || !empty($month)) $q .= ' AND ';
                if(!empty($year)) $q .= " stis.[year]=$year ";
                if(!empty($year) && !empty($month)) $q .= ' AND ';
                if(!empty($month)) $q .= " stis.[month]=$month ";
        }
        else
        {
            $year_now = date('Y');

            $q = "
                SELECT FORMAT(ISNULL(AVG(stis.people), 0), 'N2') avg_people ,FORMAT(ISNULL(AVG(stis.[system]), 0), 'N2') avg_system
                    ,FORMAT(ISNULL(AVG(stis.[device]), 0), 'N2') avg_device, FORMAT(ISNULL(AVG(stis.[network]), 0), 'N2') avg_network
                    FROM srs_bi.dbo.admisecsoi_transaction stis 
                WHERE stis.disable=0 AND stis.status=1 and stis.[year]='$year_now'
            ";
        }

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_soi_avg_montharea()
    {
        $year = $this->input->post('year_fil', true);
        $year = empty($year) ? date('Y') : $year;
        // $year = 2022;

        $q = "
            WITH months(MonthNum) AS
            (
                SELECT 1
                UNION ALL
                SELECT MonthNum+1 
                    FROM months
                WHERE MonthNum < 12
            )
            SELECT 
                    -- m.MonthNum month_num,
                    ara.title label ,FORMAT(ISNULL(avg(sotr.total), 0 ), 'N2') data
                FROM months m
                INNER JOIN (
                    select aas.area_categ_id ,aas.id ,aas.title
                        from srs_bi.dbo.admiseciso_area_sub aas
                    group by aas.area_categ_id ,aas.title ,aas.id 
                ) AS ara ON ara.area_categ_id=1
                LEFT JOIN (
                    select sotr.[year] ,sotr.[month] ,sotr.area_id, ( AVG(sotr.people) + AVG(sotr.device) 
                            + AVG(sotr.[system]) + AVG(sotr.network) ) / 4 total
                        from srs_bi.dbo.admisecsoi_transaction sotr
                    group by sotr.[year] ,sotr.[month] ,sotr.area_id
                ) sotr ON sotr.year=$year AND sotr.area_id=ara.id AND sotr.[month]=m.MonthNum GROUP BY m.MonthNum ,ara.title ,ara.id ORDER BY m.MonthNum ASC";

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_risk_source()
    {
        if($this->input->post())
        {
            $area = $this->input->post('area_fil', true);
            $year = $this->input->post('year_fil', true);
            $month = $this->input->post('month_fil', true);

            $q = "
                SELECT rso.title, ISNULL(tis.total, 0) total
                    FROM dbo.admiseciso_risksource_sub rso
                    left join ( 
                        select count(1) total, stis.risk_source_id
                            from dbo.admiseciso_transaction stis WHERE stis.status=1 and stis.disable=0";
                            if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
                            if(!empty($area)) $q .= " stis.area_id=$area ";
                            if(!empty($area) && !empty($year)) $q .= ' AND ';
                            if(!empty($year)) $q .= " year(stis.event_date)=$year ";
                            if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                            if(!empty($month)) $q .= " month(stis.event_date)=$month ";
                        $q .= " group by stis.risk_source_id
                    ) tis on tis.risk_source_id=rso.id 
                WHERE rso.risksource_categ_id=1
                ORDER BY rso.title ASC
                ";
        }
        else
        {
            $year_now = date('Y');

            $q = "
                SELECT ISNULL(tis.total, 0) total
                    FROM dbo.admiseciso_risksource_sub rso
                    left join ( 
                        select count(1) total, stis.risk_source_id
                            from dbo.admiseciso_transaction stis
                            where year(stis.event_date)='$year_now' AND stis.status=1 and stis.disable=0
                        group by stis.risk_source_id
                    ) tis on tis.risk_source_id=rso.id 
                WHERE rso.risksource_categ_id=1
                ORDER BY rso.title ASC
                ";
        }

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_risk()
    {
        if($this->input->post())
        {
            $area = $this->input->post('area_fil', true);
            $year = $this->input->post('year_fil', true);
            $month = $this->input->post('month_fil', true);

            $q = "
                SELECT TOP 10 ris.title, ISNULL(tis.total, 0) total
                    FROM dbo.admiseciso_risk_sub ris
                    LEFT JOIN ( 
                        select count(1) total, stis.risk_id
                            from dbo.admiseciso_transaction stis where stis.status=1 and stis.disable=0";
                            if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
                            if(!empty($area)) $q .= " stis.area_id=$area ";
                            if(!empty($area) && !empty($year)) $q .= ' AND ';
                            if(!empty($year)) $q .= " year(stis.event_date)=$year ";
                            if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                            if(!empty($month)) $q .= " month(stis.event_date)=$month ";
                        $q .= " group by stis.risk_id
                    ) tis on tis.risk_id=ris.id 
                WHERE ris.risk_categ_id=1 AND ris.status=1
                ORDER BY tis.total DESC
                ";

        }
        else
        {
            $year_now = date('Y');

            $q = "
                SELECT TOP 10 ris.title, ISNULL(tis.total, 0) total
                    FROM dbo.admiseciso_risk_sub ris
                    LEFT JOIN ( 
                        select count(1) total, stis.risk_id
                            from dbo.admiseciso_transaction stis 
                        WHERE year(stis.event_date)='$year_now' and stis.status=1 and stis.disable=0
                        GROUP BY stis.risk_id
                    ) tis on tis.risk_id=ris.id 
                WHERE ris.risk_categ_id=1 AND ris.status=1
                ORDER BY tis.total DESC
            ";
        }

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_target_assets()
    {
        if($this->input->post())
        {
            $area = $this->input->post('area_fil', true);
            $year = $this->input->post('year_fil', true);
            $month = $this->input->post('month_fil', true);

            $q = "
                SELECT ISNULL(tis.total, 0) total
                    FROM dbo.admiseciso_assets_sub ass
                    LEFT JOIN ( 
                        select count(1) total, stis.assets_id
                            from dbo.admiseciso_transaction stis where stis.disable=0 and stis.status=1";
                            if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
                            if(!empty($area)) $q .= " stis.area_id=$area ";
                            if(!empty($area) && !empty($year)) $q .= ' AND ';
                            if(!empty($year)) $q .= " year(stis.event_date)=$year ";
                            if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                            if(!empty($month)) $q .= " month(stis.event_date)=$month ";
                        $q .= " group by stis.assets_id
                    ) tis on tis.assets_id=ass.id 
                WHERE ass.assets_categ_id=1
                ORDER BY ass.title ASC
                ";

        }
        else
        {
            $year_now = date('Y');

            $q = "
                SELECT ISNULL(tis.total, 0) total
                    FROM dbo.admiseciso_assets_sub ass
                    LEFT JOIN ( 
                        select count(1) total, stis.assets_id
                            from dbo.admiseciso_transaction stis
                            where year(stis.event_date)='$year_now' and stis.disable=0 and stis.status=1
                        group by stis.assets_id 
                    ) tis on tis.assets_id=ass.id 
                WHERE ass.assets_categ_id=1
                ORDER BY ass.title ASC
            ";
        }

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_trans_month()
    {
        if($this->input->post())
        {
            $area = $this->input->post('area_fil', true);
            $year = $this->input->post('year_fil', true);
            $month = $this->input->post('month_fil', true);

            $q = "
                WITH months(MonthNum) AS
                (
                    SELECT 1
                    UNION ALL
                    SELECT MonthNum+1 
                        FROM months
                    WHERE MonthNum < 12
                )
                SELECT m.MonthNum month_num, count(t.id) total
                    FROM months m
                    LEFT OUTER JOIN dbo.admiseciso_transaction AS t ON MONTH(t.event_date)=m.MonthNum AND t.disable=0 AND t.status=1";
                    if(!empty($area) || !empty($year)) $q .= ' AND ';
                    if(!empty($area)) $q .= " t.area_id=$area ";
                    if(!empty($area) && !empty($year)) $q .= ' AND ';
                    if(!empty($year)) $q .= " year(t.event_date)=$year ";
            $q .= " GROUP BY m.MonthNum ";
        }
        else
        {
            $year_now = date('Y');

            $q = "
                WITH months(MonthNum) AS
                (
                    SELECT 1
                    UNION ALL
                    SELECT MonthNum+1 
                        FROM months
                    WHERE MonthNum < 12
                )
                SELECT m.MonthNum month_num, count(t.id) total
                    FROM months m
                LEFT OUTER JOIN dbo.admiseciso_transaction AS t ON MONTH(t.event_date)=m.MonthNum AND YEAR(t.event_date)='$year_now' AND t.disable=0 AND t.status=1
                GROUP BY m.MonthNum
            ";
        }

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_trans_area()
    {
        if($this->input->post())
        {
            $year = $this->input->post('year_fil', true);
            $month = $this->input->post('month_fil', true);

            $q = "
                SELECT aar.title, ISNULL(tis.total, 0) total
                    FROM dbo.admiseciso_area_sub aar
                    LEFT JOIN ( 
                        select count(1) total, stis.area_id
                            from dbo.admiseciso_transaction stis where stis.disable=0 AND stis.status=1";
                            if(!empty($year) || !empty($month)) $q .= ' AND ';
                            if(!empty($year)) $q .= " year(stis.event_date)=$year ";
                            if(!empty($year) && !empty($month)) $q .= ' AND ';
                            if(!empty($month)) $q .= " month(stis.event_date)=$month ";
                        $q .= " group by stis.area_id
                    ) tis on tis.area_id=aar.id 
                WHERE aar.area_categ_id=1
                ORDER BY aar.title ASC";

        }
        else
        {
            $year_now = date('Y');

            $q = "
                SELECT aar.title, ISNULL(tis.total, 0) total
                FROM dbo.admiseciso_area_sub aar
                LEFT JOIN ( 
                    select count(1) total, stis.area_id 
                        from dbo.admiseciso_transaction stis
                        where year(stis.event_date)='$year_now' AND stis.disable=0 AND stis.status=1
                    group by stis.area_id
                ) tis ON tis.area_id=aar.id 
             WHERE aar.area_categ_id=1
             ORDER BY aar.title ASC
            ";
        }

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_trans()
    {
        if($this->input->post())
        {
            $area = $this->input->post('area_fil', true);
            $year = $this->input->post('year_fil', true);
            $month = $this->input->post('month_fil', true);

            $q = "
                SELECT count(1) total
                    FROM dbo.admiseciso_transaction tis WHERE tis.disable=0 AND tis.status=1";
                if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
                if(!empty($area)) $q .= " tis.area_id=$area ";
                if(!empty($area) && !empty($year)) $q .= ' AND ';
                if(!empty($year)) $q .= " year(tis.event_date)=$year ";
                if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                if(!empty($month)) $q .= " month(tis.event_date)=$month ";

        }
        else
        {
            $year_now = date('Y');

            $q = "
                SELECT count(1) total
                    FROM dbo.admiseciso_transaction tis
                WHERE year(tis.event_date)='$year_now' AND tis.status=1
            ";
        }

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_risk_avg()
    {
        if($this->input->post())
        {
            $area = $this->input->post('area_fil', true);
            $year = $this->input->post('year_fil', true);
            $month = $this->input->post('month_fil', true);

            $q = "
                SELECT TOP 10 ris.title, ISNULL(tis.average, 0) avg_impact
                    FROM dbo.admiseciso_risk_sub ris
                    LEFT JOIN ( 
                        select AVG(stis.impact_level) average, stis.risk_id
                            from dbo.admiseciso_transaction stis where stis.disable=0 AND stis.status=1";
                            if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
                            if(!empty($area)) $q .= " stis.area_id=$area ";
                            if(!empty($area) && !empty($year)) $q .= ' AND ';
                            if(!empty($year)) $q .= " year(stis.event_date)=$year ";
                            if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                            if(!empty($month)) $q .= " month(stis.event_date)=$month ";
                        $q .= " group by stis.risk_id
                    ) tis on tis.risk_id=ris.id 
                WHERE ris.risk_categ_id=1
                ORDER BY tis.average DESC
                ";

        }
        else
        {
            $year_now = date('Y');

            $q = "
                SELECT TOP 10 ris.title, ISNULL(tis.average, 0) avg_impact
                    FROM dbo.admiseciso_risk_sub ris
                    LEFT JOIN ( 
                        select AVG(stis.impact_level) average, stis.risk_id
                            from dbo.admiseciso_transaction stis 
                        WHERE year(stis.event_date)='$year_now' and stis.disable=0 and stis.status=1
                        GROUP BY stis.risk_id
                    ) tis on tis.risk_id=ris.id 
                WHERE ris.risk_categ_id=1
                ORDER BY tis.average DESC
            ";
        }

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_risk_month_avg()
    {
        if($this->input->post())
        {
            $area = $this->input->post('area_fil', true);
            $year = $this->input->post('year_fil', true);
            $month = $this->input->post('month_fil', true);

            $q = "
                WITH months(MonthNum) AS
                (
                    SELECT 1
                    UNION ALL
                    SELECT MonthNum+1 
                        FROM months
                    WHERE MonthNum < 12
                )
                SELECT m.MonthNum month_num, AVG(t.impact_level) avg_impact
                    FROM months m
                    LEFT OUTER JOIN dbo.admiseciso_transaction AS t ON MONTH(t.event_date)=m.MonthNum AND  t.disable=0 AND t.status=1";
                    if(!empty($area) || !empty($year)) $q .= ' AND ';
                    if(!empty($area)) $q .= " t.area_id=$area ";
                    if(!empty($area) && !empty($year)) $q .= ' AND ';
                    if(!empty($year)) $q .= " year(t.event_date)=$year ";
            $q .= " GROUP BY m.MonthNum ";
        }
        else
        {
            $year_now = date('Y');

            $q = "
                WITH months(MonthNum) AS
                (
                    SELECT 1
                    UNION ALL
                    SELECT MonthNum+1 
                        FROM months
                    WHERE MonthNum < 12
                )
                SELECT m.MonthNum month_num, AVG(t.impact_level) avg_impact
                    FROM months m
                LEFT OUTER JOIN dbo.admiseciso_transaction AS t ON MONTH(t.event_date)=m.MonthNum AND YEAR(t.event_date)='$year_now' AND t.disable=0 AND t.status=1
                GROUP BY m.MonthNum
            ";
        }

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_risk_level_max()
    {
        if($this->input->post())
        {
            $area = $this->input->post('area_fil', true);
            $year = $this->input->post('year_fil', true);
            $month = $this->input->post('month_fil', true);

            $q = "
                SELECT TOP 10 ris.title, ISNULL(tis.risk_level, 0) total
                    FROM dbo.admiseciso_risk_sub ris
                    LEFT JOIN ( 
                        select MAX(sril.level) risk_level, stis.risk_id
                            from dbo.admiseciso_transaction stis
                            inner join admiseciso_risk_level sril on sril.id=stis.risk_level_id
                            where stis.disable=0 AND stis.status=1";
                            if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
                            if(!empty($area)) $q .= " stis.area_id=$area ";
                            if(!empty($area) && !empty($year)) $q .= ' AND ';
                            if(!empty($year)) $q .= " year(stis.event_date)=$year ";
                            if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                            if(!empty($month)) $q .= " month(stis.event_date)=$month ";
                        $q .= " group by stis.risk_id
                    ) tis on tis.risk_id=ris.id 
                WHERE ris.risk_categ_id=1
                ORDER BY tis.risk_level DESC
                ";

        }
        else
        {
            $year_now = date('Y');

            $q = "
                SELECT TOP 10 ris.title, ISNULL(tis.risk_level, 0) total
                    FROM dbo.admiseciso_risk_sub ris
                    LEFT JOIN ( 
                        select MAX(sril.level) risk_level, stis.risk_id
                            from dbo.admiseciso_transaction stis 
                            inner join admiseciso_risk_level sril on sril.id=stis.risk_level_id 
                        where year(stis.event_date)='$year_now' and stis.disable=0 AND stis.status=1
                        group by stis.risk_id
                    ) tis on tis.risk_id=ris.id 
                WHERE ris.risk_categ_id=1
                ORDER BY tis.risk_level DESC
            ";
        }

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_detail_risk($sub_name)
    {
        if($this->input->post())
        {
            $area = $this->input->post('area_fil', true);
            $year = $this->input->post('year_fil', true);
            $year = empty($year) ? date('Y') : $year;
            $month = $this->input->post('month_fil', true);
            $label = $this->input->post('label_fil', true);

            $q = "
                WITH months(MonthNum) AS
                (
                    SELECT 1
                    UNION ALL
                    SELECT MonthNum+1 
                        FROM months
                    WHERE MonthNum < 12
                )
                SELECT m.MonthNum month_num ,count(t.id) total
                    FROM months m
                    LEFT OUTER JOIN (
                        select str.id ,str.event_date ,str.area_id
                            from dbo.admiseciso_transaction str
                            where str.".$sub_name."=(select id from dbo.admiseciso_risk_sub where lower(title)=lower('".$label."')) and str.disable=0 and str.status=1
                        group by str.id ,str.event_date ,str.area_id
                    ) AS t ON MONTH(t.event_date)=m.MonthNum ";
                    if(!empty($area) || !empty($year)) $q .= ' AND ';
                    if(!empty($area)) $q .= " t.area_id=$area ";
                    if(!empty($area) && !empty($year)) $q .= ' AND ';
                    if(!empty($year)) $q .= " year(t.event_date)=$year ";
            $q .= " GROUP BY m.MonthNum ";
        }

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_detail_risk_sub($sub_name)
    {
        $area = $this->input->post('area_fil', true);
        $year = $this->input->post('year_fil', true);
        $year = empty($year) ? date('Y') : $year;
        $month = $this->input->post('month_fil', true);
        $label = $this->input->post('label_fil', true);

        $q = "
            SELECT rsu.id ,rsu.title ,ISNULL(t.total,0) total
                FROM dbo.admiseciso_risk_sub rsu
                LEFT OUTER JOIN (
                    SELECT count(1) total ,atr.".$sub_name."
                        from dbo.admiseciso_transaction atr 
                        where atr.disable=0 AND atr.status=1";
                        if(!empty($area) || !empty($year)) $q .= ' AND ';
                        if(!empty($area)) $q .= " atr.area_id=$area ";
                        if(!empty($area) && !empty($year)) $q .= ' AND ';
                        if(!empty($year)) $q .= " year(atr.event_date)=$year ";
                        if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                        if(!empty($month)) $q .= " month(atr.event_date)=$month ";
                    $q .= "group by atr.".$sub_name."
                ) t ON t.".$sub_name."=rsu.id
            WHERE rsu.risk_categ_id=(select risk_categtarget_id from dbo.admiseciso_risk_sub where lower(title)=lower('".$label."'))
            GROUP BY rsu.id ,rsu.title ,t.total
            ";

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_detail_risksource($sub_name)
    {
        $area = $this->input->post('area_fil', true);
        $year = $this->input->post('year_fil', true);
        $year = empty($year) ? date('Y') : $year;
        $month = $this->input->post('month_fil', true);
        $label = $this->input->post('label_fil', true);

        $q = "
            WITH months(MonthNum) AS
            (
                SELECT 1
                UNION ALL
                SELECT MonthNum+1 
                    FROM months
                WHERE MonthNum < 12
            )
            SELECT m.MonthNum month_num ,count(t.id) total
                FROM months m
                LEFT OUTER JOIN (
                    select str.id ,str.event_date ,str.area_id
                        from dbo.admiseciso_transaction str
                        where str.".$sub_name."=(select id from dbo.admiseciso_risksource_sub where lower(title)=lower('".$label."')) and str.disable=0 and str.status=1
                    group by str.id ,str.event_date ,str.area_id
                ) AS t ON MONTH(t.event_date)=m.MonthNum ";
                if(!empty($area) || !empty($year)) $q .= ' AND ';
                if(!empty($area)) $q .= " t.area_id=$area ";
                if(!empty($area) && !empty($year)) $q .= ' AND ';
                if(!empty($year)) $q .= " year(t.event_date)=$year ";
        $q .= " GROUP BY m.MonthNum ";

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_detail_risksource_sub($sub_name)
    {
        $area = $this->input->post('area_fil', true);
        $year = $this->input->post('year_fil', true);
        $year = empty($year) ? date('Y') : $year;
        $month = $this->input->post('month_fil', true);
        $label = $this->input->post('label_fil', true);

        $q = "
            SELECT rsu.id ,rsu.title ,ISNULL(t.total,0) total
                FROM dbo.admiseciso_risksource_sub rsu
                LEFT OUTER JOIN (
                    SELECT count(1) total ,atr.".$sub_name."
                        from dbo.admiseciso_transaction atr 
                        where atr.disable=0 AND atr.status=1";
                        if(!empty($area) || !empty($year)) $q .= ' AND ';
                        if(!empty($area)) $q .= " atr.area_id=$area ";
                        if(!empty($area) && !empty($year)) $q .= ' AND ';
                        if(!empty($year)) $q .= " year(atr.event_date)=$year ";
                        if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                        if(!empty($month)) $q .= " month(atr.event_date)=$month ";
                    $q .= "group by atr.".$sub_name."
                ) t ON t.".$sub_name."=rsu.id
            WHERE rsu.risksource_categ_id=(select risksource_categtarget_id from dbo.admiseciso_risksource_sub where lower(title)=lower('".$label."'))
            GROUP BY rsu.id ,rsu.title ,t.total
            ";

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_detail_assets($sub_name)
    {
        $area = $this->input->post('area_fil', true);
        $year = $this->input->post('year_fil', true);
        $year = empty($year) ? date('Y') : $year;
        $month = $this->input->post('month_fil', true);
        $label = $this->input->post('label_fil', true);

        $q = "
            WITH months(MonthNum) AS
            (
                SELECT 1
                UNION ALL
                SELECT MonthNum+1 
                    FROM months
                WHERE MonthNum < 12
            )
            SELECT m.MonthNum month_num ,count(t.id) total
                FROM months m
                LEFT OUTER JOIN (
                    select str.id ,str.event_date ,str.area_id
                        from dbo.admiseciso_transaction str
                        where str.".$sub_name."=( select top 1 id from dbo.admiseciso_assets_sub where trim(lower(title))=trim(lower('".$label."')) ) and str.disable=0 and str.status=1
                    group by str.id ,str.event_date ,str.area_id
                ) AS t ON MONTH(t.event_date)=m.MonthNum ";
                if(!empty($area) || !empty($year)) $q .= ' AND ';
                if(!empty($area)) $q .= " t.area_id=$area ";
                if(!empty($area) && !empty($year)) $q .= ' AND ';
                if(!empty($year)) $q .= " year(t.event_date)=$year ";
        $q .= " GROUP BY m.MonthNum ";

        $res = $this->srsdb->query($q);

        return $res;
    }

    public function grap_detail_assets_sub($sub_name)
    {
        $area = $this->input->post('area_fil', true);
        $year = $this->input->post('year_fil', true);
        $year = empty($year) ? date('Y') : $year;
        $month = $this->input->post('month_fil', true);
        $label = $this->input->post('label_fil', true);

        $q = "
            SELECT rsu.id ,rsu.title ,ISNULL(t.total,0) total
                FROM dbo.admiseciso_assets_sub rsu
                LEFT OUTER JOIN (
                    SELECT count(1) total ,atr.".$sub_name."
                        from dbo.admiseciso_transaction atr 
                        where atr.disable=0 AND atr.status=1";
                        if(!empty($area) || !empty($year)) $q .= ' AND ';
                        if(!empty($area)) $q .= " atr.area_id=$area ";
                        if(!empty($area) && !empty($year)) $q .= ' AND ';
                        if(!empty($year)) $q .= " year(atr.event_date)=$year ";
                        if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                        if(!empty($month)) $q .= " month(atr.event_date)=$month ";
                    $q .= "group by atr.".$sub_name."
                ) t ON t.".$sub_name."=rsu.id
            WHERE rsu.assets_categ_id=(select top 1 assets_categtarget_id from dbo.admiseciso_assets_sub where lower(title)=lower('".$label."'))
            GROUP BY rsu.id ,rsu.title ,t.total
            ";

        $res = $this->srsdb->query($q);

        return $res;
    }
}