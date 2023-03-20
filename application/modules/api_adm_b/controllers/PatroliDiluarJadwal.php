<?php
defined('BASEPATH') or exit('No direct script access allowed');


require_once(APPPATH . './libraries/RestController.php');

use chriskacerguis\RestServer\RestController;

class PatroliDiluarJadwal extends RestController
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_patroli_luarjadwal');
    }

    public function showShiftPatroli_get()
    {
        $data = $this->M_patroli_luarjadwal->getShift();

        if ($data !== '01') 
        {
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

}