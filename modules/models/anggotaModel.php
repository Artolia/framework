<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class anggotaModel{
	/*** SELECT ***/
	//fungsi untuk menggambil seluruh group member
	public function getGroupMember($msg_id){
		$db = new Database();
		$sql = "SELECT * FROM group_member INNER JOIN users ON users.id = users_id WHERE groups_id = '".$msg_id."'";		
        return $db->fetchRows($sql);
	}
	
	public function getUser(){
		$db = new Database();
		$sql = "SELECT * FROM users WHERE users.id NOT IN (SELECT users_id FROM group_member)";		
        return $db->fetchRows($sql);
	}	
	
	/*** INSERT ***/
	public function insert($msu_id,$msg_id,$users){	
		$db = new Database();	
		$sql = "INSERT INTO group_member (users_id, groups_id, create_date, create_by) VALUES ('".$msu_id."','".$msg_id."',now(), '".$users."')";
		$db->execute($sql);
		return true;
	}
	
	/*** DELETE ***/
	//untuk mengambil data group berdasarkan id group
	public function deleteAnggota($id){
		$db = new Database();
		$sql = "DELETE FROM group_member WHERE id = '".$id."'";	
		$db->execute($sql);
		return true;
	}

}
?>