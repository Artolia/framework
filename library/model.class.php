<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class model{

    public $db;

    public function __construct(){
        $this->db = new Database();
    }
}
?>