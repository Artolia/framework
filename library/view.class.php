<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class View {

    public $viewName = NULL;
    public $data = array();
    public $isRender =  FALSE;

    public function __construct($view){
        $this->viewName = $view;
    }

    public function bind($name, $value = ''){
        if(is_array($name)){
            foreach($name as $attr=>$val){
                $this->data[$attr] = $val;
            }
        }
        else $this->data[$name] = $value;
    }

    public function forceRender(){
        $this->isRender = TRUE;
        extract($this->data);
		$page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : 'home';
		if($page == 'login' || $page == 'home' || $this->viewName == 'template'){
			$view = ROOT . DS . 'modules' . DS . 'views' . DS . $this->viewName . '.view.php';			
		}else{
			$view = ROOT . DS . 'modules' . DS . 'views' . DS . $page . DS . $this->viewName . '.php';			
		}		
        if(file_exists($view)) require_once $view;
        else echo('View Not Found !');
    }

    public function __destruct(){
        if(! $this->isRender) $this->forceRender();
    }
}
?>