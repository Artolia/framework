<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class Database{
    private $instance;
    private $query;

    public function __construct(){
        
        $this->instance = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if (mysqli_connect_errno()) {

            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    public function execute($sql){

        $this->query = mysqli_query($this->instance, $sql);

        return $this->query;

    }

    public function fetchRow($sql){
        $data = array();

        $this->query = $this->execute($sql);

        if($this->query) {
            $data = mysqli_fetch_assoc($this->query);                    
        }

        return $data;
    }

    public function fetchRows($sql){
        $data = array();

        $this->query = $this->execute($sql);

        if($this->query) {
            while($record = mysqli_fetch_assoc($this->query)){
                array_push($data, $record);
            }

        }
        return $data;
    }

    public function numRows($sql) {
        $this->query = $this->execute($sql);
        return mysqli_num_rows($this->query);
    }
}
?>