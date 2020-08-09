<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class groupModel{
	/*** SELECT ***/
	//fungsi untuk menggambil seluruh group
	public function getGroup(){
		$db = new Database();
		$sql = "SELECT * FROM groups";		
        return $db->fetchRows($sql);
	}
	
	//untuk mengambil data group berdasarkan id group
	public function getDataUpdate($id){
		$db = new Database();
		$sql = "SELECT
					nama,
					status
				FROM
					groups
				WHERE
					id = '".$id."'";				
        $data = $db->fetchRow($sql);
		return $data;
	}
	
	/*** INSERT ***/
	public function insert($nama,$status,$user){	
		$db = new Database();	
		$sql = "INSERT INTO groups (nama, status, create_date, create_by) VALUES ('".$nama."','".$status."',now(), '".$user."')";
		$db->execute($sql);
		return true;
	}
	
	/*** UPDATE ***/
	public function update($nama,$status,$id){
		$db = new Database();
		$sql = "UPDATE groups SET
					nama = '".$nama."',
					status = '".$status."'
				WHERE
					id = '".$id."'";
		$db->execute($sql);
		return true;
	}

}
?>