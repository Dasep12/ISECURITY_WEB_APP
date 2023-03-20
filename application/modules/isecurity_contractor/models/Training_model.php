<?php

class Training_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
        $this->iremake = $this->load->database('iremake', TRUE);
    }

    function getData($tabel){
        $query = $this->db->get($tabel);
        return $query->result();
    }

    function Input($tabel, $data){
        $this->db->insert($tabel, $data);
        return $this->db->affected_rows();
    }

    function Update($table,$data,$where){ 
        $query = $this->db->update($table,$data,$where);
        return $query;
    }

    function Delete($table,$where){
        $query = $this->db->delete($table,$where);
        return $query;
    }
}

?>