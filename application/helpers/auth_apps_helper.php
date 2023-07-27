<?php defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('checksession')) {
	function checksession() {
		$ci =& get_instance();
        $id = $ci->session->userdata('id_token');

        if($id == null || $id == "")
        {
            $ci->session->set_flashdata('info_login', 'anda harus login dulu');
            redirect('Login');
        }
	}
}

if ( ! function_exists('is_super_admin')) {
    function is_super_admin() {
		$CI  =& get_instance();
		if(strtoupper($CI->session->userdata('role')) == 'SUPERADMIN') {
			return true;
		} else {
			return false;
		}
    }
}

if ( ! function_exists('is_section_manager')) {
    function is_section_manager() {
		$CI  =& get_instance();
		if(strtoupper($CI->session->userdata('role')) == 'ADMINSHM') {
			return true;
		} else {
			return false;
		}
    }
}

if ( ! function_exists('is_section_head')) {
    function is_section_head() {
		$CI  =& get_instance();
		if(strtoupper($CI->session->userdata('role')) == 'ADMINSH') {
			return true;
		} else {
			return false;
		}
    }
}

if ( ! function_exists('is_author')) {
    function is_author($area='') {
		$ci  =& get_instance();
        $npk = $ci->session->userdata('npk');
        $access_app = $ci->Roles_m->access_roles($npk, 'ADMINSRS')->row();

		if($access_app == NULL) {
			return false;
		}

		if(($area !== '' && $area == 'ALLAREA') && $npk == '7295')
		{
			return false;
		}

		// if($npk == '7295') {
		// 	return false;
		// }
		
		return true;
    }
}

if ( ! function_exists('is_app')) {
    function is_app($apps) {
		$ci  =& get_instance();
        $role = $ci->session->userdata('role');
        $npk = $ci->session->userdata('npk');

        $ci->load->model(['Roles_m']);
        $access_app = $ci->Roles_m->access_app($npk, $apps)->row();

		if($access_app->total_app > 0) {
			return true;
		} else {
			return false;
		}
    }
}

if ( ! function_exists('is_module')) {
    function is_module($module) {
		$ci  =& get_instance();
        $role = $ci->session->userdata('role');
        $npk = $ci->session->userdata('npk');

        $ci->load->model(['Roles_m']);
     	$access_module = $ci->Roles_m->access_modul($npk, $module)->row();

		if($access_module !== NULL) {
			return $access_module;
		} else {
			return false;
		}
    }
}

if ( ! function_exists('is_role')) {
    function is_role($code_role) {
		$ci  =& get_instance();
        $npk = $ci->session->userdata('npk');

        $ci->load->model(['Roles_m']);
     	$access_role = $ci->Roles_m->access_roles($npk, $code_role)->row();
     	
		if($access_role !== NULL) {
			return true;
		} else {
			return false;
		}
    }
}

if ( ! function_exists('is_access_privilege')) {
    function is_access_privilege($module,$privilege) {
		$ci  =& get_instance();
        $role = $ci->session->userdata('role');
        $npk = $ci->session->userdata('npk');

        $ci->load->model(['Roles_m']);
     	$access_module = $ci->Roles_m->access_modul($npk, $module)->row();

		if($privilege == 'crt' && $access_module->$privilege == 1) {
			return true;
		}
		
		return false;
    }
}

// if ( ! function_exists('is_access_module')) {
//     function is_access_module($module, $method) {
// 		$ci  =& get_instance();
//         $role = $ci->session->userdata('role');
//         $npk = $ci->session->userdata('npk');

//         $ci->load->model(['Roles_m']);
//      	$access_module = $ci->Roles_m->access_modul($npk, $module)->row();
//      	// var_dump($access_module);die();

// 		if($access_module == NULL) {
// 			return false;
// 		}

// 		if($method == 'APR' && $access_module->apr == '1')
// 		{
// 			return true;
// 		}

// 		return false;
		
//     }
// }

if ( ! function_exists('user_npk')) {
    function user_npk() {
		$CI  =& get_instance();
		$ret =  $CI->session->userdata('npk');
		return  $ret;
    }
}

if ( ! function_exists('user_role')) {
    function user_role() {
		$CI  =& get_instance();
		$ret =  $CI->session->userdata('role');
		return  $ret;
    }
}

if ( ! function_exists('user_wilayah')) {
    function user_wilayah() {
		$CI  =& get_instance();
		$ret =  $CI->session->userdata('wil_id');
		return  $ret;
    }
}
