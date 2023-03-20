<?php

class SecOps_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->iremake = $this->load->database('iremake', TRUE);
    }

    function getData($tabel){
        $query = $this->iremake->get($tabel);
        return $query->result();
    }

    function Input($tabel, $data){
        $this->iremake->insert($tabel, $data);
        return $this->iremake->affected_rows();
    }

    function Update($table,$data,$where){ 
        $query = $this->iremake->update($table,$data,$where);
        return $query;
    }

    function Delete($table,$where){
        $query = $this->iremake->delete($table,$where);
        return $query;
    }

    function getUsers($searchTerm=""){
        // Fetch users
        $this->iremake->select('*');
        $this->iremake->where("perusahaan like '%".$searchTerm."%' ");
        $fetched_records = $this->iremake->get('admisecmstr_perusahaan');
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

    function getKar($searchTerm=""){
        // Fetch users
        $this->iremake->select('*');
        $this->iremake->where("nama like '%".$searchTerm."%' ");
        $fetched_records = $this->iremake->get('admviewtrans_karprofile');
        $department = $fetched_records->result_array();
   
        // Initialize Array with fetched data
        $data = array();
        foreach($department as $department){
            $data[] = array(
                "id"          => $department['id_karyawan'], 
                "text"        => $department['nama'],
                "divisi"        => $department['divisi'],
            );
        }
        return $data;
    }

    function getDepartment($searchTerm=""){
        // Fetch users
        $this->iremake->select('*');
        $this->iremake->where("department like '%".$searchTerm."%' ");
        $fetched_records = $this->iremake->get('admisecmstr_depart');
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

    function getDivisi($where,$searchTerm=""){
        // Fetch users
        $this->iremake->select('*');
        $this->iremake->where("id_department like '$where' ");
        $this->iremake->where("divisi like '%".$searchTerm."%' ");
        $fetched_records = $this->iremake->get('admisecmstr_divisi');
        $divisi = $fetched_records->result_array();
     
        // Initialize Array with fetched data
        $data = array();
        foreach($divisi as $divisi){
            $data[] = array(
                "id"          => $divisi['id_divisi'], 
                "text"        => $divisi['divisi'],
            );
        }
        return $data;
    }

    function BertemuDengan($where,$searchTerm=""){
        $this->iremake->select('*');
        $this->iremake->where("id_divisi like '$where' ");
        $this->iremake->where("nama like '%".$searchTerm."%' ");
        $fetched_records = $this->iremake->get('admviewtrans_bertemu');
        $bertemu = $fetched_records->result_array();
        // Initialize Array with fetched data
        $data = array();
        foreach($bertemu as $bertemu){
            $data[] = array(
                "id"          => $bertemu['id_karyawan'], 
                "text"        => $bertemu['nama'],
                "divisi"      => $bertemu['divisi'],
            );
        }
        return $data;
    }

    function getTamu($searchTerm=""){
        $this->iremake->select('*');
        $this->iremake->where("namaTamu like '%".$searchTerm."%' ");
        $fetched_records = $this->iremake->get('admviewprof_tamu');
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

    function getBertemuBp($searchTerm=""){
        $this->iremake->select('*');
        $this->iremake->where("namaPekerja like '%".$searchTerm."%' ");
        $fetched_records = $this->iremake->get('admisecmstr_bp');
        $tamu = $fetched_records->result_array();

        $data = array();
        foreach($tamu as $tamu){
            $data[] = array(
                "id"              => $tamu['id_businesspartner'],
                "text"            => $tamu['namaPekerja'],
                "perusahaan"      => $tamu['namaBp'],
            );
        }
        return $data;
    }

    function UploadFotoTamu($idtamu,$image){
        $data = array(
            'id_tamu'           => $idtamu,
            'foto'               => $image,
        );  
        $result= $this->iremake->update('admsecmstr_tamu',$data, array('id_tamu' => $idtamu));
        return $result;
       
    }




}

?>