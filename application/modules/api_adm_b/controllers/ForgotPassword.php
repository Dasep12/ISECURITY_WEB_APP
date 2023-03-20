<?php
defined('BASEPATH') or exit('No direct script access allowed');


require_once(APPPATH . './libraries/RestController.php');

use chriskacerguis\RestServer\RestController;

date_default_timezone_set('Asia/Jakarta');
class ForgotPassword extends RestController
{

    public function forget_post()
    {
        $npk = $this->post("npk");
        $cek_npk = $this->db->query("select npk , name , email from admisecsgp_mstusr where npk ='" . $npk . "' ");
        if ($cek_npk->num_rows() > 0) {
            $data_user = $cek_npk->row();
            // Konfigurasi email
            $config = [
                'mailtype'    => 'html',
                'charset'     => 'utf-8',
                'protocol'    => 'smtp',
                'smtp_host'   => 'smtp.gmail.com',
                'smtp_user'   => 'dataanalytic.adm@gmail.com',  // Email gmail
                'smtp_pass'   => 'cozppnqisekublge',  // Password gmail
                'smtp_crypto' => 'ssl',
                'smtp_port'   => 465,
                'crlf'    => "\r\n",
                'newline' => "\r\n"
            ];

            // Load library email dan konfigurasinya
            $this->load->library('email', $config);

            // Email dan nama pengirim
            $this->email->from('dataanalytic.adm@gmail.com', 'GUARD TOUR SYSTEM');

            // Email penerima
            $this->email->to($data_user->email); // Ganti dengan email tujuan

            // Lampiran email, isi dengan url/path file

            // Subject email
            $this->email->subject('Reset Password');

            // save parameter
            $token = hash('sha1', $npk . date('ydis'));

            $data = [
                'npk'           => $data_user->npk,
                'created_at'    => date('Y-m-d H:i:s'),
                'token'         => $token,
                'status_token'  => 1,
                'created_by'    => $data_user->npk
            ];

            $search = $this->db->get_where("admisecsgp_mst_token", ['npk' => $data_user->npk]);
            if ($search->num_rows() > 0) {
                $this->db->update("admisecsgp_mst_token", ['token' => $token, 'status_token' => 1], ['npk' => $data_user->npk]);
            } else {
                $this->db->insert("admisecsgp_mst_token", $data);
            }
            if ($this->db->affected_rows() > 0) {
                // Tampilkan pesan sukses atau error
                // Isi email
                $this->email->message("<h4>Hallo,Sahabat Daihatsu</h4>Silahkan klik link di bawah untuk ganti password anda<br><a style='background:red;color:#fff' href='" . base_url('ForgotPassword?token=' . $token . ' ') . "'>menuju link</a>");
                if ($this->email->send()) {
                    $this->response([
                        'status'    => true,
                        'email'     => $data_user->email,
                        'message'   => 'Sukses! email berhasil dikirim ke ' . $data_user->email
                    ], 200);
                } else {
                    $this->response([
                        'status'    => true,
                        'email'     => $data_user->email,
                        'message'   => 'Error! email tidak dapat dikirim.' . $data_user->email
                    ], 200);
                }
            }
        } else {
            $this->response([
                'status'    => false,
                'message'   => 'npk tidak terdaftar'
            ], 200);
        }
    }
}
