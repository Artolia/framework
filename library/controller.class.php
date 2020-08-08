<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class Controller{
    protected function view($viewName){
        $view = new View($viewName);		
        return $view;
    }

    //fungsi untuk menampilkan menu parent
	public function getmenuparent($username){
		$db = new Database();				
		$sql = "SELECT 
					main.*,
					coalesce(c,'0') c,
					priv
				FROM menus main
				INNER JOIN group_priv
					ON main.id = menus_id
				LEFT JOIN (
					SELECT
						COUNT(*) c,
						parent
					FROM menus 
					GROUP BY parent
				) sub ON main.id = sub.parent
				WHERE 
					groups_id = '".$username['group']."'
					AND main.parent = '0'
				ORDER BY main.urutan";
		
        $db->query($sql);
        $parentmenu = $db->execute()->fetchRows();
		for($i=0;$i<count($parentmenu);$i++){		
			$parentmenu[$i]['priv'] = explode(',',$parentmenu[$i]['priv']);
		}
		
        return $parentmenu;
	}
	
	//fungsi untuk menampilkan sub menu
	public function getsubmenu($username){
		$db = new Database();
		$sql = "SELECT 
					main.*,
					priv
				FROM menus main
				INNER JOIN group_priv
					ON main.id = menus_id
				INNER JOIN groups
					ON groups.id = groups_id
				WHERE 
					groups_id = '".$username['group']."'
					AND main.parent <> '0'
					AND status = '1'
				ORDER BY main.urutan
				";
		
        $db->query($sql);
		$submenu = $db->execute()->fetchRows();
		for($i=0;$i<count($submenu);$i++){		
			$submenu[$i]['priv'] = explode(',',$submenu[$i]['priv']);
		}
		
        return $submenu;
	}
    
    public function back() {

        echo '<script>history.go(-1);</script>';
    }

    public function redirect($url = "", $message=null) {
		$_SESSION['msg']=$message;
        header("location:" . $url);
    }
}
?>