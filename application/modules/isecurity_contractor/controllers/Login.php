<?php

class Login extends CI_Controller 
{

    function index()
    {
        
        $this->load->view('login');
    }

    function cekLogin()
    {
        date_default_timezone_set('Asia/Jakarta');
        $username     = $this->input->post('user');
        $password     = $this->murry->enkrip($this->input->post('password'));

        $auth = $this->db->get_where("admisecsgp_msakun", array("npk" => $username))->num_rows();
        $data = $this->db->get_where("admisecsgp_msakun", array("npk" => $username))->row();
       
        if ($auth > 0) {
            $user = $this->Login->cek_login($username, $password)->row();
           
            $pass = $user->password;
            if ($user->password == $this->murry->enkrip($username)) {
                $this->session->set_flashdata('update', 'update password anda');
                $this->session->set_userdata('user', $user->id_akun);
                redirect("Login/Auth");
            }else if($user->password != $password){
                    $this->session->set_flashdata('salahPass', "NPK Belum Terdaftar");
                    redirect('Login');
            }else if($user){

                $msrole = $this->Login->cek_msrole($user->id_akun)->row();
               
                if ($msrole->control_akun == 1)
                {
                    $this->session->set_userdata('id_akun', $msrole->id_karyawan);
                   
                    redirect('control');    
                }else
                {
                    $this->session->set_userdata('id_akun', $msrole->id_karyawan);
                    
                    redirect('Home');
                }
            }
        } else if ($auth == 0) {
            $this->session->set_flashdata('nonuser', "NPK Belum Terdaftar");
            redirect('Login');
        }
    }

    function Auth()
    {
        $this->load->view('auth');
    }

    function Logout() {
        date_default_timezone_set('Asia/Jakarta');
		$this->session->sess_destroy();
		redirect("Login");
    }

    function UpdatePass()
    {
        $id_akun = $this->session->userdata('user');
        $data = array(
            'password' => $this->murry->enkrip($this->input->post('password1')),
        );
        $Update = $this->db->update('admisecsgp_msakun',$data, array('id_akun' => $this->session->userdata('user')));
        redirect('Login/cekLogin');
    }

}