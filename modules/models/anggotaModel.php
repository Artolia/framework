<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class anggotaModel{

    public $db;

    public function __construct(){
        $this->db = new Database();
    }
	
	/*** SELECT ***/
	//fungsi untuk menggambil seluruh group member
	public function getGroupMember($msg_id){
		$sql = "SELECT * FROM group_member INNER JOIN users ON users.id = users_id WHERE groups_id = '".$msg_id."'";
		$this->db->query($sql);
        return $this->db->execute()->fetchRows();
	}
	
	public function getUser(){
		$sql = "SELECT * FROM users WHERE users.id NOT IN (SELECT users_id FROM group_member)";
		$this->db->query($sql);
        return $this->db->execute()->fetchRows();
	}	
	
	/*** INSERT ***/
	public function insert($msu_id,$msg_id,$users){		
		$sql = "INSERT INTO group_member (users_id, groups_id, create_date, create_by) VALUES ('".$msu_id."','".$msg_id."',now(), '".$users."')";
		$this->db->execute($this->db->query($sql));
		return true;
	}
	
	/*** DELETE ***/
	//untuk mengambil data group berdasarkan id group
	public function deleteAnggota($id){
		$sql = "DELETE FROM group_member WHERE id = '".$id."'";	
		$this->db->execute($this->db->query($sql));
		return true;
	}

}
?>