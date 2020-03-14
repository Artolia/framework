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
				FROM ms_hak_akses_group 
				INNER JOIN ms_menu 
					ON mshkg_msm_id = msm_id 
				WHERE 
					mshkg_msg_id = '".$group_id."'
					AND msm_page = '".$module."'
					AND mshkg_priv like '%".$accessRule."%'";
		$this->db->query($sql);		
        if($this->db->execute()->numRows() > 0){
			return true;
		}else{
			return false;
		}
	}
		
}
?>