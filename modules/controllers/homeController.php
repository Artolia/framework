<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
use \modules\controllers\mainController;

class homeController extends mainController {

    public function index() {
        $data = $_SESSION["login"];
		$homemodel = new homemodel;
		
        $this->template('home', array('user' => $data));
    }
}
?>