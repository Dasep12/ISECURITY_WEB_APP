<?php
defined('BASEPATH') or exit('No direct script access allowed');


require_once(APPPATH . './libraries/RestController.php');

use chriskacerguis\RestServer\RestController;

class PatroliB extends RestController
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('api_adm_b/M_api');
        $this->load->helper(array('auth_api'));
    }

    public function hari($day)
    {
        switch ($day) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }
        return $hari_ini;
    }

    public function bulan($bln)
    {
        switch ($bln) {
            case '01':
                $bulan = 'JANUARI';
                break;
            case '02':
                $bulan = 'FEBRUARI';
                break;
            case '03':
                $bulan = 'MARET';
                break;
            case '04':
                $bulan = 'APRIL';
                break;
            case '05':
                $bulan = 'MEI';
                break;
            case '06':
                $bulan = 'JUNI';
                break;
            case '07':
                $bulan = 'JULI';
                break;
            case '08':
                $bulan = 'AGUSTUS';
                break;
            case '09':
                $bulan = 'SEPTEMBER';
                break;
            case '10':
                $bulan = 'OKTOBER';
                break;
            case '11':
                $bulan = 'NOVEMBER';
                break;
            case '12':
                $bulan = 'DESEMBER';
                break;
            default:
                '';
                break;
        }

        return $bulan;
    }

    // perubahan 09/08/22
    public function Login_post()
    {
        $auth = auth_api();
        // var_dump($auth);die();

        if(isset($auth['code']) && $auth['code'] == '001')
        {
            $res = array(
                'status' => false,
                'code' => $auth['code'],
                'msg' => $auth['msg'],
                'result' => 'Kesalahan sistem validasi, laporkan admin'
            );

            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($res));
        }
        else
        {
            $npk        = $this->post("npk");
            $password   = md5($this->post("password"));
            $cari_data  = $this->M_api->Login($npk, $password);
            if ($cari_data->num_rows() > 0) {
                $userData        = $cari_data->row();
                $idUser          = $userData->npk;
                $plant_id        = $userData->plant_id;
                $time  = date('H:i:s');
                // $time  = date('06:59:59');

                //jika jam kurang dari jam 6 pagi dan lebih dari jam 12 malam , maka tanggal yang di pake tanggal h-1 
                if (strtotime($time) >= strtotime('00:00:00') && strtotime($time) <= strtotime('06:59:59')) {
                    // tanggal patroli kemarin ;
                    $date_patroli                = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
                    $a    = explode('-', $date_patroli);
                    $date_getToDay               = $a[2];
                    // tanggal patroli hari ini 
                    $hari_patroli_sekarang       = date('Y-m-D', strtotime("-1 day", strtotime(date("Y-m-d"))));
                    $splitPatroliToday           = explode('-', $hari_patroli_sekarang);
                    $hari_ini                    = $this->hari($splitPatroliToday[2]);
                    $bulan_ini                   = $this->bulan($splitPatroliToday[1]);
                    $tahun_ini                   = $splitPatroliToday[0];
                    // 

                    // tanggal patroli selanjutnya 
                    $hari_patroli_selanjutnya    = date('Y-m-D');
                    $nextDay                     = date('Y-m-d');
                    $date_getNextDay             = explode('-', $nextDay);
                    $splitPatroliNextday         = explode('-', $hari_patroli_selanjutnya);
                    $hari_next                   = $this->hari($splitPatroliNextday[2]);
                    $bulan_next                  = $this->bulan($splitPatroliNextday[1]);
                    $tahun_next                  = $splitPatroliNextday[0];
                    // 

                    // shift patroli sekarang 
                    $todayPatroli  = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
                    $ShiftToday     = $this->M_api->showJadwalPatroliAnggota($idUser, $plant_id, $todayPatroli);
                    if ($ShiftToday->num_rows() > 0) {
                        $shiftHariIni = $ShiftToday->row();
                        $sh = $shiftHariIni->shift;
                    } else {
                        $sh = false;
                    }

                    // $shift patroli selanjutnya
                    $nextdayPatroli  = date('Y-m-d');
                    $ShiftNextday     = $this->M_api->showJadwalPatroliAnggota($idUser, $plant_id, $nextdayPatroli);
                    if ($ShiftNextday->num_rows() > 0) {
                        $shiftHariEsok = $ShiftNextday->row();
                        $sb = $shiftHariEsok->shift;
                    } else {
                        $sb = false;
                    }
                } else {
                    $date_patroli                = date('Y-m-d');
                    $date_getToDay               =  date('d');
                    // tanggal patroli hari ini 
                    $hari_patroli_sekarang       = date('Y-m-D');
                    $splitPatroliToday           = explode('-', $hari_patroli_sekarang);
                    $hari_ini                    = $this->hari($splitPatroliToday[2]);
                    $bulan_ini                   = $this->bulan($splitPatroliToday[1]);
                    $tahun_ini                   = $splitPatroliToday[0];
                    // 

                    // tanggal patroli selanjutnya 
                    $hari_patroli_selanjutnya    = date('Y-m-D', strtotime("+1 day", strtotime(date("Y-m-d"))));
                    $nextDay                     = date('Y-m-d', strtotime("+1 day", strtotime(date("Y-m-d"))));
                    $date_getNextDay             = explode('-', $nextDay);
                    $splitPatroliNextday         = explode('-', $hari_patroli_selanjutnya);
                    $hari_next                   = $this->hari($splitPatroliNextday[2]);
                    $bulan_next                  = $this->bulan($splitPatroliNextday[1]);
                    $tahun_next                  = $splitPatroliNextday[0];
                    // 

                    // shift patroli sekarang 
                    $todayPatroli  = date('Y-m-d');
                    $ShiftToday     = $this->M_api->showJadwalPatroliAnggota($idUser, $plant_id, $todayPatroli);
                    if ($ShiftToday->num_rows() > 0) {
                        $shiftHariIni = $ShiftToday->row();
                        $sh = $shiftHariIni->shift;
                    } else {
                        $sh = false;
                    }

                    // $shift patroli selanjutnya
                    $nextdayPatroli  = date('Y-m-d', strtotime("+1 day", strtotime(date("Y-m-d"))));
                    $ShiftNextday     = $this->M_api->showJadwalPatroliAnggota($idUser, $plant_id, $nextdayPatroli);
                    if ($ShiftNextday->num_rows() > 0) {
                        $shiftHariEsok = $ShiftNextday->row();
                        $sb = $shiftHariEsok->shift;
                    } else {
                        $sb = false;
                    }
                }
                
                // 
                $batas_shift1 = date("14:59:59");
                $batas_shift2 = date("22:59:59");
                $batas_shift3 = date("06:59:59");
                $shift_exists = "";
                 if(strtotime(date('H:i:s')) >= strtotime(date('23:00:00'))  ){
                   $date_ = date('Y-m-d');
                }else if(strtotime(date('H:i:s')) <= strtotime(date('06:30:00'))  ) {
                   $date_ =   date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
                }else {
                    $date_ =date('Y-m-d');
                }
                
                $shi = array();
                $skrg_time = date('H:i:s');
                // $skrg_time = date('01:00:00');
                if (strtotime($skrg_time) >= strtotime(date('07:00:00')) && strtotime($skrg_time) <= strtotime($batas_shift1)) {
                    // $shift_exists = 1;
                    $sh_id = $this->db->query("select shift_id from admisecsgp_mstshift where nama_shift = '1'  ")->row();
                    $shi = array([
                        'shift'     => 1,
                        'shift_id'  => $sh_id->shift_id ,
                        'tanggal'   => $date_,
                        'in'        => "07:00:00",
                        'out'       => $batas_shift1,
                    ]);
                } elseif (strtotime($skrg_time) >= strtotime(date('15:00:00')) && strtotime($skrg_time) <= strtotime($batas_shift2)) {
                    $sh_id = $this->db->query("select shift_id from admisecsgp_mstshift where nama_shift = '2'  ")->row();
                    $shi = array([
                        'shift'     => 2,
                        'shift_id'  => $sh_id->shift_id ,
                        'tanggal'   => $date_,
                        'in'        => "15:00:00",
                        'out'       => $batas_shift2,
                        'pesan'     => "mulai patroli"
                    ]);
                } else if (strtotime($skrg_time) >= strtotime(date('23:00:00')) || strtotime($skrg_time) <= strtotime($batas_shift3)) {
                    $sh_id = $this->db->query("select shift_id from admisecsgp_mstshift where nama_shift = '3'  ")->row();
                   
                    $shi = array([
                        'shift'     => 3,
                        'shift_id'  => $sh_id->shift_id ,
                        'tanggal'   =>  $date_,
                        'in'        => "23:00:00",
                        'out'       => $batas_shift3,
                        'pesan'     => "mulai patroli"
                    ]);
                }else {
                    $shi = array([
                        'shift'     => 0,
                        'shift_id'  => 0 ,
                        'tanggal'   => $date_,
                        'in'        => "00:00:00",
                        'out'       => "00:00:00",
                        'pesan'     => "belum mulai"
                    ]);
                }
                // 

                //data dari model untuk show jadwal patroli anggota per 2 hari 
                $data_jadwal_patroli = $this->M_api->showJadwalPatroliAnggota($idUser, $plant_id, $date_patroli);
                $this->response(
                    [
                        'status'                         => true,
                        'shift_now'                      => $shi,
                        'shift_patroli_hari_ini'         => $sh,
                        'shift_patroli_selanjutnya'      => $sb,
                        'tanggal_patroli_sekarang'       => $hari_ini . " " . $date_getToDay  . ' ' . ucfirst(strtolower($bulan_ini)) . " " . $tahun_ini,
                        'tanggal_patroli_selanjutnya'     => $hari_next . " " . $date_getNextDay[2]  . ' ' . ucfirst(strtolower($bulan_next)) . " " . $tahun_next,
                        'result'                           => $cari_data->result(),
                        'status_jadwal'                    => $ShiftToday->num_rows() <= 0 ? false : true,
                        'jadwal_patroli'                   => $data_jadwal_patroli->result()
                    ],
                    200
                );
            } else {
                $this->response(
                    [
                        'status'    => false,
                        'result'    =>  'NPK atau password salah'
                    ],
                    200
                );
            }
        }
    }

    //jadwal patroli per user
    // perubahan 09/08/22
    public function jadwalPatroli_get()
    {
    }


    //tampilkan daftar zona berdasarkan jadwal patroli 
    // perubahan 09/08/22
    public function showZonaPatroli_post()
    {
        $idplant = $this->post("id_plant");
        $tanggal = $this->post("tanggal");
        $shift_id = $this->post("id_shift");
        // $jam_pulang = "21:59:59";
        $data = $this->M_api->ambilZonadiJadwal($idplant, $tanggal, $shift_id);

        if ($data->num_rows() > 0) {
            $this->response(
                [
                    'message'       => 'patroli berlangsung',
                    'status'        => true,
                    'result'        => $data->result()
                ],
                200
            );
        } else {
            $this->response(
                [
                    'status'    => false,
                    'message'   => 'patroli tidak ada jadwal',
                    'result'    => $data->result()
                ],
                200
            );
        }
    }


    //tampilkan checkpoint berdasarkan zona 
    public function showCheckpoint_get()
    {
        $id = $this->get('id_zona');
        $chek = $this->M_api->ambilCheckPoint($id);
        if ($chek->num_rows() > 0) {
            $this->response(
                [
                    'status'    => true,
                    'result'    =>  $chek->result()
                ],
                200
            );
        } else {

            $this->response([
                'status'    => false,
                'message'   => 'checkpoint tidak ditemukan'
            ], 200);
        }
    }


    //tampilkan objek berdasarkan checkpoint
    public function showObjek_get()
    {
        $id = $this->get('id_check');
        $chek = $this->M_api->ambilObjek($id);
        if ($chek->num_rows() > 0) {
            $this->response(
                [
                    'status'    => true,
                    'result'    =>  $chek->result()
                ],
                200
            );
        } else {

            $this->response([
                'status'    => false,
                'message'   => 'objek tidak ditemukan'
            ], 200);
        }
    }


    //tampilkan event 
    public function showEvent_get()
    {
        $id = $this->get('id_objek');
        $event = $this->M_api->ambilEvent($id);
        if ($event->num_rows() > 0) {
            $this->response(
                [
                    'status'    => true,
                    'result'    =>  $event->result()
                ],
                200
            );
        } else {

            $this->response([
                'status'    => false,
                'message'   => 'event tidak ditemukan'
            ], 200);
        }
    }




    // data for offline storage

    // checkpoint for offline storage
    public function checkpoint_get()
    {
        $id = $this->get("id");
        $date = $this->get("tanggal");
        $shift_id = $this->get("shift_id");
        $query =  $this->M_api->Checkpoint($id, $date, $shift_id);
        if ($query->num_rows() > 0) {
            $this->response([
                'status'    => true,
                'message'   => 'data ditemukan',
                'total_checkpoint' => $query->num_rows(),
                'result'    => $query->result(),
            ], 200);
        } else {
            $this->response([
                'status'    => false,
                'message'   => 'checkpoint tidak ditemukan',
                'result'    => $query->result()
            ], 200);
        }
    }

    // objek for offline storage
    public function objek_get()
    {
        $id = $this->get("id");
        $query =  $this->M_api->Object($id);
        if ($query->num_rows() > 0) {
            $this->response([
                'status'        => true,
                'message'       => 'data ditemukan',
                'total_objek'   => $query->num_rows(),
                'result'        => $query->result(),
            ], 200);
        } else {
            $this->response([
                'status'    => false,
                'message'   => 'objek tidak ditemukan',
                'result'    => $query->result()
            ], 200);
        }
    }

    public function event_get()
    {
        $id = $this->get("id");
        $query =  $this->M_api->Event($id);
        if ($query->num_rows() > 0) {
            $this->response([
                'status'        => true,
                'message'       => 'data ditemukan',
                'total_objek'   => $query->num_rows(),
                'result'        => $query->result(),
            ], 200);
        } else {
            $this->response([
                'status'    => false,
                'message'   => 'event tidak ditemukan',
                'result'    => $query->result()
            ], 200);
        }
    }
    // end 


    public function HitungWaktuPatroli_post()
    {
        $shift   = $this->post("shift");
        $tanggal = $this->post("tanggal");
        $jam     = $this->post("jam");
        if ($shift == 3) {
            $tgl_sekarang    = strtotime($tanggal);
            $v    = date('Y-m-d', strtotime("+1 day", $tgl_sekarang));
        } else {
            $v = $tanggal;
        }
        $now   = date('Y-m-d H:i:s');
        $awal  = strtotime($now);
        $akhir = strtotime($v . ' ' . $jam);
        $diff  = $akhir - $awal;
        $mnt   = floor($diff / (60));

        if ($shift == 'LIBUR') {
            // echo "libur ";
            $this->response([
                'status'    => false,
                'message'   => 'anda sedang libur',
            ], 200);
        } else {
            $data = $this->db->query("select jam_masuk  , jam_pulang from admisecsgp_mstshift where nama_shift='" . $shift . "' ")->row();

            $sekarang  = strtotime(date('Y-m-d H:i:s'));
            $masuk     = strtotime($tanggal . ' ' . $data->jam_masuk);
            if ($shift == 3) {
                $pulang    = strtotime($v . ' ' . $data->jam_pulang);
            } else {
                $pulang    = strtotime($tanggal . ' ' . $data->jam_pulang);
            }
            // jika data 
            //jika jam sekarang lebih besar dari jam masuk dan
            //jam sekarang lebih kecil dari jam pulang 
            if ($sekarang >= $masuk && $sekarang <= $pulang) {
                if ($mnt <= 30) {
                    $this->response([
                        'status'    => false,
                        'patroli'   => 'end',
                        'message'   => 'patroli sudah berakhir',
                    ], 200);
                } else {
                    $this->response([
                        'status'    => true,
                        'patroli'   => 'start',
                        'message'   => 'patroli di mulai',
                    ], 200);
                }
            } else {
                $this->response([
                    'status'    => false,
                    'patroli'   => 'nok',
                    'message'   => 'patroli belum waktunya',
                ], 200);
            }
        }
    }


    // daftar temuan di setiap halaman chekcpoint
    public function ShowCheck_post(Type $var = null)
    {
        $plant_id =  $this->post("plant_id");
        $zona_id  = $this->post("zona_id");
        $query = $this->M_api->showTemuan($plant_id, $zona_id);
        if ($query->num_rows() > 0) {
            $this->response(
                [
                    'status'        => true,
                    'link'          => base_url('uploads/events/'),
                    'total_temuan'  => $query->num_rows(),
                    'list_temuan'   => $query->result()
                ],
                200
            );
        } else {
            $this->response(
                [
                    'status'        => false,
                    'link'          => base_url('uploads/events/'),
                    'total_temuan'  => $query->num_rows(),
                    'list_temuan'   => $query->result()
                ],
                200
            );
        }
    }

    // list presentase 
    public function persentasePatroli_post(Type $var = null)
    {
        $plant_id = $this->post("plant_id");
        $shift_id  = $this->post("shift_id");
        $user_id  = $this->post("user_id");
        $date     = $this->post("tanggal");
        $tipe_patrol     = $this->post("tipe_patrol");

        $query = $this->M_api->showPersentase($plant_id, $date, $shift_id, $user_id, $tipe_patrol);
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $this->response(
                [
                    'status'      => true,
                    'persentase'  => round($data->persentase),
                    'target'      => $data->persentase == 100 ? 1 : 0
                ],
                200
            );
        } else {
            $data = $query->row();
            $this->response(
                [
                    'status'      => false,
                    'persentase'  => 0,
                    'target'      => 0
                ],
                200
            );
        }
    }

    public function send_email_get()
    {
        $param['plant_id'] = 'ADMP5LP';
        $param['event_id'] = 'ADMC9609';
        $param['chekpoint_id'] = 'ADMC3289';
        $param['desc'] = 'TES TEMUAN';
        $param['imgs'] = array(
           'assets/temuan/ADMC4369_20221104133618_89207.jpg',
            'assets/temuan/ADMC4369_20221104133618_55779.jpg',
        );

        // $query =  $this->M_api->getSetting('email_config');
        $query =  $this->M_api->sendEmail($param);
        $res = $query->result_array();

        $imgs_link = array();
        foreach ($param['imgs'] as $key => $im) {
            // echo '<img src="'.base_url($im).'" alt="" style="width: 100px; max-width: 600px; height: auto; margin-bottom: 20px; display: block;" alt="'.$im.'"> '.base_url($im);
            $imgs_link[] = base_url($im);
        }
        // var_dump($res);die();
        
        $config = json_decode($res[0]['nilai_setting'], true);
        $data['plant_name'] = $res[0]['plant_name'];
        $data['event_name'] = $res[0]['event_name'];
        $data['kategori_name'] = $res[0]['kategori_name'];
        $data['zone_name'] = $res[0]['zone_name'];
        $data['chekpoint_name'] = $res[0]['check_name'];
        $data['object_name'] = $res[0]['kategori_name'];
        $data['event_name'] = $res[0]['event_name'];
        $data['imgs'] = $imgs_link;
        $data['desc'] = $param['desc'];

        $emails = array(
            array(
            'email' => 'ridho.sistem.adm@gmail.com',
            ),
            array( 
            'email' => 'rife.develop@gmail.com',
            )
        );

        $to = array();
        foreach ($emails as $key => $ie) {
            $to[] = $ie['email'];
        }
        $to = implode(", ", $to);

        $res_email = $this->send_email($config, $to, $data);

        if ($res_email['code'] == '00') 
        {
            $result = array(
                'code' => '00',
                'msg' => $res_email['msg'],
            );
        } 
        else 
        {
            $result = array(
                'code' => '01',
                'msg' => $res_email['msg'],
            );
        }

        // var_dump($result); die();

        echo json_encode($result);
    }

    public function send_email($config, $to, $data)
    {
        // var_dump($data);die();
        // $config['charset'] = 'iso-8859-1';
        $this->load->library('email', $config);

        $this->email->from('dataanalytic.adm@gmail.com', 'GUARD TOUR SYSTEM');
        $this->email->to($to);
        $this->email->subject('Laporan Temuan');
        $message = $this->load->view('api_adm_b/template/email_lapor_pic_2_v', $data, true);
        $this->email->message($message);

        // foreach ($data['img'] as $key => $im) {
        //     $this->email->attach('./'.$im);
        // }
        // $this->email->attach('./assets/temuan/1667737302_ap_IMG_20221106_191756094.png');

        if ($this->email->send()) 
        {
            $result = array(
                'code' => '00',
                'msg' => 'Email terkirim',
            );
        } 
        else 
        {
            $result = array(
                'code' => '01',
                'msg' => show_error($this->email->print_debugger()),
            );
        }

        // var_dump($result); die();
        // echo json_encode($result);
        
        return $result;
    }
}
