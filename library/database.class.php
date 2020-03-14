<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class Database{
    private $instance;
    private $sql;

    public function __construct(){

        require_once ROOT . DS . 'library' . DS . 'resultset.class.php';
        $this->instance = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if (mysqli_connect_errno()) {

            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    public function query($sql){
        $this->sql = $sql;
    }

    public function execute(){

        $query = mysqli_query($this->instance, $this->sql);

        return new ResultSet($query);

    }
}
?>