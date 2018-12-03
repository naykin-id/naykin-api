<?php
class Passenger{
// Connection instance
private $connection;
// table name
private $table_name = "Passenger";
// table columns
public $id;
public $fullName;
public $age;
public $identity;
public $identityType;
public $rowStatus;
public $createdDate;
public $createdBy;
public $modifiedDate;
public $modifiedBy;
public function __construct($connection){
$this->connection = $connection;
date_default_timezone_set('Asia/Jakarta');
}
//C
public function create(){
    $query = "INSERT INTO ". $this->table_name ." (FullName, Age, Identity, IdentityType, RowStatus, CreatedDate, CreatedBy) VALUES ('".$this->fullName."', ".$this->age.", '".$this->identity."', '".$this->identityType."', 0, '".date("Y-m-d H:i:s")."', '".$this->createdBy."')";
    
    $stmt = $this->connection->prepare($query);
    
    $stmt->execute();

    return $stmt;
}
//R
public function read(){
    $query = "SELECT a.ID, a.FullName, a.Age, a.Identity, a.IdentityType, a.RowStatus, a.CreatedDate, a.CreatedBy, a.ModifiedDate, a.ModifiedBy FROM ".$this->table_name." a WHERE a.RowStatus = '0'";

    //PDO
    $stmt = $this->connection->prepare($query);
    $stmt->execute();

    //biasa
    // $result = $conn->query($query);

    return $stmt;
}
//U
public function update(){
    $query = "UPDATE ". $this->table_name ." SET FullName = '".$this->fullName."', Age = '".$this->age."', Identity = '".$this->identity."', IdentityType = '".$this->identityType."', ModifiedDate = '".date("Y-m-d H:i:s")."', ModifiedBy = '".$this->modifiedBy."' WHERE ID = '".$this->id."'";
        
    $stmt = $this->connection->prepare($query);

    $stmt->execute();

    return $stmt;
}
//D
public function delete(){
    $query = "UPDATE ". $this->table_name ." SET RowStatus = '-1' WHERE ID = '".$this->id."'";

    $stmt = $this->connection->prepare($query);

    $stmt->execute();

    return $stmt;
}    
}