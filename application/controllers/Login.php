<?php

class Login extends CI_Controller
{

    public function __construct(Type $var = null)
    {
        parent::__construct();
        $id = $this->session->userdata('id_token');
        if ($id != null || $id != "") {
            $role = $this->session->userdata('role');
            if ($role == "SUPERADMIN") {
                redirect('Dashboard');
            } else {
                redirect('Admin/Dashboard');
            }
        }
    }

    public function index(Type $var = null)
    {
        // $this->load->view("login_v2");
        $this->load->view("login_v3");
    }


    public function cekLogin()
    {
        $name = $this->input->post("username");
        $password = md5($this->input->post("password"));

        // $cekUser = $this->db->get_where("admisecsgp_mstusr", ['name' =>  $name, 'password' => $password]);

        $cekUser = $this->db->query("SELECT   usr.npk , usr.name , ru.level  , usr.admisecsgp_mstsite_site_id , usr.admisecsgp_mstplant_plant_id  , st.id_wilayah
        FROM admisecsgp_mstusr usr  , admisecsgp_mstroleusr  ru , admisecsgp_mstsite st 
        WHERE ru.role_id = usr.admisecsgp_mstroleusr_role_id and usr.admisecsgp_mstsite_site_id = st.site_id and usr.password = '" . $password . "' and usr.user_name = '" . strtoupper($name) . "'  ");

        if ($cekUser->num_rows() > 0) {
            $data = $cekUser->row();
            $this->session->set_userdata("id_token", $data->npk);
            $this->session->set_userdata("npk", $data->npk);
            $this->session->set_userdata("name", $data->name);
            $this->session->set_userdata("role", $data->level);
            $this->session->set_userdata("site_id", $data->admisecsgp_mstsite_site_id);
            $this->session->set_userdata("plant_id", $data->admisecsgp_mstplant_plant_id);
            $this->session->set_userdata("wil_id", $data->id_wilayah);
            redirect('Menu');
            // $this->session->set_userdata("name", $data->user_name);
            // switch ($data->level) {
            //     case 'SUPERADMIN':
            //         $this->session->set_userdata("id_token", $data->npk);
            //         $this->session->set_userdata("npk", $data->npk);
            //         $this->session->set_userdata("name", $data->name);
            //         $this->session->set_userdata("role", $data->level);
            //         $this->session->set_userdata("site_id", $data->admisecsgp_mstsite_site_id);
            //         $this->session->set_userdata("plant_id", $data->admisecsgp_mstplant_plant_id);
            //         $this->session->set_userdata("wil_id", $data->id_wilayah);
            //         redirect('Menu');
            //         break;
            //     case 'ADMIN':
            //         $this->session->set_userdata("id_token", $data->npk);
            //         $this->session->set_userdata("npk", $data->npk);
            //         $this->session->set_userdata("name", $data->name);
            //         $this->session->set_userdata("role", $data->level);
            //         $this->session->set_userdata("site_id", $data->admisecsgp_mstsite_site_id);
            //         $this->session->set_userdata("plant_id", $data->admisecsgp_mstplant_plant_id);
            //         $this->session->set_userdata("wil_id", $data->id_wilayah);
            //         redirect('Menu');
            //         // redirect('Admin/Dashboard');
            //         break;
            //     case 'SECURITY':
            //         $this->session->set_flashdata("info_login", "tidak ada akses untuk role security");
            //         redirect('Login');
            //     default:
            //         'USER TIDAK ADA';
            //         break;
            // }
        } else {
            $this->session->set_flashdata('info_login', "akun tidak ditemukan");
            redirect('Login');
        }
    }
}
