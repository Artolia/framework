<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class menuModel{

    public $db;

    public function __construct(){
        $this->db = new Database();
    }
	
	/*** SELECT ***/
	public function getmenu(){
		$sql = "SELECT *
				FROM menus
				WHERE parent = '0'
				ORDER BY urutan
		";
		$this->db->query($sql);
        return $this->db->execute()->fetchRows();
	}
	
	public function getsubmenu(){
		$sql = "SELECT *
				FROM menus
				WHERE parent <> '0'
				ORDER BY parent, urutan
		";
		$this->db->query($sql);
        return $this->db->execute()->fetchRows();
	}
	
	public function getMenuEdit($id){
		$sql = "SELECT *
				FROM menus
				WHERE id = '".$id."'
		";
		$this->db->query($sql);
        return $this->db->execute()->fetchRow();
	}
	
	/*** INSERT ***/
	public function insert($nama,$urutan,$page,$parent,$hakakses){	
		$sql = "INSERT INTO menus (nama, urutan, page, parent, hak_akses) VALUES ('".$nama."','".$urutan."','".$page."','".$parent."','".$hakakses."')";
		return $this->db->execute($this->db->query($sql));
	}
		
	/*** UPDATE ***/
	public function update($id,$nama,$urutan,$page,$parent,$hakakses){	
		$sql = "UPDATE menus SET
				nama = '".$nama."', 
				urutan = '".$urutan."', 
				page = '".$page."', 
				parent = '".$parent."', 
				hak_akses = '".$hakakses."'
				WHERE id = '".$id."'
				";
		return $this->db->execute($this->db->query($sql));
	}

}
?>