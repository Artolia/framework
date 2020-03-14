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
	
	//fungsi untuk menggambil seluruh group
	public function getGroup(){
		$sql = "SELECT * FROM ms_group";
		$this->db->query($sql);
        return $this->db->execute()->fetchRows();
	}
	
	//untuk mengambil data group berdasarkan id group
	public function getDataUpdate($id){
		$sql = "SELECT
					msg_nama,
					msg_status
				FROM
					ms_group
				WHERE
					msg_id = '".$id."'";		
		$this->db->query($sql);
        $data = $this->db->execute()->fetchRow();
		return $data;
	}
	
	public function insert($nama,$status){		
		$sql = "INSERT INTO ms_group (msg_nama, msg_status, msg_create_date, msg_create_by) VALUES ('".$nama."','".$status."',now(), '".$_SESSION['login']['msl_username']."')";
		$this->db->execute($this->db->query($sql));
		return true;
	}
	
	public function update($nama,$status,$id){
		$sql = "UPDATE ms_group SET
					msg_nama = '".$nama."',
					msg_status = '".$status."'
				WHERE
					msg_id = '".$id."'";
		$this->db->execute($this->db->query($sql));
		return true;
	}

}
?>