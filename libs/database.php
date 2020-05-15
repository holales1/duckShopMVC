<?php
class database{
    private $host;
    private $db;
    private $user;
    private $password;
    private $conn;

    public function __construct()
    {
        $this->host=constant('HOST');
        $this->password=constant('PASSWORD');
        $this->user=constant('USER');
        $this->db=constant('DB');

        $this->conn = $this->connect();
    }


    function connect(){
            $conn = mysqli_connect($this->host,$this->user,$this->password,$this->db);
            return $conn;
    }

    function getConn(){
        return $this->conn;
    }

    function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$results[] = $row;
		}		
		if(!empty($results))
			return $results;
    }
    
    function escapeSql($stringEscape){
		$escapedString=trim(mysqli_real_escape_string($this->conn, $stringEscape));
		return $escapedString;
    }
    
    function insertRow($query){
		$result = mysqli_query($this->conn, $query);
		return $result;
	}

}
?>