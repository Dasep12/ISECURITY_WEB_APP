<?php

class Author_model Extends CI_Model
{
    //set nama tabel yang akan kita tampilkan datanya
    var $table = 'admviewakun_admin';
    //set kolom order, kolom pertama saya null untuk kolom edit dan hapus
    var $column_order = array('id_karyawan', 'nama', 'wilayah',null);
    var $column_search = array('id_karyawan', 'nama', 'wilayah');
    // default order 
    var $order = array('nama' => 'asc');


    function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // looping awal
		{
			if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
			{	
				if($i===0) // looping awal
				{
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if(count($this->column_search) - 1 == $i) 
					$this->db->group_end(); 
			}
			$i++;
		}           
		
		if(isset($_POST['order'])) 
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->input->post('length') != -1)
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
    }


    ### Ini untuk enkripsi dan denkripsi data, sebaiknya $key dan $ciphering jangan pernah di ganti 
    ### Jika ingin di ganti, harus melakukan perubahan seluruh data yang telah di engkripsi, 
    ### Agar hasil deksrip sesuai dengan aslinya

    function enkrip($param1)
    {
        $key = 'Mungkint213123ol3';
        //set crypthograpy chiper
        $ciphering = 'camellia256';
        // default enkripsi
        $encryption_iv = '7462937495832367';
        // default dekripsi
        $option = 0;
        $encrypt = openssl_encrypt($param1,$ciphering,$key,$option,$encryption_iv);
        return $encrypt;
        // var_dump($encrypt);
        // die();
        
    }

    function denkrip($param2)
    {
        $key = 'Mungkint213123ol3';
        //set crypthograpy chiper
        $ciphering = 'camellia256';
        // default enkripsi
        $encryption_iv = '7462937495832367';
        // default dekripsi
        $option = 0;
        $encrypt = openssl_decrypt($param2,$ciphering,$key,$option,$encryption_iv);
        return $encrypt;
        // var_dump($encrypt);
        // die();
    }

}
?>