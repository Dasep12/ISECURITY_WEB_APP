<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// route api
$route['api/auth/login'] = 'api/AuthController/login';

//LOGIN USER DI APK
//$route['api/patroli/login']         = 'api/Patroli/Login';

//jadwal patroli per plant 
$route['api/patroli/jadwalPatroli'] = 'api/JadwalController/jadwalUser';
$route['api/patroli/shift'] = 'api/JadwalController/shift';
$route['api/patroli/dataPatroli'] = 'api/PatroliController/dataPatroli';
$route['api/patroli/dataTemuan'] = 'api/PatroliController/dataTemuan';
$route['api/patroli/getDataTemuan'] = 'api/PatroliController/getdataTemuan';
$route['api/patroli/getPatrolActivity'] = 'api/PatroliController/getPatrolActivity';
$route['api/patroli/setPatrolActivity'] = 'api/PatroliController/setPatrolActivity';


$route['api/patroli/jadwalProduksi'] = 'api/Patroli/jadwalProduksi';
$route['api/patroli/zonaPatroli'] = 'api/Patroli/showZonaPatroli';
$route['api/patroli/checkpoint'] = 'api/Patroli/showCheckpoint';
$route['api/patroli/objek'] = 'api/Patroli/showObjek';
$route['api/patroli/event_objek'] = 'api/Patroli/showEvent';

// API VERSI B //
$route['api_adm_b/patroli/checkpoint_']   = 'api_adm_b/PatroliB/checkpoint';
$route['api_adm_b/patroli/objek_']   = 'api_adm_b/PatroliB/objek';
$route['api_adm_b/patroli/event_']   = 'api_adm_b/PatroliB/event';
// LOGIN USER DI APK
$route['api_adm_b/patroli/login']         = 'api_adm_b/PatroliB/Login';
$route['api_adm_b/patroli/zonaPatroli']   = 'api_adm_b/PatroliB/showZonaPatroli';
// TIME PATROLI 
$route['api_adm_b/patroli/timeout']   = 'api_adm_b/PatroliB/HitungWaktuPatroli';
$route['api_adm_b/patroli/temuan']    = 'api_adm_b/PatroliB/ShowCheck';
$route['api_adm_b/patroli/persentasepatroli']    = 'api_adm_b/PatroliB/persentasePatroli';
$route['api_adm_b/patroli/send_email_test']    = 'api_adm_b/PatroliB/send_email';
// FORGOT PASSWORD
$route['api_adm_b/password/forget']    = 'api_adm_b/ForgotPassword/forget';
// TRANSAKSI
$route['api_adm_b/transaksi/checkpoint']   = 'api_adm_b/TransaksiB/checkpoint';
$route['api_adm_b/transaksi/abnormal']   = 'api_adm_b/TransaksiB/abnormal';
$route['api_adm_b/transaksi/normal']   = 'api_adm_b/TransaksiB/normal';
$route['api_adm_b/transaksi/finish_checkpoint']   = 'api_adm_b/TransaksiB/selesai_checkpoint';
$route['api_adm_b/transaksi/kirim_temuan']    = 'api_adm_b/TransaksiB/kirim_temuan';
$route['api_adm_b/patroli_luar_jadwal/shift']   = 'api_adm_b/PatroliDiluarJadwal/showShiftPatroli';
// API VERSI B //