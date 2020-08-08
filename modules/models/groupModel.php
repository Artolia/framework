<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class groupModel{

    public $db;

    public function __construct(){
        $this->db = new Database();
    }
	
	/*** SELECT ***/
	//fungsi untuk menggambil seluruh group
	public function getGroup(){
		$sql = "SELECT * FROM groups";
		$this->db->query($sql);
        return $this->db->execute()->fetchRows();
	}
	
	//untuk mengambil data group berdasarkan id group
	public function getDataUpdate($id){
		$sql = "SELECT
					nama,
					status
				FROM
					groups
				WHERE
					id = '".$id."'";		
		$this->db->query($sql);
        $data = $this->db->execute()->fetchRow();
		return $data;
	}
	
	/*** INSERT ***/
	public function insert($nama,$status,$user){		
		$sql = "INSERT INTO groups (nama, status, create_date, create_by) VALUES ('".$nama."','".$status."',now(), '".$user."')";
		$this->db->execute($this->db->query($sql));
		return true;
	}
	
	/*** UPDATE ***/
	public function update($nama,$status,$id){
		$sql = "UPDATE groups SET
					nama = '".$nama."',
					status = '".$status."'
				WHERE
					id = '".$id."'";
		$this->db->execute($this->db->query($sql));
		return true;
	}

}
?>