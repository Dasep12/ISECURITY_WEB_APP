<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('auth_api'))
{
    function auth_api()
    {
        $CI = &get_instance();
        $req_header = $CI->input->request_headers();
        // var_dump($req_header);die();

        if(!isset($req_header['authorization']) && !isset($req_header['Authorization']))
        {
            return array(
                'code' => '001',
                'msg' => 'Tidak ada header'
            );
        }

        if(isset($req_header['Authorization']))
        {
            $auth = $req_header['Authorization'];
        }
        else
        {
            $auth = $req_header['authorization'];
        }

        $api = explode(' ', $auth);
        $key = 'Hkrq5c07yz9pPXYJIOWuxTaGUtXd1uwGHQ';

        if(empty($api[0]) && $api[0] !== 'Bearer')
        {
            return array(
                'code' => '001',
                'msg' => 'Tipe auth tidak sesuai'
            );
        }

        // if ($api[1] == $key) {
        if(!password_verify($key, $api[1]))
        {
            return array(
                'code' => '001',
                'msg' => 'Token tidak sesuai'
            );
        } 

        // else {
        //     return response()->json([
        //         'http_status' => [
        //             'code' => 200,
        //             'msg' => "OK"
        //         ],
        //         'error' => [
        //             'code' => 531,
        //             'msg' => 'Not Valid Token',
        //         ]
        //     ], 200); 
        // }

        return $req_header;
    }
}