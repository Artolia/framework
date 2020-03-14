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
					parent.*,
					coalesce(c,'0') c,
					mshkg_priv
				FROM ms_menu parent
				INNER JOIN ms_hak_akses_group
					ON msm_id = mshkg_msm_id
				INNER JOIN ms_group
					ON msg_id = mshkg_msg_id
				LEFT JOIN (
					SELECT
						COUNT(*) c,
						msm_parent
					FROM ms_menu 
					GROUP BY msm_parent
				) sub ON parent.msm_id = sub.msm_parent
				WHERE 
					mshkg_msg_id = '".$username['msgm_msg_id']."'
					AND parent.msm_parent = '0'
					AND msg_status = '1'
				ORDER BY parent.msm_urutan";
		
        $db->query($sql);
        $parentmenu = $db->execute()->fetchRows();
		for($i=0;$i<count($parentmenu);$i++){		
			$parentmenu[$i]['mshkg_priv'] = explode(',',$parentmenu[$i]['mshkg_priv']);
		}
		
        return $parentmenu;
	}
	
	//fungsi untuk menampilkan sub menu
	public function getsubmenu($username){
		$db = new Database();
		$sql = "SELECT 
					parent.*,
					mshkg_priv
				FROM ms_menu parent
				INNER JOIN ms_hak_akses_group
					ON msm_id = mshkg_msm_id
				INNER JOIN ms_group
					ON msg_id = mshkg_msg_id
				WHERE 
					mshkg_msg_id = '".$username['msgm_msg_id']."'
					AND parent.msm_parent <> '0'
					AND msg_status = '1'
				ORDER BY parent.msm_urutan
				";
		
        $db->query($sql);
		$submenu = $db->execute()->fetchRows();
		for($i=0;$i<count($submenu);$i++){		
			$submenu[$i]['mshkg_priv'] = explode(',',$submenu[$i]['mshkg_priv']);
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