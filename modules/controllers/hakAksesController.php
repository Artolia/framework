<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
use \modules\controllers\mainController;
require_once(ROOT . DS . 'modules' . DS . 'models' . DS . 'accessModel.php');

class hakAksesController extends mainController {
	// fungsi yang pertama kali dipanggil saat menu di klik
    public function index() {
		//initialisasi message	
		$error = 0;
		$message = array();
		
		//untuk memanggil model		
		$hakAksesmodel = new hakAksesModel;
		
		if($_SERVER["REQUEST_METHOD"] == "POST") {	
			// assign data post to variable
			$id = $_POST['id'];
			$hakakses = $_POST['hakakses'];
			
			// validasi
			if($hakakses == ''){
				$error++;
				$message[] = 'Tidak ada hak akses yang dipilih';
			}		
			
			if($error == 0){
				if($hakAksesmodel->update($id,$hakakses)){					
					$message[] = 'Data berhasil diupdate!';	
					$this->redirect("?page=group",$message);
				}
			}
		}
		
		//proses
		$id = $_GET['msg_id'];
		$data = $hakAksesmodel->getMenuEdit($id);
		$datasub = $hakAksesmodel->getSubMenuEdit($id);
		
        $this->template('formupdate', array(
			'message' => $message, 
			'error' => $error,
			'parent' => $data,
			'child' => $datasub,
			'id' => $id
		));
    }
	
	//fungsi untuk check hak akses
	protected function checkAccess($accessRule){
		//untuk memanggil model
		$accessModel = new accessModel;		
		return $accessModel->getAccess('hakAkses',$accessRule,$_SESSION['login']['group']);
	}
}
?>