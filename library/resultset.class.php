<?php
/*
	Copyright Artolia
	lennet.valkyrie@gmail.com
*/
class ResultSet{
    private $query;

    public function __construct($queryName){
        $this->query = $queryName;
    }

    public function fetchRow(){
        $data = array();

        if($this->query) {
            $data = mysqli_fetch_assoc($this->query);                    
        }

        return $data;
    }
	
	public function fetchRows(){
        $data = array();

        if($this->query) {

            while($record = mysqli_fetch_assoc($this->query)){
                array_push($data, $record);
            }

        }
        return $data;
    }

    public function numRows() {

        return mysqli_num_rows($this->query);
    }
}
?>