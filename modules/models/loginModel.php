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
	
	//ambil data user yang login
	public function getuserlogin($username, $password){
		$sql = "SELECT 
					* 
				FROM ms_login 
				INNER JOIN ms_user 
					ON msl_username = msu_id
				INNER JOIN ms_group_member
					ON msgm_username = msl_username
				WHERE 
					msl_username = '".$username."' 
					and msl_password = md5('".$password."')
				";
		
        $this->db->query($sql);
        return $this->db->execute()->fetchRow();
	}
}
?>