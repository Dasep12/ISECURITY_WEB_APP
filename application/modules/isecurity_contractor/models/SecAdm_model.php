<?php

class SecAdm_model extends CI_Model{
    
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

    function GetWhere($table,$where){
        $query = $this->db->get_where($table,$where);
        return $query;
    }



    function getWilayahAnggota($npk)
    {
        $query = $this->db->query('SELECT employee.id_employee , employee.wilayah , employee.area_kerja   FROM biodata JOIN  employee ON  biodata.npk = employee.npk where employee.npk = "' . $npk . '" ');
        return $query->result();
    }

    function getPresensi($npk, $bulan, $tabel)
    {
        $query = $this->db->query('SELECT * FROM ' . $tabel . ' WHERE npk = "' . $npk . '" AND in_date LIKE "%' . $bulan . '%"  ');
        return $query;
    }

    
}
?>