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
	
	//fungsi untuk menggambil seluruh group member
	public function getGroupMember($msg_id){
		$sql = "SELECT * FROM ms_group_member INNER JOIN ms_user ON msu_id = msgm_username WHERE msgm_msg_id = '".$msg_id."'";
		$this->db->query($sql);
        return $this->db->execute()->fetchRows();
	}
	
	public function getUser(){
		$sql = "SELECT * FROM ms_user WHERE msu_id NOT IN (SELECT msgm_username FROM ms_group_member)";
		$this->db->query($sql);
        return $this->db->execute()->fetchRows();
	}
	
	//untuk mengambil data group berdasarkan id group
	public function deleteAnggota($id){
		$sql = "DELETE FROM ms_group_member WHERE msgm_id = '".$id."'";	
		$this->db->execute($this->db->query($sql));
		return true;
	}
	
	public function insert($msu_id,$msg_id){		
		$sql = "INSERT INTO ms_group_member (msgm_username, msgm_msg_id, msgm_create_date, msgm_create_by) VALUES ('".$msu_id."','".$msg_id."',now(), '".$_SESSION['login']['msl_username']."')";
		$this->db->execute($this->db->query($sql));
		return true;
	}

}
?>