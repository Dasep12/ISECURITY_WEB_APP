<?php

class Cd_model extends CI_Model{
     //set nama tabel yang akan kita tampilkan datanya
     var $table = 'admviewtrans_karprofile';
     //set kolom order, kolom pertama saya null untuk kolom edit dan hapus
     var $column_order = array('id_karyawan','npk','nama', 'divisi', 'department','jabatan','lokasi_tugas',null);
     var $column_search = array('id_karyawan','npk','nama', 'divisi', 'department','jabatan','lokasi_tugas');
     // default order 
     var $order = array('nama' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->iremake = $this->load->database('iremake', TRUE);
    }

    private function _get_datatables_query()
	{
		
		$this->iremake->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // looping awal
		{
			if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
			{	
				if($i===0) // looping awal
				{
					$this->iremake->group_start(); 
					$this->iremake->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->iremake->or_like($item, $_POST['search']['value']);
				}
				if(count($this->column_search) - 1 == $i) 
					$this->iremake->group_end(); 
			}
			$i++;
		}           
		
		if(isset($_POST['order'])) 
		{
			$this->iremake->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->iremake->order_by(key($order), $order[key($order)]);
		}
	}

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->iremake->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->iremake->from($this->table);
        return $this->iremake->count_all_results();
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->input->post('length') != -1)
            $this->iremake->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->iremake->get();
        return $query->result();
    }

    ##################################BATAS SERVERSIDE####################################

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

    function getAreakerja($searchTerm=""){
         // Fetch users
         $this->iremake->select('*');
         $this->iremake->where("area like '%".$searchTerm."%' ");
         $fetched_records = $this->iremake->get('admisecmstr_wilayah');
         $area = $fetched_records->result_array();
    
         // Initialize Array with fetched data
         $data = array();
         foreach($area as $area){
             $data[] = array(
                 "id"          => $area['id'], 
                 "text"        => $area['area'],
                 
             );
         }
         return $data;
    }

    function getRoles($searchTerm=""){
        // Fetch users
        $this->iremake->select('*');
        $this->iremake->where("role_akses like '%".$searchTerm."%' ");
        $fetched_records = $this->iremake->get('admisecmstr_appsrole');
        $appsrole = $fetched_records->result_array();
   
        // Initialize Array with fetched data
        $data = array();
        foreach($appsrole as $appsrole){
            $data[] = array(
                "id"          => $appsrole['id'], 
                "text"        => $appsrole['role_akses'],
            );
        }
        return $data;
    }


    function getDivisi($searchTerm=""){
        // Fetch users
        $this->iremake->select('*');
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
}
?>