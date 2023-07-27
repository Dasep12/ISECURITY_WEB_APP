<?php

class Login_model extends CI_Model{
  

  public function cek_login($username)
  {
  		$this->db->select("*");
  		$this->db->from("admisecsgp_msakun");
  		$this->db->where(array ('npk' => $username ));
  		return $this->db->get();

  }

  public function cek_msrole($username)
  {
  		$this->db->select("*");
  		$this->db->from("admviewakun_admin");
  		$this->db->where(array ('id_karyawan' => $username) );
  		return $this->db->get();

  }

  public function LupaPwd($username,$password, $no_hp, $kode_otp)
  {
  	$this->db->select("*");
  	$this->db->from("akun");
  	$this->db->where(array("akun.npk" => $username , 'akun.pass' => $password , 'akun.no_hp' => $no_hp , 'akun.kode_otp' => $kode_otp));
  	$this->db->join("karyawan" , "akun.id_karyawan = karyawan.id_karyawan" , "left");
  	return $this->db->get();
  }

}
