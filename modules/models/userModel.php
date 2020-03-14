<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class userModel{

    public $db;

    public function __construct(){
        $this->db = new Database();
    }
	
	//fungsi untuk menggambil seluruh data table ms_user
	public function getdata(){
		$sql = "SELECT * FROM ms_user";
		$this->db->query($sql);
        return $this->db->execute()->fetchRows();
	}
	
	//fungsi untuk menambahkan data ke table ms_user
	public function insertUser($id,$nama){
		$sql = "INSERT INTO ms_user (msu_id, msu_nama, msu_status_aktif) values ('".$id."','".$nama."','1')";
		return $this->db->execute($this->db->query($sql));		
	}
	
	//fungsi untuk menambahkan data ke table ms_login
	public function insertLogin($id,$password){
		$sql = "INSERT INTO ms_login (msl_username, msl_password) values ('".$id."',md5('".$password."'))";
		return $this->db->execute($this->db->query($sql));		
	}
	
	//fungsi untuk mengupdate data di table msuser
	public function updateUser($id,$nama,$status){
		$sql = "UPDATE ms_user set msu_nama = '".$nama."', msu_status_aktif = '".$status."' WHERE msu_id = '".$id."'";
		return $this->db->execute($this->db->query($sql));		
	}
	
	//fungsi untuk menambahkan data ke table ms_login
	public function updateLogin($id,$password){
		$sql = "UPDATE ms_login set msl_password = md5('".$password."') WHERE msl_username = '".$id."'";		
		return $this->db->execute($this->db->query($sql));		
	}
	
	//fungsi untuk mengambil data dari ms_data untuk di munculkan ke dalam form update
	public function getdataforupdate($id){
		$sql = "SELECT * FROM ms_user INNER JOIN ms_login ON msu_id = msl_username WHERE msu_id = '".$id."'";
		$this->db->query($sql);
        $result=$this->db->execute()->fetchRow();
		return $result;
	}
}
?>