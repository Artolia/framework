<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class userModel{
	/*** SELECT ***/
	public function getdata(){
		$db = new Database();	
		$sql = "SELECT * FROM users";		
        return $db->fetchRows($sql);
	}
	
	//fungsi untuk mengambil data dari ms_data untuk di munculkan ke dalam form update
	public function getdataforupdate($id){
		$db = new Database();	
		$sql = "SELECT * FROM users WHERE id = '".$id."'";		
        $result=$db->fetchRow($sql);
		return $result;
	}
	
	/*** INSERT ***/
	public function insertUser($id,$nama,$password,$user){
		$db = new Database();	
		$sql = "INSERT INTO users (id, nama, status, password,create_date,create_by) values ('".$id."','".$nama."','1',md5('".$password."'),now(),'".$user."')";
		return $db->execute($sql);
	}
	
	/*** UPDATE ***/
	//fungsi untuk mengupdate data di table msuser
	public function updateUser($id,$nama,$status,$password,$user){
		$db = new Database();			
		$updatePassword="";
		if($password<>""){
			$updatePassword = ", password = md5('".$password."') ";
		}
		
		$sql = "UPDATE users set nama = '".$nama."', status = '".$status."', update_date = now(), update_by = '".$user."' ".$updatePassword." WHERE id = '".$id."'";				
		return $db->execute($sql);
	}
	
	/*** DELETE ***/
}
?>