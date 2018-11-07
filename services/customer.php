<?php
class Customer{
// Connection instance
private $connection;
// table name
private $table_name = "customer";
// table columns
public $id;
public $fullName;
public $gender;
public $age;
public $phone;
public $email;
public $address;
public $rowStatus;
public $createdDate;
public $createdBy;
public $modifiedDate;
public $modifiedBy;
public function __construct($connection){
$this->connection = $connection;
}
//C
public function create(){
    date_default_timezone_set('Asia/Jakarta'); 
    $query = "INSERT INTO ". $this->table_name ." (FullName, Gender, Age, Phone, Email, Address, RowStatus, CreatedDate, CreatedBy) VALUES ('".$this->fullName."', '".$this->gender."', '".$this->age."', '".$this->phone."', '".$this->email."', '".$this->address."', '".", 0, '".date("Y-m-d")."', '".$this->createdBy."')";

    $stmt = $this->connection->prepare($query);
    
    $stmt->execute();

    return $stmt;
}
//R
public function read(){
    $query = "SELECT a.ID, a.FullName, a.Gender, a.Age, a.Phone, a.Email, a.Address, a.RowStatus, a.CreatedDate, a.CreatedBy, a.ModifiedDate, a.ModifiedBy FROM ".$this->table_name." a WHERE a.RowStatus = '0'";

    //PDO
    $stmt = $this->connection->prepare($query);
    $stmt->execute();

    //biasa
    // $result = $conn->query($query);

    return $stmt;
}
//U
public function update(){
    date_default_timezone_set('Asia/Jakarta');
    $query = "UPDATE ". $this->table_name ." SET FullName = ".$fullName.", Gender = ".$gender.", Age = ".$age.", Phone = ".$phone.", Email = ".$email.", Address = ".$address.", ModifiedDate = ".new Date().", ModifiedBy = ".$modifiedBy." WHERE ID = ".$id;

    $stmt = $this->connection->prepare($query);

    $stmt->execute();

    return $stmt;
}
//D
public function delete(){
    $query = "UPDATE ". $this->table_name ." SET RowStatus = '-1' WHERE ID = ".$id;

    $stmt = $this->connection->prepare($query);

    $stmt->execute();

    return $stmt;
}   
}