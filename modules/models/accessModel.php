<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class accessModel{

    public $db;

    public function __construct(){
        $this->db = new Database();
    }
	
	//fungsi untuk menggambil seluruh data table ms_data
	public function getAccess($module, $accessRule, $group_id){		
		$sql = "SELECT 
					* 
				FROM group_priv 
				INNER JOIN menus 
					ON menus_id = menus.id 
				WHERE 
					menus_id = '".$group_id."'
					AND page = '".$module."'
					AND priv like '%".$accessRule."%'";
		$this->db->query($sql);		
        if($this->db->execute()->numRows() > 0){
			return true;
		}else{
			return false;
		}
	}
		
}
?>