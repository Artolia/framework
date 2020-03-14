<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
use \modules\controllers\mainController;
require_once(ROOT . DS . 'modules' . DS . 'models' . DS . 'accessModel.php');

class userController extends mainController {
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
		$usermodel = new usermodel;
		
		//proses
		$data = $usermodel->getdata();
		
        $this->template('view', array(
			'data' => $data,
			'allowAdd' => $allowAdd,
			'allowEdit' => $allowEdit
		), $additional);
    }
	
	//fungsi untuk memanggil form insert dan melakukan penambahan data
	public function forminsert(){
		//untuk memanggil model
		$usermodel = new usermodel;
		
		//initialisasi message	
		$error = 0;
		$message = array();
		
		//proses		
		if($_SERVER["REQUEST_METHOD"] == "POST") {					
			// assign data post to variable
			$id = $_POST['id'];
			$nama = $_POST['nama'];			
			$password = $_POST['password'];			
			
			// validasi
			if($id == ''){
				$error++;
				$message[] = 'ID tidak boleh kosong!';
			}
			if($nama == ''){
				$error++;
				$message[] = 'Nama tidak boleh kosong!';
			}
			if($password == ''){
				$error++;
				$message[] = 'Password tidak boleh kosong!';
			}
			
			if($error == 0){
				if($usermodel->insertUser($id,$nama) && $usermodel->insertLogin($id,$password)){					
					$message[] = 'User berhasil ditambahkan!';	
					$this->redirect("?page=user",$message);
				}				
			}
		}						
		
        $this->template('forminsert', array(
			'error' => $error,
			'message' => $message
		));
	}
	
	//fungsi untuk memanggil form update dan melakukan perubahan data
	public function formupdate(){
		//untuk memanggil model
		$usermodel = new usermodel;
		
		//initialisasi message	
		$error = 0;
		$message = array();
		
		//proses
		$id = $_GET['id'];		
		
		if($_SERVER["REQUEST_METHOD"] == "POST") {	
			
			// assign data post to variable
			$nama = $_POST['nama'];
			$password = $_POST['password'];
			$status = $_POST['status'];
			
			// validasi
			if($nama == ''){
				$error++;
				$message[] = 'Nama tidak boleh kosong!';
			}
			
			if($error == 0){
				if($password <> ''){
					if($usermodel->updateLogin($id,$password)){
						$message[] = 'Password berhasil diedit!';
					}
				}
				
				if($usermodel->updateUser($id,$nama,$status)){					
					$message[] = 'Data user berhasil diedit!';			
				}
				$this->redirect("?page=user",$message);
			}
		}						
		
		$dataupdate = $usermodel->getdataforupdate($id);
		
        $this->template('formupdate', array(
			'message' => $message, 
			'error' => $error, 
			'data'=> $dataupdate
		));
	}
	
	//fungsi untuk check hak akses
	protected function checkAccess($accessRule){
		//untuk memanggil model
		$accessModel = new accessModel;
		return $accessModel->getAccess('user',$accessRule,$_SESSION['login']['msgm_msg_id']);
	}
}
?>