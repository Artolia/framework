<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class menuModel{
	/*** SELECT ***/
	public function getmenu(){
		$db = new Database();
		$sql = "SELECT *
				FROM menus
				WHERE parent = '0'
				ORDER BY urutan
		";
        return $db->fetchRows($sql);
	}
	
	public function getsubmenu(){
		$db = new Database();
		$sql = "SELECT *
				FROM menus
				WHERE parent <> '0'
				ORDER BY parent, urutan
		";
        return $db->fetchRows($sql);
	}
	
	public function getMenuEdit($id){
		$db = new Database();
		$sql = "SELECT *
				FROM menus
				WHERE id = '".$id."'
		";
        return $db->fetchRow($sql);
	}
	
	/*** INSERT ***/
	public function insert($nama,$urutan,$page,$parent,$hakakses){	
		$db = new Database();
		$sql = "INSERT INTO menus (nama, urutan, page, parent, hak_akses) VALUES ('".$nama."','".$urutan."','".$page."','".$parent."','".$hakakses."')";
		return $db->execute($sql);
	}
		
	/*** UPDATE ***/
	public function update($id,$nama,$urutan,$page,$parent,$hakakses){
		$db = new Database();	
		$sql = "UPDATE menus SET
				nama = '".$nama."', 
				urutan = '".$urutan."', 
				page = '".$page."', 
				parent = '".$parent."', 
				hak_akses = '".$hakakses."'
				WHERE id = '".$id."'
				";
		return $db->execute($sql);
	}

}
?>