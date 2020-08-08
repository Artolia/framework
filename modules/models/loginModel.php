<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class loginModel{

    public $db;

    public function __construct(){
        $this->db = new Database();
    }
	
	/*** SELECT ***/
	//ambil data user yang login
	public function getuserlogin($username, $password){
		$sql = "SELECT 
					users.id,
					users.nama,
					groups_id
				FROM users					
				INNER JOIN group_member
					ON users_id = users.id
				WHERE 
					users.id = '".$username."' 
					and password = md5('".$password."')
				";
		
        $this->db->query($sql);
        return $this->db->execute()->fetchRow();
	}
}
?>