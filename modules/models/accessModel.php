<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class accessModel{	
	/*** SELECT ***/
	//fungsi untuk menggambil seluruh data table ms_data
	public function getAccess($module, $accessRule, $group_id){		
		$db = new Database();
		$sql = "SELECT 
					* 
				FROM group_priv 
				INNER JOIN menus 
					ON menus_id = menus.id 
				WHERE 
					menus_id = '".$group_id."'
					AND page = '".$module."'
					AND priv like '%".$accessRule."%'";				
        if($db->numRows($sql) > 0){
			return true;
		}else{
			return false;
		}
	}
		
}
?>