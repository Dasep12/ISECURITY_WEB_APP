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
        $q = " WITH months(MonthNum) AS
        (
            SELECT 1
            UNION ALL
            SELECT MonthNum+1 
                FROM months
            WHERE MonthNum < 12
        )
        SELECT m.MonthNum month_num, (select count(c.id) from  dbo.admisec_crime c where c.kategori = '" . $kat . "' and c.kota ='" . $kota . "' and month(c.tanggal) = m.MonthNum and YEAR(c.tanggal)='" . $year . "' ) as total
        FROM months m
        LEFT OUTER JOIN dbo.admisec_crime AS t ON MONTH(t.tanggal)=m.MonthNum AND 
        YEAR(t.tanggal)='" . $year . "'
        GROUP BY m.MonthNum";
        return $this->srsdb->query($q);
    }

    public function crimePerKecamatanSetahun($area, $kota, $year)
    {
        // where t.kota = '" . $kota . "' and t.kec ='" . $area . "' 

        $q = " WITH months(MonthNum) AS
        (
            SELECT 1
            UNION ALL
            SELECT MonthNum+1 
                FROM months
            WHERE MonthNum < 12
        )
        SELECT m.MonthNum month_num, (select count(c.id) from  dbo.admisec_crime c where c.kec = '" . $area . "' and c.kota ='" . $kota . "' and month(c.tanggal) = m.MonthNum and   YEAR(c.tanggal)='" . $year . "'  ) as total 
            FROM months m
        LEFT OUTER JOIN dbo.admisec_crime AS t ON MONTH(t.tanggal)=m.MonthNum AND 
        YEAR(t.tanggal)='" . $year . "'
        and  (kategori = 'perjudian' OR kategori = 'narkoba' OR kategori= 'penggelapan' OR kategori = 'pencurian' OR kategori='kekerasan' )
        GROUP BY m.MonthNum";
        return $this->srsdb->query($q);
    }

    public function countCrimeAreaSetahun($kota, $year)
    {

        $kat = "";

        if ($kota == "Jakarta Utara") {
            $kat .= "(kategori = 'perjudian' OR kategori = 'narkoba' OR kategori= 'penggelapan' OR kategori = 'pencurian' OR kategori='kekerasan') AND (kec='penjaringan' or  kec = 'koja' or kec = 'tanjung priok' or kec='pademangan' or kec ='cilincing' or kec = 'kelapa gading')";
        } else {
            $kat .= "(kategori = 'perjudian' OR kategori = 'narkoba' OR kategori= 'penggelapan' OR kategori = 'pencurian' OR kategori='kekerasan') AND (kec='Teluk Jambe Barat' or  kec = 'Teluk Jambe Timur' or kec = 'Klari' or kec='Ciampel' or kec ='Majalaya' or kec = 'Karawang Barat' or kec='Karawang Timur')";
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
        LEFT OUTER JOIN dbo.admisec_crime AS t ON MONTH(t.tanggal)=m.MonthNum AND 
        YEAR(t.tanggal)='" . $year . "'
        where t.kota = '" . $kota . "' 
        and $kat
        GROUP BY m.MonthNum";
        return $this->srsdb->query($res);
    }



    public function modelCrimeKategoriPerbulan($kec, $kat, $bulan, $kota, $year)
    {
        // $date = date('Y-') . $bulan;
        $date =  $year . '-' . $bulan;
        $query = $this->srsdb->query("SELECT COUNT(kategori) AS total FROM admisec_crime WHERE 
        kota = '" . $kota . "' 
        AND kec='" . $kec . "' 
        AND kategori = '" . $kat . "'
        AND FORMAT(tanggal,'yyyy-MM') = '" . $date . "' ");
        if ($query->num_rows() > 0) {
            $res = $query->row();
            return $res->total;
        } else {
            return 0;
        }
    }


    public function totalCrimePerKecamatan($kec, $bulan, $tahun)
    {

        // $date = date('2022-') . $bulan;
        $date = $tahun . '-' . $bulan;
        $query = $this->srsdb->query("SELECT COUNT(kec) as total FROM admisec_crime WHERE kec='" . $kec . "' AND FORMAT(tanggal,'yyyy-MM') = '" . $date . "'
        AND (kategori = 'perjudian' OR kategori = 'narkoba' OR kategori= 'penggelapan' OR kategori = 'pencurian' OR kategori='kekerasan')
        ")->row();
        return $query->total;
    }
}
