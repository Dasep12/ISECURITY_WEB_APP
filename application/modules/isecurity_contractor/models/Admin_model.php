<?php


class Admin_model extends CI_Model
{
    
     //set nama tabel yang akan kita tampilkan datanya
    var $table = 'admviewtrans_sgpprofile';
    //set kolom order, kolom pertama saya null untuk kolom edit dan hapus
    var $column_order = array('npk', 'nama', 'area_kerja', 'wilayah',null);
    var $column_search = array('npk','nama', 'area_kerja', 'wilayah');
    // default order 
    var $order = array('nama' => 'asc');
    
    public function __construct()
    {
        parent::__construct();
        $this->iremake = $this->load->database('iremake', TRUE);
    }
	
	function getProfiling($npk)
    {
        $query = $this->iremake->get_where('admviewtrans_sgpprofile', array('npk' => $npk));
        return $query;
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

    function GetWil()
    {
        		
		$this->iremake->get_where('admviewtrans_sgpprofile', array('wilayah' => $this->session->userdata('wilayah')));

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

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->input->post('length') != -1)
            $this->iremake->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->iremake->get();
        return $query->result();
    }
    
     public function ExportProfiling()
    {
        $this->iremake->select('*');
        $this->iremake->from('profiling');
        $query = $this->iremake->get();
        return $query->result();
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

    public function getDaftarAnggota($where)
    {
        $query = $this->iremake->query('SELECT nama ,  biodata.npk , employee.wilayah   FROM biodata JOIN  employee ON  biodata.npk = employee.npk where nama like "%' . $where . '%"
        order by nama ASC ');
        return $query->result_array();
    }

    public function getWilayahAnggota($npk)
    {
        $query = $this->iremake->query('SELECT employee.id_employee , employee.wilayah , employee.area_kerja   FROM biodata JOIN  employee ON  biodata.npk = employee.npk where employee.npk = "' . $npk . '" ');
        return $query->result();
    }

    //ambil data absensi anggota berdasarkan tanggal bulan dan npk
    public function getPresensi($npk, $bulan, $tabel)
    {
        $query = $this->iremake->query('SELECT * FROM ' . $tabel . ' WHERE npk = "' . $npk . '" AND in_date LIKE "%' . $bulan . '%"  ');
        return $query;
    }

    //update data presensi 
    public function updateAbsensi($where, $tabel, $data)
    {
        $this->iremake->where($where);
        $this->iremake->update($tabel, $data);
        return $this->iremake->affected_rows();
    }


    //hitung patroli tanggal kemarin 
    public function countPatroli($area, $tgl)
    {
        $query = $this->iremake->query('SELECT sum(`count`) AS total  FROM count_patroli WHERE area = "' . $area . '" AND tanggal = "' . $tgl . '" ');
        return $query->row();
    }

     //hitung status KTA 
	public function countStatusKTA($kta)
	{ 
		$query = $this->iremake->query("SELECT status_kta , COUNT(status_kta) AS total FROM employee  where status_kta =  '$kta' ");
		return $query->row();
	}
    
    //input presensi 
    public function input($tabel, $data)
    {
        $this->iremake->insert($tabel, $data);
        return $this->iremake->affected_rows();
    }

    public function group($wil)
    {
        $query = $this->iremake->query("SELECT area_kerja FROM admviewtrans_sgpprofile WHERE wilayah = '$wil' GROUP BY area_kerja");
        return $query->result();
    }

    

    public function areaKerja()
    {
        $query = $this->iremake->query("SELECT area_kerja FROM admviewtrans_sgpprofile GROUP BY area_kerja;");
        return $query->result_array();
    }

    function getAgtWil($wil,$area)
    {
        $query = $this->iremake->query("SELECT *
        FROM admviewtrans_sgpprofile
        WHERE wilayah = '$wil' AND area_kerja = '$area' ;");
        return $query;
    }

    function UploadProfile($idkaryawan,$nama,$image){
        $data = array(
                'id_karyawan'        => $idkaryawan,
				'nama' 		         => $nama,
                'foto'               => $image,
            );  
        $result= $this->iremake->insert('admmsadmin_profile',$data);
        return $result;
    }

    function UpdateFoto($idkaryawan,$image){
        $data = array(
                'id_biodata'        => $idkaryawan,
                'foto'               => $image,
            );  
        $result= $this->iremake->update('admisecsgp_msbiodata',$data, array('id_biodata' => $idkaryawan));
        return $result;
    }

    function ExportExcel($area, $wilayah)
    {
        $query = $this->iremake->query("SELECT * FROM `admviewtrans_sgpprofile` WHERE wilayah = '$wilayah' AND area_kerja = '$area' ");
        return $query->result();
    }
}
