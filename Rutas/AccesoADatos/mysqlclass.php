<?php
	
class mysql {

	var $debug;
	var $host;
	var $database;
	var $user;
	var $password;
	
	var $conn;
	var $rstemp;
	var $record;


	function mysql () {

		$this->debug = $debug=0;
		if ($this->debug) echo "\n\nDebug On <br>\n";		
		
		$this->host = $host='localhost';
    	        $this->user = $user='root';
	        $this->password = $password='';
	        $this->database = $database='proyecto';	
		$this->connect();  
	}
	    	
      
         function connect() { 
		    
            
             if ($this->debug) echo "Connecting  to $this->host <br>\n";
             $this->conn = mysql_connect($this->host,$this->user,$this->password) or die("Connection to server failed <br>\n");
         
             if ($this->debug) echo "Selecting to $this->database <br>\n";
             @mysql_select_db($this->database,$this->conn)or die("Error:" . mysql_errno() . " : " . mysql_error() . "<br>\n");	
            	
             return $this->conn;				
        }

        function query($sql) {
		
		if($this->debug) echo "Run SQL:  $sql <br>\n\n";
		$this->rstemp = @mysql_query($sql,$this->conn);
		if($this->rstemp == 0) {
		   header ("Location: error.php?error=Ocurrio el error numero ". mysql_errno() . " ". mysql_error(). "");
		   exit();
                                        
                }
		return $this->rstemp;
	
	}
	
	function num_rows() {
	
		$num = @mysql_num_rows($this->rstemp);
		if ($this->debug) echo "$num records returneds <br>\n\n";	
		
		return $num;		
	}
	
	
  	function movenext(){
		
		if ($this->debug) echo "Fetching next record  ... ";
	    $this->record = @mysql_fetch_array($this->rstemp);
	    $status = is_array($this->record);
		
		if ($this->debug && $status) echo "OK <br>\n\n";
		elseif ($this->debug) echo "EOF <br>\n\n";
		
	    return($status);
	}
  
  

	function getfield($field){
	
		if ($this->debug) {
			echo "Getting $field ... ";
		
			if (phpversion() >=4.1) {
				if (array_key_exists($field,$this->record)) echo "OK <br>\n\n";
				else echo "Not found <br>\n\n";
			}
			 else echo " <br>\n\n";
		}

		return($this->record[$field]);
	}	
  	
}

?>
