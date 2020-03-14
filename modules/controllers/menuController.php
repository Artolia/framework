<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
use \modules\controllers\mainController;
require_once(ROOT . DS . 'modules' . DS . 'models' . DS . 'accessModel.php');

class menuController extends mainController {
	// fungsi yang pertama kali dipanggil saat menu di klik
    public function index() {
		//additional css / js
		$additional ='
		';
		
		//Akses
		$allowAdd = $this->checkAccess('tambah');
		$allowEdit = $this->checkAccess('edit');
		
		//untuk memanggil model		
		$menumodel = new menumodel;
		
		//proses
		$parent = $menumodel->getmenu();
		$child = $menumodel->getsubmenu();
		
        $this->template('view', array(
			'parent' => $parent,
			'child' => $child,
			'allowAdd' => $allowAdd,
			'allowEdit' => $allowEdit
		), $additional);
    }
	
	//fungsi untuk memanggil form insert dan melakukan penambahan data
	public function forminsert(){
		//untuk memanggil model
		$menumodel = new menumodel;
		
		//initialisasi message	
		$error = 0;
		$message = array();			
		
		if($_SERVER["REQUEST_METHOD"] == "POST") {					
			// assign data post to variable
			$nama = $_POST['nama'];
			$urutan = $_POST['urutan'];
			$page = $_POST['page'];
			$parent = $_POST['parent'];
			$hakakses = $_POST['hakakses'];
			
			// validasi
			if($nama == ''){
				$error++;
				$message[] = 'Nama menu harus diisi!';
			}
			
			if($urutan == ''){
				$error++;
				$message[] = 'Urutan harus diisi!';
			}
		
			if($hakakses == ''){
				$error++;
				$message[] = 'Hak akses harus diisi!';
			}
			
			if($parent==''){
				$parent='0';
			}
			
			if($error == 0){
				if($menumodel->insert($nama,$urutan,$page,$parent,$hakakses)){					
					$message[] = 'Data berhasil ditambahkan!';	
					$this->redirect("?page=menu",$message);
				}
			}
		}
		
		$parent = $menumodel->getmenu();
		
        $this->template('forminsert', array(
			'message' => $message, 
			'error' => $error,
			'parent' => $parent
		));
	}
	
	//fungsi untuk memanggil form update dan melakukan perubahan data
	public function formupdate(){
		//untuk memanggil model
		$menumodel = new menumodel;
		
		//initialisasi message	
		$error = 0;
		$message = array();
		
		//proses
		$id = $_GET['id'];		
		
		if($_SERVER["REQUEST_METHOD"] == "POST") {	
			// assign data post to variable
			$nama = $_POST['nama'];
			$urutan = $_POST['urutan'];
			$page = $_POST['page'];
			$parent = $_POST['parent'];
			$hakakses = $_POST['hakakses'];
			
			// validasi
			if($nama == ''){
				$error++;
				$message[] = 'Nama menu harus diisi!';
			}
			
			if($urutan == ''){
				$error++;
				$message[] = 'Urutan harus diisi!';
			}
		
			if($hakakses == ''){
				$error++;
				$message[] = 'Hak akses harus diisi!';
			}
			
			if($parent==''){
				$parent='0';
			}
			
			if($error == 0){
				if($menumodel->update($id,$nama,$urutan,$page,$parent,$hakakses)){					
					$message[] = 'Data berhasil diedit!';	
					$this->redirect("?page=menu",$message);
				}
			}
		}		

		$data = $menumodel->getMenuEdit($id);	
		$parent = $menumodel->getmenu();
		
        $this->template('formupdate', array(
			'message' => $message, 
			'id' => $id, 
			'error' => $error, 
			'data'=> $data,
			'parent'=> $parent
		));
	}
	
	//fungsi untuk check hak akses
	protected function checkAccess($accessRule){
		//untuk memanggil model
		$accessModel = new accessModel;		
		return $accessModel->getAccess('menu',$accessRule,$_SESSION['login']['msgm_msg_id']);
	}
}
?>