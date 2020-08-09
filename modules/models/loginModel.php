<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class loginModel{	
	/*** SELECT ***/
	//ambil data user yang login
	public function getuserlogin($username, $password){
		$db = new Database();
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
		        
        return $db->fetchRow($sql);
	}
}
?>