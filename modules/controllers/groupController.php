<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
use \modules\controllers\mainController;
require_once(ROOT . DS . 'modules' . DS . 'models' . DS . 'accessModel.php');

class groupController extends mainController {
	// fungsi yang pertama kali dipanggil saat menu di klik
    public function index() {
		//additional css / js
		$additional ='
			<!-- DataTables CSS -->
			<link href="' .PATH. 'resources/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
			<!-- DataTables Responsive CSS -->
			<link href="' .PATH. 'resources/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
			
			<!-- DataTables JavaScript -->
			<script src="' .PATH. 'resources/datatables/js/jquery.dataTables.min.js"></script>
			<script src="' .PATH. 'resources/datatables-plugins/dataTables.bootstrap.min.js"></script>
			<script src="' .PATH. 'resources/datatables-responsive/dataTables.responsive.js"></script>
		';
		
		//Akses
		$allowAdd = $this->checkAccess('tambah');
		$allowEdit = $this->checkAccess('edit');
		
		//untuk memanggil model		
		$groupmodel = new groupModel;
		
		//proses
		$data = $groupmodel->getGroup();
		
        $this->template('view', array(
			'data' => $data,
			'allowAdd' => $allowAdd,
			'allowEdit' => $allowEdit
		), $additional);
    }
	
	//fungsi untuk memanggil form insert dan melakukan penambahan data
	public function forminsert(){
		//untuk memanggil model
		$groupmodel = new groupmodel;
		
		//initialisasi message	
		$error = 0;
		$message = array();			
		
		if($_SERVER["REQUEST_METHOD"] == "POST") {					
			// assign data post to variable
			$msg_nama = $_POST['msg_nama'];
			$msg_status = $_POST['msg_status'];
			
			// validasi
			if($msg_nama == ''){
				$error++;
				$message[] = 'Nama group harus diisi!';
			}	
			if($msg_status == ''){
				$error++;
				$message[] = 'Status harus dipilih!';
			}				
		
			if($error == 0){
				if($groupmodel->insert($msg_nama,$msg_status)){					
					$message[] = 'Data berhasil ditambahkan!';	
					$this->redirect("?page=group",$message);
				}
			}
		}	
		
        $this->template('forminsert', array(
			'message' => $message, 
			'error' => $error
		));
	}
	
	//fungsi untuk memanggil form update dan melakukan perubahan data
	public function formupdate(){
		//untuk memanggil model
		$groupmodel = new groupmodel;
		
		//initialisasi message	
		$error = 0;
		$message = array();
		
		if($_SERVER["REQUEST_METHOD"] == "POST") {	
			// assign data post to variable
			$id = $_POST['id'];
			$msg_nama = $_POST['msg_nama'];
			$msg_status = $_POST['msg_status'];
			
			// validasi
			if($msg_nama == ''){
				$error++;
				$message[] = 'Nama group harus diisi!';
			}	
			if($msg_status == ''){
				$error++;
				$message[] = 'Status harus dipilih!';
			}		
			
			if($error == 0){
				if($groupmodel->update($msg_nama,$msg_status,$id)){					
					$message[] = 'Data berhasil diupdate!';	
					$this->redirect("?page=group",$message);
				}
			}
		}		

		//proses	
		$id = $_GET['id'];
		$data = $groupmodel->getDataUpdate($id);	
		
        $this->template('formupdate', array(
			'message' => $message, 
			'error' => $error, 
			'data'=> $data,
			'id' => $id
		));
	}
	
	//fungsi untuk check hak akses
	protected function checkAccess($accessRule){
		//untuk memanggil model
		$accessModel = new accessModel;		
		return $accessModel->getAccess('group',$accessRule,$_SESSION['login']['msgm_msg_id']);
	}
}
?>