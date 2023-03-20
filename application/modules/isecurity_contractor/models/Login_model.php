<?php

class Login_model extends CI_Model{
  
	public function __construct()
    {
        parent::__construct();
        $this->iremake = $this->load->database('iremake', TRUE);
    }
  public function cek_login($username)
  {
  		$this->iremake->select("*");
  		$this->iremake->from("admisecsgp_msakun");
  		$this->iremake->where(array ('npk' => $username ));
  		return $this->iremake->get();

  }

  public function cek_msrole($username)
  {
  		$this->iremake->select("*");
  		$this->iremake->from("admviewakun_admin");
  		$this->iremake->where(array ('id_karyawan' => $username) );
  		return $this->iremake->get();

  }

  public function LupaPwd($username,$password, $no_hp, $kode_otp)
  {
  	$this->iremake->select("*");
  	$this->iremake->from("akun");
  	$this->iremake->where(array("akun.npk" => $username , 'akun.pass' => $password , 'akun.no_hp' => $no_hp , 'akun.kode_otp' => $kode_otp));
  	$this->iremake->join("karyawan" , "akun.id_karyawan = karyawan.id_karyawan" , "left");
  	return $this->iremake->get();
  }

}
