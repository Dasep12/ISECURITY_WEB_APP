<?php

class M_dashboard extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->srsdb = $this->load->database('srs_bi', TRUE);
    }

    public function getData($table)
    {
        // $this->srsdb->limit(1900);
        return $this->srsdb->get($table);
    }

    public function upload_crime($filename)
    {
        $this->load->library('upload');
        $config['upload_path']        = './assets/crime/';
        $config['allowed_types']      = 'xlsx';
        $config['max_size']           = '15048';
        $config['overwrite']          = true;
        $config['file_name']          = $filename;

        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            //jik berhasil
            $return = array('result' => 'success', 'file'    => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'gagal', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function mulitple_upload($table, $var)
    {
        return $this->srsdb->insert_batch($table, $var);
    }

    public function crimeKategoriSetahun($year, $kota, $kat)
    {

        $kec = "";
        if ($kota == "Jakarta Utara") {
            $kec .= "AND kec in ('Penjaringan', 'Tanjung Priok', 'Cilincing', 'Kelapa Gading', 'Pademangan', 'Koja') ";
        } else {
            $kec .= "AND kec in ('Teluk Jambe Barat', 'Teluk Jambe Timur', 'Klari', 'Ciampel', 'Majalaya', 'Karawang Barat', 'Karawang Timur') ";
        }
        $q = " WITH months(MonthNum) AS
        (
            SELECT 1
            UNION ALL
            SELECT MonthNum+1 
                FROM months
            WHERE MonthNum < 12
        )
        SELECT m.MonthNum month_num, (select count(c.id) from  dbo.admisec_Tcrime c where c.kategori = '" . $kat . "' and c.kota ='" . $kota . "' 
        " . $kec . "
        and month(c.tanggal) = m.MonthNum and YEAR(c.tanggal)='" . $year . "' ) as total
        FROM months m
        LEFT OUTER JOIN dbo.admisec_Tcrime AS t ON MONTH(t.tanggal)=m.MonthNum AND 
        YEAR(t.tanggal)='" . $year . "'
        GROUP BY m.MonthNum";
        return $this->srsdb->query($q);
    }

    public function crimePerKecamatanSetahun($area, $kota, $year)
    {

        $q = " WITH months(MonthNum) AS
        (
            SELECT 1
            UNION ALL
            SELECT MonthNum+1 
                FROM months
            WHERE MonthNum < 12
        )
        SELECT m.MonthNum month_num, (select count(c.id) from  dbo.admisec_Tcrime c where c.kec = '" . $area . "' and c.kota ='" . $kota . "' and month(c.tanggal) = m.MonthNum and   YEAR(c.tanggal)='" . $year . "'  ) as total 
            FROM months m
        LEFT OUTER JOIN dbo.admisec_Tcrime AS t ON MONTH(t.tanggal)=m.MonthNum AND 
        YEAR(t.tanggal)='" . $year . "'
        and kategori in('perjudian' ,'narkoba' , 'penggelapan' , 'pencurian' , 'kekerasan' )
        GROUP BY m.MonthNum";
        return $this->srsdb->query($q);
    }

    public function countCrimeAreaSetahun($kota, $year)
    {

        $kat = "";

        if ($kota == "Jakarta Utara") {
            $kat .= "kategori in ( 'perjudian' , 'narkoba' , 'penggelapan','pencurian' ,'kekerasan') AND kec in ('penjaringan' , 'koja' , 'tanjung priok' , 'pademangan', 'cilincing' , 'kelapa gading')";
        } else {
            $kat .= "kategori in ( 'perjudian' , 'narkoba' , 'penggelapan','pencurian' ,'kekerasan') AND kec in ('Teluk Jambe Barat', 'Teluk Jambe Timur' , 'Klari' , 'Ciampel' , 'Majalaya' , 'Karawang Barat' , 'Karawang Timur')";
        }
        $res = " WITH months(MonthNum) AS
        (
            SELECT 1
            UNION ALL
            SELECT MonthNum+1 
                FROM months
            WHERE MonthNum < 12
        )
        SELECT m.MonthNum month_num, count(t.kec) total
            FROM months m
        LEFT OUTER JOIN dbo.admisec_Tcrime AS t ON MONTH(t.tanggal)=m.MonthNum AND 
        YEAR(t.tanggal)='" . $year . "'
        where t.kota = '" . $kota . "' 
        and $kat
        GROUP BY m.MonthNum";
        return $this->srsdb->query($res);
    }



    public function modelCrimeKategoriPerbulan($kec, $kat, $bulan, $kota, $year)
    {
        $month = "";
        if ($bulan != "" || $bulan != null) {
            $month .= "AND MONTH(tanggal) = '$bulan' ";
        }
        $query = $this->srsdb->query("SELECT COUNT(kategori) AS total FROM admisec_Tcrime WHERE 
        kota = '" . $kota . "' 
        AND kec='" . $kec . "' 
        AND kategori = '" . $kat . "'
        $month
        AND YEAR(tanggal) = '$year' ");
        if ($query->num_rows() > 0) {
            $res = $query->row();
            return $res->total;
        } else {
            return 0;
        }
    }


    public function totalCrimePerKecamatan($kec, $bulan, $tahun)
    {
        $month = "";
        if (!empty($bulan)) {
            $month .= "AND MONTH(tanggal) = '$bulan' ";
        }
        $query = $this->srsdb->query("SELECT COUNT(kec) as total FROM admisec_Tcrime 
        WHERE kec='$kec'
                $month
                AND YEAR(tanggal) = '$tahun'
                AND kategori in ('perjudian','narkoba','penggelapan','pencurian','kekerasan') ")->row();
        return $query->total;
    }
}
