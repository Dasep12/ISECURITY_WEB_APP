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
        return $this->osidb->query("SELECT  shd.name  ,
        (select count(at2.sub_risk_source) from admisecosint_transaction at2 
        where at2.sub_risk_source  = shd.id and year(at2.date)= '" . $year . "'
        ) as total 
        from admisecosint_sub1_header_data shd
        where  shd.sub_header_data  = 7 
        order by total desc 
        ");
    }

    public function getExternalSource($year)
    {
        return $this->osidb->query("SELECT shd.name  ,
        (select count(at2.sub_risk_source) from admisecosint_transaction at2 
        where at2.sub_risk_source  = shd.id and year(at2.date)= '" . $year . "'
        ) as total 
        from admisecosint_sub1_header_data shd
        where  shd.sub_header_data  = 8 
        order by total desc 
        ");
    }

    public function getRisk($year)
    {
        return $this->osidb->query("SELECT  shd.name  ,
        (select count(at2.risk_id) from admisecosint_transaction at2 
        where at2.risk_id  = shd.sub_id and year(at2.date)= '" . $year . "'
        ) as total 
        from admisecosint_sub_header_data shd
        where  shd.header_data_id  = 5
        order by total desc 
        ");
    }

    public function  getTargetAssets($year)
    {
        return $this->osidb->query("SELECT  shd.name  ,
        (select count(at2.target_issue_id) from admisecosint_transaction at2 
        where at2.target_issue_id  = shd.sub_id and year(at2.date)= '" . $year . "'
        ) as total 
        from admisecosint_sub_header_data shd
        where  shd.header_data_id  = 2
        order by total desc ");
    }

    public function  getMedia($year)
    {
        return $this->osidb->query("SELECT  shd.name  ,
        (select count(at2.media_id) from admisecosint_transaction at2 
        where at2.media_id  = shd.sub_id and year(at2.date)= '" . $year . "'
        ) as total 
        from admisecosint_sub_header_data shd
        where  shd.header_data_id  = 4
        order by total desc ");
    }
}
