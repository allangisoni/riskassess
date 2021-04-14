<?php 


/**
 * 
 */
class SafetyPmd 
{

 // database connection and table name
    private $conn;
    private $table_name = "safetymasterdatapmd";
  
    // object properties
    public $id;
    public $currentdate;
    public $lastupdatedate;
    public $supervisor;
    public $operator;
    public $line;
    public $shift;
    public $total1;
    public $total2;
    public $total3;
    public $total4;
    public $total5;
    public $total6;
    public $total7;
    public $total8;
    public $total9;
    public $total10;
    public $totalscore;
    public $actualrisk;
    public $countermeasures;
    



	
	function __construct($db)
	{
		$this->conn = $db;
	}


// read pmd safety data
function read(){
  
    // select all query
    $query = "SELECT * FROM ". $this->table_name ." ORDER BY id DESC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}


// used when filling up the pmd safety data update form
function readOne(){
  
    // query to read single record
    $query = "SELECT
              *
            FROM
                " . $this->table_name . " 
            WHERE
                id = ?
            LIMIT
                0,1";
  
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind id of item to be updated
    $stmt->bindParam(1, $this->id);
  
    // execute query
    $stmt->execute();
  
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // set values to object properties
    $this->currentdate = $row['currentdate'];
    $this->lastupdatedate = $row['lastupdatedate'];
    $this->supervisor = $row['supervisor'];
    $this->operator = $row['operator'];
    $this->line = $row['shift'];
    $this->total1 = $row['total1'];
    $this->total2 = $row['total2'];
    $this->total3 = $row['total3'];
    $this->total4 = $row['total4'];
    $this->total5 = $row['total5'];
    $this->total6 = $row['total6'];
    $this->total7 = $row['total7'];
    $this->total8 = $row['total8'];
    $this->total9 = $row['total9'];
    $this->total10 = $row['total10'];
    $this->totalscore = $row['totalscore'];
    $this->actualrisk = $row['actualrisk'];
    $this->countermeasures = $row['countermeasures'];
}


// create pmd safety data item
function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                currentdate=:currentdate,
                lastupdatedate=:lastupdatedate,
                supervisor=:supervisor, 
                operator=:operator, 
                line=:line, 
                shift=:shift, 
                total1=:total1, 
                total2=:total2, 
                total3=:total3,
                total4=:total4,
                total5=:total5, 
                total6=:total6,
                total7=:total7, 
                total8=:total8,
                total9=:total9, 
                total10=:total10,
                totalscore=:totalscore,
                actualrisk=:actualrisk,
                countermeasures=:countermeasures
               ";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->currentdate=htmlspecialchars(strip_tags($this->currentdate));
    $this->lastupdatedate=htmlspecialchars(strip_tags($this->lastupdatedate));
    $this->supervisor=htmlspecialchars(strip_tags($this->supervisor));
    $this->operator=htmlspecialchars(strip_tags($this->operator));
    $this->line=htmlspecialchars(strip_tags($this->line));
    $this->shift=htmlspecialchars(strip_tags($this->shift));
    $this->total1=htmlspecialchars(strip_tags($this->total1));
    $this->total2=htmlspecialchars(strip_tags($this->total2));
    $this->total3=htmlspecialchars(strip_tags($this->total3));
    $this->total4=htmlspecialchars(strip_tags($this->total4));
    $this->total5=htmlspecialchars(strip_tags($this->total5));
    $this->total6=htmlspecialchars(strip_tags($this->total6));
    $this->total7=htmlspecialchars(strip_tags($this->total7));
    $this->total8=htmlspecialchars(strip_tags($this->total8));
    $this->total9=htmlspecialchars(strip_tags($this->total9));
    $this->total10=htmlspecialchars(strip_tags($this->total10));
    $this->totalscore=htmlspecialchars(strip_tags($this->totalscore));
    $this->actualrisk=htmlspecialchars(strip_tags($this->actualrisk));
    //$this->countermeasures=htmlspecialchars(strip_tags($this->countermeasures));
  
    // bind values
    $stmt->bindParam(":currentdate", $this->currentdate);
    $stmt->bindParam(":lastupdatedate", $this->lastupdatedate);
    $stmt->bindParam(":supervisor", $this->supervisor);
    $stmt->bindParam(":operator", $this->operator);
    $stmt->bindParam(":line", $this->line);
    $stmt->bindParam(":shift", $this->shift);
    $stmt->bindParam(":total1", $this->total1);
    $stmt->bindParam(":total2", $this->total2);
    $stmt->bindParam(":total3", $this->total3);
    $stmt->bindParam(":total4", $this->total4);
    $stmt->bindParam(":total5", $this->total5);
    $stmt->bindParam(":total6", $this->total6);
    $stmt->bindParam(":total7", $this->total7);
    $stmt->bindParam(":total8", $this->total8);
    $stmt->bindParam(":total9", $this->total9);
    $stmt->bindParam(":total10", $this->total10);
    $stmt->bindParam(":totalscore", $this->totalscore);
    $stmt->bindParam(":actualrisk", $this->actualrisk);
    $stmt->bindParam(":countermeasures", $this->countermeasures);

  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}



}

















 ?>