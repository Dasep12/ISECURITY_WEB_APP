<?php
defined('BASEPATH') or exit('No direct script access allowed');


require_once(APPPATH . './libraries/RestController.php');

use chriskacerguis\RestServer\RestController;

class TransaksiB extends RestController
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('api_adm_b/M_transaksi');
        $this->load->helper(array('auth_api'));
    }

    // TRANSAKSI HEADER
    public function checkpoint_post()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $auth = auth_api();

            if(isset($auth['code']) && $auth['code'] == '001')
            {
                $response = array(
                    'status' => false,
                    'code' => $auth['code'],
                    'msg' => $auth['msg'],
                    'result' => 'Kesalahan sistem validasi, laporkan admin'
                );

                // $this->output
                // ->set_content_type('application/json')
                // ->set_output(json_encode($res));
            }
            else
            {
                $result  = $this->M_transaksi->checkpoint_insert();

                if($result == '00')
                {
                    $response = array(
                        'status' => true,
                        'code' => '000',
                        'msg' => 'success'
                    );
                }
                elseif($result == '01') 
                {
                    $response = array(
                        'status' => false,
                        'code' => '211',
                        'msg' => 'already exists'
                    );
                }
                else
                {
                    $response = array(
                        'status' => false,
                        'code' => '212',
                        'msg' => 'Failed'
                    );
                }
            }
        }
        else
        {
            $response = array(
                'status' => false,
                'code' => '111',
                'msg' => 'Method not allowed'
            );
        }

        // LOG
        // $this->M_transaksi->log($response);

        $this->response(
            $response,
            200
        );

        // $this->output
        //     ->set_status_header(200)
        //     ->set_content_type('application/json', 'utf-8')
        //     ->set_output(json_encode($response));
    }

    public function normal_post()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $auth = auth_api();

            if(isset($auth['code']) && $auth['code'] == '001')
            {
                $response = array(
                    'status' => false,
                    'code' => $auth['code'],
                    'msg' => $auth['msg'],
                    'result' => 'Kesalahan sistem validasi, laporkan admin'
                );
            }
            else
            {
                $result  = $this->M_transaksi->insert_normal();
                // var_dump($result);die();

                if($result == '00')
                {
                    $response = array(
                        'status' => true,
                        'code' => '000',
                        'msg' => 'success'
                    );
                }
                elseif($result == '02') 
                {
                    $response = array(
                        'status' => false,
                        'code' => '211',
                        'msg' => 'already exists'
                    );
                }
                else
                {
                    $response = array(
                        'status' => false,
                        'code' => '212',
                        'msg' => 'Failed'
                    );
                }
            }
        }
        else
        {
            $response = array(
                'status' => false,
                'code' => '111',
                'msg' => 'Method not allowed'
            );
        }

        $this->response(
            $response,
            200
        );
    }

    public function abnormal_post()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $auth = auth_api();

            if(isset($auth['code']) && $auth['code'] == '001')
            {
                $response = array(
                    'status' => false,
                    'code' => $auth['code'],
                    'msg' => $auth['msg'],
                    'result' => 'Kesalahan sistem validasi, laporkan admin'
                );
            }
            else
            {
                $result  = $this->M_transaksi->insert_abnormal();
                // var_dump($result);die();

                if($result == '00')
                {
                    $response = array(
                        'status' => true,
                        'code' => '000',
                        'msg' => 'success'
                    );
                }
                elseif($result == '02') 
                {
                    $response = array(
                        'status' => false,
                        'code' => '211',
                        'msg' => 'already exists'
                    );
                }
                else
                {
                    $response = array(
                        'status' => false,
                        'code' => '212',
                        'msg' => 'Failed'
                    );
                }
            }
        }
        else
        {
            $response = array(
                'status' => false,
                'msg' => 'Method not allowed'
            );
        }

        $this->response(
            $response,
            200
        );

        // $this->output
        //     ->set_status_header(200)
        //     ->set_content_type('application/json', 'utf-8')
        //     ->set_output(json_encode($response));
    }

    public function selesai_checkpoint_post()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $auth = auth_api();

            if(isset($auth['code']) && $auth['code'] == '001')
            {
                $response = array(
                    'status' => false,
                    'code' => $auth['code'],
                    'msg' => $auth['msg'],
                    'result' => 'Kesalahan sistem validasi, laporkan admin'
                );
            }
            else
            {
                $result  = $this->M_transaksi->selesai_checkpoint_insert();
                // var_dump($result); die();

                if($result == '00')
                {
                    $response = array(
                        'status' => true,
                        'code' => '000',
                        'msg' => 'success'
                    );
                }
                elseif($result == '01') 
                {
                    $response = array(
                        'status' => false,
                        'code' => '211',
                        'msg' => 'already exists'
                    );
                }
                else
                {
                    $response = array(
                        'status' => false,
                        'code' => '212',
                        'msg' => 'Failed'
                    );
                }
            }
        }
        else
        {
            $response = array(
                'status' => false,
                'code' => '111',
                'msg' => 'Method not allowed'
            );
        }

        $this->response(
            $response,
            200
        );
    }

    public function kirim_temuan_post()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $auth = auth_api();

            if(isset($auth['code']) && $auth['code'] == '001')
            {
                $response = array(
                    'status' => false,
                    'code' => $auth['code'],
                    'msg' => $auth['msg'],
                    'result' => 'Kesalahan sistem validasi, laporkan admin'
                );
            }
            else
            {
                $p_plant_id = $this->input->post('plant_id', true);
                
                $result  = $this->M_transaksi->kirim_temuan();
                $res_email  = $this->M_transaksi->get_user_ga($p_plant_id);

                if($result !== '01' && $res_email !== '01')
                {
                    $config = json_decode($result[0]['nilai_setting'], true);
                    $emails = array(
                        array(
                        'email' => 'ridho.sistem.adm@gmail.com',
                        ),
                        array( 
                        'email' => 'rife.develop@gmail.com',
                        )
                    );
                    $to = array();
                    $to_cc = array();
                    foreach ($res_email as $key => $ie) {
                        if($ie['type'] == 1)
                        {
                            $to[] = $ie['email'];
                        }

                        if($ie['type'] == 0)
                        {
                            $to_cc[] = $ie['email'];
                        }
                    }
                    $to = implode(", ", $to);
                    $to_cc = implode(", ", $to_cc);
                    
                    $res_email = $this->send_email($config, $to, $to_cc, $result);
                    // var_dump($res_email);die();

                    $response = array(
                        'status' => true,
                        'code' => '000',
                        'msg' => 'success'
                    );
                }
                // elseif($result == '02') 
                // {
                //     $response = array(
                //         'status' => false,
                //         'code' => '211',
                //         'msg' => 'already exists'
                //     );
                // }
                else
                {
                    $response = array(
                        'status' => false,
                        'code' => '212',
                        'msg' => 'Failed'
                    );
                }
            }
        }
        else
        {
            $response = array(
                'status' => false,
                'code' => '111',
                'msg' => 'Method not allowed'
            );
        }

        $this->response(
            $response,
            200
        );
    }

    private function send_email($config, $to, $to_cc, $result)
    {
        $data['data'] = $result;
        
        $this->load->library('email', $config);

        $this->email->from('dataanalytic.adm@gmail.com', 'DIGI PATROL');
        $this->email->to($to);
        if(!empty($to_cc))
        {
            $this->email->cc($to_cc);
        }
        $this->email->subject('TEMUAN PATROLI DI '.$result[0]['plant_name']);
        $message = $this->load->view('api_adm_b/template/email_lapor_pic_join_v', $data, true);
        $this->email->message($message);

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