<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->iremake = $this->load->database('iremake', TRUE);
    }
    
    function getRecords(){
    
        $db2 = $this->iremake->get('admviewakun_admin');
        $result2 = $db2->result_array();
     $response = array("response2"=>$result2);
     return $response;
    }

}