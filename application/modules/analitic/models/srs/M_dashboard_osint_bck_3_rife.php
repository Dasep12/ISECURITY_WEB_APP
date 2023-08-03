<?php

class M_dashboard_osint extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->osidb = $this->load->database('srs_bi', TRUE);
    }


    public function getDataAllOsint($year)
    {
        return $this->osidb->query("DECLARE @date DATE = GETDATE()
        ;WITH MonthsCTE AS (
            SELECT 1 [Month], DATEADD(DAY, -DATEPART(DAY, @date)+1, @date) as 'MonthStart'
            UNION ALL
            SELECT [Month] + 1, DATEADD(MONTH, 1, MonthStart)
            FROM MonthsCTE 
            WHERE [Month] < 12 )

        SELECT Month ,
        (select count(at2.id) from admisecosint_transaction at2 
        where year(at2.date) = '" . $year . "' and MONTH(at2.date) = Month  
        ) as total
        FROM MonthsCTE")->result();
    }

    public function getDetailOsint($year, $month)
    {
        return $this->osidb->query("DECLARE @date DATE = GETDATE()
        ;WITH MonthsCTE AS (
            SELECT 1 [Month], DATEADD(DAY, -DATEPART(DAY, @date)+1, @date) as 'MonthStart'
            UNION ALL
            SELECT [Month] + 1, DATEADD(MONTH, 1, MonthStart)
            FROM MonthsCTE 
            WHERE [Month] < 31 )
        
        SELECT Month as days ,
        (select count(at2.id) from admisecosint_transaction at2 
        where year(at2.date) = '" . $year . "' and MONTH(at2.date) = '" . $month . "' and DAY(at2.date) = Month
        ) as total
        FROM MonthsCTE");
    }

    public function getPieOsintDefined($year, $id)
    {
        if ($id != 29) {
            $data = $this->osidb->query("SELECT count(at2.id) as total from admisecosint_transaction at2 
            where year(at2.[date]) = '" . $year . "' and at2.plant_id != '29' ");
        } else {
            $data = $this->osidb->query("SELECT count(at2.id) as total from admisecosint_transaction at2 
            where year(at2.[date]) = '" . $year . "' and at2.plant_id = '29' ");
        }

        if ($data->num_rows()) {
            $res = $data->row();
            return $res->total;
        } else {
            return 0;
        }
    }

    public function getDetailPie($year, $month)
    {
        return $this->osidb->query("SELECT aas.title  ,
        (select count(1) from admisecosint_transaction at2  
        where year(at2.date) = '" . $year . "' and at2.plant_id  = aas.id
        )as total
        FROM admiseciso_area_sub aas 
        where aas.area_categ_id  = 1 and  aas.title  != 'PLANT UNKNOWN' ");
    }


    public function getInternalSource($year)
    {
        $area = $this->input->post('area');
        $year = $this->input->post('year');
        $month = $this->input->post('month');

        $q = "SELECT  shd.name  ,
        (select count(at2.sub_risk_source) from admisecosint_transaction at2 
        where at2.sub_risk_source  = shd.id  ";

                if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
                if(!empty($area)) $q .= " at2.area_id=$area ";
                if(!empty($area) && !empty($year)) $q .= ' AND ';
                if(!empty($year)) $q .= " year(at2.date)=$year ";
                if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                if(!empty($month)) $q .= " month(at2.date)=$month ";

        $q .= " ) as total 
        from admisecosint_sub1_header_data shd
        where  shd.sub_header_data  = 7 
        order by total desc 
        ";
        
        return $this->osidb->query($q);
    }

    public function getExternalSource($year)
    {
        $area = $this->input->post('area');
        $year = $this->input->post('year');
        $month = $this->input->post('month');

        $q = "SELECT shd.name  ,
        (select count(at2.sub_risk_source) from admisecosint_transaction at2 
        where at2.sub_risk_source  = shd.id ";

                if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
                if(!empty($area)) $q .= " at2.area_id=$area ";
                if(!empty($area) && !empty($year)) $q .= ' AND ';
                if(!empty($year)) $q .= " year(at2.date)=$year ";
                if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                if(!empty($month)) $q .= " month(at2.date)=$month ";

        $q .= " ) as total 
        from admisecosint_sub1_header_data shd
        where  shd.sub_header_data  = 8 
        order by total desc 
        ";
        
        return $this->osidb->query($q);
    }

    public function getRisk($year)
    {
        $area = $this->input->post('area');
        $year = $this->input->post('year');
        $month = $this->input->post('month');

        $q = "SELECT  shd.name  ,
            (select count(at2.risk_id) from admisecosint_transaction at2 
            where at2.risk_id  = shd.sub_id ";

                if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
                if(!empty($area)) $q .= " at2.area_id=$area ";
                if(!empty($area) && !empty($year)) $q .= ' AND ';
                if(!empty($year)) $q .= " year(at2.date)=$year ";
                if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                if(!empty($month)) $q .= " month(at2.date)=$month ";

            $q .= " ) as total 
            from admisecosint_sub_header_data shd
            where  shd.header_data_id  = 5
            order by total desc";
        
        return $this->osidb->query($q);
    }

    public function getNegativeSentiment($year)
    {
        $area = $this->input->post('area');
        $year = $this->input->post('year');
        $month = $this->input->post('month');

        $q = "SELECT  shd.name  ,
            (select count(1) from admisecosint_transaction at2 
            where at2.hatespeech_type_id = shd.sub_id ";

                if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
                if(!empty($area)) $q .= " at2.area_id=$area ";
                if(!empty($area) && !empty($year)) $q .= ' AND ';
                if(!empty($year)) $q .= " year(at2.date)=$year ";
                if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                if(!empty($month)) $q .= " month(at2.date)=$month ";

            $q .= " ) as total 
            from admisecosint_sub_header_data shd
            where  shd.header_data_id  = 9
            order by total desc 
        ";
        
        return $this->osidb->query($q);
    }

    public function  getTargetAssets($year)
    {
        $area = $this->input->post('area');
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        
        $q = "SELECT  shd.name  ,
            (select count(at2.target_issue_id) from admisecosint_transaction at2 
            where at2.target_issue_id  = shd.sub_id ";

                if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
                if(!empty($area)) $q .= " at2.area_id=$area ";
                if(!empty($area) && !empty($year)) $q .= ' AND ';
                if(!empty($year)) $q .= " year(at2.date)=$year ";
                if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
                if(!empty($month)) $q .= " month(at2.date)=$month ";

            $q .= " ) as total 
            from admisecosint_sub_header_data shd
            where  shd.header_data_id  = 2
            order by total desc";

        return $this->osidb->query($q);
    }

    public function getMedia($year)
    {
        $area = $this->input->post('area');
        $year = $this->input->post('year');
        $month = $this->input->post('month');

        $q = "SELECT  shd.name  ,
        (select count(at2.media_id) from admisecosint_transaction at2 
        where at2.media_id  = shd.sub_id ";

            if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
            if(!empty($area)) $q .= " at2.area_id=$area ";
            if(!empty($area) && !empty($year)) $q .= ' AND ';
            if(!empty($year)) $q .= " year(at2.date)=$year ";
            if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
            if(!empty($month)) $q .= " month(at2.date)=$month ";

        $q .= " ) as total 
        from admisecosint_sub_header_data shd
        where  shd.header_data_id  = 4 and shd.status=1
        order by total desc";

        return $this->osidb->query($q);
    }

    public function getFormat($year)
    {
        $area = $this->input->post('area');
        $year = $this->input->post('year');
        $month = $this->input->post('month');

        $q = "SELECT shd.name  ,
            (select count(at2.media_id) from admisecosint_transaction at2 
            where at2.format_id = shd.sub_id ";

            if(!empty($area) || !empty($year) || !empty($month)) $q .= ' AND ';
            if(!empty($area)) $q .= " at2.area_id=$area ";
            if(!empty($area) && !empty($year)) $q .= ' AND ';
            if(!empty($year)) $q .= " year(at2.date)=$year ";
            if((!empty($area) || !empty($year)) && !empty($month)) $q .= ' AND ';
            if(!empty($month)) $q .= " month(at2.date)=$month ";

        $q .= " ) as total 
            from admisecosint_sub_header_data shd
            where shd.header_data_id = 12 and shd.status=1
            order by total desc";

        return $this->osidb->query($q);
    }

    public function getArea($year)
    {
        return $this->osidb->query("
            SELECT shd.title  , (select count(at2.media_id) from admisecosint_transaction at2 
                where at2.area_id = shd.id and year(at2.date)= $year ) as total 
            FROM admiseciso_area_sub shd
            WHERE shd.area_categ_id = 1 and shd.status=1
        ");
    }

    public function totalLevelAvg()
    {
        $area = $this->input->post('area');
        $year = $this->input->post('year');
        $month = $this->input->post('month');

        $q = "
            WITH months(MonthsNum) AS
            (
                SELECT 1
                UNION ALL
                SELECT MonthsNum+1 
                    FROM months
                WHERE MonthsNum < 12
            )
            SELECT m.MonthsNum month_num 
                ,FORMAT(AVG(COALESCE(s.total_level,0)),'N2') total_level_avg
                FROM months m
                LEFT OUTER JOIN (
                    select osi.[date] ,osi.total_level
                        from dbo.admisecosint_transaction osi
                        where osi.status=1
                    group by osi.[date] ,osi.total_level
                ) AS s ON year(s.[date])=$year and month(s.[date])=MonthsNum
            GROUP BY m.MonthsNum
            ORDER BY m.MonthsNum
        ";

        return $this->osidb->query($q);
    }
}
