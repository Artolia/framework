<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class hakAksesModel{
	/*** SELECT ***/	
	//untuk update menu hak akses berdasarkan group
	public function getMenuEdit($group){
		$db = new Database();
		$sql = "SELECT 
					menus.id, 
					nama, 
					hak_akses, 
					priv
				FROM menus 
				LEFT JOIN 
				(
					SELECT
						menus_id,
						priv
					FROM 
						group_priv
					WHERE groups_id = '".$group."'
				) a ON menus.id = menus_id
				WHERE parent = '0'
				ORDER BY parent, menus.id";				
        $menu = $db->fetchRows($sql);
		for($i=0;$i<count($menu);$i++){		
			$menu[$i]['hak_akses'] = explode(', ',$menu[$i]['hak_akses']);
		}
		for($i=0;$i<count($menu);$i++){		
			$menu[$i]['priv'] = explode(', ',$menu[$i]['priv']);
		}
		
		return $menu;
	}
	
	//untuk update menu hak akses berdasarkan group
	public function getSubMenuEdit($group){
		$db = new Database();
		$sql = "SELECT 
					menus.id, 
					nama, 
					hak_akses, 
					priv,
					parent
				FROM menus 
				LEFT JOIN 
				(
					SELECT
						menus_id,
						priv
					FROM 
						group_priv
					WHERE groups_id = '".$group."'
				) a ON menus.id = menus_id
				WHERE parent <> '0'
				ORDER BY parent, menus.id";			
        $menu = $db->fetchRows($sql);
		for($i=0;$i<count($menu);$i++){		
			$menu[$i]['hak_akses'] = explode(', ',$menu[$i]['hak_akses']);
		}
		for($i=0;$i<count($menu);$i++){		
			$menu[$i]['priv'] = explode(', ',$menu[$i]['priv']);
		}
		
		return $menu;
	}
	
	public function update($id,$hakakses){
		$db = new Database();
		$sql = "SELECT * FROM ms_hak_akses_group WHERE mshkg_msg_id = '".$id."'";		
		$res = $db->numRows($sql);
		
		if($res > 0){
			$sql = "DELETE FROM ms_hak_akses_group WHERE mshkg_msg_id = '".$id."'";
			$db->execute($sql);
			foreach($hakakses as $key => $value){
				$akses = implode(', ', $value);			
				$sql = "INSERT INTO ms_hak_akses_group (mshkg_msg_id, mshkg_msm_id, mshkg_priv) VALUES ('".$id."','".$key."','".$akses."')";		
				$db->execute($sql);
			}
		}else{
			foreach($hakakses as $key => $value){
				$akses = implode(',', $value);			
				$sql = "INSERT INTO ms_hak_akses_group (mshkg_msg_id, mshkg_msm_id, mshkg_priv) VALUES ('".$id."','".$key."','".$akses."')";
				$db->execute($sql);
			}
		}
		
		return true;
	}

}
?>