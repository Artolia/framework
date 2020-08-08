<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class loginController extends Controller {

    public function index() {
         $login = isset($_SESSION["login"]) ? $_SESSION["login"] : "";

        if($login) {			
            $this->redirect("index.php");
        }

        $message = array();

        if($_SERVER["REQUEST_METHOD"] == "POST") {			
            $message = array(
                'success'   => false,
                'message'   => 'Maaf Username/Password Salah.'
            );

            $username = isset($_POST["username"]) ? $_POST["username"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";
			
			$loginmodel = new loginModel;
			
            $user = $loginmodel->getuserlogin($username,$password);
			
            if(count($user) > 0) {

                $message    = array(
                    'success'   => true,
                    'message'   => 'Selamat anda berhasil login.'
                );
				
                $_SESSION["login"]["id"] = $user["id"];
                $_SESSION["login"]["nama"] = $user["nama"];
                $_SESSION["login"]["group"] = $user["groups_id"];

                echo '<meta http-equiv="refresh" content="1;url=index.php">';

            }

        }

        $view = $this->view('login')->bind('message', $message);
    }

    public function logout() {

        unset($_SESSION["login"]);

        $this->redirect('index.php');
    }
}
?>