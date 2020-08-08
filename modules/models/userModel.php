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
	
	/*** SELECT ***/
	public function getdata(){
		$sql = "SELECT * FROM users";
		$this->db->query($sql);
        return $this->db->execute()->fetchRows();
	}
	
	//fungsi untuk mengambil data dari ms_data untuk di munculkan ke dalam form update
	public function getdataforupdate($id){
		$sql = "SELECT * FROM users WHERE id = '".$id."'";
		$this->db->query($sql);
        $result=$this->db->execute()->fetchRow();
		return $result;
	}
	
	/*** INSERT ***/
	public function insertUser($id,$nama,$password,$user){
		$sql = "INSERT INTO users (id, nama, status, password,create_date,create_by) values ('".$id."','".$nama."','1',md5('".$password."'),now(),'".$user."')";
		return $this->db->execute($this->db->query($sql));		
	}
	
	/*** UPDATE ***/
	//fungsi untuk mengupdate data di table msuser
	public function updateUser($id,$nama,$status,$password,$user){		
		$updatePassword="";
		if($password<>""){
			$updatePassword = ", password = md5('".$password."') ";
		}
		
		$sql = "UPDATE users set nama = '".$nama."', status = '".$status."', update_date = now(), update_by = '".$user."', ".$updatePassword." WHERE id = '".$id."'";		
		return $this->db->execute($this->db->query($sql));		
	}
	
	/*** DELETE ***/
}
?>