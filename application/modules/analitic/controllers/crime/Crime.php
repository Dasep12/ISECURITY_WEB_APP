<?php
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Crime extends CI_Controller
{
    public function __construct(Type $var = null)
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('crime/M_dashboard', 'model');
    }

    private function crimeSetahun($year, $kota, $kat)
    {
        $grap_trans_area  = $this->model->crimeKategoriSetahun($year, $kota, $kat)->result();
        $tar_arr = array();
        foreach ($grap_trans_area as $key => $tar) {
            $tar_arr[] = $tar->total;
        }
        return $tar_arr;
    }

    private function crimeKecamatanSetahun($area, $kota, $year)
    {
        $grap_trans_area  = $this->model->crimePerKecamatanSetahun($area, $kota, $year)->result();
        $tar_arr = array();
        foreach ($grap_trans_area as $key => $tar) {
            $tar_arr[] = $tar->total;
        }
        return $tar_arr;
    }

    private function crimeAreaSetahun($kota, $year)
    {
        $grap_trans_area  = $this->model->countCrimeAreaSetahun($kota, $year)->result();
        $tar_arr = array();
        foreach ($grap_trans_area as $key => $tar) {
            $tar_arr[] = $tar->total;
        }
        return $tar_arr;
    }



    public function dashboard(Type $var = null)
    {
        $data['link']   = $this->uri->segment(1);
        $bulan = date('m');
        $year = date('Y');

        // $year = '2023';
        // $bulan = 3;

        $data['jakut_setahun'] = json_encode($this->crimeAreaSetahun("Jakarta Utara", $year));
        $data['karawang_setahun'] = json_encode($this->crimeAreaSetahun("Karawang", $year));
        // 


        // 
        // kriteria jakarta utara per bulan
        $data['penjaringan_perjudian'] = $this->model->modelCrimeKategoriPerbulan("penjaringan", "perjudian", $bulan, "jakarta utara", $year);
        $data['penjaringan_pencurian'] = $this->model->modelCrimeKategoriPerbulan("penjaringan", "pencurian", $bulan, "jakarta utara", $year);
        $data['penjaringan_narkoba'] = $this->model->modelCrimeKategoriPerbulan("penjaringan", "narkoba", $bulan, "jakarta utara", $year);
        $data['penjaringan_penggelapan'] = $this->model->modelCrimeKategoriPerbulan("penjaringan", "penggelapan", $bulan, "jakarta utara", $year);
        $data['penjaringan_kekerasan'] = $this->model->modelCrimeKategoriPerbulan("penjaringan", "kekerasan", $bulan, "jakarta utara", $year);

        // 
        $data['koja_perjudian'] = $this->model->modelCrimeKategoriPerbulan("koja", "perjudian", $bulan, "jakarta utara", $year);
        $data['koja_pencurian'] = $this->model->modelCrimeKategoriPerbulan("koja", "pencurian", $bulan, "jakarta utara", $year);
        $data['koja_narkoba'] = $this->model->modelCrimeKategoriPerbulan("koja", "narkoba", $bulan, "jakarta utara", $year);
        $data['koja_penggelapan'] = $this->model->modelCrimeKategoriPerbulan("koja", "penggelapan", $bulan, "jakarta utara", $year);
        $data['koja_kekerasan'] = $this->model->modelCrimeKategoriPerbulan("koja", "kekerasan", $bulan, "jakarta utara", $year);
        // 
        $data['tanjung_priok_perjudian'] = $this->model->modelCrimeKategoriPerbulan("tanjung priok", "perjudian", $bulan, "jakarta utara", $year);
        $data['tanjung_priok_pencurian'] = $this->model->modelCrimeKategoriPerbulan("tanjung priok", "pencurian", $bulan, "jakarta utara", $year);
        $data['tanjung_priok_narkoba'] = $this->model->modelCrimeKategoriPerbulan("tanjung priok", "narkoba", $bulan, "jakarta utara", $year);
        $data['tanjung_priok_penggelapan'] = $this->model->modelCrimeKategoriPerbulan("tanjung priok", "penggelapan", $bulan, "jakarta utara", $year);
        $data['tanjung_priok_kekerasan'] = $this->model->modelCrimeKategoriPerbulan("tanjung priok", "kekerasan", $bulan, "jakarta utara", $year);
        // 
        $data['pademangan_perjudian'] = $this->model->modelCrimeKategoriPerbulan("pademangan", "perjudian", $bulan, "jakarta utara", $year);
        $data['pademangan_pencurian'] = $this->model->modelCrimeKategoriPerbulan("pademangan", "pencurian", $bulan, "jakarta utara", $year);
        $data['pademangan_narkoba'] = $this->model->modelCrimeKategoriPerbulan("pademangan", "narkoba", $bulan, "jakarta utara", $year);
        $data['pademangan_penggelapan'] = $this->model->modelCrimeKategoriPerbulan("pademangan", "penggelapan", $bulan, "jakarta utara", $year);
        $data['pademangan_kekerasan'] = $this->model->modelCrimeKategoriPerbulan("pademangan", "kekerasan", $bulan, "jakarta utara", $year);
        // 
        $data['kelapa_gading_perjudian'] = $this->model->modelCrimeKategoriPerbulan("kelapa gading", "perjudian", $bulan, "jakarta utara", $year);
        $data['kelapa_gading_pencurian'] = $this->model->modelCrimeKategoriPerbulan("kelapa gading", "pencurian", $bulan, "jakarta utara", $year);
        $data['kelapa_gading_narkoba'] = $this->model->modelCrimeKategoriPerbulan("kelapa gading", "narkoba", $bulan, "jakarta utara", $year);
        $data['kelapa_gading_penggelapan'] = $this->model->modelCrimeKategoriPerbulan("kelapa gading", "penggelapan", $bulan, "jakarta utara", $year);
        $data['kelapa_gading_kekerasan'] = $this->model->modelCrimeKategoriPerbulan("kelapa gading", "kekerasan", $bulan, "jakarta utara", $year);
        // 
        $data['cilincing_perjudian'] = $this->model->modelCrimeKategoriPerbulan("cilincing", "perjudian", $bulan, "jakarta utara", $year);
        $data['cilincing_pencurian'] = $this->model->modelCrimeKategoriPerbulan("cilincing", "pencurian", $bulan, "jakarta utara", $year);
        $data['cilincing_narkoba'] = $this->model->modelCrimeKategoriPerbulan("cilincing", "narkoba", $bulan, "jakarta utara", $year);
        $data['cilincing_penggelapan'] = $this->model->modelCrimeKategoriPerbulan("cilincing", "penggelapan", $bulan, "jakarta utara", $year);
        $data['cilincing_kekerasan'] = $this->model->modelCrimeKategoriPerbulan("cilincing", "kekerasan", $bulan, "jakarta utara", $year);
        // 

        //  
        // kriteria karawang per kecamatan
        $data['teluk_jambe_barat_perjudian'] = $this->model->modelCrimeKategoriPerbulan("teluk_jambe_barat", "perjudian", $bulan, "karawang", $year);
        $data['teluk_jambe_barat_pencurian'] = $this->model->modelCrimeKategoriPerbulan("teluk_jambe_barat", "pencurian", $bulan, "karawang", $year);
        $data['teluk_jambe_barat_narkoba'] = $this->model->modelCrimeKategoriPerbulan("teluk_jambe_barat", "narkoba", $bulan, "karawang", $year);
        $data['teluk_jambe_barat_penggelapan'] = $this->model->modelCrimeKategoriPerbulan("teluk_jambe_barat", "penggelapan", $bulan, "karawang", $year);
        $data['teluk_jambe_barat_kekerasan'] = $this->model->modelCrimeKategoriPerbulan("teluk_jambe_barat", "kekerasan", $bulan, "karawang", $year);
        // 
        $data['teluk_jambe_timur_perjudian'] = $this->model->modelCrimeKategoriPerbulan("teluk_jambe_timur", "perjudian", $bulan, "karawang", $year);
        $data['teluk_jambe_timur_pencurian'] = $this->model->modelCrimeKategoriPerbulan("teluk_jambe_timur", "pencurian", $bulan, "karawang", $year);
        $data['teluk_jambe_timur_narkoba'] = $this->model->modelCrimeKategoriPerbulan("teluk_jambe_timur", "narkoba", $bulan, "karawang", $year);
        $data['teluk_jambe_timur_penggelapan'] = $this->model->modelCrimeKategoriPerbulan("teluk_jambe_timur", "penggelapan", $bulan, "karawang", $year);
        $data['teluk_jambe_timur_kekerasan'] = $this->model->modelCrimeKategoriPerbulan("teluk_jambe_timur", "kekerasan", $bulan, "karawang", $year);
        // 
        $data['klari_perjudian'] = $this->model->modelCrimeKategoriPerbulan("klari", "perjudian", $bulan, "karawang", $year);
        $data['klari_pencurian'] = $this->model->modelCrimeKategoriPerbulan("klari", "pencurian", $bulan, "karawang", $year);
        $data['klari_narkoba'] = $this->model->modelCrimeKategoriPerbulan("klari", "narkoba", $bulan, "karawang", $year);
        $data['klari_penggelapan'] = $this->model->modelCrimeKategoriPerbulan("klari", "penggelapan", $bulan, "karawang", $year);
        $data['klari_kekerasan'] = $this->model->modelCrimeKategoriPerbulan("klari", "kekerasan", $bulan, "karawang", $year);
        // 
        $data['ciampel_perjudian'] = $this->model->modelCrimeKategoriPerbulan("ciampel", "perjudian", $bulan, "karawang", $year);
        $data['ciampel_pencurian'] = $this->model->modelCrimeKategoriPerbulan("ciampel", "pencurian", $bulan, "karawang", $year);
        $data['ciampel_narkoba'] = $this->model->modelCrimeKategoriPerbulan("ciampel", "narkoba", $bulan, "karawang", $year);
        $data['ciampel_penggelapan'] = $this->model->modelCrimeKategoriPerbulan("ciampel", "penggelapan", $bulan, "karawang", $year);
        $data['ciampel_kekerasan'] = $this->model->modelCrimeKategoriPerbulan("ciampel", "kekerasan", $bulan, "karawang", $year);
        // 
        $data['majalaya_perjudian'] = $this->model->modelCrimeKategoriPerbulan("majalaya", "perjudian", $bulan, "karawang", $year);
        $data['majalaya_pencurian'] = $this->model->modelCrimeKategoriPerbulan("majalaya", "pencurian", $bulan, "karawang", $year);
        $data['majalaya_narkoba'] = $this->model->modelCrimeKategoriPerbulan("majalaya", "narkoba", $bulan, "karawang", $year);
        $data['majalaya_penggelapan'] = $this->model->modelCrimeKategoriPerbulan("majalaya", "penggelapan", $bulan, "karawang", $year);
        $data['majalaya_kekerasan'] = $this->model->modelCrimeKategoriPerbulan("majalaya", "kekerasan", $bulan, "karawang", $year);
        // 
        $data['karawang_barat_perjudian'] = $this->model->modelCrimeKategoriPerbulan("karawang barat", "perjudian", $bulan, "karawang", $year);
        $data['karawang_barat_pencurian'] = $this->model->modelCrimeKategoriPerbulan("karawang barat", "pencurian", $bulan, "karawang", $year);
        $data['karawang_barat_narkoba'] = $this->model->modelCrimeKategoriPerbulan("karawang barat", "narkoba", $bulan, "karawang", $year);
        $data['karawang_barat_penggelapan'] = $this->model->modelCrimeKategoriPerbulan("karawang barat", "penggelapan", $bulan, "karawang", $year);
        $data['karawang_barat_kekerasan'] = $this->model->modelCrimeKategoriPerbulan("karawang barat", "kekerasan", $bulan, "karawang", $year);
        // 
        $data['karawang_timur_perjudian'] = $this->model->modelCrimeKategoriPerbulan("karawang timur", "perjudian", $bulan, "karawang", $year);
        $data['karawang_timur_pencurian'] = $this->model->modelCrimeKategoriPerbulan("karawang timur", "pencurian", $bulan, "karawang", $year);
        $data['karawang_timur_narkoba'] = $this->model->modelCrimeKategoriPerbulan("karawang timur", "narkoba", $bulan, "karawang", $year);
        $data['karawang_timur_penggelapan'] = $this->model->modelCrimeKategoriPerbulan("karawang timur", "penggelapan", $bulan, "karawang", $year);
        $data['karawang_timur_kekerasan'] = $this->model->modelCrimeKategoriPerbulan("karawang timur", "kekerasan", $bulan, "karawang", $year);
        // 
        $this->template->load("template/analityc/template_crime", "crime/dashboard", $data);
    }


    public function graphicJakartaSetahun()
    {
        $year = $this->input->post("year");
        $criteria = ['Pencurian', 'Kekerasan', 'Narkoba', 'Perjudian', 'Penggelapan'];

        $res = array();
        for ($i = 0; $i < count($criteria); $i++) {
            $data = array('label' => $criteria[$i], 'data' => $this->crimeSetahun($year, "Jakarta Utara", $criteria[$i]));
            $res[] = $data;
        }
        echo json_encode($res);
    }

    public function graphicKarawangSetahun()
    {
        $year = $this->input->post("year");
        $criteria = ['Pencurian', 'Kekerasan', 'Narkoba', 'Perjudian', 'Penggelapan'];

        $res = array();
        for ($i = 0; $i < count($criteria); $i++) {
            $data = array('label' => $criteria[$i], 'data' => $this->crimeSetahun($year, "Karawang", $criteria[$i]));
            $res[] = $data;
        }
        echo json_encode($res);
    }

    public function graphicKecamatanJakutSetahun()
    {
        $year = $this->input->post("year");
        $criteria = ['Penjaringan', 'Tanjung Priok', 'Cilincing', 'Kelapa Gading', 'Pademangan', 'Koja'];
        $res = array();
        for ($i = 0; $i < count($criteria); $i++) {
            $data = array('label' => $criteria[$i], 'data' => $this->crimeKecamatanSetahun($criteria[$i], "Jakarta Utara", $year));
            $res[] = $data;
        }
        $datas = array(
            array($this->crimeAreaSetahun("Jakarta Utara", $year)),
            $res
        );
        echo json_encode($datas);
    }


    public function graphicKecamatanKarawangSetahun()
    {
        $year = $this->input->post("year");
        $criteria = ['Teluk Jambe Barat', 'Teluk Jambe Timur', 'Klari', 'Ciampel', 'Majalaya', 'Karawang Barat', 'Karawang Timur'];
        $res = array();
        for ($i = 0; $i < count($criteria); $i++) {
            $data = array('label' => $criteria[$i], 'data' => $this->crimeKecamatanSetahun($criteria[$i], "Karawang", $year));
            $res[] = $data;
        }
        $datas = array(
            array($this->crimeAreaSetahun("Karawang", $year)),
            $res
        );
        echo json_encode($datas);
    }


    public function post()
    {
        $filename = 'data_crime_' . date('m');
        $upload = $this->model->upload_crime($filename);
        if ($upload['result'] == "success") {
            $path_xlsx        = "./assets/crime/" . $filename . ".xlsx";
            $reader           = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet      = $reader->load($path_xlsx);
            $crime       = $spreadsheet->getSheet(0)->toArray();
            unset($crime[0]);
            echo "<pre>";
            // var_dump($crime);
            $params = array();
            foreach ($crime as $crm) {
                $data = [
                    'tanggal'  => $crm[1],
                    'area_ktp' => $crm[2],
                    'jenis_kasus' => $crm[3],
                    'kategori' => $crm[4],
                    'pelapor' => $crm[5],
                    'tersangka' => $crm[6],
                    'korban' => $crm[7],
                    'barang_bukti' => $crm[8],
                    'jenis' => $crm[9],
                    'kerugian' => $crm[10],
                    'modus' => $crm[10],
                    'kronologi' => $crm[12],
                    'kota' => $crm[15],
                    'kelurahan' => $crm[13],
                    'kec' => $crm[14],
                ];
                array_push($params, $data);
            }
            // print_r($params);
            $upload = $this->model->mulitple_upload("admisec_crime", $params);
            if ($upload) {
                $this->session->set_flashdata('info', 'Berhasil upload data');
                redirect('analitic/crime/Crime/upload');
            } else {
                $this->session->set_flashdata('fail', 'Gagal upload data');
                redirect('analitic/crime/Crime/upload');
            }
        } else {
            echo "failed";
        }
    }


    public function load_jakut()
    {
        $bulan = $this->input->post("bulan");
        $jakarta = array(
            array('Pademangan', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("pademangan", "perjudian", $bulan, "Jakarta Utara"),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("pademangan", "pencurian", $bulan, "Jakarta Utara"),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("pademangan", "penggelapan", $bulan, "Jakarta Utara"),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("pademangan", "narkoba", $bulan, "Jakarta Utara"),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("pademangan", "kekerasan", $bulan, "Jakarta Utara"),
            )),
            array('Koja', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("koja", "perjudian", $bulan, "Jakarta Utara"),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("koja", "pencurian", $bulan, "Jakarta Utara"),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("koja", "penggelapan", $bulan, "Jakarta Utara"),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("koja", "narkoba", $bulan, "Jakarta Utara"),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("koja", "kekerasan", $bulan, "Jakarta Utara"),
            )),
            array('Tanjung Priok', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "perjudian", $bulan, "Jakarta Utara"),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "pencurian", $bulan, "Jakarta Utara"),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "penggelapan", $bulan, "Jakarta Utara"),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "narkoba", $bulan, "Jakarta Utara"),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "kekerasan", $bulan, "Jakarta Utara"),
            )),
            array('Penjaringan', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "perjudian", $bulan, "Jakarta Utara"),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "pencurian", $bulan, "Jakarta Utara"),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "penggelapan", $bulan, "Jakarta Utara"),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "narkoba", $bulan, "Jakarta Utara"),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "kekerasan", $bulan, "Jakarta Utara"),
            )),
            array('Cilincing', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("Cilincing", "perjudian", $bulan, "Jakarta Utara"),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("Cilincing", "pencurian", $bulan, "Jakarta Utara"),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("Cilincing", "penggelapan", $bulan, "Jakarta Utara"),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("Cilincing", "narkoba", $bulan, "Jakarta Utara"),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("Cilincing", "kekerasan", $bulan, "Jakarta Utara"),
            )),
            array('Kelapa Gading', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "perjudian", $bulan, "Jakarta Utara"),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "pencurian", $bulan, "Jakarta Utara"),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "penggelapan", $bulan, "Jakarta Utara"),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "narkoba", $bulan, "Jakarta Utara"),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "kekerasan", $bulan, "Jakarta Utara"),
            ))
        );
        echo json_encode($jakarta);
    }

    public function load_karawang()
    {
        $bulan = $this->input->post("bulan");
        $jakarta = array(
            array('Teluk Jambe Barat', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("teluk jambe barat", "perjudian", $bulan, 'karawang'),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("teluk jambe barat", "pencurian", $bulan, 'karawang'),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("teluk jambe barat", "penggelapan", $bulan, 'karawang'),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("teluk jambe barat", "narkoba", $bulan, 'karawang'),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("teluk jambe barat", "kekerasan", $bulan, 'karawang'),
            )),
            array('Teluk Jambe Timur', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("teluk jambe timur", "perjudian", $bulan, 'karawang'),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("teluk jambe timur", "pencurian", $bulan, 'karawang'),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("teluk jambe timur", "penggelapan", $bulan, 'karawang'),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("teluk jambe timur", "narkoba", $bulan, 'karawang'),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("teluk jambe timur", "kekerasan", $bulan, 'karawang'),
            )),
            array('Klari', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("klari", "perjudian", $bulan, 'karawang'),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("klari", "pencurian", $bulan, 'karawang'),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("klari", "penggelapan", $bulan, 'karawang'),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("klari", "narkoba", $bulan, 'karawang'),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("klari", "kekerasan", $bulan, 'karawang'),
            )),
            array('Ciampel', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("ciampel", "perjudian", $bulan, 'karawang'),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("ciampel", "pencurian", $bulan, 'karawang'),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("ciampel", "penggelapan", $bulan, 'karawang'),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("ciampel", "narkoba", $bulan, 'karawang'),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("ciampel", "kekerasan", $bulan, 'karawang'),
            )),
            array('Majalaya', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("majalaya", "perjudian", $bulan, 'karawang'),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("majalaya", "pencurian", $bulan, 'karawang'),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("majalaya", "penggelapan", $bulan, 'karawang'),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("majalaya", "narkoba", $bulan, 'karawang'),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("majalaya", "kekerasan", $bulan, 'karawang'),
            )),
            array('Karawang Barat', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("karawang barat", "perjudian", $bulan, 'karawang'),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("karawang barat", "pencurian", $bulan, 'karawang'),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("karawang barat", "penggelapan", $bulan, 'karawang'),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("karawang barat", "narkoba", $bulan, 'karawang'),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("karawang barat", "kekerasan", $bulan, 'karawang'),
            )),
            array('Karawang Timur', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("karawang timur", "perjudian", $bulan, 'karawang'),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("karawang timur", "pencurian", $bulan, 'karawang'),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("karawang timur", "penggelapan", $bulan, 'karawang'),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("karawang timur", "narkoba", $bulan, 'karawang'),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("karawang timur", "kekerasan", $bulan, 'karawang'),
            ))
        );
        echo json_encode($jakarta);
    }

    public function mapJakut()
    {
        $bulan = $this->input->post("bulan");
        $tahun = $this->input->post("tahun");
        $data = array(
            ['name' => 'Pademangan', 'total' => $this->model->totalCrimePerKecamatan("Pademangan", $bulan, $tahun)],
            ['name' => 'Cilincing', 'total' => $this->model->totalCrimePerKecamatan("Cilincing", $bulan, $tahun)],
            ['name' => 'Penjaringan', 'total' => $this->model->totalCrimePerKecamatan("Penjaringan", $bulan, $tahun)],
            ['name' => 'Tanjung Priok', 'total' => $this->model->totalCrimePerKecamatan("Tanjung Priok", $bulan, $tahun)],
            ['name' => 'Koja', 'total' => $this->model->totalCrimePerKecamatan("Koja", $bulan, $tahun)],
            ['name' => 'Kelapa Gading', 'total' => $this->model->totalCrimePerKecamatan("Kelapa Gading", $bulan, $tahun)],
        );
        echo json_encode($data);
    }


    public function mapKarawang()
    {
        $bulan = $this->input->post("bulan");
        $tahun = $this->input->post("tahun");
        $data = array(
            ['name' => 'Teluk Jambe Barat', 'total' => $this->model->totalCrimePerKecamatan("teluk jambe barat", $bulan, $tahun)],
            ['name' => 'Teluk Jambe Timur', 'total' => $this->model->totalCrimePerKecamatan("Teluk Jambe Timur", $bulan, $tahun)],
            ['name' => 'Klari', 'total' => $this->model->totalCrimePerKecamatan("Klari", $bulan, $tahun)],
            ['name' => 'Ciampel', 'total' => $this->model->totalCrimePerKecamatan("Ciampel", $bulan, $tahun)],
            ['name' => 'Majalaya', 'total' => $this->model->totalCrimePerKecamatan("majalaya", $bulan, $tahun)],
            ['name' => 'Karawang Barat', 'total' => $this->model->totalCrimePerKecamatan("karawang barat", $bulan, $tahun)],
            ['name' => 'Karawang Timur', 'total' => $this->model->totalCrimePerKecamatan("karawang timur", $bulan, $tahun)],
        );
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function upload()
    {
        $data['link']   = $this->uri->segment(1);
        $this->template->load("template/analityc/template_crime", "crime/upload", $data);
    }

    public function upload_data()
    {
        $filename = 'data_crime_' . date('m');
        $upload = $this->model->upload_crime($filename);
        if ($upload['result'] == "success") {
            $path_xlsx        = "./assets/crime/" . $filename . ".xlsx";
            $reader           = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet      = $reader->load($path_xlsx);
            $crime       = $spreadsheet->getSheet(0)->toArray();
            unset($crime[0]);
            // echo "<pre>";
            // var_dump($crime);
            $params = array();
            foreach ($crime as $crm) {
                $data = array(
                    'tanggal'       => strval($crm[1]),
                    'area_tkp'      => strval($crm[2]),
                    'jenis_kasus'   => strval($crm[3]),
                    'kategori'      => strval($crm[4]),
                    'pelapor'       => strval($crm[5]),
                    'tersangka'     => strval($crm[6]),
                    'korban'        => strval($crm[7]),
                    'barang_bukti'  => strval($crm[8]),
                    'jenis'         => strval($crm[9]),
                    'kerugian'      => strval($crm[10]),
                    'modus'         => strval($crm[10]),
                    'kronologi'     => strval($crm[12]),
                    'kota'          => strval($crm[15]),
                    'kelurahan'     => strval($crm[13]),
                    'kec'           => strval($crm[14]),
                    'status'        => 1,
                    'created_at'    => strval(date('Y-m-d H:i:s'))
                );
                array_push($params, $data);
            }
            // $upload = $this->model->mulitple_upload('admisec_crime', $params);
            $upload = $this->model->mulitple_upload('admisec_Tcrime', $params);
            if ($upload) {
                $this->session->set_flashdata('info', 'Berhasil upload data');
                redirect('analitic/crime/Crime/upload');
            } else {
                $this->session->set_flashdata('fail', 'Gagal upload data');
                redirect('analitic/crime/Crime/upload');
            }
        } else {
            $this->session->set_flashdata('fail', 'Gagal upload data');
            redirect('analitic/crime/Crime/upload');
        }
    }

    public function mapingKategoriJakut()
    {
        $tahun = $this->input->post("tahun");
        $bulan = $this->input->post("bulan");
        $data = array(
            array('Pademangan', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("pademangan", "perjudian", $bulan, "Jakarta Utara", $tahun),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("pademangan", "pencurian", $bulan, "Jakarta Utara", $tahun),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("pademangan", "penggelapan", $bulan, "Jakarta Utara", $tahun),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("pademangan", "narkoba", $bulan, "Jakarta Utara", $tahun),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("pademangan", "kekerasan", $bulan, "Jakarta Utara", $tahun),
            )), array('Koja', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("koja", "perjudian", $bulan, "Jakarta Utara", $tahun),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("koja", "pencurian", $bulan, "Jakarta Utara", $tahun),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("koja", "penggelapan", $bulan, "Jakarta Utara", $tahun),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("koja", "narkoba", $bulan, "Jakarta Utara", $tahun),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("koja", "kekerasan", $bulan, "Jakarta Utara", $tahun),
            )),
            array('Tanjung Priok', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "perjudian", $bulan, "Jakarta Utara", $tahun),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "pencurian", $bulan, "Jakarta Utara", $tahun),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "penggelapan", $bulan, "Jakarta Utara", $tahun),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "narkoba", $bulan, "Jakarta Utara", $tahun),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "kekerasan", $bulan, "Jakarta Utara", $tahun),
            )),
            array('Penjaringan', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "perjudian", $bulan, "Jakarta Utara", $tahun),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "pencurian", $bulan, "Jakarta Utara", $tahun),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "penggelapan", $bulan, "Jakarta Utara", $tahun),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "narkoba", $bulan, "Jakarta Utara", $tahun),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "kekerasan", $bulan, "Jakarta Utara", $tahun),
            )),
            array('Cilincing', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("Cilincing", "perjudian", $bulan, "Jakarta Utara", $tahun),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("Cilincing", "pencurian", $bulan, "Jakarta Utara", $tahun),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("Cilincing", "penggelapan", $bulan, "Jakarta Utara", $tahun),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("Cilincing", "narkoba", $bulan, "Jakarta Utara", $tahun),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("Cilincing", "kekerasan", $bulan, "Jakarta Utara", $tahun),
            )),
            array('Kelapa Gading', array(
                'perjudian'     => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "perjudian", $bulan, "Jakarta Utara", $tahun),
                'pencurian'     => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "pencurian", $bulan, "Jakarta Utara", $tahun),
                'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "penggelapan", $bulan, "Jakarta Utara", $tahun),
                'narkoba'       => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "narkoba", $bulan, "Jakarta Utara", $tahun),
                'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "kekerasan", $bulan, "Jakarta Utara", $tahun),
            ))
        );

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }


    public function updateGrafik()
    {
        $tahun = $this->input->post("tahun");
        $bulan = $this->input->post("bulan");
        $data = array(
            'MapingJakut' => array(
                array('Pademangan', array(
                    'perjudian'     => $this->model->modelCrimeKategoriPerbulan("pademangan", "perjudian", $bulan, "Jakarta Utara", $tahun),
                    'pencurian'     => $this->model->modelCrimeKategoriPerbulan("pademangan", "pencurian", $bulan, "Jakarta Utara", $tahun),
                    'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("pademangan", "penggelapan", $bulan, "Jakarta Utara", $tahun),
                    'narkoba'       => $this->model->modelCrimeKategoriPerbulan("pademangan", "narkoba", $bulan, "Jakarta Utara", $tahun),
                    'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("pademangan", "kekerasan", $bulan, "Jakarta Utara", $tahun),
                )), array('Koja', array(
                    'perjudian'     => $this->model->modelCrimeKategoriPerbulan("koja", "perjudian", $bulan, "Jakarta Utara", $tahun),
                    'pencurian'     => $this->model->modelCrimeKategoriPerbulan("koja", "pencurian", $bulan, "Jakarta Utara", $tahun),
                    'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("koja", "penggelapan", $bulan, "Jakarta Utara", $tahun),
                    'narkoba'       => $this->model->modelCrimeKategoriPerbulan("koja", "narkoba", $bulan, "Jakarta Utara", $tahun),
                    'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("koja", "kekerasan", $bulan, "Jakarta Utara", $tahun),
                )),
                array('Tanjung Priok', array(
                    'perjudian'     => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "perjudian", $bulan, "Jakarta Utara", $tahun),
                    'pencurian'     => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "pencurian", $bulan, "Jakarta Utara", $tahun),
                    'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "penggelapan", $bulan, "Jakarta Utara", $tahun),
                    'narkoba'       => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "narkoba", $bulan, "Jakarta Utara", $tahun),
                    'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("Tanjung Priok", "kekerasan", $bulan, "Jakarta Utara", $tahun),
                )),
                array('Penjaringan', array(
                    'perjudian'     => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "perjudian", $bulan, "Jakarta Utara", $tahun),
                    'pencurian'     => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "pencurian", $bulan, "Jakarta Utara", $tahun),
                    'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "penggelapan", $bulan, "Jakarta Utara", $tahun),
                    'narkoba'       => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "narkoba", $bulan, "Jakarta Utara", $tahun),
                    'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("Penjaringan", "kekerasan", $bulan, "Jakarta Utara", $tahun),
                )),
                array('Cilincing', array(
                    'perjudian'     => $this->model->modelCrimeKategoriPerbulan("Cilincing", "perjudian", $bulan, "Jakarta Utara", $tahun),
                    'pencurian'     => $this->model->modelCrimeKategoriPerbulan("Cilincing", "pencurian", $bulan, "Jakarta Utara", $tahun),
                    'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("Cilincing", "penggelapan", $bulan, "Jakarta Utara", $tahun),
                    'narkoba'       => $this->model->modelCrimeKategoriPerbulan("Cilincing", "narkoba", $bulan, "Jakarta Utara", $tahun),
                    'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("Cilincing", "kekerasan", $bulan, "Jakarta Utara", $tahun),
                )),
                array('Kelapa Gading', array(
                    'perjudian'     => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "perjudian", $bulan, "Jakarta Utara", $tahun),
                    'pencurian'     => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "pencurian", $bulan, "Jakarta Utara", $tahun),
                    'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "penggelapan", $bulan, "Jakarta Utara", $tahun),
                    'narkoba'       => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "narkoba", $bulan, "Jakarta Utara", $tahun),
                    'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("Kelapa Gading", "kekerasan", $bulan, "Jakarta Utara", $tahun),
                ))
            ),
            'MapingKarawang' => array(
                array('Teluk Jambe Barat', array(
                    'perjudian'     => $this->model->modelCrimeKategoriPerbulan("teluk jambe barat", "perjudian", $bulan, 'karawang', $tahun),
                    'pencurian'     => $this->model->modelCrimeKategoriPerbulan("teluk jambe barat", "pencurian", $bulan, 'karawang', $tahun),
                    'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("teluk jambe barat", "penggelapan", $bulan, 'karawang', $tahun),
                    'narkoba'       => $this->model->modelCrimeKategoriPerbulan("teluk jambe barat", "narkoba", $bulan, 'karawang', $tahun),
                    'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("teluk jambe barat", "kekerasan", $bulan, 'karawang', $tahun),
                )),
                array('Teluk Jambe Timur', array(
                    'perjudian'     => $this->model->modelCrimeKategoriPerbulan("teluk jambe timur", "perjudian", $bulan, 'karawang', $tahun),
                    'pencurian'     => $this->model->modelCrimeKategoriPerbulan("teluk jambe timur", "pencurian", $bulan, 'karawang', $tahun),
                    'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("teluk jambe timur", "penggelapan", $bulan, 'karawang', $tahun),
                    'narkoba'       => $this->model->modelCrimeKategoriPerbulan("teluk jambe timur", "narkoba", $bulan, 'karawang', $tahun),
                    'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("teluk jambe timur", "kekerasan", $bulan, 'karawang', $tahun),
                )),
                array('Klari', array(
                    'perjudian'     => $this->model->modelCrimeKategoriPerbulan("klari", "perjudian", $bulan, 'karawang', $tahun),
                    'pencurian'     => $this->model->modelCrimeKategoriPerbulan("klari", "pencurian", $bulan, 'karawang', $tahun),
                    'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("klari", "penggelapan", $bulan, 'karawang', $tahun),
                    'narkoba'       => $this->model->modelCrimeKategoriPerbulan("klari", "narkoba", $bulan, 'karawang', $tahun),
                    'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("klari", "kekerasan", $bulan, 'karawang', $tahun),
                )),
                array('Ciampel', array(
                    'perjudian'     => $this->model->modelCrimeKategoriPerbulan("ciampel", "perjudian", $bulan, 'karawang', $tahun),
                    'pencurian'     => $this->model->modelCrimeKategoriPerbulan("ciampel", "pencurian", $bulan, 'karawang', $tahun),
                    'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("ciampel", "penggelapan", $bulan, 'karawang', $tahun),
                    'narkoba'       => $this->model->modelCrimeKategoriPerbulan("ciampel", "narkoba", $bulan, 'karawang', $tahun),
                    'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("ciampel", "kekerasan", $bulan, 'karawang', $tahun),
                )),
                array('Majalaya', array(
                    'perjudian'     => $this->model->modelCrimeKategoriPerbulan("majalaya", "perjudian", $bulan, 'karawang', $tahun),
                    'pencurian'     => $this->model->modelCrimeKategoriPerbulan("majalaya", "pencurian", $bulan, 'karawang', $tahun),
                    'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("majalaya", "penggelapan", $bulan, 'karawang', $tahun),
                    'narkoba'       => $this->model->modelCrimeKategoriPerbulan("majalaya", "narkoba", $bulan, 'karawang', $tahun),
                    'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("majalaya", "kekerasan", $bulan, 'karawang', $tahun),
                )),
                array('Karawang Barat', array(
                    'perjudian'     => $this->model->modelCrimeKategoriPerbulan("karawang barat", "perjudian", $bulan, 'karawang', $tahun),
                    'pencurian'     => $this->model->modelCrimeKategoriPerbulan("karawang barat", "pencurian", $bulan, 'karawang', $tahun),
                    'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("karawang barat", "penggelapan", $bulan, 'karawang', $tahun),
                    'narkoba'       => $this->model->modelCrimeKategoriPerbulan("karawang barat", "narkoba", $bulan, 'karawang', $tahun),
                    'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("karawang barat", "kekerasan", $bulan, 'karawang', $tahun),
                )),
                array('Karawang Timur', array(
                    'perjudian'     => $this->model->modelCrimeKategoriPerbulan("karawang timur", "perjudian", $bulan, 'karawang', $tahun),
                    'pencurian'     => $this->model->modelCrimeKategoriPerbulan("karawang timur", "pencurian", $bulan, 'karawang', $tahun),
                    'penggelapan'   => $this->model->modelCrimeKategoriPerbulan("karawang timur", "penggelapan", $bulan, 'karawang', $tahun),
                    'narkoba'       => $this->model->modelCrimeKategoriPerbulan("karawang timur", "narkoba", $bulan, 'karawang', $tahun),
                    'kekerasan'     => $this->model->modelCrimeKategoriPerbulan("karawang timur", "kekerasan", $bulan, 'karawang', $tahun),
                ))
            )
        );

        echo json_encode($data);
    }

    public function getList_crime()
    {
        $res = $this->model->getData("admisec_Tcrime")->result();
        // $res = $this->model->getData("admisec_crime")->result();
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($res));
    }
}
