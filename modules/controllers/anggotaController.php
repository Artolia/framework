<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
use \modules\controllers\mainController;
require_once(ROOT . DS . 'modules' . DS . 'models' . DS . 'accessModel.php');

class anggotaController extends mainController {
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
		
		//untuk memanggil model		
		$anggotaModel = new anggotaModel;
		
		//proses
		$msg_id = $_GET['msg_id'];
		$data = $anggotaModel->getGroupMember($msg_id);
		
        $this->template('view', array(
			'data' => $data,
			'msg_id' => $msg_id
		), $additional);
    }
	
	//fungsi untuk memanggil form insert dan melakukan penambahan data
	public function forminsert(){
		//untuk memanggil model
		$anggotaModel = new anggotaModel;
		
		//initialisasi message	
		$error = 0;
		$message = array();			
		
		if($_SERVER["REQUEST_METHOD"] == "POST") {					
			// assign data post to variable
			$msg_id = $_POST['msg_id'];
			$msu_id = $_POST['msu_id'];
			
			// validasi
			if($msu_id == ''){
				$error++;
				$message[] = 'Nama anggota harus dipilih!';
			}			
		
			if($error == 0){
				if($anggotaModel->insert($msu_id,$msg_id,$_SESSION['login']['id'])){					
					$message[] = 'Data berhasil ditambahkan!';	
					$this->redirect("?page=anggota&msg_id=".$msg_id,$message);
				}
			}
		}	

		//proses	
		$msg_id = $_GET['msg_id'];
		$user = $anggotaModel->getUser();	
		
        $this->template('forminsert', array(
			'message' => $message, 
			'error' => $error,
			'user' =>$user,
			'msg_id' => $msg_id
		));
	}
	
	//fungsi untuk menghapus data
	public function deleteAnggota(){
		//untuk memanggil model
		$anggotaModel = new anggotaModel;
		
		//initialisasi message
		$message = array();
		
		// assign data post to variable
		$msgm_id = $_GET['msgm_id'];
		$msg_id = $_GET['msg_id'];
	
		if($anggotaModel->deleteAnggota($msg_id)){					
			$message[] = 'Data berhasil didelete!';	
			$this->redirect("?page=anggota&msg_id=".$msg_id,$message);
		}
	}
	
	//fungsi untuk check hak akses
	protected function checkAccess($accessRule){
		//untuk memanggil model
		$accessModel = new accessModel;		
		return $accessModel->getAccess('anggota',$accessRule,$_SESSION['login']['group']);
	}
}
?>