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
		
		foreach($hakakses as $key => $value){
			$sql = "SELECT * FROM group_priv WHERE groups_id = '".$id."' and menus_id ='".$key."'";		
			$res = $db->numRows($sql);

			if($res > 0){
				$akses = implode(', ', $value);			
				$sql = "UPDATE group_priv 
						SET priv = '".$akses."'
						WHERE 
							groups_id = '".$id."' AND 
							menus_id = '".$key."'";						
				$db->execute($sql);				
			}else{				
				$akses = implode(',', $value);			
				$sql = "INSERT INTO group_priv (groups_id, menus_id, priv) VALUES ('".$id."','".$key."','".$akses."')";
				$db->execute($sql);				
			}			
			
		}
				
		return true;
	}

}
?>