<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
namespace modules\controllers;
use \Controller;

class mainController extends Controller {

    protected $login;

    public function __construct() {
        $this->login = isset($_SESSION["login"]) ? $_SESSION["login"] : '';

        if(!$this->login) {

            $this->redirect(SITE_URL . "?page=login");
        }
    }

    protected function template($viewName, $data = array(), $additional=null) {
		$view = $this->view('template');
		$view->bind('viewName', $viewName);    
		
		$menuparent = $this->getmenuparent($_SESSION["login"]);
		$submenu = $this->getsubmenu($_SESSION["login"]);      		
		
		$view->bind('menuparent', $menuparent);
		$view->bind('submenu', $submenu);
		
		foreach($data as $key => $value){	
			$view->bind($key, $value);
		}
	
		$view->bind('additional', $additional);
		$view->bind('login', $this->login);
        $view->bind('data', array_merge($data, array('login' => $this->login)));     
    }
	
	protected function templateDialog($viewName, $data = array(), $additional=null) {
		$view = $this->view($viewName);
		$view->bind('viewName', $viewName);    
		
		foreach($data as $key => $value){	
			$view->bind($key, $value);
		}
	
		$view->bind('additional', $additional);
		$view->bind('login', $this->login);  
    }
	
	protected function additional($vars){
		$view = $this->view('template');
		$this->bind('additional', $vars);
	}
}
?>