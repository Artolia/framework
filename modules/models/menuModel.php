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
	
	public function getmenu(){
		$sql = "SELECT *
				FROM ms_menu
				WHERE msm_parent = '0'
				ORDER BY msm_urutan
		";
		$this->db->query($sql);
        return $this->db->execute()->fetchRows();
	}
	
	public function getsubmenu(){
		$sql = "SELECT *
				FROM ms_menu
				WHERE msm_parent <> '0'
				ORDER BY msm_parent, msm_urutan
		";
		$this->db->query($sql);
        return $this->db->execute()->fetchRows();
	}
	
	public function insert($nama,$urutan,$page,$parent,$hakakses){	
		$sql = "INSERT INTO ms_menu (msm_nama, msm_urutan, msm_page, msm_parent, msm_hak_akses) VALUES ('".$nama."','".$urutan."','".$page."','".$parent."','".$hakakses."')";
		return $this->db->execute($this->db->query($sql));
	}
	
	public function getMenuEdit($id){
		$sql = "SELECT *
				FROM ms_menu
				WHERE msm_id = '".$id."'
		";
		$this->db->query($sql);
        return $this->db->execute()->fetchRow();
	}
	
	public function update($id,$nama,$urutan,$page,$parent,$hakakses){	
		$sql = "UPDATE ms_menu SET
				msm_nama = '".$nama."', 
				msm_urutan = '".$urutan."', 
				msm_page = '".$page."', 
				msm_parent = '".$parent."', 
				msm_hak_akses = '".$hakakses."'
				WHERE msm_id = '".$id."'
				";
		return $this->db->execute($this->db->query($sql));
	}

}
?>