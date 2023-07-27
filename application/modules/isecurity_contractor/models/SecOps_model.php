<?php

class SecOps_model extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
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

    function getUsers($searchTerm=""){
        // Fetch users
        $this->db->select('*');
        $this->db->where("perusahaan like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('admisecmstr_perusahaan');
        $perusahaan = $fetched_records->result_array();
   
        // Initialize Array with fetched data
        $data = array();
        foreach($perusahaan as $perusahaan){
            $data[] = array(
                "id"          => $perusahaan['id_perusahaan'], 
                "text"        => $perusahaan['perusahaan'],
            );
        }
        return $data;
    }

    function getDepartment($searchTerm=""){
        // Fetch users
        $this->db->select('*');
        $this->db->where("department like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('admisecmstr_depart');
        $department = $fetched_records->result_array();
   
        // Initialize Array with fetched data
        $data = array();
        foreach($department as $department){
            $data[] = array(
                "id"          => $department['id_department'], 
                "text"        => $department['department'],
            );
        }
        return $data;
    }

    function getTamu($searchTerm=""){
        $this->db->select('*');
        $this->db->where("namaTamu like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('admviewprof_tamu');
        $tamu = $fetched_records->result_array();

        $data = array();
        foreach($tamu as $tamu){
            $data[] = array(
                "id"              => $tamu['id_tamu'],
                "text"            => $tamu['namaTamu'],
                "perusahaan"      => $tamu['perusahaan'],
            );
        }
        return $data;
    }

    function UploadFotoTamu($idtamu,$image){
        $data = array(
            'id_tamu'           => $idtamu,
            'foto'               => $image,
        );  
        $result= $this->db->update('admsecmstr_tamu',$data, array('id_tamu' => $idtamu));
        return $result;
       
    }




}

?>